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
    <div class="container banner-container position-relative g-0">



        <?php


if( have_rows('banners') ){

    // Loop through rows.
    $idx=0;
    while( have_rows('banners') ) { the_row();

        $img_link = get_sub_field('banner_link');
        $img_url = wp_get_attachment_image_src(get_sub_field('banner_img'), 'full')[0];


?>

        <?php
if($img_link)
{
?>
        <a href="<?php echo $img_link;?>" class="position-relative" style="background:url(<?php  echo $img_url;?>)">
            <img class="w-100" src="<?php echo $img_url;?>" alt="">
        </a>
        <?php
}
else
{
    ?>
        <div href="javascript:void(0);" class="position-relative" style="background:url(<?php  echo $img_url;?>)">
            <img class="w-100" src="<?php echo $img_url;?>" alt="">
        </div>
        <?php
}
?>
        <?php
    }


}
    ?>




    </div>



</div>



<div class="banner-div mobile">
    <div class="container banner-container position-relative g-0">



        <?php


if( have_rows('mobile_banners') ){

    // Loop through rows.
    $idx=0;
    while( have_rows('mobile_banners') ) { the_row();

        $img_link = get_sub_field('banner_link');
        $img_url = wp_get_attachment_image_src(get_sub_field('banner_img'), 'full')[0];


?>

        <?php
if($img_link)
{
?>
        <a href="<?php echo $img_link;?>" class="position-relative" style="background:url(<?php  echo $img_url;?>)">
            <img class="w-100" src="<?php echo $img_url;?>" alt="">
        </a>
        <?php
}
else
{
    ?>
        <div href="javascript:void(0);" class="position-relative" style="background:url(<?php  echo $img_url;?>)">
            <img class="w-100" src="<?php echo $img_url;?>" alt="">
        </div>
        <?php
}
?>
        <?php
    }


}
    ?>




    </div>



</div>




<div class="container">


    <div class="text-center mt-5"><?php echo get_field('text_1');?></div>
</div>



