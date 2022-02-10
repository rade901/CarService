@section('title', __('search'))
@extends('layouts.app')
@section('content')
<div class="container pt-5">
  @if($clients->count() > 0)

<div class="container pt-5">
<h1>Searching Result for <?php echo ucfirst($search_text);?></h1>
<table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Lastname</th>
        <th scope="col">Car</th>
        <th scope="col">Services</th>
        <th scope="col">Category</th>
        <th scope="col">Created</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      
      @foreach ($clients as $c) 

      <tr>
        <th scope="row">{{$c->id}}</th>
        <td>{{Str::title($c->name)}}</td>  
         <td>{{Str::title($c->lastname)}}</td>
         <td>
         @foreach ($client_car as $cc) 
         @foreach ($car as $ca) 
         @if($cc->client_id == $c->id && $cc->car_id == $ca->id)
         {{$ca->mark}}
          @endif
         @endforeach
        
         @endforeach
        </td>
        <td>
          @foreach ($client_service as $cs) 
          @foreach ($services as $se) 
          @if($cs->client_id == $c->id && $cs->service_id == $se->id)
          {{$se->name}}
           @endif
          @endforeach
         
          @endforeach
         </td>
         <td>{{$c->category->name}}</td>
         <td>{{$c->created_at->diffForHumans()}}</td>
         <td>action</td>
        @endforeach
        </tr>
    </tbody>
    </table>
  </div>
  @endif
  <div class="container pt-5">
    @if($cars->count() > 0)
    <div class="container pt-5">
      <h1>Searching Result for <?php echo ucfirst($search_text);?></h1>
      <table class="table">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Mark</th>
              <th scope="col">Number of Chassis</th>
              <th scope="col">Power in KW</th>
              <th scope="col">In Trafic</th>
              <th scope="col">Created</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            
            @foreach ($cars as $car) 
          <tr>
            <th scope="row">{{$car->id}}</th>
            <td>{{Str::title($car->mark)}}</td>  
             <td>{{$car->number_chassis}}</td>
             <td>{{$car->power_kw}} KW</td>
             <td>{{$car->in_trafic}}</td>
             <td>{{$car->created_at->diffForHumans()}}</td>
             <td> <form action="cars/{{$car->id}}" method="POST">
              @csrf
  
              <button type="submit" class="btn btn-danger">Delete</button>
  
            </form></td>
            @endforeach
           
           
          </tr>
        </tbody>
      </table>
        </div>
        @endif
        @endsection