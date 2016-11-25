<?php


namespace App\Actions\Base;


use App\Lib\Helpers\Config;
use App\Lib\Slime\Exceptions\Http\UnAuthorizedException;
use App\Lib\Slime\RestAction\ApiAction;
use App\Models\Users\UserToken;

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

        $this->userId = UserToken::getValidUserId(
            $token,
            $this->request->getAttribute('ip_address')
        );
        if (empty($this->userId)) {
            // Log attempt then remove token?
            throw new UnAuthorizedException('Unauthorized');
        }
    }

}