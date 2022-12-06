<?php
/**
 * Template Name: Category page (list subcate image only banner mode)
 * Template Post Type: post, page
 **/

get_header();

?>
<!-- 999 -->
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


    <div class="row mt-0">

        <div class="col-12 text-center">


            <?php echo get_the_content();?>







        </div>
    </div>



</div>
</div>






</div>
<?php
get_footer();