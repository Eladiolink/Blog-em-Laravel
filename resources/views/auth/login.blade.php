@extends('layouts.layout')

@section('main')

        <form class="col-lg-4 col-8 mx-auto mt-5" method="POST" action="{{ route('login') }}">
            @csrf

            <div class="my-2"> 
                <input class="form-control mx-auto" type="text" name="email" value="{{old('email')}}" required placeholder="Email">
            </div>

            <div class="my-2"> 
                <input class="form-control mx-auto" type="password" name="password" value="{{old('password')}}" required placeholder="Password">
            </div>

            <div class="d-flex justify-content-center mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div>

            <div class="d-flex justify-content-end mt-4">
                <button class="btn btn-success" type="submit">Log in</button>
            </div>
        </form>

      
@endsection