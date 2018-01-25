@extends('layouts.index')
@section('title', 'WARDROBE')
@section('content')

    <div class="no_overflow_page">

        <?php
        $outfit = $vars[0];
        $wardrobe = \Wardrobe\Http\Controllers\MainController::getOneElementByIdAndName("Wardrobe", $outfit->wardrobe_id);
        ?>

        <div id="three" class="block">
            <div class="tabs_block">
                <b><a href="#one">{{Lang::get('constants.outfit_declaration')}} </a></b>
                <b><a href="#two">{{Lang::get('constants.delete_items')}} </a></b>
                <a href="#three">{{Lang::get('constants.add_items')}}</a>
            </div>

            {!! Form::open(['action' => ['OutfitController@addItemsToOutfit']]);!!}
            {!! Form::hidden('outfit_id', $outfit->id); !!}
            {!! Form::submit(Lang::get('constants.add_items_to_outfit'), array('class'=>'field-wrap button button-block')) ; !!}


            @foreach (\Wardrobe\Http\Controllers\MainController::getCategories() as $category)
                <div class="items_container_choose">
                @foreach (\Wardrobe\Http\Controllers\WardrobeController::wardrobeCategoryItems($wardrobe->id, $category->id) as $item)
                    <div class="item_container_choose">
                        {!!  Form::checkbox("check-items[]", "$item->id"); !!}
                        <img src="{{ URL::asset("$item->path") }}">
                    </div>
                @endforeach
                </div>
            @endforeach
            {!! Form::close() !!}
        </div>



        <div id="two" class="block">
            <div class="tabs_block">
                <b><a href="#one" style="text-align: center">{{Lang::get('constants.outfit_declaration')}} </a></b>
                <a href="#two">{{Lang::get('constants.delete_items')}} </a>
                <b><a href="#three">{{Lang::get('constants.add_items')}}</a></b>
            </div>

            {!! Form::open(['action' => ['OutfitController@deleteItemsFromOutfit']]);!!}
            {!! Form::submit(Lang::get('constants.delete_items'), array('class'=>'field-wrap button button-block')) ; !!}
            {!! Form::hidden('outfit_id', $outfit->id); !!}

            <p>{{Lang::get('constants.items_in_outfit')}}: </p>

            <div class="items_container_choose">
                @foreach (\Wardrobe\Http\Controllers\AccountController::getOutfitItems($outfit->id) as $item)
                    <?php
                    $item = \Wardrobe\Http\Controllers\MainController::getOneElementByIdAndName("Item", $item->item_id);
                    ?>
                    <div class="item_container_choose">
                        {!!  Form::checkbox("check-items[]", "$item->id"); !!}
                        <img src="{{ URL::asset("$item->path") }}">
                    </div>
                @endforeach
            </div>
            {!! Form::close() !!}
        </div>


        <div id="one" class="block">
            <div class="tabs_block">
                <a href="#one">{{Lang::get('constants.outfit_declaration')}} </a>
                <b><a href="#two">{{Lang::get('constants.delete_items')}} </a></b>
                <b><a href="#three">{{Lang::get('constants.add_items')}} </a></b>
            </div>

            {!! Form::open(['action' => ['OutfitController@editOutfitDeclaration']]);!!}
            {!! Form::hidden('outfit_id', $outfit->id); !!}
            <div class="field-wrap">
                {!! Form::text('name', $outfit->name); !!}
                {!! Form::text('declaration', $outfit->declaration); !!}
            </div>

            {!! Form::submit(Lang::get('constants.edit'), array('class'=>'field-wrap button button-block')) ; !!}

            {!! Form::close() !!}


            {!! Form::open(['action' => ['OutfitController@deleteOutfit']]);!!}
            {!! Form::hidden('outfit_id', $outfit->id); !!}
            {!! Form::hidden('wardrobe_id', $wardrobe->id); !!}
            {!! Form::submit(Lang::get('constants.delete_outfit'), array('class'=>'field-wrap button button-block')) ; !!}
            {!! Form::close() !!}

        </div>


    </div>

    <script src="{{ asset('js/validation.js') }}"></script>

@stop