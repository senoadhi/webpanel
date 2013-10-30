<div id="login-holder">
    <div id="logo-login">
    </div>
    <div class="clear"></div>

    <form action="/login" method="POST">

        <div id="loginbox">
            <div id="login-inner">
                <table border="0" cellpadding="0" cellspacing="0">
                    <tr>
                        <th>Username</th>
                        <td>
                            <input class="login-inp" type="text" name="username" value="<?php echo $_COOKIE['remember_me']?>"/>
                            <?php echo form_error('username','<div style="color: red;">', '</div>');?>
                        </td>
                    </tr>
                    <tr>
                        <th>Password</th>
                        <td>
                            <input type="password" onfocus="this.value=''" class="login-inp" name="password"/>
                            <?php echo form_error('password','<div style="color: red;">', '</div>');?>
                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <td valign="top">
                            <input type="checkbox" class="checkbox-size" id="login-check" value="1" name="remember"/>
                            <label for="login-check">Remember me</label>
                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <td><input type="submit" class="submit-login"  /></td>
                    </tr>
                </table>
            </div>
            <div class="clear"></div>
            <a href="" class="forgot-pwd">Forgot Password?</a>
        </div>
    </form>
    <form>
        <div id="forgotbox">
            <div id="forgotbox-text">Please send us your email and we'll reset your password.</div>
            <div id="forgot-inner">
                <table border="0" cellpadding="0" cellspacing="0">
                    <tr>
                        <th>Email address:</th>
                        <td><input type="text" value=""   class="login-inp" /></td>
                    </tr>
                    <tr>
                        <th> </th>
                        <td><input type="button" class="submit-login"  /></td>
                    </tr>
                </table>
            </div>
            <div class="clear"></div>
            <a href="" class="back-login">Back to login</a>
        </div>
    </form>
</div>
