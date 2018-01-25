@extends('layouts.index')
@section('title', 'PRICE GAME')
@section('content')

    <div class="no_overflow_page">

        <div class="login_form">
            {!! Form::open(array('id' => 'newfile_form',
                                            'method' => 'post',
                                            'files'=>'true',
                                            'onsubmit' => 'return new_item_adding_validation_func(this)',
                                            'action' => ['ItemController@createItem'])); !!}

            {!! Form::hidden('creator_id', $vars[1]); !!}
            {!! Form::hidden('wardrobe_id', $vars[0]->id); !!}

            <div class="field-wrap">
                {!! Form::text('name', Lang::get('constants.new_element_name'), ['id' => 'name']); !!}
                <span id='nameValidation'></span>
            </div>

            <div class="field-wrap">
                {!! Form::label('label_category', Lang::get('constants.category'));!!}
                <?php
                $categories = \Wardrobe\Http\Controllers\MainController::getCategoriesList();
                ?>
                {!! Form::select('category_id', $categories); !!}
            </div>

            <div class="field-wrap">

                {!! Form::label('label_type', Lang::get('constants.type'));!!}

                <?php
                $categories = \Wardrobe\Http\Controllers\MainController::getCategories();

                foreach ($categories as $category) {
                $types = \Wardrobe\Http\Controllers\MainController::getCategoryTypes($category->id);

                foreach ($types as $type) {
                   $types_arr1[$type->id]  = $type->name;
                }
                $types_arr[$category->name] =  $types_arr1;
                    foreach ($types as $type) {
                        unset($types_arr1[$type->id]);
                    }
                }
                ?>

                {!! Form::select('type_id', $types_arr); !!}

                {!! Form::label('label_type2', '('.Lang::get('constants.select_for_chosen').')');!!}
            </div>

            <div class="field-wrap">
                {!! Form::label('label_season', Lang::get('constants.season'));!!}
                <?php
                $seasons = \Wardrobe\Http\Controllers\MainController::getSeasonsList();
                ?>
                {!! Form::select('season_id', $seasons); !!}

            </div>

            <div class="field-wrap">
                {!! Form::label('label_places', Lang::get('constants.storage'));!!}
                <?php
                $places = \Wardrobe\Http\Controllers\MainController::getPlacesList();
                ?>
                {!! Form::select('place_id', $places); !!}
            </div>


            <div class="field-wrap">
                {!! Form::file('file',['class' => 'form-control', 'accept'=>'.jpg, .jpeg, .png', 'id' => 'file_input'])!!}
                <span id='fileInputValidation'></span>
            </div>

            {!! Form::submit(Lang::get('constants.create'), array('class'=>'field-wrap button button-block')) ; !!}

            {!! Form::close() !!}


        </div>
    </div>

    <script src="{{ asset('js/validation.js') }}"></script>

@stop