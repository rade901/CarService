<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Route;
use Livewire\Component;
use App\Http\Resources\clientResource;
use App\Http\Resources\clientCarResource;
use App\Http\Resources\categoryResource;
use App\Http\Resources\carResource;
use App\Models\client;
use App\Models\car;
use App\Models\category;
use App\Models\client_car;

class clientCarAuth extends Component
{
    public function route()
    {
        return Route::get('/client_car', static::class)
            ->name('client_car')
            ->middleware('auth');
    }

    public function render()
    {
        $client_car = clientCarResource::collection(client_car::all());
        $clients = clientResource::collection(client::all());
        $category = categoryResource::collection(category::all());
        $car = carResource::collection(car::all());
        return view('clients',compact('clients','category','car','client_car'));
    }
    
}