<div class="home-bottom-banners  mt-5">


    <div class="row">

        <div class="col-12">

            <a href="<?php echo get_permalink( get_page_by_path( 'electric-handling-tools' ) );?>"
                class="fade-ele new-home-bottom-banner-4 home-bottom-banner mt-4">


                <img class="txt-img"
                    src="<?php echo get_template_directory_uri(); ?>/assets/images/new-banner-txt-4.png" alt="">


            </a>
        </div>
    </div>

    <div class="row">


        <div class="col-6">
            <a href="<?php echo get_permalink( get_page_by_path( 'logistics-tools' ) );?>"
                class="mt-4 fadeleft-ele new-home-bottom-banner-1 home-bottom-banner">

                <img class="txt-img"
                    src="<?php echo get_template_directory_uri(); ?>/assets/images/new-banner-txt-1.png" alt="">
            </a>

        </div>
        <div class="col-6">

            <a href="<?php echo get_permalink( get_page_by_path( 'stainless-steel' ) );?>"
                class="mt-4 faderight-ele new-home-bottom-banner-2 home-bottom-banner ">


                <img class="txt-img"
                    src="<?php echo get_template_directory_uri(); ?>/assets/images/new-banner-txt-2.png" alt="">

            </a>


            <a href="<?php echo get_permalink( get_page_by_path( 'custom-made-products' ) );?>"
                class="faderight-ele new-home-bottom-banner-3 home-bottom-banner mt-4">


                <img class="txt-img"
                    src="<?php echo get_template_directory_uri(); ?>/assets/images/new-banner-txt-3.png" alt="">


            </a>

        </div>

    </div>



    <div class="row">

        <div class="col-6">

            <a href="<?php echo get_permalink( get_page_by_path( 'luggage-first-aid' ) );?>"
                class="fadeleft-ele new-home-bottom-banner-5 home-bottom-banner mt-4">


                <!-- <img class="txt-img"
                    src="<?php echo get_template_directory_uri(); ?>/assets/images/new-banner-txt-5.png" alt=""> -->


            </a>


        </div>
        <div class="col-6">
            <a href="<?php echo get_site_url();?>/中古產品"
                class="faderight-ele new-home-bottom-banner-6 home-bottom-banner mt-4">



                <!-- <img class="txt-img"
                    src="<?php echo get_template_directory_uri(); ?>/assets/images/new-banner-txt-6.png" alt=""> -->

            </a>
        </div>

    </div>








    <!-- 

    <div class="row mt-4">
        <div class="col-12">
            <a href="<?php echo get_permalink( get_page_by_path( 'electric-handling-tools' ) );?>"
                class="fade-ele home-bottom-banner-1 home-bottom-banner">
                <div class="bg-1"></div>

                <div class="banner-txt">
                    <div class="chi-txt">電動搬運工具</div>
                    <div class="eng-txt">Electric handling tools
                    </div>

                    <span href="#" class="more-btn">了解更多</span>
                </div>

            </a>
        </div>
    </div>

    <div class="row mt-4">

        <div class="col-6 ">

            <a href="/logistics-tools/" class="fadeleft-ele home-bottom-banner-2 home-bottom-banner">
                <div class="banner-txt">
                    <div class="chi-txt">物流搬運
                    </div>
                    <div class="eng-txt">Logistics handling</div>

                    <span href="#" class="more-btn">了解更多</span>
                </div>
            </a>




        </div>


        <div class="col-6 ">


            <a href="/electric-scooter/" class="faderight-ele home-bottom-banner-3 home-bottom-banner">

                <div class="banner-txt">
                    <div class="chi-txt">電動車
                    </div>
                    <div class="eng-txt">Electric Scooter</div>

                    <span href="#" class="more-btn">了解更多</span>
                </div>
            </a>


            <a href="/stainless-steel/" class="faderight-ele home-bottom-banner-4 home-bottom-banner mt-4">
                <div class="banner-txt">
                    <div class="chi-txt">不鏽鋼
                    </div>
                    <div class="eng-txt">Stainless Steel </div>

                    <span href="#" class="more-btn">了解更多</span>
                </div>
            </a>











        </div>

    </div>

    <div class="row mt-4">

        <div class="col-6">
            <a href="/environmentally-friendly-smart-battery/"
                class=" fadeleft-ele home-bottom-banner-5 home-bottom-banner ">
                <div class="banner-txt">
                    <div class="chi-txt">環保智能電池
                    </div>
                    <div class="eng-txt">Environmentally <br>
                        friendly smart <br>
                        battery </div>

                    <span href="#" class="more-btn">了解更多</span>
                </div>
            </a>


        </div>
        <div class="col-6 ">

            <a href="/custom-made-products/" class="faderight-ele home-bottom-banner-6 home-bottom-banner ">
                <div class="banner-txt">
                    <div class="chi-txt">訂造產品
                    </div>
                    <div class="eng-txt">
                        Custom-made products
                    </div>


                    <span href="#" class="more-btn">了解更多</span>
                </div>
            </a>
        </div>

    </div> -->
</div>


<div class="mt-5">
    <div class="text-center">
        <h3>加入我們的電郵群組<br>Join Our Mailing List</h3>
        <div>將每週更新提示和特別優惠直接發送您的收件箱。</div>
    </div>
    <?php  echo do_shortcode('[activecampaign form=1 css=1]');?>
