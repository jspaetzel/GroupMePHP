<?php

namespace GroupMePHP\Services;

class BotsService extends Service
{
    /**
     * Create a new bot.
     *
     * @param array $args
     *                    bot[name] required string
     *                    bot[group_id] required string
     *                    bot[avatar_url] string
     *                    bot[callback_url string
     */
    public function create($args)
    {
        $params = [
            'url' => '/bots',
            'method' => 'POST',
            'query' => [],
            'payload' => ['bot' => $args],
        ];

        return $this->request($params);
    }

    /**
     * Post a message from a bot.
     *
     * @param array $args
     *                    bot_id required string
     *                    text required string
     *                    picture_url string — Image must be processed through image service
     */
    public function post($args)
    {
        $params = [
            'url' => '/bots/post',
            'method' => 'POST',
            'query' => [],
            'payload' => $args,
        ];

        return $this->request($params);
    }

    /**
     * List of bots that you have created.
     */
    public function index()
    {
        $params = [
            'url' => '/bots',
            'method' => 'GET',
            'query' => [],
        ];

        return $this->request($params);
    }

    /**
     * Remove a bot that you have created.
     *
     * @param string $bot_id
     */
    public function destroy($bot_id)
    {
        $params = [
            'url' => '/bots/destroy',
            'method' => 'POST',
            'query' => [$bot_id],
            'payload' => [],
        ];

        return $this->request($params);
    }
}
