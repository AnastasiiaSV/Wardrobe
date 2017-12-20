@extends('layouts.index')
@section('title', 'PRICE GAME')
@section('content')

    <div class="page">

        <div class="login_form">
            {!! Form::open(array('action' => ['ItemController@createItem'],'files'=>'true'));!!}

            {!! Form::hidden('creator_id', $vars[1]); !!}
            {!! Form::hidden('wardrobe_id', $vars[0]->id); !!}

            <div class="field-wrap">
                {!! Form::text('name', 'Name of new element'); !!}
            </div>

            <div class="field-wrap">
                {!! Form::label('label_category', 'Category');!!}
                <?php
                $categories = \Wardrobe\Http\Controllers\MainController::getCategoriesList();
                ?>
                {!! Form::select('category_id', $categories); !!}
            </div>

            <div class="field-wrap">

                {!! Form::label('label_type', 'Type');!!}

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

                {!! Form::label('label_type2', '(choose for given category)');!!}
            </div>

            <div class="field-wrap">
                {!! Form::label('label_season', 'Season');!!}
                <?php
                $seasons = \Wardrobe\Http\Controllers\MainController::getSeasonsList();
                ?>
                {!! Form::select('season_id', $seasons); !!}

            </div>

            <div class="field-wrap">
                {!! Form::label('label_places', 'Storage place');!!}
                <?php
                $places = \Wardrobe\Http\Controllers\MainController::getPlacesList();
                ?>
                {!! Form::select('place_id', $places); !!}
            </div>


            <div class="field-wrap">
                {!! Form::file('file',['class' => 'form-control'])!!}
            </div>

            <div class="field-wrap button button-block" >
                {!! Form::submit('CREATE') ; !!}
            </div>

            {!! Form::close() !!}


        </div>
    </div>

@stop