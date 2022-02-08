<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class client extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'lastname','email','phone', 'category_id'];
    protected $hidden = ['created_at', 'updated_at','deleted_at'];

    public function category()
    {
        return $this->hasOne(category::class,  'id','category_id');
    }
    public function cars()
    {
        return $this->belongsToMany(car::class, 'client_cars', 'client_id','car_id');
    }
    public function services()
    {
        return $this->belongsToMany(service::class, 'client_services',  'client_id','service_id',);
    }
}

