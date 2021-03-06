<?php

namespace App\Http\Controllers;

use App\Models\client;
use App\Models\category;
use App\Http\Requests\StoreclientRequest;
use App\Http\Requests\UpdateclientRequest;
use App\Http\Resources\clientResource;
use App\Http\Resources\categoryResource;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
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
     * @param  \App\Http\Requests\StoreclientRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreclientRequest $request)
    {
        $validate = $request->validate([
            'name' => 'required|regex:/^[a-zA-Z]+$/u||string|max:255',
            'lastname' => 'required|regex:/^[a-zA-Z]+$/u||string|max:255',
            'email' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'category_id' => 'required|integer',
        ]);
        $input = $request->all();
        client::create([
            'name'=>$request->name,
            'lastname'=>$request->lastname,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'category_id'=>$request->category_id,
            'car_id'=>$request->car_id,
        ]);

        return redirect('/clients');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(client $client)
    {
        return new clientResource($client);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(client $client)
    {
      $client = client::find($client->id);
        $category =category::all();
        return view('/edit', compact('client','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateclientRequest  $request
     * @param  \App\Models\client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateclientRequest $request, client $client,category $category)
    {
        $client = client::find($client->id);
        $client->name = $request->input('name');
        $client->lastname = $request->input('lastname');
        $client->email = $request->input('email');
        $client->phone = $request->input('phone');
        $client->category_id = $request->input('category_id');
        $client->update();
        return redirect('/clients');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\client  $client
     * @return \Illuminate\Http\Response
     */
        public function destroy(client $client,$id)
        {
           $client = client::find($id);
             $client->delete();
                return redirect('clients');
            
            
        }
    
}
