<?php

namespace GroupMePHP\Services;

class LikesService extends Service
{
    /**
     * Like a message.
     *
     * @param string $conversation_id
     * @param string $message_id
     */
    public function create($conversation_id, $message_id)
    {
        $params = [
            'url' => '/messages/' . $conversation_id . '/' . $message_id . '/like',
            'method' => 'POST',
            'query' => [],
        ];

        return $this->request($params);
    }

    /**
     * Unlike a message.
     *
     * @param string $conversation_id
     * @param string $message_id
     */
    public function destroy($conversation_id, $message_id)
    {
        $params = [
            'url' => '/messages/' . $conversation_id . '/' . $message_id . '/unlike',
            'method' => 'POST',
            'query' => [],
        ];

        return $this->request($params);
    }
}
