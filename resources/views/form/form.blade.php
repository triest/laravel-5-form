@extends('layouts.welcome', ['title' => 'Create Bid'])


@section('content')

        <div id="app">
            <formcomponent></formcomponent>
        </div>
        <b><a href="{{ route('listBids') }}">Back</a></b>

@endsection
