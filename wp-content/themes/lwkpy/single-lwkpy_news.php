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
<div class="container mt-5 about-middle mb-5">


    <div> <a href="/news/" class="back-btn">back</a>
    </div>
    <div class=" p-4">



        <h1><?php echo get_the_title(0);?></h1>

        <div class="mt-3"> <?php echo get_the_content();?></div>
        <!-- <div class="purple-line"></div> -->





    </div>







</div>

<script type="text/javascript">
$(function() {

    $('.news-select-y').change(function() {
        var select_y = $('.news-select-y').val();
        var select_m = $('.news-select-m').val();

        $('.news-list-ul li').fadeOut(0);

        if (select_m) {
            console.log('.news-list-ul li.y' + select_y + '.m' + select_m)
            $('.news-list-ul li.y' + select_y + '.m' + select_m).fadeIn(0);
        } else {
            $('.news-list-ul li.y' + select_y).fadeIn(0);
        }

        if (!select_m && !select_y) {
            $('.news-list-ul li').fadeIn(0);

        }


    })

    $('.news-select-m').change(function() {
        var select_y = $('.news-select-y').val();
        var select_m = $('.news-select-m').val();

        $('.news-list-ul li').fadeOut(0);

        if (select_y) {
            $('.news-list-ul li.y' + select_y + '.m' + select_m).fadeIn(0);
        } else {
            $('.news-list-ul li.m' + select_m).fadeIn(0);

        }
        if (!select_m && !select_y) {
            $('.news-list-ul li').fadeIn(0);

        }

    })

})
</script>
<?php
get_footer();