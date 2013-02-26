<div id="content">
    <div id="main">
    
        <h1>绑定工号</h1>
        <div class="pad20">
        	<?php if(!empty($user->account_number)): ?>
            <p>工号已绑定：<span style="font-size:14px;font-weight:bold;color:#F00;"><?php echo $user->account_number ?></span></p>
            <?php else: ?>
            <form method="post" action="<?php echo site_url('user/account_number/submit'); ?>" id="myform">
                <fieldset>
                    <legend>绑定工号</legend>
                    <p>
                        <label for="accountNumber">输入要绑定的工号</label>
                        <input class="mf" name="accountNumber" id="accountNumber" type="text" value="" />
                    </p>
                    <p>
                        <input class="button" type="submit" value="绑定" />
                        <input class="button" type="reset" value="重置" />
                    </p>
            	</fieldset>
            </form>
            <?php endif; ?>
        </div>
        
    </div>
</div>