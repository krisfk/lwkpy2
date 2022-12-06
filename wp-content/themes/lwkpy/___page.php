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


<div class="home-bottom-banners  mt-5">

    <div class="row">
        <div class="col-12">
            <a href="/electric-handling-tools/" class=" home-bottom-banner-1 home-bottom-banner">
                <div class="bg-1"></div>
                <div class="bg-2"></div>

                <div class="banner-txt">
                    <div class="chi-txt">電動車</div>
                    <div class="eng-txt">Electric Scooter</div>

                    <span href="#" class="more-btn">了解更多</span>
                </div>

            </a>
        </div>
    </div>
    <div class="row mt-4">

        <div class="col-6">

            <a href="/electric-handling-tools/" class=" home-bottom-banner-2 home-bottom-banner">
                <div class="banner-txt">
                    <div class="chi-txt">環保智能電池
                    </div>
                    <div class="eng-txt">Environmentally friendly <br>
                        smart battery</div>

                    <span href="#" class="more-btn">了解更多</span>
                </div>
            </a>




        </div>


        <div class="col-6">


            <a href="/electric-handling-tools/" class=" home-bottom-banner-3 home-bottom-banner">
                <div class="banner-txt">
                    <div class="chi-txt">訂造產品
                    </div>
                    <div class="eng-txt">Custom-made products </div>

                    <span href="#" class="more-btn">了解更多</span>
                </div>
            </a>


            <a href="/electric-handling-tools/" class=" home-bottom-banner-4 home-bottom-banner mt-4">
                <div class="banner-txt">
                    <div class="chi-txt">不銹鋼
                    </div>
                    <div class="eng-txt">Stainless Steel </div>

                    <span href="#" class="more-btn">了解更多</span>
                </div>
            </a>











        </div>

    </div>

    <div class="row mt-4">

        <div class="col-9">
            <a href="/electric-handling-tools/" class=" home-bottom-banner-5 home-bottom-banner ">
                <div class="banner-txt">
                    <div class="chi-txt">電動搬運工具
                    </div>
                    <div class="eng-txt">Electric handling tools </div>

                    <span href="#" class="more-btn">了解更多</span>
                </div>
            </a>


        </div>
        <div class="col-3">

            <a href="/logistics-tools/" class=" home-bottom-banner-6 home-bottom-banner ">
                <div class="banner-txt">
                    <div class="chi-txt">物流搬運
                    </div>

                    <span href="#" class="more-btn">了解更多</span>
                </div>
            </a>
        </div>

    </div>
</div>

<div class="bottom-container mt-4">
    <div class="mt-4 text-center">這段是文字內容的位置這段是文字內容的位置這段是文字內容的位置，這段是文字內容的位置這段是文字內容的位置 <br>
        這段是文字內容的位置，這段是文字內容的位置，這段是文字內容的位置，這段是文字內容的位置。</div>

    <div class="row mt-4">
        <div class="col-4"><img class="w-100"
                src="<?php echo get_template_directory_uri(); ?>/assets/images/video-img.jpg" alt=""></div>
        <div class="col-4"><img class="w-100"
                src="<?php echo get_template_directory_uri(); ?>/assets/images/video-img.jpg" alt=""></div>
        <div class="col-4"><img class="w-100"
                src="<?php echo get_template_directory_uri(); ?>/assets/images/video-img.jpg" alt=""></div>

    </div>
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