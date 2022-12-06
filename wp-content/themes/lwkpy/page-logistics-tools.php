<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header();

?>

<div class="banner-div" style="background:#cd9a2f">
    <div class="container">
        <img class="w-100" src="<?php echo get_template_directory_uri(); ?>/assets/images/logistics-tools-banner.jpg"
            alt="">
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



<div class="products-list row mt-5">

    <a href="#" class="col-3 mb-5">

        <div class="products-list-a-div">
            <div class="product-image-div"
                style="background:url(http://138.197.0.237/wp-content/uploads/2021/05/logistic-handling-product-1.png) no-repeat center center">
            </div>

            <div class="text-center product-name">物流籠車</div>
        </div>


    </a>

    <a href="#" class="col-3 mb-5">
        <div class="products-list-a-div">

            <div class="product-image-div"
                style="background:url(http://138.197.0.237/wp-content/uploads/2021/05/logistic-handling-product-2.png) no-repeat center center">
            </div>

            <div class="text-center product-name">手推車</div>
        </div>


    </a>

    <a href="#" class="col-3 mb-5">
        <div class="products-list-a-div">

            <div class="product-image-div"
                style="background:url(http://138.197.0.237/wp-content/uploads/2021/05/logistic-handling-product-3.png) no-repeat center center">
            </div>

            <div class="text-center product-name">辦公室手推車</div>
        </div>


    </a>
    <a href="#" class="col-3 mb-5">
        <div class="products-list-a-div">


            <div class="product-image-div"
                style="background:url(http://138.197.0.237/wp-content/uploads/2021/05/logistic-handling-product-4.png) no-repeat center center">
            </div>

            <div class="text-center product-name">手拉車</div>
        </div>


    </a>
    <a href="#" class="col-3 mb-5">
        <div class="products-list-a-div">

            <div class="product-image-div"
                style="background:url(http://138.197.0.237/wp-content/uploads/2021/05/logistic-handling-product-5.png) no-repeat center center">
            </div>

            <div class="text-center product-name">工業腳輪</div>

        </div>

    </a>
    <a href="#" class="col-3 mb-5">
        <div class="products-list-a-div">

            <div class="product-image-div"
                style="background:url(http://138.197.0.237/wp-content/uploads/2021/05/logistic-handling-product-6.png) no-repeat center center">
            </div>

            <div class="text-center product-name">木板車</div>

        </div>
    </a>




</div>





</div>
<?php
get_footer();