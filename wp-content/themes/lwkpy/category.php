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

<div class="banner-div" style="background:#FAAF40">
    <div class="container">
        <img class="w-100" src="<?php echo get_template_directory_uri(); ?>/assets/images/master-moving-banner.jpg"
            alt="">
    </div>
</div>
<div class="container">


    <div class="text-center mt-5">這段是文字內容的位置這段是文字內容的位置這段是文字內容的位置，<br>
        這段是文字內容的位置這段是文字內容的位置
        這段是文字內容的位置，這段是文字內容的位置，這段是文字內容的位置，這段是文字內容的位置。</div>
</div>


<div class="products-list row mt-5">

    <a href="#" class="col-4 mb-5">

        <div class="product-image-div"
            style="background:url(http://138.197.0.237/wp-content/uploads/2021/04/AT200-TOW.png)"></div>

        <div class="text-center product-name">AT200-TOW</div>
        <div class="text-center">
            <span href="#" class="more-btn">了解更多</span>
        </div>


    </a>
    <a href="#" class="col-4 mb-5">

        <div class="product-image-div"
            style="background:url(http://138.197.0.237/wp-content/uploads/2021/04/AT300-TOW.png)"></div>

        <div class="text-center product-name">AT300-TOW</div>
        <div class="text-center">
            <span href="#" class="more-btn">了解更多</span>
        </div>
    </a>
    <a href="#" class="col-4 mb-5">

        <div class="product-image-div"
            style="background:url(http://138.197.0.237/wp-content/uploads/2021/04/SM100.png)"></div>
        <div class="text-center product-name">SM100</div>
        <div class="text-center">
            <span href="#" class="more-btn">了解更多</span>
        </div>

    </a>
    <a href="#" class="col-4 mb-5">

        <div class="product-image-div"
            style="background:url(http://138.197.0.237/wp-content/uploads/2021/04/SM100-TOW.png)"></div>

        <div class="text-center product-name">SM100-TOW</div>
        <div class="text-center">
            <span href="#" class="more-btn">了解更多</span>
        </div>

    </a>
    <a href="#" class="col-4 mb-5">

        <div class="product-image-div"
            style="background:url(http://138.197.0.237/wp-content/uploads/2021/04/SM100-1.png)"></div>
        <div class="text-center product-name">SM100+</div>
        <div class="text-center">
            <span href="#" class="more-btn">了解更多</span>
        </div>

    </a>

</div>





</div>
<?php
get_footer();