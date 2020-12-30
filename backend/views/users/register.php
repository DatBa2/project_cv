<?php
/**
 * views/users/register.php
 */
?>

<div class="row">
    <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
        <div class="login-panel panel panel-default">
            <div class="panel-heading"><h4>Register</h4></div>
            <div class="panel-body">
                <form method="post" action="" role="form">
                    <fieldset>
                        <div class="form-group">
                            <input class="form-control" placeholder="E-mail" name="username" type="email" autofocus="">
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="Password" name="password" type="password" value="">
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="RePassword" name="repassword" type="password" value="">
                        </div>
                        <div class="checkbox">
                            <label>
                                <input name="remember" type="checkbox" value="Remember Me">Remember Me
                            </label>
                        </div>
                        <input class="btn btn-primary" type="submit" value="Register" name="register"></fieldset>
                </form>
                <div>
                    <a href="index.php?controller=user&action=login">
                        Quay lại
                    </a></div>
            </div>
        </div>
    </div>
</div>
