<?php

// namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Foundation\Auth\User as Authenticatable;
// use Illuminate\Notifications\Notifiable;
// use App\Notifications\CustomVerifyEmail;

// class User extends Authenticatable implements MustVerifyEmail
// {
//     /** @use HasFactory<\Database\Factories\UserFactory> */
//     use HasFactory, Notifiable;

//     /**
//      * The attributes that are mass assignable.
//      *
//      * @var list<string>
//      */
//     protected $fillable = [
//         'name',
//         'email',
//         'password',
//         'role',
//         'phone',
//         'is_applied',

//         'first_name',
//         'last_name',
//         'avatar',
//     ];

//     /**
//      * The attributes that should be hidden for serialization.
//      *
//      * @var list<string>
//      */
//     protected $hidden = [
//         'password',
//         'remember_token',
//     ];

//     /**
//      * Get the attributes that should be cast.
//      *
//      * @return array<string, string>
//      */
//     protected function casts(): array
//     {
//         return [
//             'email_verified_at' => 'datetime',
//             'password' => 'hashed',
//             'is_applied' => 'boolean',
//         ];
//     }

//     public function sendEmailVerificationNotification()
//     {
//         $this->notify(new CustomVerifyEmail);
//     }

//     protected $appends = ['avatar_url'];

//     public function getAvatarUrlAttribute()
//     {
//         if ($this->avatar) {
//             return asset('storage/' . $this->avatar);
//         }

//         return asset('assets/img/customer/default-avatar.png');
//     }

//     public function applications()
//     {
//         return $this->hasMany(\App\Models\TrademarkApplication::class, 'user_id');
//     }
// }


namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'phone',
        'dob',
        'is_applied',
        'first_name',
        'last_name',
        'avatar',
        'email_verification_code',
        'email_verification_expires_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'email_verification_code',
    ];

    // Correct way to define casts
    protected $casts = [
        'email_verified_at' => 'datetime',
        'email_verification_expires_at' => 'datetime',
        'is_applied' => 'boolean',
        'password' => 'hashed',
        'dob' => 'date',
    ];

    // protected $appends = ['avatar_url'];
    protected $appends = ['avatar_url', 'age'];

    public function getAvatarUrlAttribute()
    {
        return $this->avatar
            ? asset('storage/' . $this->avatar)
            : asset('assets/img/customer/default-avatar.png');
    }
    
    public function getAgeAttribute()
    {
        return $this->dob ? $this->dob->age : null;
    }

    public function applications()
    {
        return $this->hasMany(\App\Models\TrademarkApplication::class, 'user_id');
    }

    public function hasVerifiedEmail(): bool
    {
        return !is_null($this->email_verified_at);
    }

    public function sendEmailVerificationNotification()
    {
        // Optional: custom notification
    }
}
