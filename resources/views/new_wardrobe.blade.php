@extends('layouts.index')
@section('title', 'WARDROBE')
@section('content')

    <div class="no_overflow_page">

        <?php
        $creator_id = $vars[0];
        ?>
            {!! Form::open(array('id' => 'newwardrobe_form',
                                         'onsubmit' => 'return new_wardrobe_validation_func(this)',
                                         'action' => ['WardrobeController@createWardrobe'])); !!}
            {!! Form::hidden('creator_id', $creator_id) ; !!}
            {!! Form::submit(Lang::get('constants.create_wardrobe'), array('class'=>'field-wrap button button-block')) ; !!}

            <div class="field-wrap">
                {!! Form::text('name', Lang::get('constants.new_wardrobe_name'), ['id' => 'name']); !!}
                <span id='nameValidation'></span>
            </div>
        {!! Form::close() ; !!}
    </div>

    <script src="{{ asset('js/validation.js') }}"></script>

@stop