<div id="content">
    <div id="main">

        <div class="pad20">
            <form method="post" action="<?php echo site_url('admin/import_pay/submit'); ?>" enctype="multipart/form-data" id="myform">
                <!-- Fieldset -->
                <fieldset>
                    <legend>从Excel导入数据</legend>
                    <p>
                        <label for="payYear">选择年份：</label>
                        <select name="payYear" id="payYear" class="dropdown">
                        	<?php $currentYear = intval(date('Y')); ?>
                            <?php for($i=$currentYear-2; $i<=$currentYear; $i++): ?>
                            <option value="<?php echo $i; ?>" <?php if($i==$currentYear): ?>selected="selected"<?php endif; ?>><?php echo $i; ?></option>
                            <?php endfor; ?>
                            <?php for($i=$currentYear+1; $i<=$currentYear+5; $i++): ?>
                            <option value="<?php echo $i; ?>" <?php if($i==$currentYear): ?>selected="selected"<?php endif; ?>><?php echo $i; ?></option>
                            <?php endfor; ?>
                        </select>
                    </p>
                    <p>
                        <label for="payMonth">选择月份：</label>
                        <select name="payMonth" id="payMonth" class="dropdown">
                            <option value="1" <?php if(date('n')=='1'): ?>selected="selected"<?php endif; ?>>1</option>
                            <option value="2" <?php if(date('n')=='2'): ?>selected="selected"<?php endif; ?>>2</option>
                            <option value="3" <?php if(date('n')=='3'): ?>selected="selected"<?php endif; ?>>3</option>
                            <option value="4" <?php if(date('n')=='4'): ?>selected="selected"<?php endif; ?>>4</option>
                            <option value="5" <?php if(date('n')=='5'): ?>selected="selected"<?php endif; ?>>5</option>
                            <option value="6" <?php if(date('n')=='6'): ?>selected="selected"<?php endif; ?>>6</option>
                            <option value="7" <?php if(date('n')=='7'): ?>selected="selected"<?php endif; ?>>7</option>
                            <option value="8" <?php if(date('n')=='8'): ?>selected="selected"<?php endif; ?>>8</option>
                            <option value="9" <?php if(date('n')=='9'): ?>selected="selected"<?php endif; ?>>9</option>
                            <option value="10" <?php if(date('n')=='10'): ?>selected="selected"<?php endif; ?>>10</option>
                            <option value="11" <?php if(date('n')=='11'): ?>selected="selected"<?php endif; ?>>11</option>
                            <option value="12" <?php if(date('n')=='12'): ?>selected="selected"<?php endif; ?>>12</option>
                        </select>
                    </p>
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