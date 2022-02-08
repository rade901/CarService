@section('title', __('Cars'))


<div>
    {{ __('You are in Cars !') }}
</div>
<div class="container pt-5">
    <div class="row">
      <div class="col">
        <div class="card">
            <div class="card-body">
                <h3>Add New Car</h3>
                <form form action="cars" method="POST">
                  @csrf
                    <div class="form-group">
                      <label for="Input">Mark</label>
                      <input type="text" class="form-control" name="mark"  placeholder="Enter Mark">
                    </div>
                    <div class="form-group">
                      <label for="input">Number of Chassis</label>
                      <input type="text" class="form-control" name="number_chassis" placeholder="Enter Number of Chassis">
                    </div>
                    <div class="form-group">
                        <label for="input">Power in kW</label>
                        <input type="number" class="form-control" name="power_kw" placeholder="Enter Power in KW">
                      </div>
                      <div class="form-group">
                        <label for="input">In Trafic</label>
                        <input type="date" class="form-control" name="in_trafic">
                      </div>
                      
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
            </div>
          </div>
      </div>
      <div class="col">
        
      </div>
      <div class="col">
      
      </div>
    </div>
  </div>
<div class="container pt-5">
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