<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    use Notifiable;
        protected $table = "users";
        protected $guard = 'customer';

        protected $fillable = [
            'name', 'email', 'phone', 'password',
        ];

        protected $hidden = [
            'password', 'remember_token',
        ];
}
