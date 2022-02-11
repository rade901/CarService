@section('title', __('search'))
@extends('layouts.app')
@section('content')
@if($clients->count() > 0)
<div class="container pt-5">
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body" class="form-group">
          @foreach ($clients as $c) 
      <p>Name: <strong>{{Str::title($c->name)}}</strong></p>
      <p>Lastname: <strong>{{Str::title($c->lastname)}}</strong></p>
      <p>Email: <strong>{{$c->email}}</strong></p>
      <p>Phone: <strong>{{$c->phone}}</strong></p>
      <p>Category: <strong>{{$c->category->name}}</strong></p>
      <p>Created: <strong>{{$c->created_at->diffForHumans()}}</strong></p>
     
    </div>
  </div>
    </div>
    <div class="col">
      <div class="card">
        <div class="card-body">
        <h4>Category description</h4><br>  
      <p>{{$c->category->description}}</p>
      </div>
    </div>
    </div>
  </div>
  @endforeach

</div>

<div class="container pt-5">
  <div class="card">
    <div class="card-body">
<h2>Cars of <?php echo ucfirst($search_text);?></h2>
  <div class="container pt-2">
    <div class="row">
      <div class="col">
        <div class="table-wrapper-scroll-y my-custom-scrollbar">
        <table class="table"  class="table table-bordered table-striped mb-0">
          <thead>
            <tr>
              <th scope="col">Mark</th>
              <th scope="col">Number of Chassis</th>
              <th scope="col">Power in KW</th>
              <th scope="col">In Trafic</th>
              <th scope="col">Created</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="form-group">
              @foreach ($client_car as $cc) 
            @foreach ($car as $ca) 
            @if($cc->client_id == $c->id && $cc->car_id == $ca->id)
              <p>{{$ca->mark}}</p>
              @endif
              @endforeach
             @endforeach
            </td>
            <td class="form-group">
              @foreach ($client_car as $cc) 
            @foreach ($car as $ca) 
            @if($cc->client_id == $c->id && $cc->car_id == $ca->id)
              <p>{{$ca->number_chassis}}</p>
              @endif
              @endforeach
             @endforeach
            </td>
            <td class="form-group">
              @foreach ($client_car as $cc) 
            @foreach ($car as $ca) 
            @if($cc->client_id == $c->id && $cc->car_id == $ca->id)
              <p>{{$ca->power_kw}} KW</p>
              @endif
              @endforeach
             @endforeach
            </td>
            <td class="form-group">
              @foreach ($client_car as $cc) 
            @foreach ($car as $ca) 
            @if($cc->client_id == $c->id && $cc->car_id == $ca->id)
              <p>{{$ca->in_trafic}}</p>
              @endif
              @endforeach
             @endforeach
            </td>
            <td class="form-group">
              @foreach ($client_car as $cc) 
            @foreach ($car as $ca) 
            @if($cc->client_id == $c->id && $cc->car_id == $ca->id)
              <p>{{$ca->created_at->diffForHumans()}}</p>
              @endif
              @endforeach
             @endforeach
            </td>
            </tr>
          </tbody>
        </table>
        </div>
      </div>
    </div>
  </div>
<div class="container pt-5">
<h2>Services of <?php echo ucfirst($search_text);?></h2>
  <div class="container pt-2">
    <div class="row">
      <div class="col">
        <div class="table-wrapper-scroll-y my-custom-scrollbar">
        <table class="table"  class="table table-bordered table-striped mb-0">
          <thead>
            <tr>
              <th scope="col">service</th>
              <th scope="col">Number of Chassis</th>
              <th scope="col">Power in KW</th>
              <th scope="col">In Trafic</th>
              <th scope="col">Created</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="form-group">
                @foreach ($client_service as $cs) 
                @foreach ($services as $se) 
                @if($cs->client_id == $c->id && $cs->service_id == $se->id)
                <p>{{$se->name}}</p>
                 @endif
                @endforeach
               
                @endforeach
            </td>
            <td class="form-group">
              @foreach ($client_service as $cs) 
          @foreach ($services as $se) 
          @if($cs->client_id == $c->id && $cs->service_id == $se->id)
          <p>{{$se->name}}</p>
           @endif
          @endforeach
         
          @endforeach
            </td>
            <td class="form-group">
              @foreach ($client_service as $cs) 
          @foreach ($services as $se) 
          @if($cs->client_id == $c->id && $cs->service_id == $se->id)
          <p>{{$se->name}}</p>
           @endif
          @endforeach
         
          @endforeach
            </td>
            <td class="form-group">
              @foreach ($client_service as $cs) 
          @foreach ($services as $se) 
          @if($cs->client_id == $c->id && $cs->service_id == $se->id)
          <p>{{$se->name}}</p>
           @endif
          @endforeach
         
          @endforeach
            </td>
            <td class="form-group">
              @foreach ($client_service as $cs) 
          @foreach ($services as $se) 
          @if($cs->client_id == $c->id && $cs->service_id == $se->id)
          <p>{{$se->name}}</p>
           @endif
          @endforeach
         
          @endforeach
            </td>
            </tr>
          </tbody>
        </table>
    </div>
  </div>
  @endif
  @if($clients->count() > 0)
  
  @else
  <div class="container">
    <div class="row">
      <div class="col align-self-start">
        
      </div>
      <div class="col align-self-center">
        <div class="alert alert-danger" role="alert">
          <h4 class="alert-heading"></h4>
          <p>"No result found for <?php echo ucfirst($search_text);?>"</p>
          <p class="mb-0"></p>
        </div>
      </div>
      <div class="col align-self-end">
       
      </div>
    </div>
  </div>
    
 
  
  @endif
@endsection