=== WC Product List Table ===
Contributors: webjive
Tags: woocommerce, product list, cart button, customize, redirect, button text
Requires at least: 5.0
Tested up to: 6.4
Requires PHP: 7.2
Stable tag: 2.0.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Powerful WooCommerce product list customization with advanced cart button controls, styling, and redirect functionality.

== Description ==

WC Product List Table is a powerful WordPress plugin that gives you complete control over your WooCommerce product displays and "Add to Cart" buttons. Change button text, customize styling, and redirect customers to product pages instead of adding directly to cart.

Formerly known as "Customize Cart Button" - this plugin has been renamed and enhanced for better functionality and clarity.

= Features =

**Button Text Customization**
* Separate button text for shop/archive pages
* Custom text for single product pages
* Specific text for variable products
* Custom text for grouped products
* External/affiliate product button text
* Out of stock button text
* Per-product text override

**Redirect to Product Page**
* Redirect "Add to Cart" button to product page
* Enable/disable redirect globally
* Filter by product type (simple, variable, grouped)
* Option to open in new tab
* Per-product redirect override

**Button Styling**
* Custom background color
* Custom text color
* Hover state colors (background and text)
* Border radius control
* Padding customization
* Custom CSS field for advanced styling

**Per-Product Settings**
* Override global button text on individual products
* Override redirect settings per product
* Easy-to-use metabox on product edit screen

**Automatic Migration**
* Seamlessly upgrades from "Customize Cart Button" plugin
* All settings automatically migrated on activation
* No data loss during upgrade

= Use Cases =

* Force customers to view product details before purchasing
* Create "View Details" or "Learn More" buttons instead of "Add to Cart"
* Match button styling to your theme
* Different button text for different product types
* Improve conversion by guiding customers through product pages
* Customize product list table displays

= Perfect For =

* WooCommerce stores selling complex products
* Stores with variable products requiring customer selection
* Businesses wanting to provide more product information before purchase
* Stores with custom branding requirements
* Anyone wanting more control over the shopping experience
* Professional e-commerce sites requiring advanced customization

== Installation ==

1. Upload the plugin files to `/wp-content/plugins/wc-product-list-table`, or install through WordPress plugins screen
2. Activate the plugin through 'Plugins' screen in WordPress
3. Navigate to WooCommerce > Settings > Product List Table to configure
4. Enable features and customize settings as needed

= Upgrading from Customize Cart Button =

1. Deactivate the old "Customize Cart Button" plugin
2. Install and activate "WC Product List Table"
3. All your settings will be automatically migrated
4. You can safely delete the old plugin after verifying everything works

== Frequently Asked Questions ==

= Does this work with all WooCommerce themes? =

Yes! The plugin uses standard WooCommerce filters and hooks, making it compatible with any properly coded WooCommerce theme.

= Can I set different button text for different products? =

Yes! There's a metabox on each product edit screen where you can override the global settings with product-specific text and redirect options.

= Will the redirect feature affect the cart functionality? =

No. The redirect only affects the button behavior on shop/archive pages. Once on the product page, customers can add to cart normally.

= Can I disable the redirect for specific products? =

Yes! Each product has override settings in the "Product List Table Settings" metabox where you can enable or disable redirect on a per-product basis.

= Does this plugin slow down my site? =

No. The plugin is lightweight and only loads the necessary code. Custom styles are inline, and there are no external dependencies.

= Is the plugin translation ready? =

Yes! The plugin is fully translation ready with text domain 'wc-product-list-table'.

= What happens to my settings when upgrading from Customize Cart Button? =

All your settings are automatically migrated to the new format when you activate WC Product List Table. Nothing is lost!

= Can I go back to the old plugin? =

While you can revert, the old "Customize Cart Button" plugin is deprecated. We recommend staying with WC Product List Table for continued updates and support.

== Screenshots ==

1. Button Text Settings - Customize button text for different contexts
2. Redirect Settings - Control redirect behavior by product type
3. Styling Settings - Customize button appearance
4. Product Metabox - Per-product override settings

== Changelog ==

= 2.0.0 - 2025-12-04 =
* BREAKING: Plugin renamed from "Customize Cart Button" to "WC Product List Table"
* Added automatic migration system for seamless upgrade
* Updated all class names and database keys
* Fixed undefined $args variable bug in redirect functionality
* Improved code structure and documentation
* Enhanced settings page labels
* Updated GitHub repository references

= 1.0.0 - 2024-12-04 =
* Initial release as "Customize Cart Button"
* Custom button text functionality
* Redirect to product page feature
* Button styling options
* Per-product override settings
* WooCommerce settings integration
* Fixed WooCommerce settings class loading order
* Fixed array formatting in settings

== Upgrade Notice ==

= 2.0.0 =
Major update: Plugin renamed to "WC Product List Table" with automatic migration. All your settings will be preserved. Deactivate "Customize Cart Button" before activating this version.

= 1.0.0 =
Initial release of the plugin.

== Support ==

For support, please visit: https://web-jive.com/contact
Or submit an issue on GitHub: https://github.com/webjive/WC-Product-List-Table/issues

== Credits ==

Developed by WebJIVE - Digital Marketing Agency in Little Rock, Arkansas
Website: https://web-jive.com
