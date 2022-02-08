<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class client_car extends Model
{
    use HasFactory;
    protected $table = 'client_cars';
    protected $fillable = ['car_id', 'client_id'];
}
