@extends('layouts.index')
@section('title', 'WARDROBE')
@section('content')

    <div class="page">

        <?php
        $creator_id = $vars[0];
        ?>

        {!! Form::open(['action' => ['WardrobeController@createWardrobe']]); !!}
            {!! Form::hidden('creator_id', $creator_id) ; !!}
            {!! Form::submit(Lang::get('constants.create_wardrobe'), array('class'=>'field-wrap button button-block')) ; !!}

            <div class="field-wrap">
                {!! Form::text('name', Lang::get('constants.new_wardrobe_name')); !!}
            </div>
        {!! Form::close() ; !!}
    </div>
@stop