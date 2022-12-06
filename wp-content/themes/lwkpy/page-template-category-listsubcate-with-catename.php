<?php
/**
 * Template Name: Category page (list subcate image with catename )
 * Template Post Type: post, page
 **/

get_header();

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

    <div class="row mt-0">

        <div class="col-12 text-center">

            <?php echo get_field('text_content');?>

        </div>
    </div>
    <div class="row mt-0 mb-5 gx-3">

        <?php

$child_args = array(
    'post_parent' => get_the_ID(), // The parent id.
    'post_type'   => 'page',
    'post_status' => 'publish'
);

$children = get_children( $child_args );
foreach ($children as $page)
    {
        $featured_img_url = get_the_post_thumbnail_url($page->ID,'full'); 

            // echo $featured_img_url;
            ?>
        <div class="col-3 ">

            <a class="product-cat-a" href="<?php echo get_permalink($page->ID)?>">
                <img src="<?php echo $featured_img_url?>" alt="" />
                <div class="text-center"><?php echo get_the_title($page->ID);?></div>
            </a>

        </div>


        <?php
    }


?>
        <!-- <a class="col-3" href="#">
            <img class="w-100" src="http://138.197.0.237/wp-content/uploads/2021/06/m-series.png" alt="" />
            <div class="text-center">M series</div>
        </a>

        <a class="col-3" href="#"><img class="w-100" src="http://138.197.0.237/wp-content/uploads/2021/06/md-series.png"
                alt="" />
            <div class="text-center">MD series</div>
        </a>
        <a class="col-3" href="#"><img class="w-100"
                src="http://138.197.0.237/wp-content/uploads/2021/06/mdt-series.png" alt="" />
            <div class="text-center">MDT series</div>
        </a>


        <a class="col-3" href="#"><img class="w-100"
                src="http://138.197.0.237/wp-content/uploads/2021/06/mdti-series.png" alt="" />
            <div class="text-center">MDTI series</div>
        </a>
        <a class="col-3" href="#"><img class="w-100" src="http://138.197.0.237/wp-content/uploads/2021/06/sm-series.png"
                alt="" />
            <div class="text-center">SM series</div>
        </a> -->
        <?php
      ?>


    </div>
</div>






</div>
<?php
get_footer();