		<?php get_header(); ?>
  <!--生成博客的主循环，检测博客中是否有日志-->
  	<div id="container">
  	  <?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
  
  			<div class="post" id="post-<?php the_id(); ?>">
  				<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
  
  					<div class="entry">
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
  	<?php get_sidebar(); ?>
  
  <!--添加底部栏，包括版权信息，设计师名称-->
  	<div id="footer">
  		<p>
  		Copyright © 2016 <?php bloginfo('name'); ?> &nbsp;&nbsp;&nbsp Designed by lysoul
  		</p>
  	</div>

	</div>

</body>

</html>