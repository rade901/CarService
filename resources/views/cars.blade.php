@section('title', __('Cars'))

@extends('layouts.app')
@section('content')
    <div>
        {{ __('You are in Cars !') }}
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">
                    {{ $error }}
                </div>
            @endforeach
        @endif
    </div>

    <div class="container pt-5">
        <div class="container">
            <div class="row">
              <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h3>Add New Car</h3>
                        <form  action="cars" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="Input">Mark</label>
                                <input type="text" class="form-control" name="mark" placeholder="Enter Mark">
                            </div>
                            <div class="form-group">
                                <label for="input">Number of Chassis</label>
                                <input type="text" class="form-control" name="number_chassis"
                                    placeholder="Enter Number of Chassis">
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
                <div class="col-sm">
                    <div class="card">
                        <div class="card-body">
                            <h3>Add Car for Client</h3>
                            <form action="client_car" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label class="form-label">Car</label>
                                    <select name="car_id" class="form-select"  id="chosen" >
                                        <option selected>Open this select menu</option>


                                        @foreach ($car as $ca)
                                            <option value="{{ $ca->id }}">{{ Str::title($ca->mark) }}</option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="form-group">
                                    <label class="form-label">Car</label>
                                    <select name="client_id" class="form-select"  id="chosen2" >
                                        <option selected>Open this select menu</option>


                                        @foreach ($clientsfind as $c)
                                            <option value="{{ $c->id }}">{{ Str::title($c->name) }}</option>
                                        @endforeach
                                    </select>

                                </div>


                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
              </div>
            </div>
          </div>
           
    <div class="container pt-5">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive fixed-table-body pt-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel-body">
                                    <table class="table table-hover table-striped table-bordered">
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
                                                        <th scope="row">{{ $car->id }}</th>
                                                        <td>{{ Str::title($car->mark) }}</td>
                                                        <td>{{ $car->number_chassis }}</td>
                                                        <td>{{ $car->power_kw }} KW</td>
                                                        <td>{{ $car->in_trafic }}</td>
                                                        <td>{{ $car->created_at->diffForHumans() }}</td>
                                                        <td>
                                                            <form action="cars/{{ $car->id }}" method="POST">
                                                                @csrf

                                                                <button type="submit" class="btn btn-danger">Delete</button>

                                                            </form>
                                                        </td>
                                                       
                                                @endforeach


                                                </tr>
                                            </tbody>
                                        </table>
                                        {{ $cars->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $("#chosen").chosen({
         no_results_text: "Oops, nothing found!",
         width: "100%",
       });
     </script>
     <script type="text/javascript">
         $("#chosen2").chosen();
      </script>
@endsection
