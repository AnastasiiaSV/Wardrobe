@extends('layouts.index')
  @section('title', 'WARDROBE')
  @section('content')

      <div class="long_page">
              <!-- user's wardrobes -->
              <h2>User's wardrobes</h2>
              <?php

          if (!isset($user_id)){
              $user_id = Cookie::get('UserId');
              echo $_COOKIE['UserId'];
          }
          else{
          }
              $wardrobes = \Wardrobe\Http\Controllers\AccountController::getUserWardrobesList($user_id);
              ?>
              @foreach ($wardrobes as $wardrobe)
                  <a href="{{ url("wardrobe/{$wardrobe->id}") }}">{{$wardrobe->name}}</a>
                  <br>
              @endforeach

            <!-- new wardrobe creating -->
              {!! Form::open(['action' => ['WardrobeController@gotoNewWardrobePage']]);!!}
             {!! Form::hidden('creator_id', $user_id); !!}
              <div class="field-wrap button button-block" >
                  {!! Form::submit('NEW WARDROBE') ; !!}
              </div>
              {!! Form::close() !!}
          <hr>

              <h2>User's outfits</h2>
              <?php
              $outfits = \Wardrobe\Http\Controllers\AccountController::getUserOutfits($user_id);
              ?>
              @foreach ($outfits as $outfit)

              <div class="item_name_container">
                  <a href="{{ url("outfit/{$outfit->id}") }}">{{$outfit->name}}</a>
              </div>


                      <div class="items_container_main_large">

                          <!--put all items ids of current outfit from mane-to-many table Items_Outfits-->
                          @foreach (\Wardrobe\Http\Controllers\AccountController::getOutfitItems($outfit->id) as $item)
                              <?php
                              $item = \Wardrobe\Http\Controllers\MainController::getOneElementByIdAndName("Item", $item->item_id);
                              ?>
                              <div class="item_container_main_single">
                                  <img src="{{ URL::asset("$item->path") }}">
                              </div>
                          @endforeach
                      </div>
              @endforeach

          <hr>
          {!! Form::open(['action' => ['LoginController@doLogout']]);!!}
          <div class="field-wrap button button-block" >
              {!! Form::submit('LOGOUT') ; !!}
          </div>
          {!! Form::close() !!}
      </div>
  @stop