@extends('layouts.index')
@section('title', 'WARDROBE')
@section('content')

    <div class="no_overflow_page">
        <div class="new_item_container">

            <div class="new_item_small_container">

                    {!! Form::open(array('id' => 'newfile_form',
                                                    'method' => 'post',
                                                    'files'=>'true',
                                                    'onsubmit' => 'return new_item_adding_validation_func(this)',
                                                    'action' => ['ItemController@createItem'])); !!}

                    {!! Form::hidden('creator_id', $vars[1]); !!}
                    {!! Form::hidden('wardrobe_id', $vars[0]); !!}

                    {!! Form::hidden('img', $vars[2]); !!}



                    <div class="field-wrap">
                        {!! Form::text('name', Lang::get('constants.new_element_name'), ['id' => 'name']); !!}
                        <span id='nameValidation'></span>
                    </div>

                    <div class="field-wrap">
                        {!! Form::label('label_category', Lang::get('constants.category'));!!}
                        <?php
                        $categories = \Wardrobe\Http\Controllers\MainController::getCategoriesList();
                        ?>
                        {!! Form::select('category_id', $categories); !!}
                    </div>

                    <div class="field-wrap">

                        {!! Form::label('label_type', Lang::get('constants.type'));!!}

                        <?php
                        $categories = \Wardrobe\Http\Controllers\MainController::getCategories();

                        foreach ($categories as $category) {
                            $types = \Wardrobe\Http\Controllers\MainController::getCategoryTypes($category->id);

                            foreach ($types as $type) {
                                $types_arr1[$type->id]  = $type->name;
                            }
                            $types_arr[$category->name] =  $types_arr1;
                            foreach ($types as $type) {
                                unset($types_arr1[$type->id]);
                            }
                        }
                        ?>

                        {!! Form::select('type_id', $types_arr); !!}

                        {!! Form::label('label_type2', '('.Lang::get('constants.select_for_chosen').')');!!}
                    </div>

                    <div class="field-wrap">
                        {!! Form::label('label_season', Lang::get('constants.season'));!!}
                        <?php
                        $seasons = \Wardrobe\Http\Controllers\MainController::getSeasonsList();
                        ?>
                        {!! Form::select('season_id', $seasons); !!}

                    </div>

                    <div class="field-wrap">
                        {!! Form::label('label_places', Lang::get('constants.storage'));!!}
                        <?php
                        $places = \Wardrobe\Http\Controllers\MainController::getPlacesList();
                        ?>
                        {!! Form::select('place_id', $places); !!}
                    </div>


                    <span id='fileInputValidation'></span>


                    {!! Form::submit(Lang::get('constants.create'), array('class'=>'field-wrap button button-block')) ; !!}

                    {!! Form::close() !!}
            </div>

            <div class="new_item_small_container">
                {!! "<img src="."$vars[2]>" !!}
            </div>

        </div>
    </div>

    <script src="{{ asset('js/validation.js') }}"></script>

@stop