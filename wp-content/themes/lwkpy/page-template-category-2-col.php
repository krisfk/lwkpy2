<?php
/**
 * Template Name: Category page (list subcate image only - 2col)
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
foreach ($children as $page)
    {
        $featured_img_url = get_the_post_thumbnail_url($page->ID,'full'); 
        $url =  get_permalink($page->ID);
        // echo $url;
            // echo $featured_img_url;
            // $idx = (count($children) %3 ==0) ? '4' :'6';
                $idx = 6;
            ?>
        <div class="col-lg-<?php echo $idx;?> col-md-12 col-sm-12 col-12 ">


            <?php

         $cate_id =  get_field('product_list',$page->ID);

         $args = array(
             'post_type' => 'product',
             'tax_query' => array(
                 array(
                 'taxonomy' => 'product_type',
                 'field' => 'term_id',
                 'terms' => $cate_id
                  )
               )
             );
             $query = new WP_Query( $args ); 
             $count =0;
             while ($query->have_posts()) {
                 $query->the_post();
                 $count++;
             }
             if($count>0)
             {
                 ?>

            <a class="product-cat-a" href="<?php echo $url;?>">
                <img class="w-100" src="<?php echo $featured_img_url?>" alt="" /></a>
            <?php
             }
             else
             {
                 ?>

            <div class="product-cat-a">
                <img class="w-100" src="<?php echo $featured_img_url?>" alt="" />
            </div>

            <?php
             }

        ?>


        </div>


        <?php
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