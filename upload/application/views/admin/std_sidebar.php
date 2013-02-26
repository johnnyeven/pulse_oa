				<div id="sidebar">
                
					<h2>地图</h2>
					<a href="<?php echo site_url("index"); ?>" class="button tooltip" title="This is a random button"><span class="ui-icon ui-icon-arrowthick-1-w"></span>回到工作平台</a>
					
					<!-- Lists -->
					<h2>功能菜单</h2>
					<ul id="left_navigation">
						<li><a href="<?php echo site_url("admin/index"); ?>">控制台首页</a></li>
						<li><a href="javascript:void(0)">工资管理</a>
							<ul<?php if(in_array($page_name, array('admin/import_pay'))): ?> class="current"<?php endif; ?>>
								<li class="last"><a href="<?php echo site_url("admin/import_pay"); ?>">从Excel导入工资数据</a></li>
							</ul>
						</li>
					</ul>
					<!-- End of Lists -->
				</div>