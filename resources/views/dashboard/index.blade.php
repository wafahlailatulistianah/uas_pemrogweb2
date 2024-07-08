@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card border-0 shadow my-5">
        <div class="card-header bg-light">
            <h3 class="h5 pt-2">Dashboard</h3>
        </div>
        <div class="card-body">
            <h5 class="card-title">Welcome, {{ Auth::user()->name }}</h5>
            <p class="card-text">You are logged in!</p>
        </div>
    </div>
</div>
@endsection
