<div class="page">

    <div class="login_form">

        <ul class="tab-group">
            <li class="tab active"><a href="#login"><?php print login; ?></a></li>
            <li class="tab"><a href="#signup"><?php print sign_up; ?></a></li>
        </ul>

        <div class="tab-content">

            <div id="login">

                <form action="account" method="post">

                    <div class="field-wrap">
                        <label>
                            <?php print email; ?> <span class="req">*</span>
                        </label>
                        <input type="email" name="email_login" placeholder='<?php print type_your; ?> <?php print email; ?>'  autocomplete="on" required />
                    </div>

                    <div class="field-wrap">
                        <label>
                            <?php print password; ?><span class="req">*</span>
                        </label>
                        <input type="password" name="password_login" placeholder='<?php print type_your; ?> <?php print password; ?>' required autocomplete="off"/>
                    </div>

                    <p class="login_page_href"><a href="#"><?php print forgot; ?></a></p>

                    <button type="submit" name="login_button" value="<?php print login; ?>" class="button button-block"/><?php print login; ?></button>

                </form>

            </div>

<!--Блок д. регистрации-->
            <div id="signup">

                <form action="account" method="post">


                    <div class="top-row">
                        <div class="field-wrap">
                            <label>
                                <?php print name; ?><span class="req">*</span>
                            </label>
                            <input type="text" name="name" placeholder='<?php print type_your; ?> <?php print name; ?>' required autocomplete="on" />
                        </div>

                        <div class="field-wrap">
                            <label>
                                <?php print surname; ?><span class="req">*</span>
                            </label>
                            <input type="text" name="surname" placeholder='<?php print type_your; ?> <?php print surname; ?>' required autocomplete="on"/>
                        </div>
                    </div>

                    <div class="top-row">
                        <div class="field-wrap">
                            <label>
                                <?php print date_of_birth; ?><span class="req">*</span>
                            </label>
                            <input type="date" name="date_of_birth" placeholder='yyyy-mm-dd' />

                        </div>

                        <div class="field-wrap">
                            <label>
                                <?php print phone; ?><span class="req">*</span>
                            </label>
                            <input type="text" name="phone" placeholder='<?php print type_your; ?> <?php print phone; ?>' required autocomplete="on"/>
                        </div>
                    </div>


                    <div class="field-wrap">
                        <label>
                            <?php print email; ?><span class="req">*</span>
                        </label>
                        <input type="email" name="email_signup" placeholder='<?php print type_your; ?> <?php print email; ?>' required autocomplete="off"/>
                    </div>

                    <div class="field-wrap">
                        <label>
                            <?php print password; ?><span class="req">*</span>
                        </label>
                        <input type="password" name="password_signup" placeholder='<?php print type_your; ?> <?php print password; ?>' required autocomplete="off"/>
                    </div>



                    <button type="submit" name="signup_button" class="button button-block"/><?php print start; ?></button>

                </form>


            </div>

        </div><!-- tab-content -->

    </div> <!-- /form -->


    <script src="js/login.js"></script>
    @yield('scripts')

</div>
