@extends('layouts.welcome', ['title' => 'List bids'])


@section('content')
    <h3>Bid List</h3>
    <b><a type="button" class="btn btn-primary" href="{{ route('form') }}">Create Bid</a></b>
    @guest
        <p>
            Login for view Bids
        </p>
    @else
        <div id="app">
            <listcomponent></listcomponent>
        </div>
    @endguest
@endsection
