@extends('layouts.welcome')

@section('title','Login Here')
    

@section('headers')

<li class="">
        <a href="{{route('myhome')}}" class="">Home</a>
    </li>
    <li class="active">
        <a href="{{route('login')}}" class="active">Login</a>
    </li>

    <li class="">
        <a href="{{route('contactus')}}" class="">Contact</a>
    </li>


@endsection


@section('body_part')

<div class="text-center icon">
        <span class="fa fa-user"></span>
    </div>
    <div class="content-bottom">
        <form action="{{ route('login') }}" method="post" autocomplete="off">
        @csrf
                <div class="">
                @if ($errors->first('email'))
                                <span class="showerror align-center" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                                </span>
                @endif
                </div>
            <div class="field-group">
                <span class="fa fa-user" aria-hidden="true"></span>
                <div class="wthree-field">
                <input name="email" id="email" class=" @error('email') is-invalid @enderror" type="text" value="{{ old('email') }}" placeholder="E-mail">
                
                </div>
            </div>
                
            @error('password')
                    <span class="showerror invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
            @enderror

            <div class="field-group">
                <span class="fa fa-lock" aria-hidden="true"></span>
                <div class="wthree-field">
                <input id="password" type="password" class=" @error('password') is-invalid @enderror" placeholder="password" name="password" autocomplete="current-password">

               
                </div>
            </div>
            <div class="wthree-field">
                <button type="submit" class="btn">Sign in</button>
            </div>
            <ul class="list-login">
                <li class="switch-agileits">
                    <label class="switch">
                    <input  type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <span class="slider round"></span>
                        Remember me
                    </label>
                </li>
                <li>
                    <a href="{{ route('password.request') }}" class="text-right">forgot password?</a>
                </li>
                <li class="clearfix"></li>
            </ul>
            
        </form>

        
        </div>


@endsection