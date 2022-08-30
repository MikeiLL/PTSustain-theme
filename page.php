<?php get_header(); ?>

	<div class="greennature-content">

		<!-- Above Sidebar Section-->
		<?php global $greennature_post_option, $above_sidebar_content, $with_sidebar_content, $below_sidebar_content; ?>
		<?php if(!empty($above_sidebar_content)){ ?>
			<div class="above-sidebar-wrapper"><?php greennature_print_page_builder($above_sidebar_content); ?></div>
		<?php } ?>

		<!-- Sidebar With Content Section-->
		<?php
			if( !empty($greennature_post_option['sidebar']) && ($greennature_post_option['sidebar'] != 'no-sidebar' )){
				global $greennature_sidebar;

				$greennature_sidebar = array(
					'type'=>$greennature_post_option['sidebar'],
					'left-sidebar'=>$greennature_post_option['left-sidebar'],
					'right-sidebar'=>$greennature_post_option['right-sidebar']
				);
				$greennature_sidebar = greennature_get_sidebar_class($greennature_sidebar);
		?>
			<div class="with-sidebar-wrapper">
				<div class="with-sidebar-container container">
					<div class="with-sidebar-left <?php echo esc_attr($greennature_sidebar['outer']); ?> columns">
						<div class="with-sidebar-content <?php echo esc_attr($greennature_sidebar['center']); ?> columns">
							<?php
								if( !empty($greennature_post_option['show-content']) && $greennature_post_option['show-content'] != 'disable' ){
									get_template_part('single/content', 'page');
								}
								if( !empty($with_sidebar_content) ){
									greennature_print_page_builder($with_sidebar_content, false);
								}
							?>
						</div>
						<?php get_sidebar('left'); ?>
						<div class="clear"></div>
					</div>
					<?php get_sidebar('right'); ?>
					<div class="clear"></div>
				</div>
			</div>
		<?php
			}else{

				if( empty($greennature_post_option['show-content']) || $greennature_post_option['show-content'] != 'disable' ){
					get_template_part('single/content', 'page');
				}
				if( !empty($with_sidebar_content) ){
					echo '<div class="with-sidebar-wrapper">';
					greennature_print_page_builder($with_sidebar_content);
					echo '</div>';
				}
			}
		?>

		<!-- Below Sidebar Section-->
		<?php if(!empty($below_sidebar_content)){ ?>
			<div class="below-sidebar-wrapper"><?php greennature_print_page_builder($below_sidebar_content); ?></div>
		<?php } ?>

		<?php
			if( comments_open() ){
				echo '<div class="comments-container container" ><div class="comment-item greennature-item">';
				comments_template( '', true );
				echo '</div></div>';
			}
		?>

	</div><!-- greennature-content -->
<?php get_footer(); ?>
