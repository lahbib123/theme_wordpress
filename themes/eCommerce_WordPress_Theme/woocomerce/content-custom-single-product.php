<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
global $product;
get_header('shop'); ?>

<div class="custom-single-product container" id="product-<?php the_ID(); ?>" <?php wc_product_class(); ?>>
    <div class="product-wrapper">
        <!-- Product Images -->
        <div class="product-gallery">
            <?php do_action('woocommerce_before_single_product_summary'); ?>
        </div>

        <!-- Product Details -->
        <div class="product-info">
            <h1 class="product-title"> <?php the_title(); ?> </h1>
            
            <div class="product-price">
                <?php woocommerce_template_single_price(); ?>
            </div>
            
            <div class="product-rating">
                <?php woocommerce_template_single_rating(); ?>
            </div>

            <!-- Product Variations -->
            <div class="product-variations">
                <?php if ($product->is_type('variable')) : ?>
                    <form class="variations_form" method="post" enctype="multipart/form-data">
                        <?php woocommerce_template_single_add_to_cart(); ?>
                    </form>
                <?php endif; ?>
            </div>
            
            <!-- Quantity & Add to Cart Button -->
            <div class="product-actions">
                <?php woocommerce_template_single_add_to_cart(); ?>
                <?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
            </div>
        </div>
    </div>

    <!-- Tabs Section -->
    <div class="product-tabs">
        <?php woocommerce_output_product_data_tabs(); ?>
    </div>
</div>


<?php get_footer('shop'); ?>
