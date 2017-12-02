@extends('layouts.index')
@section('title', 'WARDROBE')

@section('content')

    <div class="page">
        <div class="login_form">

            {!! Form::open(['action' => ['LoginController@gotoLoginPage']]);!!}

            <div class="field-wrap button button-block" >
                {!! Form::submit('LOGIN') ; !!}
            </div>

            {!! Form::close() !!}


            {!! Form::open(['action' => ['MainController@gotoPostsPage']]);!!}

            <div class="field-wrap button button-block" >
                {!! Form::submit('POSTS') ; !!}
            </div>

            {!! Form::close() !!}


        </div>
    </div>

@stop