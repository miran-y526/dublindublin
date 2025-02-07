<?php
/*
   * 学校関連ページのfunctions
   */

// カスタムポストタイプ school を追加
add_action('init', 'register_post_type_school');
function register_post_type_school()
{
	register_post_type('school', array(
		'label' => '学校詳細',
		'description' => '学校詳細を登録するポストタイプです',
		'public' => true,
		'menu_position' => 5,
		'menu_icon' => 'dashicons-edit-large',
		'map_meta_cap' => true,
		'has_archive' => true,
		'show_in_rest' => true,
		'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'revisions'),
	));
}

// レッスンのセレクトを表示するショートコード
add_shortcode("add_select_lesson", function () {
	ob_start();
?>
	<div class="select-area">
		<ul class="select-list">
			<?php
			$i = 0;
			global $lesson_array;
			global $lesson_rows;
			$description_array = [];
			foreach ($lesson_rows as $key => $value) {
				$description_array[$value["label_and_description"][0]["label"]] = $value["label_and_description"][0]["description"];
			};
			foreach ($lesson_array as $key => $value) :
				$description = $description_array[$key];
				$description = str_replace('<p>', '', $description);
				$description = str_replace('</p>', '', $description);
			?>
				<li>
					<input type="radio" id="lesson-<?php echo $i; ?>" name="lesson" value="<?php echo $key ?>" <?php if ($i == 0) echo "checked"; ?>>
					<label for="lesson-<?php echo $i; ?>">
						<span class="txt-area">
							<span class="list-title"><?php echo $key ?></span>
							<span><?php echo $description; ?></span>
						</span>
					</label>
				</li>
			<?php
				$i++;
			endforeach;
			?>
		</ul>
	</div>
<?php
	return ob_get_clean();
});

// 宿泊施設のセレクトを表示するショートコード
add_shortcode("add_select_accommodation", function () {
	ob_start();
?>
	<div class="select-area">
		<ul class="select-list">
			<?php
			$i = 0;
			global $accommodation_array;
			global $accommodation_rows;
			$description_array = [];
			foreach ($accommodation_rows as $key => $value) {
				$description_array[$value["label_and_description"][0]["label"]] = $value["label_and_description"][0]["description"];
			};
			foreach ($accommodation_array as $key => $value) :
				$description = $description_array[$key];
				$description = str_replace('<p>', '', $description);
				$description = str_replace('</p>', '', $description);
			?>
				<li>
					<input type="radio" id="accommodation-<?php echo $i; ?>" name="accommodation" value="<?php echo $key ?>" <?php if ($i == 0) echo "checked"; ?>>
					<label for="accommodation-<?php echo $i; ?>">
						<span class="txt-area">
							<span class="list-title"><?php echo $key ?></span>
							<span><?php echo $description; ?></span>
						</span>
					</label>
				</li>
			<?php
				$i++;
			endforeach;
			?>
		</ul>
	</div>
<?php
	return ob_get_clean();
});

// youtubeを挿入した際のタグを変更する
function remove_p_on_iframe($content)
{
	return preg_replace('/(<iframe .*>.*<\/iframe>)/iU', '<div class="iframe-wrapper">\1</div>', $content);
}
add_filter('the_content', 'remove_p_on_iframe');

// カスタムポストタイプ school にカスタムタクソノミー を追加
function re_register_post_tag_taxonomy()
{
	global $wp_rewrite;
	$rewrite = array(
		'slug' => get_option('tag_base') ? get_option('tag_base') : 'tag',
		'with_front' => !get_option('tag_base') || $wp_rewrite->using_index_permalinks(),
		'ep_mask' => EP_TAGS,
	);

	$labels = array(
		'name' => _x('Tags', 'taxonomy general name'),
		'singular_name' => _x('Tag', 'taxonomy singular name'),
		'search_items' => __('Search Tags'),
		'popular_items' => __('Popular Tags'),
		'all_items' => __('All Tags'),
		'parent_item' => null,
		'parent_item_colon' => null,
		'edit_item' => __('Edit Tag'),
		'view_item' => __('View Tag'),
		'update_item' => __('Update Tag'),
		'add_new_item' => __('Add New Tag'),
		'new_item_name' => __('New Tag Name'),
		'separate_items_with_commas' => __('Separate tags with commas'),
		'add_or_remove_items' => __('Add or remove tags'),
		'choose_from_most_used' => __('Choose from the most used tags'),
		'not_found' => __('No tags found.')
	);

	register_taxonomy('school_tag', 'school', array(
		'hierarchical' => true,
		'query_var' => 'school_tag',
		'rewrite' => $rewrite,
		'public' => true,
		'show_ui' => true,
		'show_admin_column' => true,
		'_builtin' => true,
		'labels' => $labels
	));
}
add_action('init', 're_register_post_tag_taxonomy', 1);

