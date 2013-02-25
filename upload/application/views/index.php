<div id="content">
    <div id="main">
        <h1>欢迎回来，<span><?php echo $user->account_name; ?></span></h1>
        <p>快速链接</p>
        
        <div class="pad20">
        <!-- Big buttons -->
            <ul class="dash">
                <li>
                    <a href="<?php echo site_url("user/pay"); ?>" title="工资查询" class="tooltip">
                        <img src="<?php echo site_url("resources/assets/icons/Emblem-Money-48.png"); ?>" alt="" />
                        <span>工资查询</span>
                    </a>
                </li>
            </ul>
            <!-- End of Big buttons -->
        </div>
    
        <hr />
                    
        <h1>总览</h1>
        <div class="pad20">
        
            <!-- Three columns content -->
            <div id="columns" class="sortable">
            
                <!-- Column one -->
                <div class="cols2 column">
                    <div class="portlet ui-widget ui-widget-content ui-helper-clearfix ui-corner-all">
                        <div class="portlet-header">Dummy content 1</div>
                        <div class="portlet-content">
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu orci quam, vitae molestie nulla. Etiam tempus suscipit imperdiet. Nam vitae purus neque, nec placerat dui. Aenean tristique sapien metus. Mauris tempus arcu vel sapien tristique vitae sagittis nisi hendrerit.</p>	
                        </div>
                    </div>
                </div>
                <!-- End of Column one -->
                
                <!-- Column two -->
                <div class="cols2 column">
                    <div class="portlet ui-widget ui-widget-content ui-helper-clearfix ui-corner-all">
                        <div class="portlet-header">Dummy content 2</div>
                        <div class="portlet-content">
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p>
                            <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.</p>
                            <p>Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus.</p>
                        </div>
                    </div>
                    
                    <div class="portlet ui-widget ui-widget-content ui-helper-clearfix ui-corner-all">
                        <div class="portlet-header">Dummy content 4</div>
                        <div class="portlet-content">
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p>
                            <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.</p>
                            <p>Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus.</p>
                        </div>
                    </div>
                </div>
                <!-- End of Column two -->
                
            </div>
            <!-- End of Three columns content -->
        </div>
        
        <hr />
        
    </div>
</div>