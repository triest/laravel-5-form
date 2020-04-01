@extends('layouts.welcome', ['title' => 'ListBids'])


@section('content')
    <h3>Bid List</h3>
    <b><a href="{{ route('form') }}">Create Bid</a></b>
    <div class="row">
        <div id="app">
            <listcomponent></listcomponent>
        </div>
    </div>
@endsection
