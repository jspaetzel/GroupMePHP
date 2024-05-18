<?php

namespace GroupMePHP\Services;

class DirectMessagesService extends Service
{
    /**
     * Fetch direct messages between two users.
     *
     * @param array $args
     *                    other_user_id required string — The other participant in the conversation.
     *                    before_id string — Returns 20 messages created before the given message ID
     *                    since_id string — Returns 20 messages created after the given message ID
     */
    public function index($args)
    {
        $params = [
            'url' => '/direct_messages',
            'method' => 'GET',
            'query' => $args,
        ];

        return $this->request($params);
    }

    /**
     * Create direct messages between two users.
     *
     * @param array $args
     *                    source_guid required string — This is used for client-side deduplication.
     *                    recipient_id required string — The GroupMe user ID of the recipient of this message.
     *                    text required string — This can be omitted if at least one attachment is present.
     */
    public function create($args)
    {
        $params = [
            'url' => '/direct_messages',
            'method' => 'POST',
            'query' => [],
            'payload' => ['direct_message' => $args],
        ];

        return $this->request($params);
    }
}
