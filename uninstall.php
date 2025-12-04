<?php
/**
 * Uninstall Script
 *
 * Fired when the plugin is uninstalled.
 */

// If uninstall not called from WordPress, exit
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
    exit;
}

// Delete plugin options
$options = array(
    // New option keys
    'wcplt_enable_custom_text',
    'wcplt_shop_button_text',
    'wcplt_single_button_text',
    'wcplt_variable_button_text',
    'wcplt_grouped_button_text',
    'wcplt_external_button_text',
    'wcplt_out_of_stock_text',
    'wcplt_enable_redirect',
    'wcplt_redirect_simple',
    'wcplt_redirect_variable',
    'wcplt_redirect_grouped',
    'wcplt_redirect_new_tab',
    'wcplt_enable_styling',
    'wcplt_bg_color',
    'wcplt_text_color',
    'wcplt_hover_bg_color',
    'wcplt_hover_text_color',
    'wcplt_border_radius',
    'wcplt_padding',
    'wcplt_custom_css',
    'wcplt_migration_done',
    // Old option keys (for backward compatibility)
    'ccb_enable_custom_text',
    'ccb_shop_button_text',
    'ccb_single_button_text',
    'ccb_variable_button_text',
    'ccb_grouped_button_text',
    'ccb_external_button_text',
    'ccb_out_of_stock_text',
    'ccb_enable_redirect',
    'ccb_redirect_simple',
    'ccb_redirect_variable',
    'ccb_redirect_grouped',
    'ccb_redirect_new_tab',
    'ccb_enable_styling',
    'ccb_bg_color',
    'ccb_text_color',
    'ccb_hover_bg_color',
    'ccb_hover_text_color',
    'ccb_border_radius',
    'ccb_padding',
    'ccb_custom_css',
);

foreach ( $options as $option ) {
    delete_option( $option );
}

// Delete product meta
global $wpdb;

$wpdb->query(
    "DELETE FROM {$wpdb->postmeta}
    WHERE meta_key IN (
        '_wcplt_override_text',
        '_wcplt_custom_text',
        '_wcplt_override_redirect',
        '_wcplt_disable_redirect',
        '_ccb_override_text',
        '_ccb_custom_text',
        '_ccb_override_redirect',
        '_ccb_disable_redirect'
    )"
);
