@extends('layouts.index')
@section('title', 'WARDROBE')
@section('content')

    <div class="no_overflow_page">

        <div class="login_form">

            <div id="two" class="block">
                <div class="tabs_block">
                    <b><a href="#one">{{Lang::get('constants.login')}}</a></b>
                    <a href="#two">{{Lang::get('constants.sign_up')}}</a>
                </div>

                     {!! Form::open(array('id' => 'signup_form',
                                'method' => 'post',
                                'onsubmit' => 'return signup_form_validation_func(this)',
                                'action' => ['LoginController@doSignUp'])); !!}

                    <!-- if there are login errors, show them here -->
                    <p>
                        {!! $errors->first('email') !!}
                        {!! $errors->first('password') !!}
                        {!! $errors->first('name') !!}
                    </p>

                    <div class="field-wrap" >
                        {!! Form::label('email', Lang::get('constants.email'), array('class'=>'field-wrap')) !!}
                        {!!Form::text('email', 'ivan@gmail.com', ['id' => 'signup_email']) !!}
                    <span id='signupEmailValidation'></span>
                    </div>

                    <div class="field-wrap" >
                        {!! Form::label('password', Lang::get('constants.password') ) !!}
                        {!! Form::password('password', ['id' => 'signup_pass']) !!}
                        <span id='signupPassValidation'></span>
                    </div>

                    <div class="field-wrap" >
                        {!! Form::text('name', Lang::get('constants.name'), ['id' => 'signup_name']) !!}
                        <span id='signupNameValidation'></span>
                    </div>

                    <div class="field-wrap" >
                        {!! Form::text('surname', Lang::get('constants.surname'), ['id' => 'signup_surname']) !!}
                        <span id='signupSurnameValidation'></span>
                    </div>

                    <div class="field-wrap" >
                        {!! Form::text('phone', Lang::get('constants.phone').'(099267667772)', ['id' => 'signup_phone'] ) !!}
                        <span id='signupPhoneValidation'></span>
                    </div>

                    <div class="field-wrap" >
                        {!! Form::label('birth', Lang::get('constants.date_of_birth')) !!}
                        {!! Form::date('birth', \Carbon\Carbon::now()->format('Y-m-d')) !!}
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
                     * !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
                     * у каждой страны свои города
                     */

                    $countries = \Wardrobe\Http\Controllers\MainController::getCountries();
                    foreach ($countries as $country) {
                        $cities = \Wardrobe\Http\Controllers\MainController::getCitiesOfCountry($country->id);

                        foreach ($cities as $city) {
                            $cities_arr1[$city->id]  = $city->name;
                        }
                        $cities_arr[$country->name] =  $cities_arr1;
                        foreach ($cities as $city) {
                            unset($cities_arr1[$city->id]);
                        }
                    }
                    ?>
                    {!! Form::select('city_id', $cities_arr); !!}

                    {!! Form::label('label_2', '('.Lang::get('constants.select_for_chosen').')');!!}

                </div>

                    {!! Form::submit(Lang::get('constants.sign_up'), array('class'=>'field-wrap button button-block float_left')) ; !!}

                    {!! Form::close(); !!}

                </div> <!-- /form -->



            <div id="one" class="block">
                <div class="tabs_block">
                    <a href="#one">{{Lang::get('constants.login')}}</a>
                    <b><a href="#two">{{Lang::get('constants.sign_up')}}</a></b>
                </div>
                {!! Form::open(array('id' => 'login_form',
                                    'method' => 'post',
                                    'onsubmit' => 'return login_form_validation_func(this)',
                                    'action' => ['LoginController@doLogin'])); !!}

                    <!-- if there are login errors, show them here -->
                    <p>
                        {{ $errors->first('email') }}
                        {{ $errors->first('password') }}
                    </p>

                    <div class="field-wrap" >
                          {!! Form::label('email', Lang::get('constants.email')) !!}
                          {!! Form::text('email', 'as@gmail.com', ['id' => 'login_email']) !!}
                        <span id='loginEmailValidation'></span>
                </div>

                <div class="field-wrap" >
                    {!! Form::label('password', Lang::get('constants.password')) !!}
                    {!! Form::password('password', ['id' => 'login_pass']) !!}
                    <span id='loginPassValidation'></span>
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

    <script src="{{ asset('js/validation.js') }}"></script>


@stop