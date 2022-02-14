<?php

namespace App\Http\Controllers;

use App\Models\client_car;
use App\Http\Requests\Storeclient_carRequest;
use App\Http\Requests\Updateclient_carRequest;

class ClientCarController extends Controller
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
     * @param  \App\Http\Requests\Storeclient_carRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storeclient_carRequest $request)
    {
        $validate = $request->validate([
            'client_id' => 'required|integer',
            'car_id' => 'required|integer',
        ]);
        client_car::create([
            'client_id'=> $request->client_id,
            'car_id'=> $request->car_id,
        ]);
        return redirect('/cars');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\client_car  $client_car
     * @return \Illuminate\Http\Response
     */
    public function show(client_car $client_car)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\client_car  $client_car
     * @return \Illuminate\Http\Response
     */
    public function edit(client_car $client_car)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updateclient_carRequest  $request
     * @param  \App\Models\client_car  $client_car
     * @return \Illuminate\Http\Response
     */
    public function update(Updateclient_carRequest $request, client_car $client_car)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\client_car  $client_car
     * @return \Illuminate\Http\Response
     */
    public function destroy(client_car $client_car)
    {
        //
    }
}
