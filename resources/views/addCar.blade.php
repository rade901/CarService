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
              <h3>Add car to client</h3>
              <form action="#" method="POST">
                @csrf
                @method('PUT')
                
                  <div class="form-group">
                    <label for="Input">Mark</label>
                    <input type="text" class="form-control" name="mark" value="{{old('mark') ?? $car->mark}}">
                  </div>
                      
                        <button type="submit" class="btn btn-primary">Submit</button>
                </form>
          </div>
        </div>
    </div>
    @endsection