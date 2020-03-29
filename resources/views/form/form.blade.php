@extends('layouts.welcome')


@section('content')

    <form action="{{route('store_form')}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="name">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp"
                   placeholder="Enter email" width="30">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.
            </small>
        </div>
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1" name="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <textarea id="description" style="resize: none" cols="30"></textarea>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection