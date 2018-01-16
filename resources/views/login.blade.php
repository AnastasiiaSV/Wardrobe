@extends('layouts.index')
@section('title', 'WARDROBE')
@section('content')

    <div class="no_overflow_page">

        <div class="login_form">

            <div id="two" class="block">
                <div class="tabs_block">
                    <a href="#one">{{Lang::get('constants.login')}}</a>
                    <b><a href="#two">{{Lang::get('constants.sign_up')}}</a></b>
                </div>
                    {!! Form::open(['action' => ['LoginController@doSignUp']]);!!}
                    <!-- if there are login errors, show them here -->
                    <p>
                        {!! $errors->first('email') !!}
                        {!! $errors->first('password') !!}
                    </p>


                        {!! Form::label('email', Lang::get('constants.email'), array('class'=>'field-wrap')) !!}
                <div class="field-wrap" >
                        {!!Form::text('email', 'ivan@gmail.com') !!}
                    </div>

                    <div class="field-wrap" >
                        {!! Form::label('password', Lang::get('constants.password') ) !!}
                        {!! Form::password('password') !!}
                    </div>

                    <div class="field-wrap" >
                        {!! Form::text('name', Lang::get('constants.name')) !!}
                    </div>

                    <div class="field-wrap" >
                        {!! Form::text('surname', Lang::get('constants.surname')) !!}
                    </div>

                    <div class="field-wrap" >
                        {!! Form::text('phone', Lang::get('constants.phone').'(099267667772)' ) !!}
                    </div>

                    <div class="field-wrap" >
                        {!! Form::label('birth', Lang::get('constants.date_of_birth')) !!}
                        {!! Form::date('birth', \Carbon\Carbon::now()) !!}
                    </div>

                    <div class="field-wrap">
                        {!! Form::label('country', Lang::get('constants.country')) !!}
                        <?php
                        $countries = \Wardrobe\Http\Controllers\MainController::getCountriesList();
                        ?>
                        {!! Form::select('country_id', $countries); !!}
                    </div>

                    <div class="field-wrap">
                        {!! Form::label('city', Lang::get('constants.city')) !!}

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

                    {!! Form::submit(Lang::get('constants.sign_up'), array('class'=>'field-wrap button button-block')) ; !!}

                    {!! Form::close(); !!}

                </div> <!-- /form -->



            <div id="one" class="block">
                <div class="tabs_block">
                    <b><a href="#one">{{Lang::get('constants.login')}}</a></b>
                    <a href="#two">{{Lang::get('constants.sign_up')}}</a>
                </div>
                {!! Form::open(['action' => ['LoginController@doLogin']]);!!}
                <!-- if there are login errors, show them here -->
                <p>
                    {{ $errors->first('email') }}
                    {{ $errors->first('password') }}
                </p>

                <div class="field-wrap" >
                      {!! Form::label('email', Lang::get('constants.email')) !!}
                    <div id = 'email'> {!! Form::text('email', 'as@gmail.com') !!} </div>
                </div>

                <div class="field-wrap" >
                    {!! Form::label('password', Lang::get('constants.password')) !!}
                    {!! Form::password('password') !!}
                </div>

                <!--
                <div class="field-wrap" >
                    {!! Form::label('check-remember', Lang::get('constants.remember')) !!}
                    {!! Form::checkbox("check-remember", "remember") !!}
                </div>
                -->

                {!! Form::submit(Lang::get('constants.login'), array('class'=>'field-wrap button button-block')) ; !!}

                {!! Form::close() !!}

            </div> <!-- /form -->

            </div>
    </div>
@stop