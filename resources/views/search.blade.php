@section('title', __('search'))
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