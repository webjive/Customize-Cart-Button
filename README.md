# WC Product List Table

A powerful WordPress plugin for customizing WooCommerce product displays with advanced cart button customization, styling, and redirect functionality.

## Features

- **Table Layout Mode**: Display products in a clean card-based list format
- **Shortcode Support**: Embed product tables anywhere with `[wcplt_products]`
- **Custom Button Text**: Change the "Add to Cart" button text for shop pages, product pages, and different product types
- **Redirect to Product Page**: Redirect the Add to Cart button to the product page instead of adding directly to cart
- **Custom Button Styling**: Customize button colors, fonts, and CSS
- **Hide Quantity Selector**: Remove quantity fields from product listings
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

### Shortcode Usage

Embed product tables anywhere using the `[wcplt_products]` or `[wc_product_table]` shortcode.

#### Basic Usage

```
[wcplt_products]
```

Displays all products with default settings (12 products, sorted by date).

#### Shortcode Parameters

| Parameter | Description | Default | Example |
|-----------|-------------|---------|---------|
| `limit` | Number of products to display | `12` | `limit="20"` |
| `columns` | Number of columns (for grid layout) | `1` | `columns="3"` |
| `orderby` | Sort by: date, title, price, popularity, rating | `date` | `orderby="price"` |
| `order` | Sort order: ASC or DESC | `DESC` | `order="ASC"` |
| `category` | Filter by category slug(s) | — | `category="hvac,plumbing"` |
| `tag` | Filter by product tag(s) | — | `tag="featured"` |
| `ids` | Show specific product IDs | — | `ids="1,2,3"` |
| `skus` | Show products by SKU | — | `skus="ABC123,XYZ789"` |
| `on_sale` | Show only sale products | `no` | `on_sale="yes"` |
| `best_selling` | Show best-selling products | `no` | `best_selling="yes"` |
| `top_rated` | Show top-rated products | `no` | `top_rated="yes"` |
| `class` | Add custom CSS class | — | `class="my-products"` |

#### Example Shortcodes

**Show 10 products from HVAC category:**
```
[wcplt_products category="hvac" limit="10"]
```

**Display sale products sorted by price:**
```
[wcplt_products on_sale="yes" orderby="price" order="ASC"]
```

**Show specific products by ID:**
```
[wcplt_products ids="123,456,789"]
```

**Best-selling products:**
```
[wcplt_products best_selling="yes" limit="5"]
```

**Products from multiple categories:**
```
[wcplt_products category="electrical,plumbing" limit="20"]
```

The shortcode automatically applies your table layout, button styling, and other plugin settings.

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

### 2.2.0
- **NEW**: Shortcode support - `[wcplt_products]` and `[wc_product_table]`
- **NEW**: Embed product tables anywhere on your site
- **NEW**: 11 shortcode parameters for filtering and sorting
- Added support for category, tag, SKU filtering
- Added on_sale, best_selling, top_rated product filters
- Shortcodes inherit all plugin styling and layout settings

### 2.1.0
- Table layout mode for clean card-based product display
- Hide quantity selector option
- Product description display with character limits
- Button icon support (shopping cart icon)
- Button width controls (auto, full, fixed)
- Button size options (small, medium, large)
- New "Layout & Display" settings tab

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
