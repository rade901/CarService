@section('title', __('Dish'))

<div>
    {{ __('You are in clients section!') }}
</div>

<div class="container pt-5">
  <div class="row">
    <div class="col">
      <div class="card">
          <div class="card-body">
              <h3>Add New Client</h3>
              <form action="clients" method="POST">
                @csrf
                  <div class="form-group">
                    <label for="Input">Name</label>
                    <input type="text" class="form-control" name="name"  placeholder="Enter Name">
                  </div>
                  <div class="form-group">
                    <label for="input">Lastname</label>
                    <input type="text" class="form-control" name="lastname" placeholder="Lastname">
                  </div>
                  <div class="form-group">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Email">
    
                  </div>
                  <div class="form-group">
                    <label class="form-label">Phone</label>
                    <input type="number" class="form-control" name="phone" placeholder="phone">
    
                  </div>
                  <div class="form-group">
                    <label class="form-label">Category</label>
                    <select name="category_id" class="form-select" aria-label="Default select example">
                      <option selected>Open this select menu</option>
    
    
                      @foreach($category as $cat)
                      <option value="{{$cat->id}}">{{$cat->name}}</option>
                      @endforeach
                    </select>
    
                  </div>

                  
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
          </div>
        </div>
    </div>
    <div class="col-sm">
      <div class="card">
        <div class="card-body">
            <h3>Add Car for Client</h3>
            <form action="clients_car" method="POST">
              @csrf
                <div class="form-group">
                  <label class="form-label">Car</label>
                  <select name="car_id" class="form-select" aria-label="Default select example">
                    <option selected>Open this select menu</option>
  
  
                    @foreach($car as $c)
                    <option value="{{$c->id}}">{{Str::title($c->mark)}}  No.Chassis {{$c->number_chassis}}</option>
                    @endforeach
                  </select>
  
                </div>
                <div class="form-group">
                  <label class="form-label">Client</label>
                  <select name="client_id" class="form-select" aria-label="Default select example">
                    <option selected>Open this select menu</option>
  
  
                    @foreach($clients as $cl)
                    <option value="{{$cl->id}}">{{Str::title($cl->name)}}</option>
                    @endforeach
                  </select>
  
                </div>

                
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
      </div>
  </div>
    <div class="col-sm">
      <div class="col-sm">
        <div class="card">
          <div class="card-body">
              <h3>Add Service for Client</h3>
              <form action="clients_service" method="POST">
                @csrf
                  <div class="form-group">
                    <label class="form-label">Service</label>
                    <select name="service_id" class="form-select" aria-label="Default select example">
                      <option selected>Open this select menu</option>
    
    
                      @foreach($services as $se)
                      <option value="{{$se->id}}">{{Str::title($se->name)}}</option>
                      @endforeach
                    </select>
    
                  </div>
                  <div class="form-group">
                    <label class="form-label">Client</label>
                    <select name="client_id" class="form-select" aria-label="Default select example">
                      <option selected>Open this select menu</option>
    
    
                      @foreach($clients as $cl)
                      <option value="{{$cl->id}}">{{Str::title($cl->name)}}</option>
                      @endforeach
                    </select>
    
                  </div>
  
                  
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
          </div>
        </div>
    </div>
    </div>
<div class="container pt-5">
<table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Lastname</th>
        <th scope="col">Email</th>
        <th scope="col">Phone</th>
        <th scope="col">Category</th>
        <th scope="col">Created</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($clients as $c )
      <tr>
        <th scope="row">{{$c->id}}</th>
          <td>{{Str::title($c->name)}}</td>  
           <td>{{$c->lastname}}</td>
           <td>{{$c->email}}</td>
           <td>{{$c->phone}}</td>
           @if ($c->category == null)
           <td>No category</td>
           @else
           <td>{{Str::title($c->category->name)}}</td>
           @endif
           <td>{{$c->created_at->diffForHumans()}}</td>
           <td> <form action="clients/{{$c->id}}" method="POST">
            @csrf

            <button type="submit" class="btn btn-danger">Delete</button>

          </form></td>
        @endforeach
      </tr>
    </tbody>
  </table>
  
</div>
