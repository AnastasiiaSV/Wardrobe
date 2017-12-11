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
                Name: {{ "$item->name" }}
                <br>
                Creation: {{ "$item->time_of_creation" }}
                <br>
                Category: {{ "$category->name" }}
                <br>
                Season: {{ "$season->name" }}
                <br>
                Place: {{ "$place->name" }}
            </p>

            <hr>
            <p>
            <a href="{{ url("edit_item/{$item->id}") }}">Press here to edit item</a>
            </p>

        </div>

    </div>

@stop