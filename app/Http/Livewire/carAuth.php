<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Route;
use Livewire\Component;
use App\Http\Resources\carResource;
use App\Models\car;

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
        return view('cars',compact('cars'));
    }
    
}
