<?php
/*
Plugin Name:Structured Data
Plugin URI: https://gotoyusuke.com/
Description: 構造化データを追加できるシンプルなプラグインです。
Version: 1.0
Author: Yusuke Goto
Author URI: https://gotoyusuke.com/
Text Domain: Yusuke Goto
*/

require_once trailingslashit( dirname( __FILE__ ) ) . 'includes/qa.php';

function add_structured_fields() {
	add_meta_box( 'structured',
				            '構造化データ',
				            'insert_structured_fields',
				            'post',
				            'normal'
        );
}
add_action('admin_menu', 'add_structured_fields');

function insert_structured_fields() {
	global $post;

	$str = '-----<b>Q&A</b>-----<br>';
	$str.= 'Q1： <input type="text" name="q1" value="'.get_post_meta($post->ID, 'q1', true).'" size="30" /><br>';
	$str.= 'A1： <input type="text" name="a1" value="'.get_post_meta($post->ID, 'a1', true).'" size="30" /><br>';
	$str.= 'Q2： <input type="text" name="q2" value="'.get_post_meta($post->ID, 'q2', true).'" size="30" /><br>';
	$str.= 'A2： <input type="text" name="a2" value="'.get_post_meta($post->ID, 'a2', true).'" size="30" /><br>';
	$str.= 'Q3： <input type="text" name="q3" value="'.get_post_meta($post->ID, 'q3', true).'" size="30" /><br>';
	$str.= 'A3： <input type="text" name="a3" value="'.get_post_meta($post->ID, 'a3', true).'" size="30" /><br>';

	echo $str;
}

// カスタムフィールドの値を保存
function save_structured_fields($post_id) {
if(!empty($_POST['q1'])){
		update_post_meta($post_id, 'q1', $_POST['q1'],get_post_meta($post_id, 'q1', true));
	}else{
		delete_post_meta($post_id, 'q1');
	}
if(!empty($_POST['a1'])){
		update_post_meta($post_id, 'a1', $_POST['a1'],get_post_meta($post_id, 'a1', true));
	}else{
		delete_post_meta($post_id, 'a1');
	}
if(!empty($_POST['q2'])){
		update_post_meta($post_id, 'q2', $_POST['q2'],get_post_meta($post_id, 'q2', true));
	}else{
		delete_post_meta($post_id, 'q2');
	}
if(!empty($_POST['a2'])){
		update_post_meta($post_id, 'a2', $_POST['a2'],get_post_meta($post_id, 'a2', true));
	}else{
		delete_post_meta($post_id, 'a2');
	}
if(!empty($_POST['q3'])){
		update_post_meta($post_id, 'q3', $_POST['q3'],get_post_meta($post_id, 'q3', true));
	}else{
		delete_post_meta($post_id, 'q3');
	}
if(!empty($_POST['a3'])){
		update_post_meta($post_id, 'a3', $_POST['a3'],get_post_meta($post_id, 'a3', true));
	}else{
		delete_post_meta($post_id, 'a3');
	}
}
add_action('save_post', 'save_structured_fields');