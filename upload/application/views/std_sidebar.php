				<div id="sidebar">
						
					<h2>日历</h2>
					<!-- Datepicker -->
					<div id="datepicker"></div>
					<!-- End of Datepicker -->
					
					<!-- Lists -->
					<h2>功能菜单</h2>
					<ul id="left_navigation">
						<li><a href="<?php echo site_url("index"); ?>">控制台首页</a></li>
						<li><a href="javascript:void(0)">个人信息</a>
							<ul<?php if(in_array($page_name, array('user/pay', 'user/account_number', 'user/change_password'))): ?> class="current"<?php endif; ?>>
								<li><a href="<?php echo site_url("user/pay"); ?>">工资查询</a></li>
								<li><a href="<?php echo site_url("user/account_number"); ?>">绑定工号</a></li>
								<li class="last"><a href="<?php echo site_url("user/change_password"); ?>">修改密码</a></li>
							</ul>
						</li>
					</ul>
					<!-- End of Lists -->
				</div>