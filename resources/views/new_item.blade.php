@extends('layouts.index')
@section('title', 'PRICE GAME')
@section('content')

    <div class="page">

        <div class="login_form">
                {!! Form::open(array('action' => ['ItemController@createItem'],'files'=>'true'));!!}

            {!! Form::hidden('creator_id', $vars[1]); !!}
            {!! Form::hidden('wardrobe_id', $vars[0]->id); !!}

            <div class="field-wrap">
                {!! Form::text('name', 'Name of new element'); !!}
            </div>

            <div class="field-wrap">
                {!! Form::label('label_category', 'Category');!!}
                <?php
                $categories = \Wardrobe\Http\Controllers\MainController::getCategoriesList();
                ?>
                {!! Form::select('category_id', $categories); !!}
            </div>

            <div class="field-wrap">
                {!! Form::label('label_type', 'Type');!!}

                <?php
                /**
                 * todo
                 * у каждой категории свои типы
                 * сделать что бы типы отображались в зависимости от выбранной категории
                 */

                $types = \Wardrobe\Http\Controllers\MainController::getCategoryTypesList(2);
                //var_dump($types);
                ?>
                {!! Form::select('type_id', $types); !!}
            </div>

            <div class="field-wrap">
                {!! Form::label('label_season', 'Season');!!}
                <?php
                $seasons = \Wardrobe\Http\Controllers\MainController::getSeasonsList();
                ?>
                {!! Form::select('season_id', $seasons); !!}
            </div>

            <div class="field-wrap">
                {!! Form::label('label_places', 'Storage place');!!}
                <?php
                $places = \Wardrobe\Http\Controllers\MainController::getPlacesList();
                ?>
                {!! Form::select('place_id', $places); !!}
            </div>


            <div class="field-wrap">
                {!! Form::file('file',['class' => 'form-control'])!!}
            </div>

            <div class="field-wrap button button-block" >
                {!! Form::submit('CREATE') ; !!}
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@stop