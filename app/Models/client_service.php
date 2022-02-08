<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class client_service extends Model
{
    use HasFactory;
    protected $table = 'client_services';
    protected $fillable = ['service_id', 'client_id'];
}
