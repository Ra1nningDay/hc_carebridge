<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar', // เพิ่ม avatar ใน fillable
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Accessor สำหรับ avatar_url
    public function getAvatarUrlAttribute()
    {
        // ตรวจสอบว่ามี avatar หรือไม่
        if ($this->avatar) {
            return asset('uploads/avatars/' . $this->avatar);
        }

        // หากไม่มี avatar ให้แสดงภาพ default
        return asset('images/avatars/default-avatar.png');
    }

    // ความสัมพันธ์กับ PersonalInfo
    public function personalInfo()
    {
        return $this->hasOne(UserPersonalInfo::class, 'user_id', 'id');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user', 'user_id', 'role_id');
    }

    public function posts()
    {
        return $this->hasMany(Post::class, 'author_id');
    }
}
