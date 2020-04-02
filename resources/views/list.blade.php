@extends('layouts.welcome', ['title' => 'List bids'])


@section('content')
    <h3>Bid List</h3>
    <b><a href="{{ route('form') }}">Create Bid</a></b>
        <div id="app">
            <listcomponent></listcomponent>
        </div>
@endsection
