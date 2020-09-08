<?php
namespace App;  

use Illuminate\Database\Eloquent\Model;

class Book extends Model { 
protected $fillable = [
    'id',
    'name',
    'price',
    'author',
    'publication',
    'rating',
    'created_at',
    'updated_at',
];

protected $hidden =[];

}
