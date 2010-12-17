=== Term Menu Order ===
Contributors: jameslafferty
Tags: 
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
1.

== Changelog ==
= 0.1 =
* First release.

== Upgrade Notice ==
= 0.1 =
* First release.