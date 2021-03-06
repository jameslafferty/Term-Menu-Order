=== Term Menu Order ===
Contributors: jameslafferty
Tags: developer, menu order, terms, taxonomy, taxonomies, wp_terms, menu_order
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=JSL4JTA4KMZLG
Requires at least: 3.0.1
Tested up to: 3.0.3
Stable tag: trunk

Adds a menu_order field to terms, allowing theme and plugin developers to sort term by menu_order (similar to pages).

== Description ==

This plugin is intended as an aid to theme and plugin developers. It does modify a core WordPress database table
($wpdb->terms), so please be aware of the risks involved and always back up your site before activating a new plugin.

The purpose of the plugin is to allow arbitrary sorting of terms into a 'menu_order', similar to pages. This allows queries that
fetch terms to use 'menu_order' as a sort order. In particular, get_terms('category', 'orderby=menu_order') type queries are now possible.

== Installation ==
1. Upload the term-menu-order to /wp-content/plugins/.
1. Activate the plugin through the "Plugins" menu in WordPress.
1. You will now be able to set an 'Order' field for categories, tags and custom taxonomy terms.

== Frequently Asked Questions ==
There are no Frequently Asked Questions yet... This is the first release!

== Screenshots ==
1. 'menu_order' available in Quick Edit.
2. 'menu_order' available when adding a new term.
3. 'menu_order' available when editing a term.

== Changelog ==

= 0.2 = 
* Added French language support. Thank you to Frederick Marcoux for this contribution!

= 0.1.3 =
* Updated autoloader to include try... catch block for handling autoload exceptions.

= 0.1.2 =
* Attached plugin init to 'init' action hook instead of 'after_theme_setup' to catch custom taxonomies added by theme.

= 0.1 =
* First release.

== Upgrade Notice ==
= 0.2 =
* Adds French language support.

= 0.1.3
* Bug fix for autoloader error. Error is of the form "Fatal error: Uncaught exception 'LogicException' with message...".

= 0.1.2 =
* Bug fix for custom taxonomies added in the theme.

= 0.1 =
* First release.

== Internationalization (i18n) ==

This plugin has been translated into the languages listed below:

* fr_FR - French. Thank you to Frederick Marcoux for contributing!

If you're interested in doing a translation into your language, please let me know.
