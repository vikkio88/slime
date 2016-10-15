<?php

namespace App\Lib\Helpers;
use Psr\Http\Message\ResponseInterface;


/**
 * Class Responder
 * @package App\Lib\Helpers
 */
class Responder
{
    /**
     * @param $bodyContent
     * @param ResponseInterface $response
     * @param array $headers
     * @return mixed
     */
    public static function getJsonResponse($bodyContent, ResponseInterface $response, $headers = [])
    {
        $headers['Content-Type'] = 'application/json';
        return self::getResponse(
            $bodyContent,
            $response,
            $headers
        );
    }

    /**
     * @param $bodyContent
     * @param ResponseInterface $response
     * @param array $headers
     * @return ResponseInterface
     */
    public static function getResponse($bodyContent, ResponseInterface $response, $headers = [])
    {
        $body = $response->getBody();
        $body->write($bodyContent);
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