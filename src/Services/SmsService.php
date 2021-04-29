<?php

namespace GroupMePHP\Services;

class SmsService extends Service
{
    /**
     * Enable SMS mode for up to 48 hours.
     *
     * @param string $duration
     * @param string $registration_id
     *
     * @return string
     */
    public function enable($duration, $registration_id)
    {
        $params = [
            'url' => '/users/sms_mode',
            'method' => 'POST',
            'query' => [],
            'payload' => [
                'duration' => $duration,
                'registration_id' => $registration_id,
                ],
        ];

        return $this->request($params);
    }

    /**
     * Disable SMS mode.
     *
     * @return string
     */
    public function disable()
    {
        $params = [
            'url' => '/users/sms_mode/delete',
            'method' => 'POST',
            'query' => [],
            'payload' => [],
        ];

        return $this->request($params);
    }
}
