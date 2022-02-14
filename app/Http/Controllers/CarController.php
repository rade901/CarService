<?php

namespace App\Http\Controllers;

use App\Models\car;
use App\Http\Requests\StorecarRequest;
use App\Http\Requests\UpdatecarRequest;
use App\Http\Resources\carResource;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorecarRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorecarRequest $request)
    {
        $validate = $request->validate([
            'mark'=>'required|regex:/^[a-zA-Z]+$/u|max:255',
            'number_chassis'=>'required',
            'power_kw'=>'required',
            'in_trafic'=>'required',
        ]);
        

        car::create([
            'mark'=>$request->mark,
            'number_chassis'=>$request->number_chassis,
            'power_kw'=>$request->power_kw,
            'in_trafic'=>$request->in_trafic,
            'created'=>$request->created,
            
        ]);

        return redirect('/cars');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(car $car)
    {
        return new carResource($car); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(car $car)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatecarRequest  $request
     * @param  \App\Models\car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatecarRequest $request, car $car)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(car $car,$id)
    {
        $car = car::find($id);
        $car->delete();
            return redirect('cars');
        
    }
}
