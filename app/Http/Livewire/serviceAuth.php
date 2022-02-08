<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Route;
use Livewire\Component;
use App\Http\Resources\serviceResource;
use App\Models\service;

class serviceAuth extends Component
{
    public function route()
    {
        return Route::get('/services', static::class)
            ->name('services')
            ->middleware('auth');
    }

    public function render()
    {
        $services = serviceResource::collection(service::all());
        return view('services',compact('services'));
    }
    
}
