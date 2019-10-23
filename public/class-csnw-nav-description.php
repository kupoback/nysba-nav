<?php

/**
 * Class Name: CS Nav Walker: CSNW_Nav_Description_Nav class
 * GitHub URI: https://github.com/dupkey/bs4navwalker
 * Description: A Custom Navwalker that displays a description under the link item
 * Version: 0.1
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

class CSNW_Nav_Description_Nav extends Walker_Nav_Menu
{
	
	/**
	 * Starts the list before the elements are added.
	 *
	 * @see     Walker::start_lvl()
	 *
	 * @since   3.0.0
	 * @package CS_Custom_Navigation
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param int    $depth  Depth of menu item. Used for padding.
	 * @param array  $args   An array of arguments. @see wp_nav_menu()
	 */
	public function start_lvl(&$output, $depth = 0, $args = [])
	{
		
		$output .= "<ul class=\"sub-menu\">";
		
	}
	
	/**
	 * @see     Walker::end_lvl()
	 * @since   3.0.0
	 * @package CS_Custom_Navigation
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param int    $depth  Depth of page. Used for padding.
	 */
	public function end_lvl(&$output, $depth = 0, $args = [])
	{
		
		$output .= "</ul>";
		
	}
	
	/**
	 * @see     Walker::start_el()
	 * @since   3.0.0
	 *
	 * @package CS_Custom_Navigation
	 *
	 * @param string $output       Passed by reference. Used to append additional content.
	 * @param object $item         Menu item data object.
	 * @param int    $depth        Depth of menu item. Used for padding.
	 * @param int    $current_page Menu item ID.
	 * @param object $args
	 */
	public function start_el(&$output, $item, $depth = 0, $args = [], $id = 0)
	{
		
		/**
		 * Check out depth and see if there's a divider here that we need to split
		 */
		$classes   = empty($item->classes) ? [] : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;
		
		/**
		 * Filter the CSS class(es) applied to a menu item's list item element.
		 *
		 * @since 3.0.0
		 * @since 4.1.0 The `$depth` parameter was added.
		 *
		 * @param array  $classes The CSS classes that are applied to the menu item's `<li>` element.
		 * @param object $item    The current menu item.
		 * @param array  $args    An array of {@see wp_nav_menu()} arguments.
		 * @param int    $depth   Depth of menu item. Used for padding.
		 */
		$class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args, $depth));
		$class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';
		
		/**
		 * Filter the ID applied to a menu item's list item element.
		 *
		 * @since 3.0.1
		 * @since 4.1.0 The `$depth` parameter was added.
		 *
		 * @param string $menu_id The ID that is applied to the menu item's `<li>` element.
		 * @param object $item    The current menu item.
		 * @param array  $args    An array of {@see wp_nav_menu()} arguments.
		 * @param int    $depth   Depth of menu item. Used for padding.
		 */
		$id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args, $depth);
		$id = $id ? ' id="' . esc_attr($id) . '"' : '';
		
		if (property_exists($args, 'children'))
			$output .= '<li' . $id . $class_names . ' aria-haspopup="true" aria-expanded="false" tabindex="0">';
		else
			$output .= '<li' . $id . $class_names . '>';
		
		$content = $item->csnw_submenu_content ?: '';
		
		$atts           = [];
		$atts['title']  = !empty($item->attr_title) ? $item->attr_title : $item->title;
		$atts['target'] = !empty($item->target) ? $item->target : '';
		$atts['rel']    = !empty($item->xfn) ? $item->xfn : '';
		$atts['href']   = !empty($item->url) ? $item->url : '';
		
//		if (in_array('current-menu-item', $item->classes))
//			$atts['class'] .= 'current';
		
		/**
		 * Filter the HTML attributes applied to a menu item's anchor element.
		 *
		 * @since 3.6.0
		 * @since 4.1.0 The `$depth` parameter was added.
		 *
		 * @param array  $atts   {
		 *                       The HTML attributes applied to the menu item's `<a>` element, empty strings are ignored.
		 *
		 * @type string  $title  Title attribute.
		 * @type string  $target Target attribute.
		 * @type string  $rel    The rel attribute.
		 * @type string  $href   The href attribute.
		 * }
		 *
		 * @param object $item   The current menu item.
		 * @param array  $args   An array of {@see wp_nav_menu()} arguments.
		 * @param int    $depth  Depth of menu item. Used for padding.
		 */
		$atts = apply_filters('nav_menu_link_attributes', $atts, $item, $args, $depth);
		
		$attributes = '';
		foreach ($atts as $attr => $value)
		{
			if (!empty($value))
			{
				$value      = ('href' === $attr) ? esc_url($value) : esc_attr($value);
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}
		
		$item_output = $args->before;
		
		/**
		 * Check to see if there is a shortcode item in the navigation
		 */
		
		$item_output .= sprintf('<a %1$s>%2$s</a>%3$s%4$s',
			$attributes,
			$args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after,
			$content ? '<p>' . __($content) . '</p>' : null,
			$args->after
		);
		
		/**
		 * Filter a menu item's starting output.
		 *
		 * The menu item's starting output only includes `$args->before`, the opening `<a>`,
		 * the menu item's title, the closing `</a>`, and `$args->after`. Currently, there is
		 * no filter for modifying the opening and closing `<li>` for a menu item.
		 *
		 * @since   3.0.0
		 *
		 * @package CS_Custom_Navigation
		 *
		 * @param string $item_output The menu item's starting HTML output.
		 * @param object $item        Menu item data object.
		 * @param int    $depth       Depth of menu item. Used for padding.
		 * @param array  $args        An array of {@see wp_nav_menu()} arguments.
		 */
		$output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
		
	}
	
	/**
	 * @see     Walker::end_el()
	 *
	 * @package CS_Custom_Navigation
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param object $item   Page data object. Not used.
	 * @param int    $depth  Depth of page. Not Used.
	 */
	public function end_el(&$output, $item, $depth = 0, $args = [])
	{
		
		if (isset($args->has_children) && $depth === 0)
		{
			$output .= "</li>\n";
		}
	}
}
