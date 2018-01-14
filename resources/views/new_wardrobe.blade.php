@extends('layouts.index')
@section('title', 'WARDROBE')
@section('content')

    <div class="long_page">

        <?php
        $creator_id = $vars[0];
        ?>

        {!! Form::open(['action' => ['WardrobeController@createWardrobe']]); !!}
            {!! Form::hidden('creator_id', $creator_id) ; !!}
            <div class="field-wrap button button-block" >
                {!! Form::submit(config('constants.create_wardrobe')) ; !!}
            </div>
            <div class="field-wrap">
                {!! Form::text('name', config('constants.new_wardrobe_name')); !!}
            </div>
        {!! Form::close() ; !!}
    </div>
@stop