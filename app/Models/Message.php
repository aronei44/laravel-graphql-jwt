<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Message extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function sender(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class, 'room_id');
    }
    public function parent(): BelongsTo
    {
        return $this->belongsTo(Message::class, 'message_id');
    }
    public function childs(): HasMany
    {
        return $this->hasMany(Message::class);
    }
}
