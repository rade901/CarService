<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Route;
use Livewire\Component;
use App\Http\Resources\clientResource;
use App\Http\Resources\clientCarResource;
use App\Http\Resources\categoryResource;
use App\Http\Resources\carResource;
use App\Http\Resources\serviceResource;
use App\Models\client;
use App\Models\car;
use App\Models\category;
use App\Models\client_car;
use App\Models\client_service;
use App\Models\service;

class clientServiceAuth extends Component
{
    public function route()
    {
        return Route::get('/clients_service', static::class)
            ->name('clients_service')
            ->middleware('auth');
    }

    public function render()
    {
        $client_service = clientServiceResource::collection(client_service::all());
        $services = serviceResource::collection(service::all());
        $clients = clientResource::collection(client::all());
        $category = categoryResource::collection(category::all());
        $car = carResource::collection(car::all());
        return view('clients',compact('clients','category','car','services','client_service'));
    }
    
}
