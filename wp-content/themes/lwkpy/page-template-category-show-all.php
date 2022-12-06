<?php

/**
 * Template Name: show all product in category
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

<div class="container">


    <div class=" mt-4 text-center">

        <?php
echo get_field('text_1');
?>
    </div>



    <div class="single-product-middle mt-4">
        <span class="breadcrumb mt-3">


            <?php echo get_field('breadcrumb'); ?>

        </span>
        <?php
        // echo get_field('product_list');
// $args = array( 'post_type' => 'product' , 'order' => 'ASC' , 'posts_per_page' => -1);
// echo get_the_ID();

$ori_page_id = get_the_ID();
// echo get_the_content();

$args = array(
    'post_type' => 'product',
    'tax_query' => array(
        array(
        'taxonomy' => 'product_type',
        'field' => 'term_id',
        'terms' => get_field('product_list')
         )
      )
    );
    
$query = new WP_Query( $args );
$row_idx=1;
while ( $query->have_posts() ) {
    $query->the_post();

    ?>
        <div class="row">


            <?php
if(get_field('product_name') || get_field('product_description'))
{
 ?>
            <div class="col-lg-6 col-md-12 col-sm-12 col-12 ">

                <?php
}
else
{
 ?>
                <div class="col-lg-12 col-md-12 col-sm-12 col-12 narrow-container-width mx-auto">

                    <?php
}
?>
                    <div>

                        <?php
    
    $product_url_arr = array();

    if( have_rows('product_images') ){

        // Loop through rows.
        while( have_rows('product_images') ) { the_row();
    
            // Load sub field value.
            // $product_img = get_sub_field('product_image');
            $product_img = wp_get_attachment_image_src(get_sub_field('product_image'), 'full')[0];
            
        array_push($product_url_arr, $product_img);


        }
        
    
    }
    ?>
                        <a class="large-product-img-a" data-lightbox="product-img-<?php echo $row_idx;?>"
                            href="<?php echo $product_url_arr[0];?>">
                            <img class="w-100 large-product-img" src="<?php echo $product_url_arr[0];?>" alt="">
                        </a>
                    </div>
                    <ul class="product-thumbnail-list">


                        <?php
for($i=0;$i<count($product_url_arr);$i++)
{
?>

                        <li> <a href="javascript:void(0)" style="background:url(<?php echo $product_url_arr[$i];?>)">


                            </a>

                            <?php
    if($i>0)
    {
    ?>
                            <a style="display:none;" data-lightbox="product-img-<?php echo $row_idx;?>"
                                href="<?php echo $product_url_arr[$i];?>"><img src="<?php echo $product_url_arr[$i];?>"
                                    alt=""></a>
                            <?php
    }
                    ?>
                        </li>

                        <?php
}
?>




                    </ul>
                </div>
                <?php
if(get_field('product_name') || get_field('product_description'))
{
?>
                <div class="col-lg-6 col-md-12 col-sm-12 col-12 ">

                    <div class="product-name">


                        <?php echo get_field('product_name');?>
                    </div>




                    <div class="mt-3 product-description-div">

                        <?php echo get_field('product_description');?>
                    </div>



                    <?php
}
?>

                </div>






            </div>
            <hr>
            <?php

            $row_idx++;

}
        ?>


            <div class="text-center mt-5 mb-5">
                <?php
echo get_post_field('post_content', $ori_page_id);

                ?>
            </div>

        </div>






    </div>

    <script type="text/javascript">
    $(function() {


        if ($('.product-thumbnail-list li').length <= 1) {
            $('.product-thumbnail-list').fadeOut(0);

            $('.large-product-img-a').removeAttr('data-lightbox');
            $('.large-product-img-a').attr('href', 'javascript:void(0);');
            $('.large-product-img-a').hover(function() {
                $(this).css("cursor", "default");

            })



        }
        $('.product-thumbnail-list a').click(function(e) {
            e.preventDefault();


            var bg = $(this).css('background-image');
            bg = bg.replace('url(', '').replace(')', '').replace(/\"/gi, "");
            // alert(bg);
            $(this).closest('.product-thumbnail-list').prev('div').find('.large-product-img').attr(
                'src', bg);
            $(this).closest('.product-thumbnail-list').prev('div').find('.large-product-img-a').attr(
                'href', bg);

            // $('.large-product-img').attr('src', bg);
            // $('.large-product-img-a').attr('href', bg);


        });

        $('.bottom-menu-select-show-table').fadeOut(0);
        $('.bottom-menu-select-show-table').eq(0).fadeIn(0);

        $('.bottom-menu-ul li a').click(function() {
            $('.bottom-menu-ul li a').removeClass('active');
            $(this).addClass('active');
            var idx = $(this).parent('li').index();

            $('.bottom-menu-select-show-table').fadeOut(0);
            $('.bottom-menu-select-show-table').eq(idx).fadeIn(0);
        })



    })
    </script>
    <?php
get_footer();