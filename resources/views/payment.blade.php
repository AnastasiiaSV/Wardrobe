<div class="page">

    <div class="login_form">

        <ul class="tab-group">
            <li class="tab active"><a href="#card"><?php print card; ?></a></li>
            <li class="tab"><a href="#account"><?php print bill; ?></a></li>
        </ul>

        <div class="tab-content">

            <div id="card">

                <form action="basket" method="post" class = "payment">
                    <p><?php print total; ?>: <b>5</b> <?php print dollar; ?></p>
                    <hr/>

                    <div class="field-wrap">
                        <label>
                            <?php print card_number; ?> <span class="req">*</span>
                        </label>
                        <input type="email" name="email_login" placeholder='<?php print type_your; ?> <?php print card_number; ?>'  autocomplete="on" required />
                    </div>

                    <div class="top-row">
                    <div class="field-wrap">
                        <label>
                            <?php print card_key; ?><span class="req">*</span>
                        </label>
                        <input type="password" name="password_login" placeholder='<?php print type_your; ?> <?php print card_key; ?>' required autocomplete="off"/>
                    </div>
                    </div>
                        <br>
                    <button type="submit" name="login_button" value="<?php print pay; ?>" class="button button-block"/><?php print pay; ?></button>

                </form>

            </div>

            <!--Блок д. регистрации-->
            <div id="account">

                <form action="basket" method="post" class="payment">
                    <p><?php print total; ?>: <b>5</b> <?php print dollar; ?></p>
                    <hr/>

                        <div class="field-wrap payment" >
                            <p> <?php print current_salary;?>: <b>10</b> <?php print dollar; ?></p>
                        </div>

                    <button type="submit" name="login_button" value="<?php print pay; ?>" class="button button-block"/><?php print pay; ?></button>

                </form>


            </div>

        </div><!-- tab-content -->

    </div> <!-- /form -->


    <script src="js/login.js"></script>

</div>
