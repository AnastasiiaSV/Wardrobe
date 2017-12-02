@extends('layouts.index')
@section('title', 'PRICE GAME')
@section('content')

<div class="page">

        {!! Form::open(['action' => ['WardrobeController@gotoOutfitPage']]);!!}
            {!! Form::hidden('wardrobe_id', $wardrobe->id); !!}
        <div class="field-wrap button button-block" >
            {!! Form::submit('CREATE OUTFIT') ; !!}
        </div>
        {!! Form::close() !!}

        {!! Form::open(['action' => ['WardrobeController@gotoNewItemPage']]);!!}
            {!! Form::hidden('wardrobe_id', $wardrobe->id); !!}
        <div class="field-wrap button button-block" >
            {!! Form::submit('NEW ITEM') ; !!}
        </div>
        {!! Form::close() !!}

        @foreach (\Wardrobe\Http\Controllers\MainController::getCategories() as $category)
                <h1>{{$category->name}}</h1>

            @if (isset($wardrobe))
                <div class="items_container_main_large">
                    <!--put all items of current type-->
                    @foreach (\Wardrobe\Http\Controllers\WardrobeController::wardrobeTypeItems($wardrobe, $category->id) as $item)
                                <div class="item_container_main_single">
                                     <img src="{{ URL::asset("$item->path") }}">
                                </div>
                    @endforeach
                </div>
             @else
                 No elements
            @endif
        @endforeach
</div>
@stop