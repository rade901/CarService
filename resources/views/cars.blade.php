@section('title', __('Cars'))

@extends('layouts.app')
@section('content')
<div class="d-flex flex-column min-vh-100">
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
                            <form action="cars" method="POST">
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
                                    <input type="number" class="form-control" name="power_kw"
                                        placeholder="Enter Power in KW">
                                </div>
                                <div class="form-group">
                                    <label for="input">In Trafic</label>
                                    <input type="date" class="form-control" name="in_trafic">
                                </div>

                                <div class="pt-3">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
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
                                        <label class="form-label">Cars</label>
                                        <select name="car_id" class="form-select" id="car">
                                            <option>Search for cars...</option>


                                            @foreach ($car as $ca)
                                                <option value="{{ $ca->id }}">
                                                    {{ Str::title($ca->mark) }},{{ $ca->number_chassis }}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Clients</label>
                                        <select name="client_id" class="form-select" id="client">
                                            <option>Search for clients...</option>



                                            @foreach ($clientsfind as $c)
                                                <option value="{{ $c->id }}">{{ Str::title($c->name) }}
                                                    {{ Str::title($c->lastname) }}</option>
                                            @endforeach
                                        </select>

                                    </div>

                                    <div class="pt-3">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>

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

                                                                        <button type="submit"
                                                                            class="btn btn-danger">Delete</button>

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
        </div>
            <script type="text/javascript">
                $(document).ready(function() {
                    $('#car').select2({
                        minimumInputLength: 2,
                        query: function(query) {
                            var data = {
                                    results: []
                                },
                                i, j, s;
                            for (i = 1; i < 5; i++) {
                                s = "";
                                for (j = 0; j < i; j++) {
                                    s = s + query.term;
                                }
                                data.results.push({
                                    id: query.term + i,
                                    text: s
                                });
                            }
                            query.callback(data);
                        }
                    });

                });
            </script>
            <script type="text/javascript">
                $(document).ready(function() {
                    $('#client').select2({
                        minimumInputLength: 2,
                        query: function(query) {
                            var data = {
                                    results: []
                                },
                                i, j, s;
                            for (i = 1; i < 5; i++) {
                                s = "";
                                for (j = 0; j < i; j++) {
                                    s = s + query.term;
                                }
                                data.results.push({
                                    id: query.term + i,
                                    text: s
                                });
                            }
                            query.callback(data);
                        }
                    });

                });
            </script>
        @endsection
