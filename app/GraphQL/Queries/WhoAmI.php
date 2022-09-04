<?php

namespace App\GraphQL\Queries;

final class WhoAmI
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        return auth()->user();
    }
}
