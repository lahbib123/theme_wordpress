<?php get_header(); ?>

    <main>
        <section class="section-1" >
            <div class="swiper heroSwiper">
                <div class="swiper-wrapper">

                    <div class="swiper-slide" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/Satisfy.png');">
                        <div class="slide-content">
                            <h3>BE THE FIRST</h3>
                            <h1>Satisfy your top obsession<br> with the range of new arrivals.</h1>
                            <a href="#" class="btn btn-white">View Collection</a>
                        </div>
                    </div>

                    <div class="swiper-slide" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/Shield.png');">
                        <div class="slide-content-1">
                            <h3>PERFECT FOR ANY OCCASION!</h3>
                            <h1>Shield Your Eyes with Fashion.</h1>
                            <a href="#" class="btn btn-white">View Collection</a>
                            <a href="#" class="btn btn-brown">Shop Now</a>
                        </div>
                    </div>
                </div>

                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">Slide 1</div>
                        <div class="swiper-slide">Slide 2</div>
                        <!-- <div class="swiper-slide">Slide 3</div> -->
                    </div>
                    <!-- Pagination -->
                    <div class="swiper-pagination"></div>
                </div>
                
            </div>
        </section>
        <section class="section-2">
            <div class="promo-section">
                <div class="promo-box">
                    <h2>SHOP 20% off</h2>
                    <p>We've refreshed our sale with discounts of up to 50% on select styles.</p>
                    <button>Use Discount</button>
                </div>
                <div class="promo-box-2">
                    <video autoplay loop muted>
                    <source src="<?php echo get_template_directory_uri(); ?>/assets/img/New_Arrivals_Sale.mp4" type="video/mp4">
                    </video>
                    <div>
                        <h2>New Arrivals Sale</h2>
                        <p>Check out our new arrivals and enjoy a 15% discount on the latest products!</p>
                    </div>
                </div>
            </div>
        </section>


    <section class="product-section">
        <h2 class="New-Arrivals">New Arrivals</h2>
         <!-- Category Tabs -->
         <div class="category-tabs">
            <?php
                $categories = get_terms('product_cat', array('hide_empty' => true));
                foreach ($categories as $category) {
                    echo '<button class="category-btn" data-category="' . esc_attr($category->slug) . '">' . esc_html($category->name) . '</button>';
                }
            ?> 
        </div>
        <div class="product-slider-container">
            <button class="slide-btn left-btn">
                <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="30" cy="30" r="30" transform="matrix(-1 0 0 1 60 0)" fill="white" fill-opacity="0.5"/>
                    <path d="M32.6351 37.0271L25.6081 30L32.6351 22.973" stroke="#252324" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>
            <div class="product-slider-wrapper">
                <div class="product-slider">
                    <?php
                    $args = array(
                        'post_type' => 'product',
                        'posts_per_page' => 10, 
                    );
                    $loop = new WP_Query($args);
                    while ($loop->have_posts()) : $loop->the_post();
                        global $product;
                        $categories = get_the_terms(get_the_ID(), 'product_cat');
                        $category_classes = '';
                        if ($categories) {
                            foreach ($categories as $cat) {
                                $category_classes .= ' ' . $cat->slug;
                            }
                        }
                    ?>
                        <div class="product-item <?php echo esc_attr($category_classes); ?>">
                            <a href="<?php the_permalink(); ?>">
                                <?php woocommerce_template_loop_product_thumbnail(); ?>
                                <h3 class="product-title"><?php the_title(); ?></h3>
                            </a>
                            <div class="product-price">
                                <span class="current-price"><?php echo $product->get_price_html(); ?></span>
                            </div>
                        </div>
                    <?php endwhile; wp_reset_query(); ?>
                </div>
            </div>
            <button class="slide-btn right-btn">
                <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="30" cy="30" r="30" fill="white" fill-opacity="0.5"/>
                    <path d="M27.3649 37.0271L34.3919 30L27.3649 22.973" stroke="#252324" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>
        </div>
    </section>

        
        <section>
            <div class="section-4" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/New-Fashion.png');">
            <div class="New-Fashion">
                <h2>NEW FASHION</h2>
                <h1>SALE UP TO 70% OFF</h1>
                <h3>Sale ends on September 30th, 2024</h3>
                <button class="shop-now">Shop Now</button>
            </div>
        </section>

        <section class="collections">
            <h2><?php esc_html_e('Our Collections', 'your-theme-textdomain'); ?></h2>
            <p><?php esc_html_e('Latest trends and inspirations in fashion design.', 'your-theme-textdomain'); ?></p>
            
            <div class="collection-grid">
                <?php
                $collections = [
                    ['title' => 'Sets', 'image' => get_theme_mod('set_image'), 'items' => 34],
                    ['title' => 'Activewear', 'image' => get_theme_mod('activewear_image'), 'items' => 34],
                    ['title' => 'Accessories', 'image' => get_theme_mod('accessories_image'), 'items' => 21],
                    ['title' => 'Lingerie', 'image' => get_theme_mod('lingerie_image'), 'items' => 21],
                ];
                $index = 0;
                foreach ($collections as $collection) :
                $image = $collection['image'] ?: get_template_directory_uri() . '/assets/default.jpg';
                ?>
                <div class="collection-item" data-index="<?php echo $index; ?>">
                    <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($collection['title']); ?>">
                    <div class="overlay">
                    <h3><?php echo esc_html($collection['title']); ?></h3>
                    <p><?php echo esc_html($collection['items']) . ' ' . esc_html__('Items', 'your-theme-textdomain'); ?></p>
                    </div>
                </div>
                <?php $index++; endforeach; ?>
            </div>
        </section>

        <section class="best-seller-section">
            <h5 >BEST SELLER<h5>
            <h2>Latest Arrivals For Every</h2>
            <h2>Season And Occasion</h2>
            <div class="custom-product-wrapper">
                <div class="custom-product-grid">
                    <?php
                    $args = array(
                        'post_type'      => 'product',
                        'posts_per_page' => 8,
                    );
                    $loop = new WP_Query($args);
                    $initial_product_ids = array(); // Store initial product IDs
                    while ($loop->have_posts()) : $loop->the_post();
                        global $product;
                        $initial_product_ids[] = get_the_ID(); // Save each product ID

                        // Check if the product is liked by the user
                        $liked_products = get_user_meta(get_current_user_id(), 'liked_products', true);
                        $liked_products = is_array($liked_products) ? $liked_products : array();
                        $is_liked = in_array(get_the_ID(), $liked_products) ? 'liked' : '';
                    ?>
                        <div class="custom-product-item">
                            <a href="<?php the_permalink(); ?>">
                                <div class="custom-product-image-wrapper">
                                    <?php woocommerce_template_loop_product_thumbnail(); ?>
                                    <div class="hover-overlay">
                                        <div class="hover-content">
                                            <button class="add-to-cart-btn" data-product-id="<?php echo $product->get_id(); ?>">
                                                Add to Cart
                                            </button>
                                            <button class="quick-view-btn" data-product-id="<?php echo $product->get_id(); ?>">
                                                Quick View
                                            </button>
                                        </div>
                                    </div>
                                    <!-- Add the Like heart icon -->
                                    <div class="like-icon <?php echo esc_attr($is_liked); ?>" data-product-id="<?php echo $product->get_id(); ?>">
                                        <svg width="22" height="20" viewBox="0 0 22 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M2.69235 10.0512L11 18.6666L19.3076 10.0512C20.2312 9.09352 20.75 7.79456 20.75 6.44013C20.75 3.61968 18.5452 1.33325 15.8255 1.33325C14.5194 1.33325 13.2669 1.8713 12.3434 2.82902L11 4.22214L9.65664 2.82902C8.73312 1.8713 7.48055 1.33325 6.17449 1.33325C3.45477 1.33325 1.25 3.61968 1.25 6.44013C1.25 7.79456 1.76883 9.09352 2.69235 10.0512Z" stroke="#252324" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </div>
                                </div>
                                <h3 class="custom-product-title"><?php the_title(); ?></h3>
                            </a>
                            <div class="custom-product-price">
                                <span class="custom-price"><?php echo $product->get_price_html(); ?></span>
                            </div>
                        </div>                       
                    <?php endwhile; wp_reset_postdata(); ?>
                </div>
                <div class="custom-load-more-button">
                    <button id="custom-load-more-btn" 
                            onclick="window.location.href='<?php echo esc_url(get_permalink( get_page_by_path( 'all-products' ) )); ?>'">
                        All Products
                    </button>
                </div>
            </div>
        </section>
    </div>
    <section class="Offer">

            <div class="moving-bar top-bar">
                <div class="marquee">
                    <span>Free Shipping on Orders Over $300 </span>
                    <span> 20% OFF SITEWIDE </span>
                    <span>Free Shipping on Orders Over $300 </span>
                    <span> 20% OFF SITEWIDE </span>
                    <span>Free Shipping on Orders Over $300 </span>
                    <span> 20% OFF SITEWIDE </span>
                    <span>Free Shipping on Orders Over $300 </span>
                    <span> 20% OFF SITEWIDE </span>
                </div>
            </div>

                <div class="text-container">
                    <p>
                        Elevate your fashion game with our expertly curated <br>collection of 
                        <span class="image-text-1">
                            high-end 
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/over_img_1.png" alt="Fashion Image">
                        </span> 
                        pieces. Discover <br> the outfit 
                        <span class="image-text-2">
                            
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/over_img_2.png" alt="Fashion Image">
                        </span> 
                        perfect outfit for any occasion,<br> from casual to 
                        <span class="image-text-3">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/over_img_3.png" alt="Fashion Image">
                        formal
                        </span>.
                    </p>
                </div>
                <path d="M-194.458 -241C-194.458 -53.8771 -274.705 133.338 -440.69 304.751C-563.279 431.349 -462.669 303.183 -384.939 269.067C-267.337 217.452 -123.008 180.112 -6.30005 127.382C113.808 73.1164 194.748 -1.57476 298.005 -62.5814C498.555 -181.071 396.479 34.8254 367.693 97.9954C316.329 210.714 248.166 333.042 149.337 439.09C55.9481 539.3 184.261 434.461 311.943 399.208C635.27 309.936 887.447 192.176 1143.55 69.6583C1377.78 -42.3931 876.105 353.326 730.072 492.615C668.096 551.729 624.224 616.484 567.466 674.183C479.74 763.362 773.613 568.45 832.281 541.943C1022.35 456.069 1293.4 358.791 1426.95 250.176C1569.73 134.062 1459.75 371.427 1436.24 400.258C1337.52 521.333 1290.19 663.138 1143.55 774.937C1133.82 782.362 1079.86 827.122 1111.03 793.828C1182.79 717.202 1377.07 651.673 1498.96 591.271C1612.29 535.116 1790.71 415.69 1938 382.416" stroke="white" stroke-opacity="0.6" stroke-width="50" stroke-linecap="round"/>
            <!-- Bottom Moving Bar (Left to Right) -->
            <div class="moving-bar bottom-bar">
                <div class="marquee">
                    <span>Free Shipping on Orders Over $300 </span>
                    <span> 20% OFF SITEWIDE </span>
                    <span>Free Shipping on Orders Over $300 </span>
                    <span> 20% OFF SITEWIDE </span>
                    <span>Free Shipping on Orders Over $300 </span>
                    <span> 20% OFF SITEWIDE </span>
                    <span>Free Shipping on Orders Over $300 </span>
                    <span> 20% OFF SITEWIDE </span>
                </div>
            </div>
    </section> 
    <section class="New-Product">
        
    </section>              
    </main>


    <!-- Start Footer -->
    <?php get_footer() ?>