<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <!-- Meta -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <?php echo $meta_data; ?>
    <!-- End of Meta -->

    <!-- Page title -->
    <title>Wide Admin</title>
    <!-- End of Page title -->

    <!-- Libraries -->
    <link type="text/css" href="<?php echo $root_path; ?>resources/css/layout.css" rel="stylesheet" />
    <!-- End of Libraries -->
    </head>
    <body>
        <!-- Container -->
        <div id="container">
            <!-- Header -->
            <div id="header">
                <!-- Top -->
                <div id="top">
                    <!-- Logo -->
                    <div class="logo"> 
                        <a href="#" title="Administration Home" class="tooltip"><img src="<?php echo site_url("resources/assets/logo.png"); ?>" alt="Wide Admin" /></a> 
                    </div>
                    <!-- End of Logo -->
                    
                    <!-- Meta information -->
                    <div class="meta">
                        <p>Welcome, Johnatan Doe! <a href="#" title="1 new private message from Elaine!" class="tooltip">1 new message!</a></p>
                        <ul>
                            <li><a href="#" title="End administrator session" class="tooltip"><span class="ui-icon ui-icon-power"></span>Logout</a></li>
                            <li><a href="#" title="Change current settings" class="tooltip"><span class="ui-icon ui-icon-wrench"></span>Settings</a></li>
                            <li><a href="#" title="Go to your account" class="tooltip"><span class="ui-icon ui-icon-person"></span>My account</a></li>
                        </ul>	
                    </div>
                    <!-- End of Meta information -->
                </div>
                <!-- End of Top-->
            </div>
            <!-- End of Header -->

            <!-- Background wrapper -->
            <div id="bgwrap">
                <!-- Main Content -->
                <div style="width:100%;padding-bottom:100px;">
                    <div style="margin:0 30px;padding-top:50px;">
                        <div class="pad20" style="margin:0 auto;">
                                <div class="message <?php if($type==MESSAGE_TYPE_SUCCESS){echo 'success';}else{echo 'error';} ?> close">
                                <h2>提示信息</h2>
                                <p><?php echo $info; ?></p>
                                <p><?php echo $message; ?></p>
                                <p><?php echo $return_content; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of bgwrap -->
        </div>
        <!-- End of Container -->

        <!-- Footer -->
        <div id="footer">
            <p class="mid">
                <a href="#" title="回到顶部" class="tooltip">回到顶部</a>&middot;<a href="#" title="首页" class="tooltip">首页</a>&middot;<a href="#" title="设置" class="tooltip">设置</a>&middot;<a href="#" title="退出登录" class="tooltip">退出</a>
            </p>
            <p class="mid">
                <!-- Change this to your own once purchased -->
                &copy; Johnny Booster 2013. 遵循LGPL开源协议. 可免费用于商业发布.
                <!-- -->
            </p>
        </div>
        <!-- End of Footer -->
    </body>
</html>