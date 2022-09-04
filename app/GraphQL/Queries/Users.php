<?php

namespace App\GraphQL\Queries;

use App\Models\User;

final class Users
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        if(!isset($args['id']) && !isset($args['name']) && !isset($args['email'])){
            return User::all();
        } else {
            if(isset($args['id'])){
                return User::where('id',$args['id'])->get();
            } else if (isset($args['name'])){
                return User::where('name','LIKE',"%".$args['name']."%" )->get();
            } else if (isset($args['email'])){
                return User::where('email','LIKE',"%".$args['email']."%")->get();
            }
        }
    }
}