</div>
<div class="mobile home-bottom-banners mt-4">

    <a href="<?php echo get_permalink( get_page_by_path( 'electric-handling-tools' ) );?>"
        class="fade-ele home-bottom-banner mobile ">
        <img class="w-100" src="<?php echo get_template_directory_uri(); ?>/assets/images/mobile-home-banner-4.jpg"
            alt="">
    </a>

    <a href="<?php echo get_permalink( get_page_by_path( 'logistics-tools' ) );?>"
        class="fade-ele home-bottom-banner mobile ">
        <img class="w-100" src="<?php echo get_template_directory_uri(); ?>/assets/images/mobile-home-banner-1.jpg"
            alt="">
    </a>


    <a href="<?php echo get_permalink( get_page_by_path( 'stainless-steel' ) );?>"
        class="fade-ele home-bottom-banner mobile ">
        <img class="w-100" src="<?php echo get_template_directory_uri(); ?>/assets/images/mobile-home-banner-2.jpg"
            alt="">
    </a>


    <a href="<?php echo get_permalink( get_page_by_path( 'custom-made-products' ) );?>"
        class="fade-ele home-bottom-banner mobile ">
        <img class="w-100" src="<?php echo get_template_directory_uri(); ?>/assets/images/mobile-home-banner-3.jpg"
            alt="">
    </a>



    <a href="<?php echo get_permalink( get_page_by_path( 'luggage-first-aid' ) );?>"
        class="fade-ele home-bottom-banner mobile ">
        <img class="w-100" src="https://lwkpy.com.hk/wp-content/uploads/2022/05/gip-mobile-Banner.jpg" alt="">
    </a>

    <a href="<?php echo get_site_url();?>/中古產品" class="fade-ele home-bottom-banner mobile ">
        <img class="w-100" src="https://lwkpy.com.hk/wp-content/uploads/2022/03/second-hand-product-banner.jpeg" alt="">
    </a>

    <!-- <a href="<?php echo get_permalink( get_page_by_path( 'electric-scooter' ) );?>"
        class="fade-ele home-bottom-banner mobile ">
        <img class="w-100" src="<?php echo get_template_directory_uri(); ?>/assets/images/mobile-home-banner-6.jpg"
            alt="">
    </a> -->

</div>


<div class="bottom-container mt-5">
    <div class="mt-4 text-center"><?php echo get_field('text_2');?></div>

    <?php
// echo get_field('bottom_banners');
?>

    <div class="youtube-slides">


        <?php


if( have_rows('bottom_banners') ):

    // Loop through rows.
    while( have_rows('bottom_banners') ) : the_row();

        // Load sub field value.
        // $banner_img = get_sub_field('banner_img');
        $banner_youtube_video = get_sub_field('banner_youtube_video');
        $img_url = wp_get_attachment_image_src(get_sub_field('banner_img'), 'full')[0];
?>
        <div class="youtube-slide-div">
            <a href="<?php echo $banner_youtube_video;?>" class="position-relative" data-lity>
                <img class="w-100" src="<?php echo $img_url;?>" alt="">
            </a>
        </div>

        <?php

    // End loop.
    endwhile;

// No value.
else :
    // Do something...
endif;
?>




    </div>



</div>
</div>
<style type="text/css">
._form-branding {
    display: none;
}

form {
    padding: 0 1rem !important;
}

