<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Route;
use Livewire\Component;
use App\Http\Resources\clientResource;
use App\Http\Resources\clientCarResource;
use App\Http\Resources\clientServiceResource;
use App\Http\Resources\serviceResource;
use App\Http\Resources\categoryResource;
use App\Http\Resources\carResource;
use App\Models\client;
use App\Models\car;
use App\Models\category;
use App\Models\client_car;
use App\Models\client_service;
use App\Models\service;
class carAuth extends Component
{
    public function route()
    {
        return Route::get('/cars', static::class)
            ->name('cars')
            ->middleware('auth');
    }

    public function render()
    {
        $cars = carResource::collection(car::paginate(5));
        $services = serviceResource::collection(service::all());
        $client_car = clientCarResource::collection(client_car::all());
        $client_service = clientServiceResource::collection(client_service::all());
        $clients = clientResource::collection(client::paginate(5));
        $clientsfind = clientResource::collection(client::all());
        $category = categoryResource::collection(category::all());
        $car = carResource::collection(car::all());
        return view('cars',compact('cars','category','car','client_car','services','client_service','clientsfind'));
    }
    
}
