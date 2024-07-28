@extends('auth.partial.index')
@section('title', 'registration')
@section('content')
<div class="container">
    <div class="row d-flex flex-column flex-md-row align-items-center justify-content-between p-4 px-md-4 bg-white border-bottom shadow-sm mb-3">
        <div class="col-md-4 col-md-offset-4 mt-4" >
            <h3>Login</h3>
            <hr>
            <form action="{{route("login-user")}}" method="POST">
                @if (Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div> 
                @endif
                @if (Session::has('fail1'))
                    <div class="alert alert-danger">{{Session::get('fail1')}}</div> 
                @endif
                @csrf
                <div class="form-group">
                    <label for="email">Email</label><br>
                    <input type="email" name="email" id="email" value="{{old('email')}}"><br>
                    <span class="text-danger">@error('email'){{$message}}@enderror</span>
                </div>
                <div class="form-group">
                    <label for="password">password</label><br>
                    <input type="password" name="password" id="password" value="{{old('password')}}"><br>
                    <span class="text-danger">@error('password'){{$message}}@enderror</span>
                </div><br>
                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit">Login</button>
                </div>
                <br>
                <a href="registration">New user!! registration</a><br><br>
                <a href="{{route('home.index')}}" class="p-2 text-dark">Back to Home-></a>


            </form>

        </div>
    </div>
</div>
@endsection