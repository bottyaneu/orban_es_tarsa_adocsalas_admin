<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spending extends Model
{
    use HasFactory;

    protected $table = 'spending';
    protected $fillable = ['user_id', 'description', 'price', 'tax_percentage'];
}
