<?php

/**
 * Template part for displaying the footer content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package thequeenkorea_4
 */

?>

<footer id="colophon" class="py-16 bg-slate-50">
	<div class="container flex flex-col gap-8">
		<?php if (has_nav_menu('footer-menu')) : ?>
			<nav aria-label="<?php esc_attr_e('Footer Menu', 'thequeenkorea_4'); ?>">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'footer-menu',
						'menu_class'     => 'grid md:grid-cols-2 lg:grid-cols-4 px-4 gap-8 font-Instrument font-semibold text-slate-800',
						'menu_id' 		 => 'footer-menu',
						'depth'          => 2,
						'container'		 => false,
					)
				);
				?>
			</nav>
		<?php endif; ?>
		<hr>
		<div class="flex justify-center gap-4">
			<a href=""><img src="<?= get_template_directory_uri() ?>/imgs/nb-logo.svg" alt=""></a>
			<a href=""><img src="<?= get_template_directory_uri() ?>/imgs/fb-logo.svg" alt=""></a>
			<a href=""><img src="<?= get_template_directory_uri() ?>/imgs/insta-logo.svg" alt=""></a>
		</div>
		<hr>
		<div id="business-info" class="flex flex-col justify-center gap-1 text-center sm:hidden">
			<p class="font-semibold">© COPYRIGHT 2023 THE QUEEN KOREA.</p>
			<p class="mb-4 font-semibold">ALL RIGHTS RESERVED.</p>
			<ul class="flex flex-col gap-2 text-sm">
				<li>주식회사 더퀸코리아</li>
				<li>대표자: 김은영 </li>
				<li>사업자번호 : 000-00-0000</li>
				<li>통신판매업: 2023-서울노원-0000</li>
				<li>개인정보보호책임자: 김은영 </li>
				<li>이메일: info@thequeenkorea.com</li>
				<li>주소: 서울시 노원구 인덕대학교</li>
			</ul>
		</div>
		<div id="business-info-lg" class="flex-col justify-center hidden gap-4 text-center sm:flex">
			<p class="font-semibold">© COPYRIGHT 2023 THE QUEEN KOREA. ALL RIGHTS RESERVED.</p>
			<div class="flex flex-col gap-2 text-sm">
				<p>주식회사 더퀸코리아 | 대표자: 김은영 | 사업자번호 : 000-00-0000</p>
				<p>통신판매업: 2023-서울노원-0000 | 개인정보보호책임자: 김은영 | 이메일: info@thequeenkorea.com</p>
				<p>주소: 서울시 노원구 인덕대학교</p>
			</div>
		</div>
	</div>

</footer><!-- #colophon -->