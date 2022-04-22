<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Route;
use Livewire\Component;
use App\Http\Controllers\AddCarController;
use App\Http\Resources\carResource;
use App\Models\car;

class addCarAuth extends Component
{
    public function route()
    {
        return Route::get('/addCar', [AddCarController::class, 'edit'])
            ->name('addCar')
            ->middleware('auth');
    }

    public function render()
    {
       return view('addCar');
    }
    
}
