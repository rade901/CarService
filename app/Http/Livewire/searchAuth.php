<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Route;
use Livewire\Component;
use App\Models\client;
use App\Models\category;
use App\Models\client_car;
use App\Models\client_service;
use App\Models\car;
use App\Models\service;
use App\Http\Resources\clientCarResource;
use App\Http\Resources\clientServiceResource;
use App\Http\Resources\serviceResource;
use App\Http\Resources\carResource;
class searchAuth extends Component
{
    public function route()
    {
        return Route::get('search', static::class)
            ->name('search')
            ->middleware('auth');
    }
    public function render()
    {
        $search_text = $_GET['query'];
        $clients = client::where('name', 'LIKE', '%'.$search_text.'%')->get();
        $client_car = clientCarResource::collection(client_car::all());
        $client_service = clientServiceResource::collection(client_service::all());
        $car = carResource::collection(car::all());
        $services = serviceResource::collection(service::all());
        if ($search_text == '') {
            return '<h2>No Results</h2>';
        }
        
        return view ('search',compact('clients','client_car','car','search_text','client_service','services')); 
        
       
    }
    
}
