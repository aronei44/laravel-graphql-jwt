<?php

namespace App\GraphQL\Queries;

final class Room
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $room = \App\Models\Room::with(['self','opponent'])->findOrFail($args['id']);
        $self = $room->self->id == auth()->user()->id ? $room->self : $room->opponent;
        $opponent = $room->self->id == auth()->user()->id ? $room->opponent : $room->self;
        $room->self = $self;
        $room->opponent = $opponent;
        if($room->self->id != auth()->user()->id){
            return ['error'=>'not your room'];
        }
        return $room;
    }
}
