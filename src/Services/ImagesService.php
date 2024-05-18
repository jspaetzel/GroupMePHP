<?php

namespace GroupMePHP\Services;

class ImagesService extends Service
{
    /**
     * Uploads a picture to the GroupMe Image servvice and returns the URL.
     *
     * @param string $url to image
     */
    public function pictures($url)
    {
        $file = $url;
        $path = parse_url($url);
        if ('http' == $path['scheme'] || 'https' == $path['scheme']) {
            $file = tempnam(sys_get_temp_dir(), 'gm_');
            file_put_contents($file, file_get_contents($url));
        }

        $file = '@' . $file;

        $params = [
            'url' => '/pictures',
            'method' => 'POST',
            'payload' => ['file' => $file],
            'query' => [],
        ];

        $response = $this->request($params);

        if ($file != $url) {
            unlink(substr($file, 1));
        }

        return $response;
    }
}
