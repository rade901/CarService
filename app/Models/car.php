<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class car extends Model
{
    use HasFactory;
    protected $fillable = ['mark', 'number_chassis','power_kw','in_trafic'];
    protected $hidden = ['created_at', 'updated_at','pivot','service_id','deleted_at','client_id'];
}
