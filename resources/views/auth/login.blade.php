@extends('theme.base')

@section('title', 'LOGIN')

@section('content')
<div class="container">
    <div class="row vh-100 justify-content-center align-items-center">         
        <div class="shadow p-3 mb-5 bg-body rounded-3 col-auto p-5">
            <center><h1>LOGIN</h1></center><br>

            <form class="needs-validation" action="" method="POST">
            @csrf
                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                <br/>

                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                <br/>
                
                @error('message')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror

                <div class="d-grid gap-2">
                    <input type="submit" class="btn btn-outline-dark" value="Login">
                </div>

            </form>
        </div>
    </div>
</div>
@endsection