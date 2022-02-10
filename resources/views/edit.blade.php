@section('title', __('Edit'))
@extends('layouts.app')
@section('content')
<div>
    {{ __('You are in clients edit!') }}
    
    @if ($errors->any())
    @foreach ($errors->all() as $error)
      <div class="alert alert-danger">
        {{ $error }}
      </div> 
      
    @endforeach
    @endif
</div>

<div class="container pt-5">
  <div class="row">
    <div class="col">
      <div class="card">
          <div class="card-body">
              <h3>You can Edit Client here</h3>
              <form action="{{url('/edit/'.$client->id)}}" method="POST">
                @csrf
                @method('PUT')
                
                  <div class="form-group">
                    <label for="Input">Name</label>
                    <input type="text" class="form-control" name="name" value="{{old('name') ?? $client->name}}">
                  </div>
                  <div class="form-group">
                    <label for="Input">Lastname</label>
                    <input type="text" class="form-control" name="lastname" value="{{old('lastname') ?? $client->lastname}}">
                  </div>
                  <div class="form-group">
                    <label for="Input">Email</label>
                    <input type="email" class="form-control" name="email" value="{{old('email') ?? $client->email}}">
                  </div>
                  <div class="form-group">
                    <label for="Input">Phone</label>
                    <input type="number" class="form-control" name="phone" value="{{old('phone') ?? $client->phone}}">
                  </div>
                  <div class="form-group">
                    <label class="form-label">Category</label>
                    <select name="category_id" class="form-select" aria-label="Default select example" value="{{old('category') ?? $client->category}}">
    
    
                      @foreach($category as $c)
                      <option value="{{$c->id}}">{{$c->name}}</option>
                      @endforeach
                    </select>
    
                  </div>
                  

                

                  
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
          </div>
        </div>
    </div>
    @endsection