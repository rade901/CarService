<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class service extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'price','description'];
    protected $hidden = ['created_at', 'updated_at','pivot','service_id','deleted_at','client_id'];
}
