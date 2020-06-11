<?php

/**
 * The menu form fields for the navigation
 *
 * @link       https://cliquestudios.com/
 * @since      1.0.0
 *
 * @package    Nysba_Nav
 * @subpackage Nysba_Nav/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Nysba_Nav
 * @subpackage Nysba_Nav/admin
 * @author     Nick Makris | Clique Studios <nmakris@cliquestudios.com>
 */
class Nysba_Form_Fields
{
	
	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string $plugin_name The ID of this plugin.
	 */
	private $plugin_name;
	
	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string $version The current version of this plugin.
	 */
	private $version;
	
	/**
	 * Initialize the class and set its properties.
	 *
	 * @param string $plugin_name The name of this plugin.
	 * @param string $version     The version of this plugin.
	 *
	 * @since    1.0.0
	 */
	public function __construct($plugin_name, $version)
	{
		
		$this->plugin_name = $plugin_name;
		$this->version     = $version;
	}
	
	/**
	 * Adds custom meta fields to nav menu admin UI
	 *
	 * @param string $item_id The ID of the menu item.
	 * @param object $item    Menu item.
	 *
	 * @return string HTML of form fields.
	 * @package Nysba_Nav
	 *
	 * @since   1.0.0
	 *
	 */
	// public function csnw_add_megamenu_fields($item_id, $item, $depth, $args)
	public function nysba_add_megamenu_fields($item_id, $item)
	{ ?>

		<p class="field-submenu-anchor-class description description-wide custom-meta-field" data-menu-id="<?= $item_id; ?>">
			<label for="edit-menu-item-submenu-anchor-class-<?php echo $item_id; ?>"><?= __('Anchor Classes (Optional)', 'nysba-nav'); ?></label>
			<input type="text" id="edit-menu-item-submenu-anchor-class-<?php echo $item_id; ?>" class="widefat code edit-menu-item-anchor-class" value="<?= $item->nysba_submenu_tab_child_id ?>" name="nysba-submenu-anchor-class[<?php echo $item_id; ?>]" />
			<small class="help">Appends this class to the anchor tag unlike above, which appends to the list item</small>
		</p>

		<?php
		/*
		?>
		<p class="field-submenu-columns description description-wide first-level" data-menu-id="<?= $item_id; ?>">
			<label for="edit-menu-item-submenu-columns-<?php echo $item_id; ?>">
				<?php esc_attr_e('Number of Sub Menu Columns', 'nysba-nav'); ?>
				<select id="edit-menu-item-submenu-columns-<?php echo $item_id; ?>" class="widefat code edit-menu-item-submenu-columns" name="nysba-submenu-columns[<?php echo $item_id; ?>]">
					<option value="">Select</option>
					<option value="2" <?php selected($item->nysba_submenu_columns, '2'); ?>>2</option>
					<option value="3" <?php selected($item->nysba_submenu_columns, '3'); ?>>3</option>
				</select>
			</label>
		</p>
		*/
		?>
		
		<p class="description description-wide">Options</p>

		<p class="field-submenu-content-check description description-wide" data-menu-id="<?= $item_id; ?>">
			<label for="edit-menu-item-submenu-content-check-<?php echo $item_id; ?>"><input type="checkbox" id="edit-menu-item-submenu-content-check-<?php echo $item_id; ?>" class="widefat code edit-menu-item-submenu-content-check" name="nysba-submenu-content-check[<?php echo $item_id; ?>]" value="y" <?php checked(
					$item->nysba_submenu_content_check, 'y'
				); ?> /><?php esc_attr_e('Add description under the title.', 'nysba-nav'); ?></label>
		</p>
		
		<?php
		/*
		<p class="field-submenu-content description description-wide first-level" data-menu-id="<?= $item_id; ?>">
			<label style="display: block;" for="edit-menu-item-submenu-content-<?php echo $item_id; ?>"><?php _e('Description', 'textdomain'); ?></label>
			<textarea rows="2" id="edit-menu-item-submenu-content-<?php echo $item_id; ?>" name="nysba-submenu-content[<?php echo $item_id; ?>]" class="widefat textarea-content"><?php echo $item->nysba_submenu_content; ?></textarea>
		</p>
		*/ ?>

		<p class="field-submenu-first description description-wide sub-level custom-meta-field" data-menu-id="<?= $item_id; ?>">
			<label for="edit-menu-item-submenu-first-<?php echo $item_id; ?>">
				<input type="checkbox" id="edit-menu-item-submenu-first-<?php echo $item_id; ?>" class="widefat code edit-menu-item-submenu-first" name="nysba-submenu-first[<?php echo $item_id; ?>]" value="y" <?php checked(
					$item->nysba_submenu_first,
					'y'
				); ?> />
				<?php esc_attr_e('First sub-menu child?', 'nysba-nav'); ?>
			</label>
		</p>
		
		<?php
		/*
		
		<p class="field-submenu-tab-header description description-wide sub-level custom-meta-field" data-menu-id="<?= $item_id; ?>">
			<label for="edit-menu-item-submenu-tab-header-<?php echo $item_id; ?>">
				<input type="checkbox" id="edit-menu-item-submenu-tab-header-<?php echo $item_id; ?>" class="widefat code edit-menu-item-submenu-tab-header" name="nysba-submenu-tab-header[<?php echo $item_id; ?>]" value="y" <?php checked(
					$item->nysba_submenu_tab_header,
					'y'
				); ?> />
				<?php esc_attr_e('Is this a tab header?', 'nysba-nav'); ?>
			</label>
		</p>

		<p class="field-submenu-tab-child-check description description-wide sub-level custom-meta-field" data-menu-id="<?= $item_id; ?>">
			<label for="edit-menu-item-submenu-tab-child-check-<?php echo $item_id; ?>">
				<input type="checkbox" id="edit-menu-item-submenu-tab-child-check-<?php echo $item_id; ?>" class="widefat code edit-menu-item-submenu-tab-child-check" name="nysba-submenu-tab-child-check[<?php echo $item_id; ?>]" value="y" <?php checked(
					$item->nysba_submenu_tab_child_check,
					'y'
				); ?> />
				<?php esc_attr_e('Is this a child of a tab?', 'nysba-nav'); ?>
			</label>
		</p>

		<p class="field-submenu-tab-child-id description description-wide hidden-field sub-level">
			<label for="edit-menu-item-submenu-tab-child-id-<?php echo $item_id; ?>"><?= __('Tab Parent ID', 'nysba-nav'); ?></label>
			<input type="text" id="edit-menu-item-submenu-tab-child-id-<?php echo $item_id; ?>" class="widefat code edit-menu-item-submenu-tab-child-id" value="<?= sanitize_title($item->nysba_submenu_tab_child_id); ?>" name="nysba-submenu-tab-child-id[<?php echo $item_id; ?>]" />
			<small class="help"><?= __('This ID will be sanitized and should match the title of the parent\'s Navigation Label', 'nysba-nav'); ?></small>
		</p>
		*/
		?>

		<p class="field-submenu-divider description description-wide sub-level custom-meta-field" data-menu-id="<?= $item_id; ?>">
			<label for="edit-menu-item-submenu-divider-<?php echo $item_id; ?>">
				<input type="checkbox" id="edit-menu-item-submenu-divider-<?php echo $item_id; ?>" class="widefat code edit-menu-item-submenu-divider" name="nysba-submenu-divider[<?php echo $item_id; ?>]" value="y" <?php checked(
					$item->nysba_submenu_divider,
					'y'
				); ?> />
				<?php esc_attr_e('Is this a sub menu divider?', 'nysba-nav'); ?>
			</label>
		</p>
		
		<?php // Shortcode
		?>
		<p class="field-submenu-shortcode description description-wide all-levels custom-meta-field" data-menu-id="<?= $item_id; ?>">
			<label for="edit-menu-item-submenu-shortcode-<?php echo $item_id; ?>">
				<input type="checkbox" id="edit-menu-item-submenu-shortcode-<?php echo $item_id; ?>" class="widefat code edit-menu-item-submenu-shortcode" name="nysba-submenu-shortcode[<?php echo $item_id; ?>]" value="y" <?php checked(
					$item->nysba_submenu_shortcode,
					'y'
				); ?> />
				<?php esc_attr_e('Is this a sub menu shortcode?', 'nysba-nav'); ?>
			</label>
		</p>
		
		<?php /*
<p class="field-submenu-footer description description-wide second-level">
<label for="edit-menu-item-submenu-footer-<?php echo $item_id; ?>">
	<input type="checkbox" id="edit-menu-item-submenu-footer-<?php echo $item_id; ?>" class="widefat code edit-menu-item-submenu-footer" name="nysba-submenu-footer[<?php echo $item_id; ?>]" value="y" <?php checked( $item->nysba_submenu_footer, 'y' ); ?> />
<?php esc_attr_e( 'Is this the sub menu footer link?', 'nysba-nav' ); ?>
</label>
</p>
	*/ ?>
		
		<?php
		
	}
	
