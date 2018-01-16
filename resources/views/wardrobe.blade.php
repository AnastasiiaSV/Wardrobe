@extends('layouts.index')
@section('title', 'PRICE GAME')
@section('content')

<div class="no_overflow_page">

    <?php
        $creator_id = Cookie::get('UserId');
        echo $_COOKIE['UserId'];
    ?>

        {!! Form::open(['action' => ['WardrobeController@gotoNewOutfitPage']]);!!}
            {!! Form::hidden('wardrobe_id', $wardrobe->id); !!}
            {!! Form::hidden('creator_id', $creator_id); !!}
            {!! Form::submit(Lang::get('constants.create_outfit'), array('class'=>'field-wrap button button-block')) ; !!}
        {!! Form::close() !!}


        {!! Form::open(['action' => ['WardrobeController@gotoNewItemPage']]);!!}
            {!! Form::hidden('wardrobe_id', $wardrobe->id); !!}
            {!! Form::hidden('creator_id', $creator_id); !!}
            {!! Form::submit(Lang::get('constants.new_item'), array('class'=>'field-wrap button button-block')) ; !!}
        {!! Form::close() !!}

        @foreach (\Wardrobe\Http\Controllers\MainController::getCategories() as $category)

            <div class="item_name_container">
                <h1 >{{$category->name}}</h1>
            </div>

            @if (isset($wardrobe))
                <div class="items_container_main_large">
                    <!--put all items of current type-->
                    @foreach (\Wardrobe\Http\Controllers\WardrobeController::wardrobeCategoryItems($wardrobe->id, $category->id) as $item)
                                <div class="item_container_main_single">

                                    <a href="{{ url("item/{$item->id}") }}">
                                        <img src="{{ URL::asset("$item->path") }}">
                                    </a>
                                    <br>

                                </div>
                    @endforeach
                </div>
             @else
                {{Lang::get('constants.no_items')}}
            @endif


        @endforeach
</div>
@stop