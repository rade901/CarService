@section('title', __('Clients'))
@extends('layouts.app')
@section('content')

    <div>
        {{ __('You are in clients section!') }}

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">
                    {{ $error }}
                </div>
            @endforeach
        @endif
    </div>

    <div class="container">
        @yield('content')

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
                                    <input type="text" class="form-control" name="name" placeholder="Enter Name">
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


                                        @foreach ($category as $cat)
                                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                        @endforeach
                                    </select>

                                </div>

                                <div class="pt-3" >
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="card">
                        <div class="card-body">
                            <!-- Chart's container -->
                            <div id="chart" style="height: 300px;"></div>
                            <!-- Charting library -->
                            <script src="https://unpkg.com/chart.js@^2.9.3/dist/Chart.min.js"></script>
                            <!-- Chartisan -->
                            <script src="https://unpkg.com/@chartisan/chartjs@^2.1.0/dist/chartisan_chartjs.umd.js"></script>
                            <!-- Your application script -->
                            <script>
                                const chart = new Chartisan({
                                    el: '#chart',
                                    url: "@chart('service_chart')",
                                    hooks: new ChartisanHooks()
                                        .datasets('doughnut')
                                        .pieColors(),
                                })
                            </script>

                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="card">
                        <div class="card-body">
                            <h3>Add Service for Client</h3>
                            <form action="clients_service" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label class="form-label">Service</label>
                                    <select name="service_id" class="form-select" id="chosen">
                                        <option selected>Search service...</option>


                                        @foreach ($services as $se)
                                            <option value="{{ $se->id }}">{{ Str::title($se->name) }}</option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="form-group">
                                    <label class="form-label">Client</label>
                                    <select name="client_id" class="form-select" id="chosen2">
                                        <option selected>Search clients...</option>


                                        @foreach ($clients as $cl)
                                            <option value="{{ $cl->id }}">{{ Str::title($cl->name) }}
                                                {{ Str::title($cl->lastname) }}</option>
                                        @endforeach
                                    </select>

                                </div>

                                <div class="pt-3">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>

                            </form>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Saepe maxime nihil, autem
                                dignissimos sint possimus. Ullam, suscipit! Dolorum in at, accusantium qui voluptatibus
                                corrupti accusamus quam. Quia velit eaque perspiciatis?
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
                                                            <th scope="col">Name</th>
                                                            <th scope="col">Lastname</th>
                                                            <th scope="col">Email</th>
                                                            <th scope="col">Phone</th>
                                                            <th scope="col">Category</th>
                                                            <th scope="col">Created</th>
                                                            <th scope="col">Delete</th>
                                                            <th scope="col">Edit</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($clients as $c)
                                                            <tr>
                                                                <th scope="row">{{ $c->id }}</th>
                                                                <td>{{ Str::title($c->name) }}</td>
                                                                <td>{{ $c->lastname }}</td>
                                                                <td>{{ $c->email }}</td>
                                                                <td>{{ $c->phone }}</td>
                                                                @if ($c->category == null)
                                                                    <td>No category</td>
                                                                @else
                                                                    <td>{{ Str::title($c->category->name) }}</td>
                                                                @endif
                                                                <td>{{ $c->created_at->diffForHumans() }}</td>
                                                                <td>
                                                                    <form action="clients/{{ $c->id }}"
                                                                        method="POST">
                                                                        @csrf

                                                                        <button type="submit"
                                                                            class="btn btn-danger">Delete</button>

                                                                    </form>
                                                                </td>
                                                                <td>
                                                                    <a href="{{ url('/edit/' . $c->id) }}"
                                                                        class="btn btn-success">Edit</a>
                                                                </td>
                                                        @endforeach
                                                        </tr>
                                                    </tbody>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </table>
                    {{ $clients->links() }}
                </div>
            </div>
            <script type="text/javascript">
                $("#chosen").chosen({
                    no_results_text: "Oops, nothing found!",
                    width: "100%",
                    max_shown_results: 3,
                });
            </script>
            <script type="text/javascript">
                $("#chosen2").chosen({
                    no_results_text: "Oops, nothing found!",
                    width: "100%",
                    max_shown_results: 3,
                });
            </script>
        @endsection
