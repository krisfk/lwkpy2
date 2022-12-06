<?php
/**
 * Template Name: Product grid list with submenu page
 * Template Post Type: post, page
 **/

get_header();


$product_show='';
$variation_top_banner=false;
if(get_field('product_list')==37)
{
    $product_show='xsto';
}
?>

<div class="desktop banner-div" style="background:<?php echo get_field('top_banner_bg_color');?>">
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
    // echo get_field('product_list');
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
        ?>
        <div class="col-lg-3 col-md-12 col-sm-12 col-12  mb-5">
            <?php

if( have_rows('filter_menu') ):

    // Loop through rows.
    while( have_rows('filter_menu') ) : the_row();

        // Load sub field value.
        $filter = get_sub_field('filter');
        //  get_sub_field('top_banner_img');
        $img_url = wp_get_attachment_image_src(get_sub_field('top_banner_img'), 'full')[0];
        $img_url_2 = wp_get_attachment_image_src(get_sub_field('top_banner_img_mobile'), 'full')[0];

        // echo 1;
        if($img_url)
        {
            $variation_top_banner=true;
        }
        // echo $img_url;

        // echo get_sub_field('filter');
            ?>
            <a class="filter-a <?php if($product_show) { echo 'xsto-list';}?>" href="javascript:void(0);"
                rel="<?php echo $filter;?>"
                <?php if($variation_top_banner){echo 'data-banner="'.$img_url.'"'.' '.'data-banner-mobile="'.$img_url_2.'"' ;}?>><?php echo $filter;?></a>
            <?php
        // echo $filter;
        // Do something...

    // End loop.
    endwhile;

// No value.
else :
    // Do something...
endif;
?>

        </div>
        <div class="col-lg-9 col-md-12 col-sm-12 col-12 ">
            <div class="row">
                <?php
    while ( $loop->have_posts() ) : $loop->the_post(); 
        // print the_title(); 
        // the_excerpt(); 
        // echo 1;
        ?>

                <div class="col-lg-4 col-md-4 col-sm-6 col-6  product-div"
                    data-filter-series="<?php echo strtolower(get_field('filter_series'));?>">

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
            </div>
        </div>

        <?php //endwhile; ?>
        <?php //else: ?>
        <?php //endif; ?>


    </div>
</div>






</div>
<script type="text/javascript">
$(function() {

    $('.filter-a').click(function() {
        var selected_series = $(this).attr('rel').toLowerCase();
        $('.filter-a').removeClass('active');
        $(this).addClass('active');
        $('.product-div').fadeOut(0);
        console.log('.product-div[data-filter-series="' + selected_series.toLowerCase() + '"]');
        $('.product-div[data-filter-series="' + selected_series.toLowerCase() + '"]').fadeIn(0);
        var top_banner_img = $(this).attr('data-banner');
        var mobile_banner_img = $(this).attr('data-banner-mobile');

        $('.desktop.banner-div .banner-img').attr('src', top_banner_img);
        $('.mobile.banner-div .banner-img').attr('src', mobile_banner_img);
    })

    $('.filter-a').eq(0).click()

})
</script>
<?php
get_footer();