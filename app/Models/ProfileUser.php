<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileUser extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'password', 'dob', 'consent_given'];

    protected $dates = ['dob'];

    protected $casts = [
        'dob' => 'date',
    ];

}
