@extends('layouts.index')
@section('title', 'WARDROBE')
@section('content')

    <div class="page">

        <h2>{{Lang::get('constants.outfit')}}</h2>

        <?php
        $outfit = $vars[0];
        $wardrobe = \Wardrobe\Http\Controllers\MainController::getOneElementByIdAndName("Wardrobe", $outfit->wardrobe_id);
        ?>

        <p>
            {{Lang::get('constants.not_alive_name')}}:  <a href="{{ url("outfit/{$outfit->id}") }}">{{$outfit->name}}</a>
            <br>
            {{Lang::get('constants.description')}}: {{$outfit->declaration}}
            <br>
            {{Lang::get('constants.creation')}}: {{$outfit->time_of_creation}}
            <br>
            {{Lang::get('constants.wardrobe')}}: {{$wardrobe->name}}

            <br>
            <a href="{{ url("edit_outfit/{$outfit->id}") }}">{{Lang::get('constants.press_to_edit_outfit')}}</a>

        </p>

        <p>{{Lang::get('constants.items')}}: </p>
            <div class="items_container_main_large">

                <!--put all items ids of current outfit from mane-to-many table Items_Outfits-->
                @foreach (\Wardrobe\Http\Controllers\AccountController::getOutfitItems($outfit->id) as $item)
                    <?php
                    $item = \Wardrobe\Http\Controllers\MainController::getOneElementByIdAndName("Item", $item->item_id);
                    ?>
                    <div class="item_container_main_single">
                        <a href="{{ url("item/{$item->id}") }}">
                            <img src="{{ URL::asset("$item->path") }}">
                        </a>
                    </div>
                @endforeach
            </div>


    </div>

@stop