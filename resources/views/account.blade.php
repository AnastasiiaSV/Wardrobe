@extends('layouts.index')
  @section('title', 'WARDROBE')
  @section('content')

      <div class="page">
          <div class="login_form">
              <ul class="tab-group">
                  <li class="tab active"><a href="#login">login</a></li>
                  <li class="tab"><a href="#signup">sign up</a></li>
              </ul>

              <div class="tab-content">

                  <div id="login">

                      {!! Form::open(['action' => ['AccountController@gotoWardrobe']]);!!}
                      {!! Form::submit('LOGIN') ; !!}
                      {!! Form::close() !!}

                  </div>

                  <!--Блок д. регистрации-->
                  <div id="signup">


                  </div>
              </div><!-- tab-content -->
          </div> <!-- /form -->

          <script src={{ URL::asset('js/login.js') }}></script>
          @yield('scripts')
      </div>


  @stop