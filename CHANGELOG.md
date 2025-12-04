# Changelog

All notable changes to WC Product List Table will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [2.0.0] - 2025-12-04

### Changed
- **BREAKING**: Plugin renamed from "Customize Cart Button" to "WC Product List Table"
- Updated plugin slug from `customize-cart-button` to `wc-product-list-table`
- Updated text domain from `customize-cart-button` to `wc-product-list-table`
- Updated all class prefixes from `CCB_` to `WCPLT_`
- Updated all option keys from `ccb_*` to `wcplt_*`
- Updated all meta keys from `_ccb_*` to `_wcplt_*`
- Updated GitHub repository URL to reflect new name
- Bumped version to 2.0.0

### Added
- Automatic migration system for users upgrading from "Customize Cart Button"
- Migration runs on plugin activation via `register_activation_hook()`
- Converts all old database options to new format
- Converts all product meta keys to new format
- Migration tracking flag (`wcplt_migration_done`) to prevent duplicate migrations
- Enhanced documentation with migration instructions

### Fixed
- Fixed undefined `$args` variable bug in `redirect_to_product_page()` method
- Improved code documentation and inline comments

### Removed
- Old class files with CCB_ prefix (replaced with WCPLT_ naming convention)

## [1.0.0] - 2024-12-04

### Added
- Initial release as "Customize Cart Button"
- Custom button text functionality for shop pages, single product pages, and different product types
- Redirect to product page feature with product type filtering
- Button styling options (colors, hover states, border radius, padding)
- Custom CSS support for advanced styling
- Per-product override settings via metabox
- WooCommerce settings page integration with three sections: Button Text, Redirect Settings, and Button Styling
- Proper WooCommerce dependency checking
- Clean uninstall functionality
- Translation ready with text domain

### Features
- **Button Text Customization**
  - Separate text for shop pages and single product pages
  - Specific text for variable, grouped, and external products
  - Custom out of stock button text
  - Per-product text override

- **Redirect Functionality**
  - Global enable/disable toggle
  - Product type filtering (simple, variable, grouped)
  - Optional new tab opening
  - Per-product redirect override

- **Styling Options**
  - Background and text colors
  - Hover state colors
  - Border radius control
  - Padding customization
  - Custom CSS field for advanced users

### Technical
- Object-oriented architecture with singleton pattern
- WordPress coding standards compliance
- Secure with nonce verification and capability checks
- Proper escaping and sanitization
- Hooks and filters for extensibility

### Fixed (post-initial release patches)
- Fixed WooCommerce settings class loading order issue
- Fixed array formatting in redirect settings
