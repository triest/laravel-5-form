@extends('layouts.welcome', ['title' => 'Create Bid'])


@section('content')

    <div id="app" style="position: center">
        <formcomponent></formcomponent>
    </div>
    <b><a type="button" class="btn btn-default" href="{{ route('listBids') }}">Back</a></b>

@endsection
