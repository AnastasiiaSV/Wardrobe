@extends('layouts.index')
@section('title', 'WARDROBE')
@section('content')

    <div class="no_overflow_page">

        <?php
        $creator_id = $vars[0];
        $wardrobe = $vars[1]; //НЕ МЕНЯТЬ ИМЯ ПЕРЕМЕННОЙ
        ?>

        {!! Form::open(array('id' => 'newoutfit_form',
                                                'onsubmit' => 'return new_outfit_validation_func(this)',
                                                'action' => ['OutfitController@createOutfit'])); !!}

            {!! Form::hidden('creator_id', $creator_id); !!}
            {!! Form::hidden('wardrobe_id', $wardrobe); !!}
            {!! Form::submit(Lang::get('constants.create_outfit'), array('class'=>'field-wrap button button-block')) ; !!}

        <div class="field-wrap">
            <span id='nameValidation'></span>
            {!! Form::text('name', Lang::get('constants.new_outfit_name'), ['id' => 'name']); !!}

            <span id='declarationValidation'></span>
            {!! Form::text('declaration', Lang::get('constants.new_outfit_declaration'), ['id' => 'declaration']); !!}
        </div>



        <!-- All items from wardrobe as check-boxes -->
        @foreach (\Wardrobe\Http\Controllers\MainController::getCategories() as $category)
            @if (isset($wardrobe)) <!-- If wardrobe is set -->
                <div class="items_container_choose">
                    @foreach (\Wardrobe\Http\Controllers\WardrobeController::wardrobeCategoryItems($wardrobe, $category->id) as $item)

                        <div class="item_container_choose">
                            {!!  Form::checkbox("check-items[]", "$item->id"); !!}
                            <img src="{{ URL::asset("$item->path") }}">
                        </div>

                    @endforeach
                </div>

            @else
              {{Lang::get('constants.no_items')}}
            @endif

        @endforeach

            {!! Form::close() !!}

    </div>

    <script src="{{ asset('js/validation.js') }}"></script>

@stop