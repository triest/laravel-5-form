@extends('layouts.welcome')


@section('content')

    <form action="{{route('store_form')}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="name">
            @if($errors->has('name'))
                <font color="red"><p>  {{$errors->first('name')}}</p></font>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="phone" class="form-control" name="phone" id="phone" width="30">
            @if($errors->has('phone'))
                <font color="red"><p>  {{$errors->first('phone')}}</p></font>
            @endif
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.
            </small>
        </div>
        <textarea id="description" name="description" style="resize: none" cols="30"></textarea>
        @if($errors->has('description'))
            <font color="red"><p>  {{$errors->first('description')}}</p></font>
        @endif
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection