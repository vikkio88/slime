<?php


namespace App\Actions\Base;


use App\Lib\Helpers\Config;
use App\Lib\Helpers\JwtHelper;
use App\Lib\Slime\Exceptions\Http\UnAuthorizedException;
use App\Lib\Slime\RestAction\ApiAction;

abstract class AuthApiAction extends ApiAction
{
    protected $userId;

    protected function performChecks()
    {
        $token = $this->request->getHeader(
            Config::get('app.authHeader')
        );

        if (empty($token)) {
            throw new UnAuthorizedException('Missing Header');
        }

        $this->userId = $this->extractTokenInfo(current($token));

        if (empty($this->userId)) {
            throw new UnAuthorizedException('Unauthorized');
        }
    }

    protected function extractTokenInfo($token)
    {
        $tokenPayload = JwtHelper::decode($token);
        if (empty($tokenPayload)) {
            throw new UnAuthorizedException('Invalid Token');
        }

        if ($tokenPayload['validUntil'] <= time()) {
            throw new UnAuthorizedException('Expired token');
        }

        return $tokenPayload['userId'];

    }

}