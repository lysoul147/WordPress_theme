<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head profile="http://gmpg.org/xfn/11">

	<title><?php bloginfo('name'); ?><?php wp_title(); ?></title>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats please -->
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />



	<?php wp_get_archives('type=monthly&format=link'); ?>

	<?php //comments_popup_script(); // off by default ?>

	<?php wp_head(); ?>

</head>

<body>

	<div id="header">
<!--生成博客标题和添加首页链接-->
		<h1><a name="topic-3" href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>
<!--调用博客信息函数中的博客短描述-->
		<?php bloginfo('description'); ?>
	</div>
<!--生成博客的主循环，检测博客中是否有日志-->
	<div id="container">
	  <?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>

			<div class="post" id="post-<?php the_id(); ?>">
				<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>

					<div class="entre">
						<?php the_content(); ?>

							<p class="postmetadata">
							<?php _e('Filed under&#58;'); ?> <?php the_category(', ') ?> <?php _e('by'); ?> <?php  the_author(); ?><br />
							<?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?> <?php edit_post_link('Edit', ' &#124; ', ''); ?>
							</p>

					</div>
			</div>

			<?php endwhile; ?>
<!--文章的分页符号-->
				<div class="navigation">
					<?php posts_nav_link(); ?>
				</div>

			<?php else : ?>
<!--无文章时返回的信息-->
			 		<div class="post" >
			 		<h2><?php _e('Not_found'); ?></h2>
					</div>

		<?php endif; ?>
	</div>
<!--创建侧边栏div-->
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

<!--添加底部栏，包括版权信息，设计师名称-->
	<div id="footer">
		<p>
			Copyright © 2016 <?php bloginfo('name'); ?>
		</p>
	</div>

</body>

</html>