<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Route;
use Livewire\Component;
use App\Http\Resources\categoryResource;
use App\Models\category;

class categoryAuth extends Component
{
    public function route()
    {
        return Route::get('/category', static::class)
            ->name('category')
            ->middleware('auth');
    }

    public function render()
    {
        $category = categoryResource::collection(category::paginate(5));
        $last_category = category::latest()->first();
<<<<<<< HEAD
        return view('category',compact('category','last_category'));
=======
        return view('category',compact('category'));
>>>>>>> 963c233800130b2a59ef63e93c9fb36e51151333
    }
    
}
