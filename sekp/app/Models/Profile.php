<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
    'name',
    'username',
    'email',
    'phone',
    'gender',
    'birth_date',
    'address',
    'city',
    'province',
    'postal_code',
    'avatar',
];

}
