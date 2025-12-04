# WC Product List Table

A powerful WordPress plugin for customizing WooCommerce product displays with advanced cart button customization, styling, and redirect functionality.

## Features

- **Custom Button Text**: Change the "Add to Cart" button text for shop pages, product pages, and different product types
- **Redirect to Product Page**: Redirect the Add to Cart button to the product page instead of adding directly to cart
- **Custom Button Styling**: Customize button colors, fonts, and CSS
- **Per-Product Settings**: Override global settings on individual products
- **Automatic Migration**: Seamlessly upgrades from the old "Customize Cart Button" plugin

## Requirements

- WordPress 5.0 or higher
- WooCommerce 3.0 or higher
- PHP 7.2 or higher

## Installation

1. Download the plugin ZIP file
2. Go to WordPress Admin > Plugins > Add New
3. Click "Upload Plugin" and select the ZIP file
4. Click "Install Now" and then "Activate"

Or install via GitHub:

```bash
cd wp-content/plugins
git clone https://github.com/webjive/WC-Product-List-Table.git wc-product-list-table
```

## Configuration

After activation, go to **WooCommerce > Settings > Product List Table** to configure:

### Button Text Settings
- Shop page button text
- Product page button text
- Variable product button text
- Grouped product button text
- Out of stock button text

### Redirect Settings
- Enable/disable redirect to product page
- Choose which product types to redirect
- Open in new tab option

### Styling Settings
- Button background color
- Button text color
- Button hover colors
- Border radius and padding
- Custom CSS

## Usage

### Global Settings

Navigate to **WooCommerce > Settings > Product List Table** and configure your preferences.

### Per-Product Override

On individual product edit pages, you'll find a "Product List Table Settings" metabox where you can override global settings for that specific product.

## Migration from Customize Cart Button

If you're upgrading from the old "Customize Cart Button" plugin:

1. Deactivate the old "Customize Cart Button" plugin
2. Install and activate "WC Product List Table"
3. All your settings will be automatically migrated on first activation
4. You can safely delete the old plugin after verifying everything works

## Development

This plugin is structured for easy development and extension:

```
wc-product-list-table/
├── wc-product-list-table.php    # Main plugin file
├── includes/
│   ├── class-wcplt-settings.php          # Admin settings
│   └── class-wcplt-button-customizer.php # Button customization logic
├── uninstall.php                         # Cleanup on uninstall
└── languages/                            # Translation files
```

## Changelog

### 2.0.0
- Complete plugin rename from "Customize Cart Button" to "WC Product List Table"
- Added automatic migration from old plugin
- Updated all class names and prefixes (CCB_ → WCPLT_)
- Updated text domain (customize-cart-button → wc-product-list-table)
- Fixed undefined $args variable bug in redirect functionality
- Improved code structure and documentation

### 1.0.0
- Initial release as "Customize Cart Button"
- Custom button text functionality
- Redirect to product page feature
- Basic styling options

## Support

For bug reports and feature requests, please use the [GitHub Issues](https://github.com/webjive/WC-Product-List-Table/issues) page.

## License

GPL v2 or later

## Author

Developed by [WebJIVE](https://web-jive.com) - Digital Marketing Agency in Little Rock, Arkansas
