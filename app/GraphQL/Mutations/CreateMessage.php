<?php

namespace App\GraphQL\Mutations;

use App\Models\Room;
use App\Models\Message;

final class CreateMessage
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $room = Room::find($args['room_id']);
        if($room->user1id != auth()->user()->id && $room->user2id != auth()->user()->id){
            return ['error'=>'not your room'];
        }
        $msg = null;
        if(isset($args['message_id'])){
            $msg=$args['message_id'];
        }
        $message = Message::create([
            'body'=>$args['body'],
            'user_id'=>auth()->user()->id,
            'room_id'=>$room->id,
            'message_id'=>$msg
        ]);
        return Message::with(['sender','room','parent','childs'])
                      ->find($message->id);
    }
}
