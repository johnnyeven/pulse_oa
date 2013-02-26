<div id="content">
    <div id="main">

        <div class="pad20">
            <form method="post" action="<?php echo site_url('index1/submit'); ?>" enctype="multipart/form-data" id="myform">
                <!-- Fieldset -->
                <fieldset>
                    <legend>从Excel导入数据</legend>
                    <p>
                        <label for="fileField">选择Excel：</label>
                        <input type="file" name="fileField" id="fileField" />
                    </p>
                    <p>
                        <input class="button" type="submit" value="导入" />
                        <input class="button" type="reset" value="重置" />
                    </p>
                </fieldset>
            </form>
		</div>

	</div>
</div>