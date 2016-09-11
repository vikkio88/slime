<?php

namespace App\Lib\Helpers;


/**
 * Class Responder
 * @package App\Lib\Helpers
 */
class Responder
{
    /**
     * @param $content
     * @param $response
     * @param array $headers
     * @return mixed
     */
    public static function getJsonResponse($content, $response, $headers = [])
    {
        $headers['Content-Type'] = 'application/json';
        return self::getResponse(
            $headers,
            $content,
            $response
        );
    }

    /**
     * @param array $headers
     * @param $content
     * @param $response
     * @return mixed
     */
    public static function getResponse($headers = [], $content, $response)
    {
        $body = $response->getBody();
        $body->write($content);
        $i = 0;
        foreach ($headers as $header => $value) {
            if ($i === 0) {
                $response = $response->withHeader(
                    $header,
                    $value
                );
            } else {
                $response = $response->withAddedHeader(
                    $header,
                    $value
                );
            }
            $i++;
        }
        return $response->withBody($body);
    }

}