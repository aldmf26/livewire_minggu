@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Users</h1>
        
        <hr>
        @livewire('users-table')
    </div>
@endsection
