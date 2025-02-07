<?php
require(get_template_directory() . '/include/functions-school.php'); // 学校詳細

// アイキャッチ画像の有効化
add_theme_support('post-thumbnails');

// 本文中の見出しに、アンカータグの受けてとなるidを付与する
function add_id_to_headings($content)
{
	return preg_replace_callback(
		'/<h2>/iU',
		function () {
			static $count = 0;
			$count++;
			return '<h2 id="head-' . $count . '">';
		},
		$content
	);
}
add_filter('the_content', 'add_id_to_headings');
