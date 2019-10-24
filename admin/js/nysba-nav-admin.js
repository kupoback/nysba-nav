/*global
alert, confirm, console, prompt
*/
(function ($) {
	'use strict';
	
	function toggleSection($elm) {
		var $this = $elm.thisElm;
		var $thisParent = $this.parents($elm.parent);
		var $thisTextarea = $thisParent.siblings($elm.sibling);
		
		if ($this.is(':checked')) {
			$thisTextarea.slideDown('fast');
		}
		else {
			$thisTextarea.slideUp('fast');
		}
	}
	
	function toggleSiblings(parent, sibling) {
		parent.children(sibling).map(function () {
			!this.classList.contains('field-submenu-divider') ? $(this).toggle() : null;
		})
	}
	
	function deleteUnToggledTextareaContent($elm) {
		var $this = $elm;
		var $thisParent = $this.parents($elm.parent);
		var $thisTextarea = $thisParent.siblings($elm.sibling);
		if (!$this.is(':checked')) {
			$thisTextarea.empty();
		}
	}
	
	$(function () {
		
		if ($('#nav-menus-frame').length) {
			
			var contentCheckbox = $('.field-submenu-content-check input[type="checkbox"]');
			var dividerCheckbox = $('.field-submenu-divider input[type="checkbox"]');
			var tabCheckbox = $('.field-submenu-tab-child-check input[type="checkbox"]');
			var checkboxAttr = {
				parent: '.field-submenu-content-check',
				sibling: '.field-submenu-content'
			};
			var dividerAttr = {
				parent: '.field-submenu-divider',
				sibling: '.field-submenu-column-width'
			};
			var tabAttr = {
				parent: '.field-submenu-tab-child-check',
				sibling: '.field-submenu-tab-child-id'
			};
			
			/**
			 * Loop through our content checkboxes
			 */
			$.each(contentCheckbox, function () {
				checkboxAttr.thisElm = $(this);
				toggleSection(checkboxAttr);
			});
			
			/**
			 * Loop through our tab checkboxes
			 */
			$.each(tabCheckbox, function () {
				tabAttr.thisElm = $(this);
				toggleSection(tabAttr);
			});
			
			/**
			 * Loop through our divider checkboxes
			 */
			$.each(dividerCheckbox, function () {
				var parent = $(this).parents('.menu-item-settings');
				dividerAttr.thisElm = $(this);
				toggleSection(dividerAttr);
				this.checked === true ? toggleSiblings(parent, '.custom-meta-field') : null;
			});
			
			$('.menu-save').on('click', function () {
				$.each(contentCheckbox, function () {
					checkboxAttr.thisElm = $(this);
					deleteUnToggledTextareaContent(checkboxAttr);
				});
			});
			
			contentCheckbox.on('click', function () {
				checkboxAttr.thisElm = $(this);
				toggleSection(checkboxAttr);
			});
			
			tabCheckbox.on('click', function () {
				tabAttr.thisElm = $(this);
				toggleSection(tabAttr);
			});
			
			dividerCheckbox.on('click', function () {
				var parent = $(this).parents('.menu-item-settings');
				dividerAttr.thisElm = $(this);
				toggleSection(dividerAttr);
				toggleSiblings(parent, '.custom-meta-field');
			});
			
		}
		
	});
	
	
})(jQuery);
