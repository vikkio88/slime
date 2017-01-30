<?php


namespace App\Actions\User\Login;


use App\Lib\Helpers\JwtHelper;
use App\Lib\Helpers\TokenHelper;
use App\Lib\Slime\Exceptions\Http\UnAuthorizedException;
use App\Lib\Slime\RestAction\ApiAction;
use App\Models\Users\UserToken;

class TokenLogin extends ApiAction
{

    protected function performAction()
    {
        $userToken = UserToken::getByLoginToken(
            $this->args['token'],
            $this->request->getAttribute('ip_address')
        );

        if (empty($userToken)) {
            throw new UnAuthorizedException('Expired link');
        }

        $this->payload = [
            'token' => JwtHelper::encode(
                TokenHelper::getTokenPayload($userToken->user_id)
            )
        ];
    }
}