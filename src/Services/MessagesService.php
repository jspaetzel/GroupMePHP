<?php

namespace GroupMePHP\Services;

class MessagesService extends Service
{
    /**
     * Retrieve messages for a group.
     *
     * @param int|string $id
     * @param array      $args
     *                         before_id string — Returns 20 messages created before the given message ID
     *                         since_id string — Returns 20 messages created after the given message ID
     */
    public function index($id, $args)
    {
        $params = [
            'url' => '/groups/' . $id . '/messages',
            'method' => 'GET',
            'query' => $args,
        ];

        return $this->request($params);
    }

    /**
     * Create messages in a group.
     *
     * @param int|string $id   of group
     * @param array      $args
     *                         source_guid required string — This is used for client-side deduplication.
     *                         text required string — This can be omitted if at least one attachment is present.
     *                         attachments optional array - include array of attachments to attach images, etc.
     */
    public function create($id, $args)
    {
        // Construct the payload, optionally with attachments
        $payload = [
            'source_guid' => $args[0],
            'text' => $args[1],
        ];

        if (!empty($args[2])) {
            $payload = array_merge($payload, ['attachments' => [$args[2]]]);
        }

        $params = [
            'url' => '/groups/' . $id . '/messages',
            'method' => 'POST',
            'query' => [],
            'payload' => ['message' => $payload],
        ];

        return $this->request($params);
    }
}
