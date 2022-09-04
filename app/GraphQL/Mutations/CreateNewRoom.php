<?php

namespace App\GraphQL\Mutations;

// use App\Models\Room;
use App\Models\Room;
use App\Models\User;

final class CreateNewRoom
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $user = User::find($args['opponent']);
        if(!$user){
            return ['error'=>"there isn't any user with id = ".$args['opponent']];
        }
        $room = Room::where('user1id', auth()->user()->id)
                    ->where('user2id', $args['opponent'])
                    ->first();
        if($room){
            $room = Room::with(['self','opponent'])->find($room->id);
            $self = $room->self->id == auth()->user()->id ? $room->self : $room->opponent;
            $opponent = $room->self->id == auth()->user()->id ? $room->opponent : $room->self;
            $room->self = $self;
            $room->opponent = $opponent;
            return $room;
        }
        $room = Room::where('user2id', auth()->user()->id)
                    ->where('user1id', $args['opponent'])
                    ->first();
        if($room){
            $room = Room::with(['self','opponent'])->find($room->id);
            $self = $room->self->id == auth()->user()->id ? $room->self : $room->opponent;
            $opponent = $room->self->id == auth()->user()->id ? $room->opponent : $room->self;
            $room->self = $self;
            $room->opponent = $opponent;
            return $room;
        }
        $room = Room::create([
            'user1id'=>auth()->user()->id,
            'user2id'=>$args['opponent']
        ]);
        $room = Room::with(['self','opponent'])->find($room->id);
        $self = $room->self->id == auth()->user()->id ? $room->self : $room->opponent;
        $opponent = $room->self->id == auth()->user()->id ? $room->opponent : $room->self;
        $room->self = $self;
        $room->opponent = $opponent;
        return $room;
    }
}
