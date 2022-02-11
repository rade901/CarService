<?php

namespace App\Http\Controllers;

use App\Models\client_service;
use App\Http\Requests\Storeclient_serviceRequest;
use App\Http\Requests\Updateclient_serviceRequest;

class ClientServiceController extends Controller
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
     * @param  \App\Http\Requests\Storeclient_serviceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storeclient_serviceRequest $request)
    {
        $validate = $request->validate([
            'client_id' => 'required|integer',
            'service_id' => 'required|integer',
        ]);
        client_service::create([
            'client_id'=> $request->client_id,
            'service_id'=> $request->service_id,
        ]);
        return redirect('/clients');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\client_service  $client_service
     * @return \Illuminate\Http\Response
     */
    public function show(client_service $client_service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\client_service  $client_service
     * @return \Illuminate\Http\Response
     */
    public function edit(client_service $client_service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updateclient_serviceRequest  $request
     * @param  \App\Models\client_service  $client_service
     * @return \Illuminate\Http\Response
     */
    public function update(Updateclient_serviceRequest $request, client_service $client_service)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\client_service  $client_service
     * @return \Illuminate\Http\Response
     */
    public function destroy(client_service $client_service)
    {
        //
    }
}
