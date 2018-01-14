@extends('layouts.index')
@section('title', 'WARDROBE')
@section('content')

    <div class="page">

        <?php
        $creator_id = $vars[0];
        $wardrobe = $vars[1]; //НЕ МЕНЯТЬ ИМЯ ПЕРЕМЕННОЙ
        ?>

        {!! Form::open(['action' => ['OutfitController@createOutfit']]);!!}
            {!! Form::hidden('creator_id', $creator_id); !!}
            {!! Form::hidden('wardrobe_id', $wardrobe); !!}
        <div class="field-wrap button button-block" >
            {!! Form::submit(config('constants.create_outfit')) ; !!}
        </div>

        <div class="field-wrap">
            {!! Form::text('name', config('constants.new_outfit_name')); !!}
            {!! Form::text('declaration', config('constants.new_outfit_declaration')); !!}
        </div>
        <!-- All items from wardrobe as check-boxes -->
        @foreach (\Wardrobe\Http\Controllers\MainController::getCategories() as $category)
            @if (isset($wardrobe)) <!-- If wardrobe is set -->
                    @foreach (\Wardrobe\Http\Controllers\WardrobeController::wardrobeCategoryItems($wardrobe, $category->id) as $item)

                        <div class="item_container_main_half">
                            {!!  Form::checkbox("check-items[]", "$item->id"); !!}
                            <img src="{{ URL::asset("$item->path") }}">
                        </div>

                    @endforeach
            @else
                    {{config('constants.no_items')}}
            @endif
        @endforeach

        {!! Form::close() !!}
    </div>
@stop