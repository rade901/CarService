@section('title', __('Category'))
@extends('layouts.app')
@section('content')
    <div class="d-flex flex-column min-vh-100">
        @if ($last_category == null)
        {{'Add new category'}}  
        @else
        {{'Your last added category'}} {{Str::title($last_category->name)}}
        @endif
         @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">
                        {{ $error }}
                    </div>
                @endforeach
            @endif
       

        <div class="container pt-5">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h3>Add New Category</h3>
                            <form form action="category" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="Input">Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter Name">
                                </div>
                                <div class="form-group">
                                    <label for="input">Description</label>
                                    <input type="text" class="form-control" name="description" placeholder="Description">
                                </div>
                                <div class="pt-3">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                                
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col">
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
                                    url: "@chart('category_chart')",
                                    hooks: new ChartisanHooks()
                                        .beginAtZero()
                                        .colors()
                                        .borderColors()
                                        .datasets([{
                                            type: 'line',
                                            fill: false
                                        }, 'bar']),
                                })
                            </script>
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
                                                        <th scope="col">Description</th>
                                                        <th scope="col">Created</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($category as $cat)
                                                        <tr>
                                                            <th scope="row">{{ $cat->id }}</th>
                                                            <td>{{ Str::title($cat->name) }}</td>
                                                            <td>{{ Str::title($cat->description) }}</td>
                                                            <td>{{ $cat->created_at->diffForHumans() }}</td>
                                                            @if ($cat->name == 'private' || $cat->name == 'business')
                                                                <td></td>
                                                            @else
                                                                <td>
                                                                    <form action="category/{{ $cat->id }}"
                                                                        method="POST">
                                                                        @csrf

                                                                        <button type="submit"
                                                                            class="btn btn-danger">Delete</button>
                                                            @endif

                                                    @endforeach
                                                    </tr>
                                                </tbody>
                                            </table>
                                            {{ $category->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
