# WordPress Plugin Version Refresh Instructions

## Current Status
- **Plugin Version on Disk**: 2.3.3 ✓
- **WordPress Cached Version**: 2.3.1 (needs refresh)

## Why This Happens
WordPress caches plugin header information for performance. When you update files directly via git (instead of through the WordPress updater), WordPress doesn't automatically re-scan the plugin headers.

## How to Refresh (Choose One Method)

### Method 1: Deactivate and Reactivate (Recommended)
1. Go to WordPress admin → Plugins page
2. Click **"Deactivate"** on WC Product List Table
3. Click **"Activate"** again
4. WordPress will re-read the plugin header and show version 2.3.3

### Method 2: Via WP-CLI (If Available)
```bash
wp plugin deactivate wc-product-list-table
wp plugin activate wc-product-list-table
```

### Method 3: Clear All Caches
- Clear any caching plugins (WP Super Cache, W3 Total Cache, etc.)
- Clear browser cache (Ctrl+Shift+R or Cmd+Shift+R)
- Clear object cache if using Redis/Memcached

## What Was Fixed in v2.3.3

### Critical Fix: Button Text Now Works Automatically
- **Problem**: Custom button text wasn't applying even after entering it in settings
- **Root Cause**: The "Enable Custom Text" checkbox was unchecked by default, blocking the custom text from being used
- **Solution**: Completely removed the checkbox requirement
- **Result**: Button text now applies immediately when you enter it - no checkbox needed!

### Technical Changes
- Removed `wcplt_enable_custom_text` option check from button text methods
- Plugin now simply checks if custom text exists and uses it
- If no custom text is set, falls back to WooCommerce defaults
- Fully backward compatible

## After Refreshing
1. Your button text settings should now work immediately
2. No need to enable any checkboxes
3. Just enter your custom button text and it will apply automatically

## Need Help?
If the button text still doesn't work after refreshing:
1. Verify you've entered text in: **WooCommerce → Settings → Products → WC Product List Table**
2. Check the "Button Text" tab
3. Enter your desired text in "Shop Button Text" field
4. Save changes
5. Visit your shop page to see the new button text