#_form_1_submit {

    background: #999999 !important;
    border: 0 !important;
    -moz-border-radius: 4px !important;
    -webkit-border-radius: 4px !important;
    border-radius: 4px !important;
    color: #fff !important;
    padding: 10px 20px !important;
    margin: 1.3rem auto 0 auto;
    display: block;
}
</style>
<script type="text/javascript">
$(function() {
    // 999999

    $('.fadeleft-ele , .faderight-ele, .fade-ele').css({
        'opacity': 0
    });



    $('.youtube-slides').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 3,
        dots: true,
        arrows: false,
        speed: 800,
        autoplaySpeed: 5000,
        autoplay: true,
        // fade: true,
        cssEase: 'ease-out',
        adaptiveHeight: true,
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }

        ]


    });



    $('.banner-container').slick({
        dots: true,
        arrows: false,
        pauseOnFocus: false,
        infinite: true,
        adaptiveHeight: true,

        speed: 800,
        autoplaySpeed: 5000,
        autoplay: true,
        // fade: true,
        cssEase: 'ease-out',
        pauseOnHover: false
    });

    Pace.on("done", function() {
        // $('.banner-ele').addClass('animated');
    });



    // $(window).on('resize scroll', function() {


    for (i = 0; i < $('.fadeleft-ele').length; i++) {
        if (
            // $('.fadeleft-ele').eq(i).isInViewport() &&
            !$('.fadeleft-ele').eq(i).hasClass('animate__animated')
        ) {
            $('.fadeleft-ele').eq(i).addClass('animate__animated');
            $('.fadeleft-ele').eq(i).addClass('fadeInLeft2');
            $('.fadeleft-ele').eq(i).addClass('delay-3');
        }
    }

    for (i = 0; i < $('.faderight-ele').length; i++) {
        if (
            // $('.faderight-ele').eq(i).isInViewport() &&
            !$('.faderight-ele').eq(i).hasClass('animate__animated')
        ) {
            $('.faderight-ele').eq(i).addClass('animate__animated');
            $('.faderight-ele').eq(i).addClass('fadeInRight2');
            $('.faderight-ele').eq(i).addClass('delay-3');
        }
    }


    for (i = 0; i < $('.fade-ele').length; i++) {
        if (
            // $('.fade-ele').eq(i).isInViewport() &&
            !$('.fade-ele').eq(i).hasClass('animate__animated')
        ) {
            $('.fade-ele').eq(i).addClass('animate__animated');
            $('.fade-ele').eq(i).addClass('animate__fadeIn');
            $('.fade-ele').eq(i).addClass('delay-3');
        }
    }




    // if ($('.home-bottom-banner-1').isInViewport() && !$('.home-bottom-banner-1').hasClass(
    //         'animate__animated')) {
    //     $('.home-bottom-banner-1').addClass('animate__animated');
    //     $('.home-bottom-banner-1').addClass('animate__fadeIn');
    //     $('.home-bottom-banner-1').addClass('delay-3');
    // }
    // if ($('.home-bottom-banner-2').isInViewport() && !$('.home-bottom-banner-2').hasClass(
    //         'animate__animated')) {
    //     $('.home-bottom-banner-2').addClass('animate__animated');
    //     $('.home-bottom-banner-2').addClass('fadeInLeft2');
    //     $('.home-bottom-banner-2').addClass('delay-3');
    // }
    // if ($('.home-bottom-banner-3').isInViewport() && !$('.home-bottom-banner-3').hasClass(
    //         'animate__animated')) {
    //     $('.home-bottom-banner-3').addClass('animate__animated');
    //     $('.home-bottom-banner-3').addClass('fadeInRight2');
    //     $('.home-bottom-banner-3').addClass('delay-3');
    // }
    // if ($('.home-bottom-banner-4').isInViewport() && !$('.home-bottom-banner-4').hasClass(
    //         'animate__animated')) {
    //     $('.home-bottom-banner-4').addClass('animate__animated');
    //     $('.home-bottom-banner-4').addClass('fadeInRight2');
    //     $('.home-bottom-banner-4').addClass('delay-3');
    // }
    // if ($('.home-bottom-banner-5').isInViewport() && !$('.home-bottom-banner-5').hasClass(
    //         'animate__animated')) {
    //     $('.home-bottom-banner-5').addClass('animate__animated');
    //     $('.home-bottom-banner-5').addClass('fadeInLeft2');
    //     $('.home-bottom-banner-5').addClass('delay-3');
    // }
    // if ($('.home-bottom-banner-6').isInViewport() && !$('.home-bottom-banner-6').hasClass(
    //         'animate__animated')) {
    //     $('.home-bottom-banner-6').addClass('animate__animated');
    //     $('.home-bottom-banner-6').addClass('fadeInRight2');
    //     $('.home-bottom-banner-6').addClass('delay-3');
    // }


    // });
})
</script>
<?php
get_footer();