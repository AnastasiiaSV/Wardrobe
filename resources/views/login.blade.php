@extends('layouts.index')
@section('title', 'WARDROBE')
@section('content')

    <div class="page">
        <div class="login_form">

            <div id="two" class="block">
                <div class="tabs_block">
                    <a href="#one">{{config('constants.login')}}</a>
                    <b><a href="#two">{{config('constants.sign_up')}}</a></b>
                </div>
                    {!! Form::open(['action' => ['LoginController@doSignUp']]);!!}
                    <!-- if there are login errors, show them here -->
                    <p>
                        {{ $errors->first('email') }}
                        {{ $errors->first('password') }}
                    </p>

                    <div class="field-wrap" >
                        {{ Form::label('email', config('constants.email')) }}
                        {{Form::text('email', 'ivan@gmail.com') }}
                    </div>

                    <div class="field-wrap" >
                        {{ Form::label('password', config('constants.password') ) }}
                        {{ Form::password('password') }}
                    </div>

                    <div class="field-wrap" >
                        {{ Form::text('name', config('constants.name')) }}
                    </div>

                    <div class="field-wrap" >
                        {{ Form::text('surname', config('constants.surname')) }}
                    </div>

                    <div class="field-wrap" >
                        {{ Form::text('phone', config('constants.phone').'(099267667772)' ) }}
                    </div>

                    <div class="field-wrap" >
                        {{ Form::label('birth', config('constants.date_of_birth')) }}
                        {{ Form::date('birth', \Carbon\Carbon::now()) }}
                    </div>

                    <div class="field-wrap">
                        {{ Form::label('country', config('constants.country')) }}
                        <?php
                        $countries = \Wardrobe\Http\Controllers\MainController::getCountriesList();
                        ?>
                        {!! Form::select('country_id', $countries); !!}
                    </div>

                    <div class="field-wrap">
                        {{ Form::label('city', config('constants.city')) }}

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
                        {!! Form::submit(config('constants.sign_up')) ; !!}
                    </div>

                    {{ Form::close() }}

                </div> <!-- /form -->



            <div id="one" class="block">
                <div class="tabs_block">
                    <b><a href="#one">{{config('constants.login')}}</a></b>
                    <a href="#two">{{config('constants.sign_up')}}</a>
                </div>
                {!! Form::open(['action' => ['LoginController@doLogin']]);!!}
                <!-- if there are login errors, show them here -->
                <p>
                    {{ $errors->first('email') }}
                    {{ $errors->first('password') }}
                </p>

                <div class="field-wrap" >
                      {{ Form::label('email', config('constants.email')) }}
                    <div id = 'email'> {{ Form::text('email', 'as@gmail.com') }} </div>
                </div>

                <div class="field-wrap" >
                    {{ Form::label('password', config('constants.password')) }}
                    {{ Form::password('password') }}
                </div>

                <!--
                <div class="field-wrap" >
                    {{ Form::label('check-remember', config('constants.remember')) }}
                    {{ Form::checkbox("check-remember", "remember") }}
                </div>
                -->

                <div class="field-wrap button button-block" >
                    {!! Form::submit(config('constants.login')) ; !!}
                </div>

                {{ Form::close() }}

            </div> <!-- /form -->

            </div>
    </div>
@stop