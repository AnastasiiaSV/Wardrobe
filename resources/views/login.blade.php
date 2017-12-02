@extends('layouts.index')
@section('title', 'WARDROBE')
@section('content')

    <div class="page">
        <div class="login_form">

            {!! Form::open(['action' => ['LoginController@doLogin']]);!!}

            <h2>Login</h2>
            <!-- if there are login errors, show them here -->
            <p>
                {{ $errors->first('email') }}
                {{ $errors->first('password') }}
            </p>

            <div class="field-wrap" >
                {{ Form::label('email', 'Email Address') }}
                {{ Form::text('email', 'ivan@gmail.com') }}
            </div>

            <div class="field-wrap" >
                {{ Form::label('password', 'Password') }}
                {{ Form::password('password') }}
            </div>

            <div class="field-wrap" >
                {{ Form::label('check-remember', 'Remember me') }}
                {{ Form::checkbox("check-remember", "remember") }}
            </div>

            <div class="field-wrap" >
                {{ Form::label('Sign up', 'Sign up') }}
            </div>

            <div class="field-wrap button button-block" >
                {!! Form::submit('LOGIN') ; !!}
            </div>

            {{ Form::close() }}

        </div> <!-- /form -->



        <div class="login_form">

           {!! Form::open(['action' => ['LoginController@doSignUp']]);!!}

            <h2>Sign Up</h2>
            <!-- if there are login errors, show them here -->
            <p>
                {{ $errors->first('email') }}
                {{ $errors->first('password') }}
            </p>

            <div class="field-wrap" >
                {{ Form::label('email', 'Email Address') }}
                {{ Form::text('email', 'ivan@gmail.com') }}
            </div>

            <div class="field-wrap" >
                {{ Form::label('password', 'Password') }}
                {{ Form::password('password') }}
            </div>

            <div class="field-wrap" >
                {{ Form::text('name', 'Name') }}
            </div>

            <div class="field-wrap" >
                {{ Form::text('surname', 'Surname') }}
            </div>

            <div class="field-wrap" >
                {{ Form::text('phone', 'Phone (099267667772)') }}
            </div>

            <div class="field-wrap" >
                {{ Form::label('birth', 'Date of birth') }}
            </div>

            <div class="field-wrap" >
                {{ Form::label('country', 'Country') }}
            </div>

            <div class="field-wrap" >
                {{ Form::label('city', 'City') }}
            </div>


            <div class="field-wrap" >
                {{ Form::label('check-remember', 'Remember me') }}
                {{ Form::checkbox("check-remember", "remember") }}
            </div>

            <div class="field-wrap button button-block" >
                {!! Form::submit('SIGN UP') ; !!}
            </div>

            {{ Form::close() }}

        </div> <!-- /form -->

    </div>

@stop