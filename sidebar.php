<div id="sidebar">
  		<ul>
  <!--使侧边栏窗体化-->
  			<?php if(function_exists('dynamic_sidebar') && dynamic_sidebar()): else: ?>
  <!--添加搜索框-->
  			<li id='search'>
  				<?php include(TEMPLATEPATH . '/searchform.php'); ?>
  			</li>
  <!--添加日历模块-->
  			<li id="calendar">
  				<h2><?php _e('Calendar'); ?></h2>
  				<?php get_calendar(); ?>
  			</li>
  <!--调用页面链接列表-->
  			<?php wp_list_pages('depth=3&title_li=<h2>页面</h2>'); ?>
  <!--生成目录-->
  			<li>
  
  				<h2><?php _e('Categories'); ?></h2>
  
  				<ul>
  <!--列表调用函数可以自动为每一条分类生成一个<li>标签，无需手动添加-->
  					<?php wp_list_cats('sort_column=name&optinoncount=1&hierarchical=0'); ?>
  				</ul>
  
  			</li>
  <!--添加文章归档-->
  			<li>
  
  				<h2><?php _e('Archives'); ?></h2>
  
  					<ul>
  <!--调用文章归档函数-->
  						<?php wp_get_archives('type=monthly'); ?>
  					</ul>
  
  			</li>
  <!--调用博客的友情链接列表-->
  			<?php get_links_list(); ?>
  <!--添加功能模块，用户可以通过此模式进行登录-->
  			<li>
  				<h2><?php _e('Meta'); ?></h2>
  				<ul>
  					<?php wp_register(); ?>
  					<li>
  <!--下方函数无法生成列表元素标签，需要手动添加-->
  						<?php wp_loginout(); ?>
  					</li>
  					<?php wp_meta(); ?>
  				</ul>
  			</li>
  			<?php endif; ?>
  		</ul>
</div>