// ACF
if (function_exists('acf_add_local_field_group')) :

	acf_add_local_field_group(array(
		'key' => 'group_5e01db64915e1',
		'title' => '学校詳細',
		'fields' => array(
			array(
				'key' => 'field_5e239d6462d34',
				'label' => '学校名',
				'name' => 'school_name',
				'type' => 'text',
				'instructions' => '学校名を記載します（シンプル）',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
			),
			array(
				'key' => 'field_5e134e9212a07',
				'label' => '学校表示順',
				'name' => 'order_index',
				'type' => 'number',
				'instructions' => '学校表示順の設定を行います。数字が大きい方から表示されるようにします。',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => 10,
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'min' => 1,
				'max' => '',
				'step' => '',
			),
			array(
				'key' => 'field_5e01db6a2aad3',
				'label' => '学校画像',
				'name' => 'school_images',
				'type' => 'repeater',
				'instructions' => 'メインのスライドに表示する画像を登録します',
				'required' => 1,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'collapsed' => '',
				'min' => 0,
				'max' => 0,
				'layout' => 'table',
				'button_label' => '',
				'sub_fields' => array(
					array(
						'key' => 'field_5e01db872aad4',
						'label' => '画像',
						'name' => 'school_image',
						'type' => 'image',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'return_format' => 'array',
						'preview_size' => 'medium',
						'library' => 'all',
						'min_width' => '',
						'min_height' => '',
						'min_size' => '',
						'max_width' => '',
						'max_height' => '',
						'max_size' => '',
						'mime_types' => '',
					),
				),
			),
			array(
				'key' => 'field_5e01e32c2e312',
				'label' => '料金シミュレーション',
				'name' => 'price_simulation',
				'type' => 'repeater',
				'instructions' => '料金シミュレーションの値を入力します',
				'required' => 1,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'collapsed' => '',
				'min' => 5,
				'max' => 0,
				'layout' => 'table',
				'button_label' => '',
				'sub_fields' => array(
					array(
						'key' => 'field_5e01e42bec050',
						'label' => '入力カテゴリ',
						'name' => 'row_category',
						'type' => 'select',
						'instructions' => '入力内容を「レッスン、宿泊先、諸経費、週の上限、週の下限」から選択します。',
						'required' => 1,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '10',
							'class' => '',
							'id' => '',
						),
						'choices' => array(
							'lesson' => 'レッスン',
							'accommodation' => '宿泊先',
							'various_expenses' => '諸経費',
							'week_max' => '週の上限',
							'week_min' => '週の下限',
						),
						'default_value' => array(),
						'allow_null' => 0,
						'multiple' => 0,
						'ui' => 0,
						'return_format' => 'value',
						'ajax' => 0,
						'placeholder' => '',
					),
					array(
						'key' => 'field_5e01e38aec04f',
						'label' => 'ラベル名と説明文',
						'name' => 'label_and_description',
						'type' => 'repeater',
						'instructions' => 'レッスン名、宿泊先名、諸経費名etcを入力します。
 週の上限、下限の入力の場合は必要ありません。',
						'required' => 0,
						'conditional_logic' => array(
							array(
								array(
									'field' => 'field_5e01e42bec050',
									'operator' => '==',
									'value' => 'lesson',
								),
							),
							array(
								array(
									'field' => 'field_5e01e42bec050',
									'operator' => '==',
									'value' => 'accommodation',
								),
							),
							array(
								array(
									'field' => 'field_5e01e42bec050',
									'operator' => '==',
									'value' => 'various_expenses',
								),
							),
						),
						'wrapper' => array(
							'width' => '30',
							'class' => '',
							'id' => '',
						),
						'collapsed' => '',
						'min' => 1,
						'max' => 1,
						'layout' => 'block',
						'button_label' => '',
						'sub_fields' => array(
							array(
								'key' => 'field_5e1361fdda52a',
								'label' => 'ラベル名',
								'name' => 'label',
								'type' => 'text',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'default_value' => '',
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'maxlength' => '',
							),
							array(
								'key' => 'field_5e136206da52b',
								'label' => '説明文',
								'name' => 'description',
								'type' => 'textarea',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'default_value' => '',
								'placeholder' => '',
								'maxlength' => '',
								'rows' => 3,
								'new_lines' => 'wpautop',
							),
						),
					),
					array(
						'key' => 'field_5e01e652ec054',
						'label' => '列１',
						'name' => '1',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
					),
					array(
						'key' => 'field_5e01e696ec05a',
						'label' => '列２',
						'name' => '2',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
					),
					array(
						'key' => 'field_5e01e695ec059',
						'label' => '列３',
						'name' => '3',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
					),
					array(
						'key' => 'field_5e01e695ec058',
						'label' => '列４',
						'name' => '4',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
					),
					array(
						'key' => 'field_5e01e694ec057',
						'label' => '列５',
						'name' => '5',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
					),
					array(
						'key' => 'field_5e01e694ec056',
						'label' => '列６',
						'name' => '6',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
					),
					array(
						'key' => 'field_5e01e690ec055',
						'label' => '列７',
						'name' => '7',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
					),
					array(
						'key' => 'field_5e01e74b04d8f',
						'label' => '列８',
						'name' => '8',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
					),
				),
			),
			array(
				'key' => 'field_5e13000252f0f',
				'label' => '４つのポイント',
				'name' => 'four_points',
				'type' => 'repeater',
				'instructions' => '一覧画面にて表示される４つのポイントについて記述します。',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'collapsed' => '',
				'min' => 4,
				'max' => 4,
				'layout' => 'table',
				'button_label' => '',
				'sub_fields' => array(
					array(
						'key' => 'field_5e13008952f11',
						'label' => 'ポイント',
						'name' => 'desc',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
					),
				),
			),
			array(
				'key' => 'field_5e139d6462e34',
				'label' => 'ハイシーズン期間',
				'name' => 'high_season',
				'type' => 'text',
				'instructions' => 'ハイシーズンの期間を記述します。',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '月 日 〜 月 日 ハイシーズン料必要です。',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'school',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
	));

endif;
