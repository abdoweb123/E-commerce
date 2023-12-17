<?php

namespace FleetCart;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
     protected $fillable = [
       'name_ar',
       'name_en',
       'body_ar',
       'body_en',
       'image'
       
    ];
}
