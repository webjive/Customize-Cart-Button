<?php
/**
 * Shortcode Class
 *
 * Handles shortcode for embedding product tables anywhere
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class WCPLT_Shortcode {

    /**
     * Instance of this class
     */
    private static $instance = null;

    /**
     * Get instance
     */
    public static function get_instance() {
        if ( null === self::$instance ) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Constructor
     */
    private function __construct() {
        // Register shortcode
        add_shortcode( 'wcplt_products', array( $this, 'render_products' ) );
        add_shortcode( 'wc_product_table', array( $this, 'render_products' ) ); // Alias
    }

    /**
     * Render products shortcode
     *
     * @param array $atts Shortcode attributes
     * @return string HTML output
     */
    public function render_products( $atts ) {
        // Check if WooCommerce is active
        if ( ! class_exists( 'WooCommerce' ) ) {
            return '<p>' . esc_html__( 'WooCommerce is required for this shortcode.', 'wc-product-list-table' ) . '</p>';
        }

        // Parse attributes
        $atts = shortcode_atts( array(
            'limit'       => 12,
            'columns'     => 1,
            'orderby'     => 'date',
            'order'       => 'DESC',
            'category'    => '',
            'ids'         => '',
            'skus'        => '',
            'tag'         => '',
            'class'       => '',
            'on_sale'     => '',
            'best_selling'=> '',
            'top_rated'   => '',
        ), $atts, 'wcplt_products' );

        // Build query arguments
        $query_args = array(
            'post_type'      => 'product',
            'posts_per_page' => intval( $atts['limit'] ),
            'orderby'        => sanitize_text_field( $atts['orderby'] ),
            'order'          => sanitize_text_field( $atts['order'] ),
            'post_status'    => 'publish',
        );

        // Filter by category
        if ( ! empty( $atts['category'] ) ) {
            $query_args['tax_query'] = array(
                array(
                    'taxonomy' => 'product_cat',
                    'field'    => 'slug',
                    'terms'    => array_map( 'trim', explode( ',', $atts['category'] ) ),
                ),
            );
        }

        // Filter by tag
        if ( ! empty( $atts['tag'] ) ) {
            if ( ! isset( $query_args['tax_query'] ) ) {
                $query_args['tax_query'] = array();
            }
            $query_args['tax_query'][] = array(
                'taxonomy' => 'product_tag',
                'field'    => 'slug',
                'terms'    => array_map( 'trim', explode( ',', $atts['tag'] ) ),
            );
        }

        // Filter by IDs
        if ( ! empty( $atts['ids'] ) ) {
            $query_args['post__in'] = array_map( 'intval', explode( ',', $atts['ids'] ) );
        }

        // Filter by SKUs
        if ( ! empty( $atts['skus'] ) ) {
            $query_args['meta_query'] = array(
                array(
                    'key'     => '_sku',
                    'value'   => array_map( 'trim', explode( ',', $atts['skus'] ) ),
                    'compare' => 'IN',
                ),
            );
        }

        // On sale products
        if ( 'yes' === $atts['on_sale'] ) {
            $query_args['post__in'] = array_merge( array( 0 ), wc_get_product_ids_on_sale() );
        }

        // Best selling products
        if ( 'yes' === $atts['best_selling'] ) {
            $query_args['meta_key'] = 'total_sales';
            $query_args['orderby']  = 'meta_value_num';
        }

        // Top rated products
        if ( 'yes' === $atts['top_rated'] ) {
            $query_args['meta_key'] = '_wc_average_rating';
            $query_args['orderby']  = 'meta_value_num';
        }

        // Execute query
        $products = new WP_Query( $query_args );

        // Start output buffering
        ob_start();

        if ( $products->have_posts() ) {
            $wrapper_class = 'woocommerce wcplt-shortcode-wrapper';
            if ( ! empty( $atts['class'] ) ) {
                $wrapper_class .= ' ' . esc_attr( $atts['class'] );
            }

            echo '<div class="' . esc_attr( $wrapper_class ) . '">';
            echo '<ul class="products columns-' . esc_attr( $atts['columns'] ) . '">';

            while ( $products->have_posts() ) {
                $products->the_post();
                wc_get_template_part( 'content', 'product' );
            }

            echo '</ul>';
            echo '</div>';

            wp_reset_postdata();
        } else {
            echo '<p>' . esc_html__( 'No products found.', 'wc-product-list-table' ) . '</p>';
        }

        return ob_get_clean();
    }

    /**
     * Get products by category
     *
     * Helper method for category-based product retrieval
     *
     * @param string $category_slug Category slug
     * @param int $limit Number of products
     * @return array Product IDs
     */
    public function get_products_by_category( $category_slug, $limit = -1 ) {
        $args = array(
            'post_type'      => 'product',
            'posts_per_page' => $limit,
            'fields'         => 'ids',
            'tax_query'      => array(
                array(
                    'taxonomy' => 'product_cat',
                    'field'    => 'slug',
                    'terms'    => $category_slug,
                ),
            ),
        );

        $query = new WP_Query( $args );
        return $query->posts;
    }
}
