@extends('layouts.index')
@section('title', 'WARDROBE')
@section('content')

    <div class="no_overflow_page">
        <div class="crop_container">

        {!! Form::open(array('id' => 'newfile_form',
                                        'method' => 'post',
                                        'files'=>'true',
                                        'action' => ['ItemController@gotoNewItemPage'])); !!}
            {!! Form::hidden('wardrobe_id', $vars[0]); !!}
            {!! Form::hidden('creator_id', $vars[1]); !!}
            {!! Form::hidden('img', ''); !!}


        <div class="field-wrap">
            {!! Form::file('file',['class' => 'js-fileinput img-upload form-control', 'accept'=>'.jpg, .jpeg, .png', 'id' => 'img5'])!!}
            <span id='fileInputValidation'></span>
        </div>

            <button  class="js-export img-export field-wrap button button-block">{{Lang::get('constants.crop')}}</button>

            <canvas id = "id_editorcanvas" class="js-editorcanvas"></canvas>
            <canvas class="js-previewcanvas canvas"></canvas>
            
        {!! Form::close() !!}

        </div>
    </div>

    <!-- JQuery & JS-script -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="{{ asset('js/crop_img.js') }}"></script>
@stop