	/**
	 * Saves custom metadata for nav menu items.
	 *
	 * @param int    $menu_id         The ID of the menu.
	 * @param int    $menu_item_db_id The ID of the menu item.
	 * @param object $menu_item_data  The menu item's data.
	 *
	 * @return void
	 * @uses    update_post_meta()
	 *
	 * @since   1.0.0
	 * @package Nysba_Nav
	 *
	 * @uses    nav_menu_save_fields()
	 * @uses    delete_post_meta()
	 */
	public function nysba_nav_menu_save_fields($menu_id, $menu_item_db_id, $menu_item_data)
	{
		$nysba_Fields = new Nysba_Nav_Admin($this->plugin_name, $this->version);
		
		$field_names = $nysba_Fields->nysba_get_field_names();
		
		foreach ($field_names as $name) {
			$meta_field = '_' . str_replace('-', '_', $name);
			if (empty($_REQUEST[$name][$menu_item_db_id])) {
				delete_post_meta($menu_item_db_id, $meta_field);
			}
			else {
				$meta_value = trim($_REQUEST[$name][$menu_item_db_id]);
				update_post_meta($menu_item_db_id, $meta_field, $meta_value);
			}
		}
	}
	
	/**
	 * Sets up the menu item object with the custom metadata.
	 *
	 * Adds custom metadata to the menu item.  This is so the metadata will show up in the
	 * nav menu admin UI.
	 *
	 * @return object $menu_item Menu item
	 * @see     add_megamenu_fields()
	 * @uses    get_field_names()
	 *
	 * @since   1.0.0
	 * @package Nysba_Nav
	 *
	 */
	public function nysba_add_data_to_menu_item($menu_item)
	{
		$nysba_Fields = new Nysba_Nav_Admin($this->plugin_name, $this->version);
		
		if (isset($menu_item->ID)) :
			$field_names = $nysba_Fields->nysba_get_field_names();
			foreach ($field_names as $name) {
				$item_field             = str_replace('-', '_', $name);
				$meta_field             = '_' . $item_field;
				$value                  = get_post_meta($menu_item->ID, $meta_field, true);
				$menu_item->$item_field = $value;
			}
		endif;
		
		if (isset($menu_item->ID)) :
			$menu_item_parent = absint($menu_item->menu_item_parent);
			// get child count for top-level items
			if ('q' === $menu_item_parent) {
				$args     = [
					'meta_key'       => '_menu_item_menu_item_parent',
					'meta_value'     => $menu_item->db_id,
					'post_type'      => 'nav_menu_item',
					'posts_per_page' => 50,
					'post_status'    => 'publish',
				];
				$children = count(get_posts($args));
				if ($children > 0) {
					$menu_item->child_count = $children;
				}
			}
		endif;
		
		return $menu_item;
	}
	
}
