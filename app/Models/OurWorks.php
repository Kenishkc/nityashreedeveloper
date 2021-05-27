<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurWorks extends Model
{
    use HasFactory;
    protected $fillable = [
        'description',
        'title',
        'short_description',
        'image',
        'link',
        

    ];

}
