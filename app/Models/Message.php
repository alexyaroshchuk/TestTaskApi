<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'from_user_id', 'to_user_id', 'message',
    ];

    /**
     * @param int $fromUserId
     * @param int $toUserId
     * @param string $message
     * @return mixed
     */
    public function storeMessage(int $fromUserId, int $toUserId, string $message)
    {
        $message = $this->create([
            'from_user_id' => $fromUserId,
            'to_user_id' => $toUserId,
            'message' => $message,
        ]);
        return $message;
    }
}
