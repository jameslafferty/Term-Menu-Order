<?php

class NS_TMO_Plugin {
	
	private static $form_field_name = 'ns_tmo_menu_order';
	
	private static $instance;
	
	private static $name = 'NS_TMO_Plugin';
	
	private static $plugin_path;
	
	private static $taxonomies;
	
	private function __construct () {
		
		self::$plugin_path = realpath(dirname(__FILE__) . '/../term-menu-order.php');
		
		wp_deregister_script('inline-edit-tax');
		
		wp_register_script('inline-edit-tax', plugins_url() . '/term-menu-order/js/custom_inline_edit_tax.js');
		
		register_activation_hook(self::$plugin_path, array(&$this, 'activate'));

		register_deactivation_hook(self::$plugin_path, array(&$this, 'deactivate'));
		
		add_action('after_setup_theme', array(&$this, 'init'));
		
	}
	
	public function add_column_header ($columns) {
		
		$columns['menu_order'] = __('Order');
		
		return $columns;
 		
	}
	
	public function add_column_value ($empty = '', $custom_column, $term_id) {
		
		$taxonomy = (isset($_POST['taxonomy'])) ? $_POST['taxonomy'] : $_GET['taxonomy'];
		
		$term = get_term($term_id, $taxonomy);
		
		return $term->$custom_column;
		
	}
	
	public function add_edit_menu_order ($term_id) {
		
		global $wpdb;
		
		if (isset($_POST[self::$form_field_name])) {
			
			$wpdb->update($wpdb->terms, array('menu_order' => $_POST[self::$form_field_name]), array('term_id' => $term_id));
			
		}
		
	}
	
	public function menu_order_add_form_field () {
		
		$form_field = '<div class="form-field"><label for="' . self::$form_field_name . '">' . __('Order') . '</label><input name="' . self::$form_field_name . '" id="' . self::$form_field_name . '" type="text" value="0" size="10" /><p>' . __('This works like the &#8220;Order&#8220; field for pages.') . '</p></div>';
		
		echo $form_field;
		
	}
	
	public function menu_order_edit_form_field ($term) {
		
		$form_field = '<tr class="form-field"><th scope="row" valign="top"><label for="' . self::$form_field_name . '">' . __('Order')  . '</label></th><td><input name="' . self::$form_field_name . '" id="' . self::$form_field_name . '" type="text" value="' . $term->menu_order . '" size="10" /><p class="description">' . __('This works like the &#8220;Order&#8220; field for pages.') .'</p></td></tr>';
		
		echo $form_field;
		
	}
	
	public function quick_edit_menu_order () {
		
		$menu_order_field = '<fieldset><div class="inline-edit-col"><label><span class="title">' . __( 'Order' ) . '</span><span class="input-text-wrap"><input class="ptitle" name="'. self::$form_field_name . '" type="text" value="" /></span></label></div></fieldset>';
		
		$menu_order_field .= '<script type="text/javascript">
		
		</script>';
		
		echo $menu_order_field;
		
	}
	
	/**
	 *
	*/
	public function get_instance () {
		
		if (empty(self::$instance)) {
			
			self::$instance = new self::$name;
			
		}
		
		return self::$instance;
		
	}
	
	public function activate () {
		
		global $wpdb;
		
		$sql = "ALTER TABLE `{$wpdb->terms}` ADD `menu_order` INT (11) NOT NULL DEFAULT 0;";
		
		$wpdb->query($sql);
		
	}
	
	public function deactivate () {
		
		global $wpdb;
		
		$sql = "ALTER TABLE `{$wpdb->terms}` DROP COLUMN `menu_order`;";
		
		$wpdb->query($sql);
		
	}
	
	public function init () {
		
		self::$taxonomies = get_taxonomies();
		
		foreach (self::$taxonomies as $key => $value) {
			
			add_filter("manage_edit-{$value}_columns", array(&$this, 'add_column_header'));
			add_filter("manage_{$value}_custom_column", array(&$this, 'add_column_value'), 10, 3);
			
			add_action("{$value}_add_form_fields", array(&$this, 'menu_order_add_form_field'));
			add_action("{$value}_edit_form_fields", array(&$this, 'menu_order_edit_form_field'));
			
		}
		
		add_filter("manage_edit-tags_columns", array(&$this, 'add_column_header'));
		
		add_action('create_term', array(&$this, 'add_edit_menu_order'));
		
		add_action('edit_term', array(&$this, 'add_edit_menu_order'));
		
		add_action('quick_edit_custom_box', array(&$this, 'quick_edit_menu_order'), 10, 3);
		
	}
	
}

?>