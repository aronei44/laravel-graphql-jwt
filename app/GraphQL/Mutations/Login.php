<?php

namespace App\GraphQL\Mutations;

final class Login
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        // TODO implement the resolver

        if (! $token = auth()->attempt(['email'=>$args['email'],'password'=>$args['password']])) {
            return ['error'=>'unauthorized'];
        }

        return $this->respondWithToken($token);
    }
    protected function respondWithToken($token)
    {
        return [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ];
    }
}
