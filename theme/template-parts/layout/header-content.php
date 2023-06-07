<?php

/**
 * Template part for displaying the header content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package thequeenkorea_4
 */

?>

<header id="masthead" class="border-b border-black">

	<div id="top-nav" class="container flex gap-4 px-4 py-4 lg:px-0">
		<a href=""><img src="<?= get_template_directory_uri() ?>/imgs/nb-logo.svg" alt=""></a>
		<a href=""><img src="<?= get_template_directory_uri() ?>/imgs/fb-logo.svg" alt=""></a>
		<a href=""><img src="<?= get_template_directory_uri() ?>/imgs/insta-logo.svg" alt=""></a>
	</div>
	<hr>
	<div id="primary-menu" class="container flex justify-between px-4 py-4 lg:py-6 lg:px-0">
		<div class="flex items-center gap-16 ">
			<div>
				<a href="<?php echo esc_url(home_url('/')); ?>">
					<h1 class="text-xl font-semibold text-black xl:text-3xl font-Instrument"><?php bloginfo('name'); ?></h1>
				</a>
			</div>
			<nav id="site-navigation" aria-label="<?php esc_attr_e('primary-menu', 'thequeenkorea_4'); ?>">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'primary-menu',
						'menu_id'        => 'primary-menu',
						'items_wrap'     => '<ul id="%1$s" class="hidden lg:gap-6 xl:gap-10 xl:text-lg lg:text-sm lg:flex font-Instrument" aria-label="submenu">%3$s</ul>',
					)
				);
				?>
			</nav><!-- #site-navigation -->
		</div>
		<nav class="flex items-center gap-8 uppercase">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'user-menu',
					'menu_id'        => 'user-menu',
					'items_wrap'     => '<ul id="%1$s" class="hidden lg:gap-6 xl:gap-8 xl:text-lg lg:text-sm lg:flex" aria-label="submenu">%3$s</ul>',
				)
			);
			?>
			<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
				<path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
			</svg>
		</nav>
	</div>


</header><!-- #masthead -->