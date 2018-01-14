@extends('layouts.index')
@section('title', 'WARDROBE')
@section('content')

    <div class="long_page">

        <?php
        $outfit = $vars[0];
        $wardrobe = \Wardrobe\Http\Controllers\MainController::getOneElementByIdAndName("Wardrobe", $outfit->wardrobe_id);
        ?>

        <div id="three" class="block">
            <div class="tabs_block">
                <b><a href="#one">{{config('constants.outfit_declaration')}} </a></b>
                <b><a href="#two">{{config('constants.delete_items')}} </a></b>
                <a href="#three">{{config('constants.add_items')}}</a>
            </div>

            {!! Form::open(['action' => ['OutfitController@addItemsToOutfit']]);!!}
            {!! Form::hidden('outfit_id', $outfit->id); !!}
            <div class="field-wrap button button-block" >
                {!! Form::submit(config('constants.add_items_to_outfit')) ; !!}
            </div>

            @foreach (\Wardrobe\Http\Controllers\MainController::getCategories() as $category)
                @foreach (\Wardrobe\Http\Controllers\WardrobeController::wardrobeCategoryItems($wardrobe->id, $category->id) as $item)
                    <div class="item_container_main_half">
                        {!!  Form::checkbox("check-items[]", "$item->id"); !!}
                        <img src="{{ URL::asset("$item->path") }}">
                    </div>
                @endforeach
            @endforeach
            {!! Form::close() !!}
        </div>



        <div id="two" class="block">
            <div class="tabs_block">
                <b><a href="#one" style="text-align: center">{{config('constants.outfit_declaration')}} </a></b>
                <a href="#two">{{config('constants.delete_items')}} </a>
                <b><a href="#three">{{config('constants.add_items')}}</a></b>
            </div>

            {!! Form::open(['action' => ['OutfitController@deleteItemsFromOutfit']]);!!}
            <div class="field-wrap button button-block" >
                {!! Form::submit(config('constants.delete_items')) ; !!}
                {!! Form::hidden('outfit_id', $outfit->id); !!}
            </div>

            <p>{{config('constants.items_in_outfit')}}: </p>

                @foreach (\Wardrobe\Http\Controllers\AccountController::getOutfitItems($outfit->id) as $item)
                    <?php
                    $item = \Wardrobe\Http\Controllers\MainController::getOneElementByIdAndName("Item", $item->item_id);
                    ?>
                    <div class="item_container_main_half">
                        {!!  Form::checkbox("check-items[]", "$item->id"); !!}
                        <img src="{{ URL::asset("$item->path") }}">
                    </div>
                @endforeach

            {!! Form::close() !!}
        </div>


        <div id="one" class="block">
            <div class="tabs_block">
                <a href="#one">{{config('constants.outfit_declaration')}} </a>
                <b><a href="#two">{{config('constants.delete_items')}} </a></b>
                <b><a href="#three">{{config('constants.add_items')}} </a></b>
            </div>

            {!! Form::open(['action' => ['OutfitController@editOutfitDeclaration']]);!!}
            {!! Form::hidden('outfit_id', $outfit->id); !!}
            <div class="field-wrap">
                {!! Form::text('name', $outfit->name); !!}
                {!! Form::text('declaration', $outfit->declaration); !!}
            </div>
            <div class="field-wrap button button-block" >
                {!! Form::submit(config('constants.edit')) ; !!}
            </div>
            {!! Form::close() !!}


            {!! Form::open(['action' => ['OutfitController@deleteOutfit']]);!!}
            {!! Form::hidden('outfit_id', $outfit->id); !!}
            {!! Form::hidden('wardrobe_id', $wardrobe->id); !!}
            <div class="field-wrap button button-block" >
                {!! Form::submit(config('constants.delete_outfit')) ; !!}
            </div>
            {!! Form::close() !!}

        </div>


    </div>
@stop