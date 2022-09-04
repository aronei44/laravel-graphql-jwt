<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Room extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function userOne() : BelongsTo
    {
        return $this->belongsTo(User::class, 'user1id');
    }
    public function userTwo() : BelongsTo
    {
        return $this->belongsTo(User::class, 'user2id');
    }
}
