<div id="content">
    <div id="main">
    
        <h1>工资查询</h1>
        <div class="pad20">
        	<table class="fullwidth" cellpadding="0" cellspacing="0" border="0">
                <thead>
                    <tr>
                        <td>月份</td>
                        <td>姓名</td>
                        <td>部门</td>
                        <td>基本工资</td>
                        <td>岗位工资</td>
                        <td>岗位津贴</td>
                        <td>工龄工资</td>
                        <td>保密费</td>
                        <td>午餐补贴</td>
                        <td>元旦加班费</td>
                        <td>工资总额</td>
                        <td>养老保险</td>
                        <td>医疗险</td>
                        <td>失业险</td>
                        <td>公积金</td>
                        <td>小计</td>
                        <td>扣款</td>
                        <td>税前应发</td>
                        <td>代扣个税</td>
                        <td>本月实发</td>
                    </tr>
                </thead>
                <tbody>
                <?php if(!empty($result)): ?>
					<?php foreach($result as $row): ?>
                    <tr>
                        <td><?php echo substr($row->date, 0, 7); ?></td>
                        <td><?php echo $row->account_name; ?></td>
                        <td><?php echo $row->account_department; ?></td>
                        <td><?php echo number_format(intval($row->pay_base) / 100, 2); ?></td>
                        <td><?php echo number_format(intval($row->pay_gangwei) / 100, 2); ?></td>
                        <td><?php echo number_format(intval($row->pay_jingtie) / 100, 2); ?></td>
                        <td><?php echo number_format(intval($row->pay_gongling) / 100, 2); ?></td>
                        <td><?php echo number_format(intval($row->pay_baomi) / 100, 2); ?></td>
                        <td><?php echo number_format(intval($row->pay_canbu) / 100, 2); ?></td>
                        <td><?php echo number_format(intval($row->pay_jiaban) / 100, 2); ?></td>
                        <td><?php echo number_format(intval($row->pay_basetotal) / 100, 2); ?></td>
                        <td><?php echo number_format(intval($row->pay_yanglao) / 100, 2); ?></td>
                        <td><?php echo number_format(intval($row->pay_yiliao) / 100, 2); ?></td>
                        <td><?php echo number_format(intval($row->pay_shiye) / 100, 2); ?></td>
                        <td><?php echo number_format(intval($row->pay_gongjijin) / 100, 2); ?></td>
                        <td><?php echo number_format(intval($row->pay_shuitotal) / 100, 2); ?></td>
                        <td><?php echo number_format(intval($row->pay_fakuan) / 100, 2); ?></td>
                        <td><?php echo number_format(intval($row->pay_shuiqian) / 100, 2); ?></td>
                        <td><?php echo number_format(intval($row->pay_geshui) / 100, 2); ?></td>
                        <td><?php echo number_format(intval($row->pay_total) / 100, 2); ?></td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                	<tr>
                    	<td colspan="20">没有工资信息</td>
                    </tr>
                <?php endif; ?>
                </tbody>
                <tfoot>
                	<tr>
                    	<td colspan="20"><?php echo $pagination; ?></td>
                    </tr>
                </tfoot>
            </table>
        </div>
        
    </div>
</div>