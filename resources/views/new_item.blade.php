@extends('layouts.index')
@section('title', 'PRICE GAME')
@section('content')

    <div class="no_overflow_page">

        <div class="login_form">
            {!! Form::open(array('action' => ['ItemController@createItem'],'files'=>'true'));!!}
            {!! Form::hidden('creator_id', $vars[1]); !!}
            {!! Form::hidden('wardrobe_id', $vars[0]->id); !!}

            <div class="field-wrap">
                {!! Form::text('name', Lang::get('constants.new_element_name')); !!}
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

                {!! Form::label('label_type2', '('.Lang::get('constants.choose_for_given').')');!!}
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
                {!! Form::file('file',['class' => 'form-control'])!!}
            </div>

            {!! Form::submit(Lang::get('constants.create'), array('class'=>'field-wrap button button-block')) ; !!}

            {!! Form::close() !!}


        </div>
    </div>

@stop