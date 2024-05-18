<?php

namespace GroupMePHP;

use const CURLOPT_CUSTOMREQUEST;
use const CURLOPT_HTTPHEADER;
use const CURLOPT_POSTFIELDS;
use const CURLOPT_RETURNTRANSFER;
use const CURLOPT_SSL_VERIFYPEER;
use const CURLOPT_TIMEOUT;
use const CURLOPT_URL;
use const CURLOPT_USERAGENT;

class Client
{
    protected $url = 'https://api.groupme.com/v3';
    private $token;

    /**
     * When creating a new Client object provide your token.
     *
     * @param mixed $token
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Build query string from $args.
     *
     * @param mixed $args
     */
    public function buildQueryString($args = [])
    {
        $args = array_merge($args, ['token' => $this->token]);

        $query = '';
        foreach ($args as $key => $val) {
            if ('' !== $query) {
                $query .= '&';
            } else {
                $query .= '?';
            }
            $query .= $key . '=' . $val;
        }

        return $query;
    }

    /**
     * Overhead function that all requests utilize.
     *
     * @param mixed $args
     */
    public function request($args)
    {
        $c = curl_init();

        curl_setopt($c, CURLOPT_TIMEOUT, 4);
        curl_setopt($c, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($c, CURLOPT_USERAGENT, 'GroupMePHPClient/0.1');
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_CUSTOMREQUEST, $args['method']);

        $curlurl = $this->url . $args['url'] . $this->buildQueryString($args['query']);
        curl_setopt($c, CURLOPT_URL, $curlurl);

        if (('POST' === $args['method']) && isset($args['payload'])) {
            $payload = '';
            if (isset($args['payload']['file'])) {
                $payload = $args['payload'];
            } else {
                $payload = json_encode($args['payload']);
                curl_setopt($c, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
            }

            curl_setopt($c, CURLOPT_POSTFIELDS, $payload);
        }
        $info = curl_getinfo($c);
        $response = curl_exec($c);
        curl_close($c);

        return $response;
    }
}
