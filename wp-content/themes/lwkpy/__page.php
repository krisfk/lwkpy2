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

<div class="banner-div">
    <div class="container position-relative">

        <!-- <img class="w-100" src="<?php echo get_template_directory_uri(); ?>/assets/images/banner.jpg" alt=""> -->

        <div class="banner-ele banner-ele-1"></div>

        <div class="banner-ele banner-ele-2"></div>

        <div class="banner-ele banner-ele-3"></div>
        <div class="banner-ele banner-ele-4"></div>
        <div class="banner-ele banner-ele-5"></div>
        <div class="banner-ele banner-ele-6"></div>
        <div class="banner-ele banner-ele-7"></div>
        <div class="banner-ele banner-ele-8"></div>

    </div>



</div>
<!-- <div class="banner-div">
    <div class="container">
        <img class="w-100" src="<?php echo get_template_directory_uri(); ?>/assets/images/banner.jpg" alt="">
    </div>

</div> -->

<div class="container">


    <div class="text-center mt-5">under construction</div>
</div>





</div>
<script type="text/javascript">
$(function() {


    Pace.on("done", function() {
        $('.banner-ele').addClass('animated');
    });



    $(window).on('resize scroll', function() {


        if ($('.home-bottom-banner-1').isInViewport() && !$('.home-bottom-banner-1').hasClass(
                'animate__animated')) {
            $('.home-bottom-banner-1').addClass('animate__animated');
            $('.home-bottom-banner-1').addClass('animate__fadeIn');
            $('.home-bottom-banner-1').addClass('delay-3');
        }
        if ($('.home-bottom-banner-2').isInViewport() && !$('.home-bottom-banner-2').hasClass(
                'animate__animated')) {
            $('.home-bottom-banner-2').addClass('animate__animated');
            $('.home-bottom-banner-2').addClass('fadeInLeft2');
            $('.home-bottom-banner-2').addClass('delay-3');
        }
        if ($('.home-bottom-banner-3').isInViewport() && !$('.home-bottom-banner-3').hasClass(
                'animate__animated')) {
            $('.home-bottom-banner-3').addClass('animate__animated');
            $('.home-bottom-banner-3').addClass('fadeInRight2');
            $('.home-bottom-banner-3').addClass('delay-3');
        }
        if ($('.home-bottom-banner-4').isInViewport() && !$('.home-bottom-banner-4').hasClass(
                'animate__animated')) {
            $('.home-bottom-banner-4').addClass('animate__animated');
            $('.home-bottom-banner-4').addClass('fadeInRight2');
            $('.home-bottom-banner-4').addClass('delay-3');
        }
        if ($('.home-bottom-banner-5').isInViewport() && !$('.home-bottom-banner-5').hasClass(
                'animate__animated')) {
            $('.home-bottom-banner-5').addClass('animate__animated');
            $('.home-bottom-banner-5').addClass('fadeInLeft2');
            $('.home-bottom-banner-5').addClass('delay-3');
        }
        if ($('.home-bottom-banner-6').isInViewport() && !$('.home-bottom-banner-6').hasClass(
                'animate__animated')) {
            $('.home-bottom-banner-6').addClass('animate__animated');
            $('.home-bottom-banner-6').addClass('fadeInRight2');
            $('.home-bottom-banner-6').addClass('delay-3');
        }


    });
})
</script>
<?php
get_footer();