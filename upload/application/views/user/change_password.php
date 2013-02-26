<div id="content">
    <div id="main">
    
        <h1>修改密码</h1>
        <div class="pad20">
            <form method="post" action="<?php echo site_url('user/change_password/submit'); ?>" id="myform">
                <fieldset>
                    <legend>修改密码</legend>
                    <p>
                        <label for="orignalPass">输入原密码</label>
                        <input class="mf" name="orignalPass" id="orignalPass" type="text" value="" />
                    </p>
                    <p>
                        <label for="newPass">输入新密码</label>
                        <input class="mf" name="newPass" id="newPass" type="text" value="" />
                    </p>
                    <p>
                        <label for="confirmPass">确认新密码</label>
                        <input class="mf" name="confirmPass" id="confirmPass" type="text" value="" />
                    </p>
                    <p>
                        <input class="button" type="submit" value="提交" />
                        <input class="button" type="reset" value="重置" />
                    </p>
            	</fieldset>
            </form>
        </div>
        
    </div>
</div>