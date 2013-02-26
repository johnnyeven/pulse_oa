				<div id="top">
					<!-- Logo -->
					<div class="logo"> 
						<a href="#" title="管理首页" class="tooltip"><img src="<?php echo site_url("resources/assets/logo.png"); ?>" alt="管理首页" /></a> 
					</div>
					<!-- End of Logo -->
					
					<!-- Meta information -->
					<div class="meta">
						<p>欢迎回来，<?php echo $user->account_name; ?> <a href="#" title="1 new private message from Elaine!" class="tooltip">1 new message!</a></p>
						<ul>
							<li><a href="<?php echo site_url("login/out"); ?>" title="退出" class="tooltip"><span class="ui-icon ui-icon-power"></span>退出</a></li>
							<li><a href="<?php echo site_url("admin/index"); ?>" title="管理首页" class="tooltip"><span class="ui-icon ui-icon-person"></span>管理首页</a></li>
						</ul>	
					</div>
					<!-- End of Meta information -->
				</div>