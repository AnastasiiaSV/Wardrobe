@extends('layouts.index')
@section('title', 'WARDROBE')

@section('content')

    <div class="long_page">

        <div class="button_form">
            {!! Form::open(['action' => ['LoginController@gotoLoginPage']]);!!}
            <div class="field-wrap button button-block" >
                {!! Form::submit(config('constants.lets_start')) ; !!}
            </div>
            {!! Form::close() !!}
        </div>

            <?php
            $itemsArr = \Wardrobe\Http\Controllers\MainController::getLatestItems();
            ?>

            <div class="items_container_main_large">

                <?php if($itemsArr): ?>
                <?php foreach($itemsArr as $item): ?>
                <div class="item_container_main_single">
                    <img src = "{{$item->path}}" alt = "{{$item->name}}">
                </div>

                <?php endforeach; ?>
                <?php endif; ?>

            </div>

        </div>

@stop