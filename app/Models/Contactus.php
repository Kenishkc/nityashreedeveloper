<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contactus extends Model
{
    use HasFactory;

    protected $fillable=[
        'banner_image',
        'address',
        'phone_no',
        'mobile',
        'email_1',
        'email_2',

    ];
}
