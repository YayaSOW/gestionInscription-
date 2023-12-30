<div class="connexion">
        <form action="<?=WEBROOT?>" method="post">
            <h2 class="log">Login</h2>
            <div class="emai">
                <label for="email">Email Or Username</label>
                <div>
                    <input name="email" class="enter" placeholder="Enter Email">
                </div>
            </div>
            <div class="password">
                <label for="password">Password</label>
                <div>
                    <input name="password" class="enter" placeholder="Enter Password">
                </div>
            </div>
            <div class="check">
                <div class="remen">
                    <input class="checked" type="checkbox"><span class="che">Remember Me</span>
                </div>
                <div class="forget">
                    <a href=""><span class="che">Forget Password?</span></a>
                </div>
            </div>
            <div class="login">
                <button type="submit" name="action" value="form-login">Login</button>
            </div>
            <div class="create">
                <a href="">Create an Account</a>
            </div>
        </form>
    </div>