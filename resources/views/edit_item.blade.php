@extends('layouts.index')
@section('title', 'WARDROBE')
@section('content')

    <div class="page">

    {!! Form::open(['action' => ['ItemController@editItem']]);!!}
        {!! Form::hidden('id', $item->id); !!}
        <div class="item_block">
            <img src="{{ URL::asset("$item->path") }}">
        </div>

        <div class="item_info_block">
            <?php
            $place = \Wardrobe\Http\Controllers\MainController::getOneElementByIdAndName("Place", $item->place_id);
            $season = \Wardrobe\Http\Controllers\MainController::getOneElementByIdAndName("Season", $item->season_id);
            $category = \Wardrobe\Http\Controllers\MainController::getOneElementByIdAndName("Category", $item->category_id);
            ?>

                <div class="field-wrap">
                    {!! Form::label('label_name', config('constants.not_alive_name') );!!}
                    {!! Form::text('name', "$item->name"); !!}
                </div>

                <div class="field-wrap">
                    {!! Form::label('label_category', config('constants.category'));!!}
                    <?php
                    $categories = \Wardrobe\Http\Controllers\MainController::getCategoriesList();
                    ?>
                    {!! Form::select('category_id', $categories, $item->category_id); !!}
                </div>


                <div class="field-wrap">

                    {!! Form::label('label_type', config('constants.type'));!!}

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

                    {!! Form::label('label_type2', '('.config('constants.choose_for_given').')');!!}
                </div>


                <div class="field-wrap">
                    {!! Form::label('label_season', config('constants.season'));!!}
                    <?php
                    $seasons = \Wardrobe\Http\Controllers\MainController::getSeasonsList();
                    ?>
                    {!! Form::select('season_id', $seasons, $item->season_id); !!}
                </div>

                <div class="field-wrap">
                    {!! Form::label('label_places', config('constants.storage'));!!}
                    <?php
                    $places = \Wardrobe\Http\Controllers\MainController::getPlacesList();
                    ?>
                    {!! Form::select('place_id', $places, $item->place_id); !!}
                </div>


            <div class="field-wrap button button-block" >
                {!! Form::submit(config('constants.edit')) ; !!}
            </div>

             {!! Form::close() !!}
                <hr>
        </div>



        {!! Form::open(['action' => ['ItemController@deleteItem']]);!!}
        {!! Form::hidden('item_id', $item->id); !!}
        {!! Form::hidden('wardrobe_id', $item->id); !!}

        <div class="item_info_block">

                <div class="field-wrap button button-block" >
                    {!! Form::submit(config('constants.delete_item')) ; !!}
                </div>
                {!! Form::close() !!}
        </div>

    </div>
@stop