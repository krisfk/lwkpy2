<?php
/**
 * Template Name: Product grid list page
 * Template Post Type: post, page
 **/

get_header();



if(get_field('full_category_page_mode')==true)
{
 
    wp_redirect( get_field('to_category_page')->guid );
    exit;

}

?>

<div class="banner-div" style="background:<?php echo get_field('top_banner_bg_color');?>">
    <div class="bg-color-2" style="background:<?php echo get_field('top_banner_bg_color_2');?>"></div>
    <div class="container">

        <?php
    $img_url = wp_get_attachment_image_src(get_field('top_banner'), 'full')[0];

    ?>
        <img class="w-100 banner-img" src="<?php echo $img_url;?>" alt="">


    </div>
</div>



<div class="mobile banner-div" style="background:<?php echo get_field('top_banner_bg_color');?>">
    <div class="bg-color-2" style="background:<?php echo get_field('top_banner_bg_color_2');?>"></div>
    <div class="container">

        <?php
    $img_url = wp_get_attachment_image_src(get_field('mobile_top_banner'), 'full')[0];

    ?>
        <img class="w-100 banner-img" src="<?php echo $img_url;?>" alt="">


    </div>
</div>



<div class="container products-list">

    <span class="breadcrumb mt-4">


        <?php echo get_field('breadcrumb'); ?>


    </span>


    <div class="row mt-0 text-center">

        <?php
echo get_field('text_1');
?>

    </div>
    <div class="row mt-4">



        <?php
    // echo 432423;
    // wp_reset_query();
    $args = array(  
        'post_type' => 'product',
        'tax_query' => array(
            array(
                'taxonomy' => 'product_type',
                'field'    => 'terms_id',
                'terms'=> get_field('product_list')
                // 'terms'    => array(12),
            ),
        ),
    );

    $loop = new WP_Query( $args ); 
        
    while ( $loop->have_posts() ) : $loop->the_post(); 
        // print the_title(); 
        // the_excerpt(); 
        // echo 1;
        ?>

        <div class="col-lg-4 col-md-6 col-sm-6 col-6 ">
            <?php //echo get_field('to_category_page')->guid;?>

            <a class="product-cat-a" href="<?php echo get_permalink(get_the_ID())?>">




                <!-- <img src="<?php echo $featured_img_url?>" alt="" /> -->
                <?php
                $img_id = get_field('product_images')[0]['product_image'];
                // echo $img_id;
                $product_img = wp_get_attachment_image_src($img_id, 'full')[0];

                // echo $product_img;
            
                // print_r(get_field('product_images'));
                ?>
                <img class="w-100" src="<?php echo $product_img;?>" alt="">
                <div class="text-center mt-3"><?php echo get_the_title(get_the_ID());?></div>
            </a>

        </div>

        <?php
    endwhile;

    // wp_reset_postdata(); 
    ?>


        <?php //endwhile; ?>
        <?php //else: ?>
        <?php //endif; ?>


    </div>
</div>






</div>
<?php
get_footer();