# Clear WordPress Plugin Cache - Instructions

WordPress is showing version 2.3.3 even though the files are at version 2.3.4. This is because WordPress caches plugin header data.

## Why This Happens

WordPress reads plugin headers and caches them in the database for performance. When you update files directly (via git, FTP, etc.) instead of through the WordPress updater, the cache doesn't automatically refresh.

## Solution Options

### Option 1: Run the Force Refresh Script (Easiest)

1. Access this URL in your browser:
   ```
   https://your-site.com/wp-content/plugins/wc-product-list-table/force-refresh.php
   ```

2. You should see a success message showing version 2.3.4

3. Go to WordPress admin → Plugins page

4. Hard refresh your browser (Ctrl+Shift+R or Cmd+Shift+R)

5. **IMPORTANT: Delete the force-refresh.php file after use for security!**

### Option 2: Manual Database Clear (via phpMyAdmin)

Run these SQL queries in your WordPress database:

```sql
-- Clear plugin cache transients
DELETE FROM wp_options WHERE option_name LIKE '_site_transient_update_plugins%';
DELETE FROM wp_options WHERE option_name LIKE '_site_transient_timeout_update_plugins%';

-- Clear GitHub updater cache
DELETE FROM wp_options WHERE option_name LIKE '_transient_wcplt_github_release_%';
DELETE FROM wp_options WHERE option_name LIKE '_transient_timeout_wcplt_github_release_%';
```

Then go to WordPress admin → Plugins and hard refresh your browser.

### Option 3: WordPress Admin Clear (Manual)

1. Install and activate the "WP Reset" or "Advanced Database Cleaner" plugin
2. Use it to clear all transients
3. Deactivate and delete the cleanup plugin
4. Hard refresh the Plugins page in your browser

### Option 4: File Touch Method

This tricks WordPress into thinking the file changed:

```bash
touch /workspaces/WC-Product-List-Table/wc-product-list-table.php
```

Then deactivate/reactivate the plugin and hard refresh your browser.

## Verify the Fix

After clearing cache, you should see:
- **Plugins page**: Version 2.3.4
- **Product pages**: Buttons showing "Course Info" instead of "Select Options"

## Why the Button Text Wasn't Working

The button text issue (showing "Select Options" instead of "Course Info") was caused by:

1. **Filter Priority Too Low**: Our filter was running at priority 10, but WooCommerce or your theme had filters running later that overrode it
   - **Fixed**: Increased to priority 99 to run last

2. **Potential Whitespace**: Settings might have had trailing spaces
   - **Fixed**: Added trim() to all get_option() calls

## Test After Clearing Cache

1. Go to your shop/product listing page
2. Look at the "Add to Cart" buttons
3. They should now say "Course Info" (or whatever text you configured)
4. If still showing "Select Options", check that you actually saved the settings:
   - Go to WooCommerce → Settings → Products → WC Product List Table
   - Button Text tab
   - Verify "Shop Page Button Text" has your custom text
   - Click "Save changes"

## Still Not Working?

If after clearing cache the button text still doesn't show:

1. **Verify Settings Are Saved**:
   - Go to WooCommerce → Settings → Products → WC Product List Table → Button Text
   - Check "Shop Page Button Text" field
   - Make sure it says "Course Info" (or your desired text)
   - Click "Save changes" again

2. **Check for Theme/Plugin Conflicts**:
   - Temporarily switch to a default WordPress theme (Twenty Twenty-Four)
   - Check if button text works
   - If it does, your theme is overriding the filter
   - We may need to increase priority even higher (to 999)

3. **Enable WordPress Debug Mode**:
   Add to wp-config.php:
   ```php
   define('WP_DEBUG', true);
   define('WP_DEBUG_LOG', true);
   ```
   Then check /wp-content/debug.log for errors

## Contact

If none of these solutions work, please provide:
- WordPress version
- WooCommerce version
- Active theme name
- List of active plugins
- Any error messages from debug.log
