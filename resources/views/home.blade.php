@section('title', __('Home'))
@extends('layouts.app')
@section('content')
<div class="d-flex flex-column min-vh-100">
<div class="container">
    <div class="row">
      <div class="col">
        
      </div>
      <div class="col">
        <div class="card">
            <div class="card-body">
        {{ __('You are loged in !') }}
        <br><strong>{{ $greetings }}</strong>
          </div>
        </div>
      </div>
      <div class="col">
        
      </div>
    </div>
  </div>
  </div>
@endsection