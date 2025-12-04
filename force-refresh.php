<?php
/**
 * Force WordPress Plugin Cache Refresh
 *
 * This script forces WordPress to clear its plugin cache and re-read plugin headers.
 * Run this from your browser: https://yoursite.com/wp-content/plugins/wc-product-list-table/force-refresh.php
 */

// Find WordPress
$wp_load = dirname(__FILE__) . '/../../../wp-load.php';
if (file_exists($wp_load)) {
    require_once $wp_load;
} else {
    die('Error: Could not find wp-load.php');
}

// Clear plugin cache
delete_site_transient('update_plugins');
wp_cache_delete('plugins', 'plugins');

// Clear all plugin-related transients
global $wpdb;
$wpdb->query("DELETE FROM {$wpdb->options} WHERE option_name LIKE '_site_transient_update_plugins%'");
$wpdb->query("DELETE FROM {$wpdb->options} WHERE option_name LIKE '_site_transient_timeout_update_plugins%'");

// Clear GitHub updater cache
delete_transient('wcplt_github_release_' . md5('https://api.github.com/repos/webjive/WC-Product-List-Table/releases/latest'));

// Force plugin data refresh
if (function_exists('get_plugins')) {
    wp_cache_delete('plugins', 'plugins');
    $plugins = get_plugins();

    if (isset($plugins['wc-product-list-table/wc-product-list-table.php'])) {
        echo "<h2>✅ Plugin Cache Cleared Successfully!</h2>";
        echo "<p><strong>Current Version:</strong> " . esc_html($plugins['wc-product-list-table/wc-product-list-table.php']['Version']) . "</p>";
        echo "<p>The plugin cache has been cleared. Go back to your WordPress admin and refresh the Plugins page.</p>";
        echo "<p><a href='" . admin_url('plugins.php') . "'>Go to Plugins Page</a></p>";
    } else {
        echo "<h2>⚠️ Plugin Not Found</h2>";
        echo "<p>Could not find the WC Product List Table plugin in the plugins directory.</p>";
        echo "<pre>" . print_r(array_keys($plugins), true) . "</pre>";
    }
} else {
    echo "<h2>❌ Error</h2>";
    echo "<p>WordPress functions not available.</p>";
}

// Display instructions
?>
<!DOCTYPE html>
<html>
<head>
    <title>WC Product List Table - Force Refresh</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            line-height: 1.6;
        }
        h2 { color: #0073aa; }
        pre {
            background: #f5f5f5;
            padding: 15px;
            border-left: 4px solid #0073aa;
            overflow-x: auto;
        }
        .warning {
            background: #fff8e5;
            border-left: 4px solid #ffb900;
            padding: 15px;
            margin: 20px 0;
        }
        .success {
            background: #e5f8e5;
            border-left: 4px solid #00aa00;
            padding: 15px;
            margin: 20px 0;
        }
        a {
            color: #0073aa;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="success">
        <h3>Next Steps:</h3>
        <ol>
            <li>Go to your WordPress admin Plugins page</li>
            <li>Hard refresh your browser (Ctrl+Shift+R or Cmd+Shift+R)</li>
            <li>You should now see version 2.3.4</li>
            <li>Test your product pages - button text should now say "Course Info"</li>
        </ol>
    </div>

    <div class="warning">
        <h3>⚠️ Security Note:</h3>
        <p><strong>Delete this file after use!</strong> This script should not remain on your server as it can be accessed by anyone.</p>
        <p>Delete: <code>/wp-content/plugins/wc-product-list-table/force-refresh.php</code></p>
    </div>
</body>
</html>
