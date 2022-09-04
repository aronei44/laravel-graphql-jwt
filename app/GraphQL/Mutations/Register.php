<?php

namespace App\GraphQL\Mutations;

use App\Models\User;

final class Register
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        // TODO implement the resolver
        $user = User::create([
            'name' => $args['name'],
            'email' => $args['email'],
            'password' => \Hash::make($args['password'])
        ]);
        return $user;
    }
}
