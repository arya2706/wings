<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    protected $table='products';
    protected $fillable =[
        'produce_code',
        'produce_name',
        'price',
        'currancy',
        'discount',
        'dimension',
        'unit',
        'status',
    ];

    protected $hidden=[];
    protected $primaryKey='id';
}
