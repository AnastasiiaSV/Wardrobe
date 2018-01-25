@extends('layouts.index')
  @section('title', 'WARDROBE')
  @section('content')

      <div class="no_overflow_page">
<!-- 6 tabs-->
      <?php
      if (!isset($user_id)){
          $user_id = Cookie::get('UserId');
      }
      else{
      }
      ?>
         <!-- 6 tab-->
          <div id="six" class="block">
              <div class="tabs_block">
                  <b><a href="#one">{{Lang::get('constants.wardrobes')}} </a></b>
                  <b><a href="#two">{{Lang::get('constants.outfits')}} </a></b>
                  <b><a href="#three">{{Lang::get('constants.calendar')}} </a></b>
                  <b><a href="#four">{{Lang::get('constants.search')}} </a></b>
                  <b><a href="#five">{{Lang::get('constants.groups')}} </a></b>
                  <a href="#six">{{Lang::get('constants.settings')}} </a>
              </div>

              <div class="float_for_button">
                  {!! Form::open(['action' => ['LoginController@doLogout']]);!!}
                  {!! Form::submit(Lang::get('constants.logout'), array('class'=>'field-wrap button button-block_account')) ; !!}
                  {!! Form::close() !!}
              </div>

              <!-- User info-->
              <?php
              $user = \Wardrobe\Http\Controllers\MainController::getOneElementByIdAndName("User", $user_id);
              ?>

              <h2>{{Lang::get('constants.account_info')}}</h2>

              <div class="account_form">
              {!! Form::open(array('id' => 'accountinfo_form',
                                'method' => 'post',
                                'onsubmit' => 'return account_info_validation_func(this)',
                                'action' => ['AccountController@editAccountInfo'])); !!}

                  {!! Form::hidden('email', $user->email); !!}
                  {!! Form::label('email', Lang::get('constants.email'), array('class'=>'field-wrap')) !!}


                   <div id="info_sign" title= '{!! Lang::get('constants.email_info') !!}'>
                       &#128712;
                   </div>


                  <div class="field-wrap" >
                      {!! Form::label('email', "$user->email", array('class'=>'field-wrap','id'=>'account_form_email' )) !!}
                  </div>

                  <div class="field-wrap" >
                      {!! Form::label('password', Lang::get('constants.old_password') ) !!}
                      {!! Form::password('old_password', ['id' => 'account_old_pass']) !!}
                      <span id='oldPasswordValidation'></span>
                  </div>
                  <div class="field-wrap" >
                       {!! Form::label('password', Lang::get('constants.new_password') ) !!}
                       {!! Form::password('new_password', ['id' => 'account_new_pass']) !!}
                      <span id='newPasswordValidation'></span>
                  </div>

                  <div class="field-wrap" >
                      {!! Form::text('name',  "$user->name", ['id' => 'account_name'] ) !!}
                      <span id='nameValidation'></span>
                  </div>

                  <div class="field-wrap" >
                      {!! Form::text('surname', "$user->surname", ['id' => 'account_surname']) !!}
                      <span id='surnameValidation'></span>
                  </div>

                  <div class="field-wrap" >
                      {!! Form::text('phone', "$user->phone", ['id' => 'account_phone'] ) !!}
                      <span id='phoneValidation'></span>
                  </div>

                  <div class="field-wrap" >
                      {!! Form::label('birth', Lang::get('constants.date_of_birth')) !!}
                      {!! Form::date('birth', \Carbon\Carbon::parse($user->date_of_birth)->format('Y-m-d'))!!}
                  </div>

                  <div class="field-wrap">
                      {!! Form::label('country', Lang::get('constants.country')) !!}
                      <?php
                      $countries = \Wardrobe\Http\Controllers\MainController::getCountriesList();
                      ?>
                      <!-- todo
                        устанавливать именно страну пользователя
                        -->
                      {!! Form::select('country_id', $countries, $user->country_id); !!}
                  </div>


                  <div class="field-wrap">
                      {!! Form::label('city', Lang::get('constants.city')) !!}

                      <?php
                      /**
                       * todo
                       * !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
                       * у каждой страны свои города
                       */

                      $countries = \Wardrobe\Http\Controllers\MainController::getCountries();
                      foreach ($countries as $country) {
                          $cities = \Wardrobe\Http\Controllers\MainController::getCitiesOfCountry($country->id);

                          foreach ($cities as $city) {
                              $cities_arr1[$city->id]  = $city->name;
                          }
                          $cities_arr[$country->name] =  $cities_arr1;
                          foreach ($cities as $city) {
                              unset($cities_arr1[$city->id]);
                          }
                      }
                      ?>
                      {!! Form::select('city_id', $cities_arr, $user->city_id); !!}

                      {!! Form::label('label_2', '('.Lang::get('constants.select_for_chosen').')');!!}

                  </div>

                  {!! Form::submit(Lang::get('constants.confirm'), array('class'=>'field-wrap button button-block_account', 'style'=>'font-size: 1em;')) ; !!}

                  {!! Form::close(); !!}

              </div>

          </div>  <!-- End 6 tab-->

          <!-- 5 tab-->
          <div id="five" class="block">
              <div class="tabs_block">
                  <b><a href="#one">{{Lang::get('constants.wardrobes')}} </a></b>
                  <b><a href="#two">{{Lang::get('constants.outfits')}} </a></b>
                  <b><a href="#three">{{Lang::get('constants.calendar')}} </a></b>
                  <b><a href="#four">{{Lang::get('constants.search')}} </a></b>
                  <a href="#five">{{Lang::get('constants.groups')}} </a>
                  <b><a href="#six">{{Lang::get('constants.settings')}} </a></b>
              </div>


          </div> <!-- End 5 tab-->

          <!-- 4 tab-->
          <div id="four" class="block">
              <div class="tabs_block">
                  <b><a href="#one">{{Lang::get('constants.wardrobes')}} </a></b>
                  <b><a href="#two">{{Lang::get('constants.outfits')}} </a></b>
                  <b><a href="#three">{{Lang::get('constants.calendar')}} </a></b>
                  <a href="#four">{{Lang::get('constants.search')}} </a>
                  <b><a href="#five">{{Lang::get('constants.groups')}} </a></b>
                  <b><a href="#six">{{Lang::get('constants.settings')}} </a></b>
              </div>


          </div> <!-- End 4 tab-->

          <!-- 3 tab-->
          <div id="three" class="block">
              <div class="tabs_block">
                  <b><a href="#one">{{Lang::get('constants.wardrobes')}} </a></b>
                  <b><a href="#two">{{Lang::get('constants.outfits')}} </a></b>
                  <a href="#three">{{Lang::get('constants.calendar')}} </a>
                  <b><a href="#four">{{Lang::get('constants.search')}} </a></b>
                  <b><a href="#five">{{Lang::get('constants.groups')}} </a></b>
                  <b><a href="#six">{{Lang::get('constants.settings')}} </a></b>
              </div>

          </div> <!-- End 3 tab-->


          <!-- 2 tab-->
          <div id="two" class="block">
              <div class="tabs_block">
                  <b><a href="#one">{{Lang::get('constants.wardrobes')}} </a></b>
                  <a href="#two">{{Lang::get('constants.outfits')}} </a>
                  <b><a href="#three">{{Lang::get('constants.calendar')}} </a></b>
                  <b><a href="#four">{{Lang::get('constants.search')}} </a></b>
                  <b><a href="#five">{{Lang::get('constants.groups')}} </a></b>
                  <b><a href="#six">{{Lang::get('constants.settings')}} </a></b>
              </div>

              <h2>{{Lang::get('constants.outfits')}}</h2>
              <?php
              $outfits = \Wardrobe\Http\Controllers\AccountController::getUserOutfits($user_id);
              ?>
              @foreach ($outfits as $outfit)

                  <div class="item_name_container">
                      <a href="{{ url("outfit/{$outfit->id}") }}">{{$outfit->name}}</a>
                  </div>
                  <div class="items_container_outfit">
                      <!--put all items ids of current outfit from mane-to-many table Items_Outfits-->
                      @foreach (\Wardrobe\Http\Controllers\AccountController::getOutfitItems($outfit->id) as $item)
                          <?php
                          $item = \Wardrobe\Http\Controllers\MainController::getOneElementByIdAndName("Item", $item->item_id);
                          ?>
                          <div class="item_container_outfit">
                              <img src="{{ URL::asset("$item->path") }}">
                          </div>
                      @endforeach
                  </div>
              @endforeach


          </div> <!-- End 2 tab-->

          <!-- 1 tab-->
          <div id="one" class="block">
              <div class="tabs_block">
                  <a href="#one">{{Lang::get('constants.wardrobes')}} </a>
                  <b><a href="#two">{{Lang::get('constants.outfits')}} </a></b>
                  <b><a href="#three">{{Lang::get('constants.calendar')}} </a></b>
                  <b><a href="#four">{{Lang::get('constants.search')}} </a></b>
                  <b><a href="#five">{{Lang::get('constants.groups')}} </a></b>
                  <b><a href="#six">{{Lang::get('constants.settings')}} </a></b>
              </div>


              <!-- user's wardrobes -->
              <h2>{{Lang::get('constants.wardrobes')}}</h2>
              <?php

              if (!isset($user_id)){
                  $user_id = Cookie::get('UserId');
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
              {!! Form::submit(Lang::get('constants.new_wardrobe'),array('class'=>'field-wrap button button-block_account')) ; !!}
              {!! Form::close() !!}

          </div><!-- End 1 tab -->

          <!-- End of tabs-->

      </div>

      <script src="{{ asset('js/validation.js') }}"></script>

  @stop