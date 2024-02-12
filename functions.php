<?php



function setup_theme() {
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'setup_theme');


function sub_loop($number = -1, $paged = "") {
  $args = array(
    'post_type' => 'post',
    'posts_per_page' => $number,
    'no_found_rows' => false,
    'paged' => $paged,
  );
  $the_query = new WP_Query($args);

  return $the_query;
}

// Contact Form 7で自動挿入されるPタグ、brタグを削除
add_filter('wpcf7_autop_or_not', 'wpcf7_autop_return_false');
function wpcf7_autop_return_false() {
  return false;
}

//カテゴリーのスラッグ「/category/」を除去
// function exclude_category_slug($termlink, $term, $taxonomy){
//     // カテゴリースラッグから/category/を削除
//     $termlink = str_replace('/category/', '/', $termlink);
//     return $termlink;
// }
// add_filter('term_link', 'exclude_category_slug', 10, 3);


/**
* Comment Control
*/
function comment_fields_control($defaults){
  $defaults['comment_notes_before'] = ''; // コメント上部の文章（メールアドレスが公開されることはありません。）
  $defaults['fields']['author'] = ''; // 名前
  $defaults['fields']['email'] = ''; // メールアドレス
  $defaults['fields']['url'] = ''; // ウェブサイト
  $defaults['label_submit'] = '送信'; // 送信ボタンのラベル
  return $defaults;
}
add_filter( 'comment_form_defaults', 'comment_fields_control');





// 投稿画像に任意のクラスを付与
function add_image_class( $classes ) {
return $classes . ' p-single__add__image';
}
add_filter('get_image_tag_class', 'add_image_class');

// エディタのタグ自動削除を無効化
function my_tiny_mce_before_init( $init_array ) {
    $init_array['valid_elements']          = '*[*]';
    $init_array['extended_valid_elements'] = '*[*]';

    return $init_array;
}
add_filter( 'tiny_mce_before_init' , 'my_tiny_mce_before_init' );


// 記事の自動整形を無効化
remove_filter('the_content', 'wpautop');
// 抜粋の自動整形を無効化
remove_filter('the_excerpt', 'wpautop'); 

//記事のビュー数メタデータを作成・更新する関数
function setPostViews() {
    $post_id = get_the_ID();
    $custom_key = 'post_views_count';
    $view_count = get_post_meta($post_id, $custom_key, true);  //現在のビュー数を取得
    //すでにメタデータがあるかどうかで処理を分ける
    if ($view_count === '') {
        delete_post_meta($post_id, $custom_key);
        add_post_meta($post_id, $custom_key, '0');
    } else {
        $view_count++;
        update_post_meta($post_id, $custom_key, $view_count);
    }
}

//スタイルセレクトボタンを追加
function tinymce_add_buttons( $array ) {
  array_unshift( $array,
    'styleselect'
  );
  return $array;
}
add_filter( 'mce_buttons', 'tinymce_add_buttons' );

//スタイルセレクトの初期設定を変更
function customize_tinymce_settings($mceInit) {
  $style_formats = array(
    array(
      'title' => 'div(段落)',
      'block' => 'div',
      'classes' => 'txt-paragraph',
      'wrapper' => true,
    ),

    array(
      'title' => '見出し3',
      'block' => 'h3',
      'classes' => 'p-single__h3',
    ),
    array(
      'title' => '見出し4',
      'block' => 'h4',
      'classes' => 'p-single__h4',
    ),
    array(
      'title' => 'ノーマルな文章（段落）',
      'block' => 'p',
      'classes' => 'p-single__text'
    ),
    array(
      'title' => 'マーカー',
      'inline' => 'span',
      'classes' => 'p-single__marker',
    ),
    array(
      'title' => 'スライダータイトル',
      'block' => 'p',
      'classes' => 'p-slider__heading',
    ),
    array(
      'title' => '画像（fullsize）',
      'block' => 'figure',
      'classes' => 'p-single__add__image__full',
    ),
    array(
      'title' => '画像（middlesize）',
      'block' => 'figure',
      'classes' => 'p-single__add__image__meddle',
    ),
    array(
      'title' => '目次',
      'block' => 'div',
      'classes' => 'p-index',
    ),
    array(
      'title' => 'ボタン(googleリンク)',
      'inline' => 'a',
      'classes' => 'button',
      'attributes' => array(
        'href' => 'https://google.com'
      ),
      'wrapper' => true,
    ),
    array(
      'title' => '書式設定をリセット',
      'selector' => '*',
      'remove' => 'all',
    ),
  );
  $mceInit['style_formats'] = json_encode( $style_formats );
  return $mceInit;
}
add_filter( 'tiny_mce_before_init', 'customize_tinymce_settings' );



//メニューの出力内容をカスタム
class Walker_Nav_Menu_Custom extends Walker_Nav_Menu {
	function start_el( &$output, $item, $depth = 0, $args = NULL, $id = 0) {
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		$classes = empty( $item->classes ) ? array() : ( array )$item->classes;
		$classes[] = 'menu-item-' . $item->ID;
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
		// 不要なIDを削除してli要素に任意のクラスをつける
		$id = apply_filters( 'nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args, $depth );
		$id = $id ? ' id="' . esc_attr( $id ) . '"': '';
		$class_names = $class_names ? ' class="p-pickup__post"' : '';
		$output .= $indent . '<li' . $class_names . '>';
		$atts = array();
		$atts[ 'title' ] = !empty( $item->attr_title ) ? $item->attr_title : '';
		$atts[ 'target' ] = !empty( $item->target ) ? $item->target : '';
		$atts[ 'rel' ] = !empty( $item->xfn ) ? $item->xfn : '';
		$atts[ 'href' ] = !empty( $item->url ) ? $item->url : '';
		$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );
		$attributes = '';
		foreach ( $atts as $attr => $value ) {
			if ( !empty( $value ) ) {
				$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}
		$item_output = $args->before;
		$item_output .= '<a' . $attributes . '>';
  }}

function init() {
setup_theme();
}

init();