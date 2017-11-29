@extends('layouts.index')
@section('title', 'WARDROBE')
@section('content')

    <div class="page">

        {!! Form::open(['action' => ['OutfitController@createOutfit']]);!!}
            {!! Form::hidden('creator_id', $vars[1]); !!}
        <div class="button-block" >
            {!! Form::submit('CREATE OUTFIT') ; !!}
        </div>

        <div class="field-wrap">
            {!! Form::text('name', 'Name of new outfit'); !!}
            {!! Form::text('declaration', 'Declaration of new outfit'); !!}
        </div>


        <!-- All items from wardrobe as check-boxes -->
        @foreach (\Wardrobe\Http\Controllers\MainController::getCategories() as $category)
            @if (isset($vars[0])) <!-- If wardrobe is set -->
                    @foreach (\Wardrobe\Http\Controllers\WardrobeController::wardrobeTypeItems($vars[0], $category->id) as $item)

                        <div class="item_container_main_half">
                            {!!  Form::checkbox("check-box-$item->id", "$item->id"); !!}
                            <img src="{{ URL::asset("$item->path") }}">

                        </div>

                    @endforeach
            @else
                No elements
            @endif
        @endforeach

        {!! Form::close() !!}

    </div>

@stop