@extends('layouts.index')
@section('title', 'WARDROBE')
@section('content')

    <div class="long_page">

        <h2>Outfit</h2>

        <?php
        $outfit = $vars[0];
        $wardrobe = \Wardrobe\Http\Controllers\MainController::getOneElementByIdAndName("Wardrobe", $outfit->wardrobe_id);
        ?>

        <p>
            Name:  <a href="{{ url("outfit/{$outfit->id}") }}">{{$outfit->name}}</a>
            <br>
            Description: {{$outfit->declaration}}
            <br>
            Creation: {{$outfit->time_of_creation}}
            <br>
            Wardrobe: {{$wardrobe->name}}

            <br>
            <a href="{{ url("edit_outfit/{$outfit->id}") }}">Press here to edit outfit</a>

        </p>

        <p>Items: </p>
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