@extends('layouts.index')
@section('title', 'WARDROBE')
@section('content')

    <div class="page">

        <div class="item_block">
            <img src="{{ URL::asset("$item->path") }}">
        </div>

        <div class="item_info_block">
            <?php
            $place = \Wardrobe\Http\Controllers\MainController::getOneElementByIdAndName("Place", $item->place_id);
            $season = \Wardrobe\Http\Controllers\MainController::getOneElementByIdAndName("Season", $item->season_id);
            $category = \Wardrobe\Http\Controllers\MainController::getOneElementByIdAndName("Category", $item->category_id);
            ?>

            <p>
                {{Lang::get('constants.not_alive_name')}}: {{ "$item->name" }}
                <br>
                {{Lang::get('constants.creation')}}: {{ "$item->time_of_creation" }}
                <br>
                {{Lang::get('constants.category')}}: {{ "$category->name" }}
                <br>
                {{Lang::get('constants.season')}}: {{ "$season->name" }}
                <br>
                {{Lang::get('constants.storage')}}: {{ "$place->name" }}
            </p>

            <hr>
            <p>
            <a href="{{ url("edit_item/{$item->id}") }}">{{Lang::get('constants.press_to_edit_item')}}</a>
            </p>

        </div>

    </div>

@stop