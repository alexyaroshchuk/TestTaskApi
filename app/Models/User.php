<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get users excluding himself
     *
     * @param int $userId
     * @return mixed
     */
    public function getUsersList(int $userId)
    {
        return $this->where('id', '!=', $userId)->get();
    }

    /**
     * Get user by email
     *
     * @param string $email
     * @return mixed
     */
    public static function getUserByEmail(string $email)
    {
        return self::where('email', $email)->firstOrFail();
    }

    /**
     * get inbox message
     * @return HasMany
     */
    public function getInbox()
    {
        return $this->hasMany(Message::class, 'to_user_id');
    }


}
