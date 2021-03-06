@section('title', __('Services'))
@extends('layouts.app')
@section('content')
<div class="d-flex flex-column min-vh-100">
    <div>
        {{ __('You are in Service!') }}
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
                        <h3>Add New Service</h3>
                        <form form action="services" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="Input">Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Enter Name">
                            </div>
                            <div class="form-group">
                                <label for="input">Description</label>
                                <input type="text" class="form-control" name="description" placeholder="Description">
                            </div>
                            <div class="form-group">
                                <label for="input">Price</label>
                                <input type="number" class="form-control" name="price" placeholder="Description">
                            </div>
                            <div class="pt-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
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
                                                            <th scope="col">Price</th>
                                                            <th scope="col">Created</th>
                                                            <th scope="col">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($services as $s)
                                                            <tr>
                                                                <th scope="row">{{ $s->id }}</th>
                                                                <td>{{ Str::title($s->name) }}</td>
                                                                <td>{{ Str::title($s->description) }}</td>
                                                                <td>{{ $s->price }}Kn</td>
                                                                <td>{{ $s->created_at->diffForHumans() }}</td>
                                                                <td>
                                                                    <form action="services/{{ $s->id }}"
                                                                        method="POST">
                                                                        @csrf

                                                                        <button type="submit"
                                                                            class="btn btn-danger">Delete</button>

                                                                    </form>
                                                                </td>
                                                        @endforeach
                                                        </tr>
                                                    </tbody>
                                                </table>
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
