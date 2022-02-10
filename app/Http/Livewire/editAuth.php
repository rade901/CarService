<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Route;
use Livewire\Component;
use App\Http\Resources\clientResource;
use App\Http\Resources\categoryResource;
use App\Models\client;
use App\Models\category;
use App\Http\Controllers\ClientController;
class editAuth extends Component
{
    public function route()
    {
        return Route::get('/edit/{client}', [ClientController::class, 'edit'])
            ->name('edit')
            ->middleware('auth');
    }


    public function render()
    {
        
        $client = clientResource::collection(client::all());
        $category = category::all();
        
        return view('edit' , compact('client','category'));
        
    
       
    }
    
}
