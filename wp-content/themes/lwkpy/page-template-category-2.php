<?php
/**
 * Template Name: Category page (list subcate image only special row)
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
    <div class="row mt-3">

        <?php

$child_args = array(
    'post_parent' => get_the_ID(), // The parent id.
    'post_type'   => 'page',
    'post_status' => 'publish'
);

$children = get_children( $child_args );
$first=true;
foreach ($children as $page)
    {
        $featured_img_url = get_the_post_thumbnail_url($page->ID,'full'); 

            // echo $featured_img_url;
            $idx = (count($children) %3 ==0) ? '4' :'6';

            if($first)
            {
                $idx=12;
            }
            ?>
        <div class="col-lg-<?php echo $idx;?> col-md-12 col-sm-12 col-12 ">

            <a class="product-cat-a <?php if($first){ ?>desktop
            <?php }?>" href="<?php echo get_permalink($page->ID)?>">
                <img class="w-100" src="<?php echo $featured_img_url?>" alt="" /></a>

            <?php

if($first)
{
    ?>
            <a class="product-cat-a product-cat-a-mobile" href="<?php echo get_permalink($page->ID)?>">

                <?php echo get_post_field('post_content', $page->ID);
?>
            </a>
            <?php
            
}?>

        </div>


        <?php
        $first=false;

    }

    if(!$children)
    {
      echo get_the_content();

    }

?>

        <?php
      ?>


    </div>
</div>






</div>
<?php
get_footer();