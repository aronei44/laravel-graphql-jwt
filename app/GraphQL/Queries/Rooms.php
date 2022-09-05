<?php

namespace App\GraphQL\Queries;

use App\Models\Room;

final class Rooms
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $rooms = Room::with(['self','opponent'])
                    ->where('user1id',auth()->user()->id)
                    ->orWhere('user2id',auth()->user()->id)
                    ->get();
        foreach($rooms as $room){
            $self = $room->self->id == auth()->user()->id ? $room->self : $room->opponent;
            $opponent = $room->self->id == auth()->user()->id ? $room->opponent : $room->self;
            $room->self = $self;
            $room->opponent = $opponent;
        }
        return $rooms;
    }
}