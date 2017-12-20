@extends('layouts.index')
@section('title', 'WARDROBE')
@section('content')

    <div class="page">
        <div class="login_form">

            <div id="two" class="block">
                <div class="tabs_block">
                    <a href="#one">LOGIN</a>
                    <b><a href="#two">SIGN UP</a></b>
                </div>
                    {!! Form::open(['action' => ['LoginController@doSignUp']]);!!}
                    <!-- if there are login errors, show them here -->
                    <p>
                        {{ $errors->first('email') }}
                        {{ $errors->first('password') }}
                    </p>

                    <div class="field-wrap" >
                        {{ Form::label('email', 'Email Address') }}
                        {{Form::text('email', 'ivan@gmail.com') }}
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
                        {{ Form::date('birth', \Carbon\Carbon::now()) }}
                    </div>

                    <div class="field-wrap">
                        {{ Form::label('country', 'Country') }}
                        <?php
                        $countries = \Wardrobe\Http\Controllers\MainController::getCountriesList();
                        ?>
                        {!! Form::select('country_id', $countries); !!}
                    </div>

                    <div class="field-wrap">
                        {{ Form::label('city', 'City') }}

                        <?php
                        /**
                         * todo
                         * у каждой категории свои типы
                         * сделать что бы типы отображались в зависимости от выбранной категории
                         */

                        $cities = \Wardrobe\Http\Controllers\MainController::getCitiesOfCountryList(1);
                        //var_dump($types);
                        ?>
                        {!! Form::select('city_id', $cities); !!}
                    </div>


                    <div class="field-wrap button button-block" >
                        {!! Form::submit('SIGN UP') ; !!}
                    </div>

                    {{ Form::close() }}

                </div> <!-- /form -->



            <div id="one" class="block">
                <div class="tabs_block">
                    <b><a href="#one">LOGIN</a></b>
                    <a href="#two">SIGN UP</a>
                </div>
                {!! Form::open(['action' => ['LoginController@doLogin']]);!!}
                <!-- if there are login errors, show them here -->
                <p>
                    {{ $errors->first('email') }}
                    {{ $errors->first('password') }}
                </p>

                <div class="field-wrap" >
                      {{ Form::label('email', 'Email Address') }}
                    <div id = 'email'> {{ Form::text('email', 'as@gmail.com') }} </div>
                </div>

                <div class="field-wrap" >
                    {{ Form::label('password', 'Password') }}
                    {{ Form::password('password') }}
                </div>

                <!--
                <div class="field-wrap" >
                    {{ Form::label('check-remember', 'Remember me') }}
                    {{ Form::checkbox("check-remember", "remember") }}
                </div>
                -->

                <div class="field-wrap button button-block" >
                    {!! Form::submit('LOGIN') ; !!}
                </div>

                {{ Form::close() }}

            </div> <!-- /form -->

            </div>
    </div>
@stop