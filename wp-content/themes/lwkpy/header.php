<?php
/**
 * The header.
 *
 * This is the template that displays all of the <head> section and everything up until main.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>
<!doctype html>
<html <?php language_attributes(); ?> <?php twentytwentyone_the_html_classes(); ?>>

<head>
    <!-- Google Tag Manager -->
    <script>
    console.log(999);
    (function(w, d, s, l, i) {
        w[l] = w[l] || [];
        w[l].push({
            'gtm.start': new Date().getTime(),
            event: 'gtm.js'
        });
        var f = d.getElementsByTagName(s)[0],
            j = d.createElement(s),
            dl = l != 'dataLayer' ? '&l=' + l : '';
        j.async = true;
        j.src =
            'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
        f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-N7PG8ZK');
    </script>
    <!-- End Google Tag Manager -->

    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="format-detection" content="telephone=no">

    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <?php wp_head(); ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pace-js@latest/pace-theme-default.min.css">
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/common.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/lightbox.min.js"></script>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/lightbox.min.css">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/lity.css">
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/lity.js">
    </script>



    <!-- Global site tag (gtag.js) - Google Analytics -->
    <!-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-206758737-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-206758737-1');
    </script> -->



</head>

<body <?php body_class(); ?>>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N7PG8ZK" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->


    <a href="https://wa.me/85297381932" target="_blank" class="wts-icon-a">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/wts-icon-2.png" alt="">
    </a>


    <a href="mailto:enquiry@leewaikee.com" target="_blank" class="email-icon-a">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/email-icon.png" alt="">
    </a>

    <!-- Messenger Chat plugin Code -->
    <div id="fb-root"></div>

    <!-- Your Chat plugin code -->
    <div id="fb-customer-chat" class="fb-customerchat" greeting_dialog_display="hide">
    </div>

    <script>
    var chatbox = document.getElementById('fb-customer-chat');
    chatbox.setAttribute("page_id", "112322513837634");
    chatbox.setAttribute("attribution", "biz_inbox");
    chatbox.setAttribute("greeting_dialog_display", "hide");

    // ="hide"


    // chatbox.setAttribute("greeting_dialog_display", "fade");
    // chatbox.setAttribute("greeting_dialog_delay", "10");

    //   ="10"


    window.fbAsyncInit = function() {
        FB.init({
            xfbml: true,
            version: 'v11.0'
        });
    };

    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/zh_HK/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
    </script>
    <?php wp_body_open(); ?>

    <div class="mobile-menu-div">

        <a href="<?php echo get_site_url();?>" class="logo-a d-inline-block">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="">
        </a>

        <a href="javascript:void(0)" class="close-btn-a">
            <!-- <img
                src="<?php echo get_template_directory_uri(); ?>/assets/images/close-btn.png" alt=""> -->
        </a>

        <?php


$main_menu = wp_get_menu_array('main menu');
?>
        <ul>

            <?php


        
foreach ($main_menu as $menu_item) {
$url = $menu_item['url'];
$title = $menu_item['title'];
$class = $menu_item['class'];

$temp_arr=explode(get_site_url(),$url);
$slug=str_replace('/en/','',$temp_arr[1]);
$slug=str_replace('/cn/','',$slug);
$slug=str_replace('/','',$slug);



global $post;
$post_slug = $post->post_name;

if(count($menu_item['children']))
{
//    
    echo '<li><a class="level-1';
 
    if(is_page())
    {
        echo $post_slug == $slug ? ' active ' : '';
    }

    if(is_archive())
    {
        $term = get_queried_object();
        echo $term->slug == $slug ? ' active ' : '';    
    }


    echo' parent '.$slug.'" href="'.$url.'">'.$title.'</a>';

 
    echo '<ul class="menu-submenu">';
    foreach ($menu_item['children'] as $sub_menu_item) 
    {
        $sub_url = $sub_menu_item['url'];
        $sub_title = $sub_menu_item['title'];
        $sub_temp_arr=explode(get_site_url(),$sub_url);
        $sub_slug=str_replace('/en/','',$sub_temp_arr[1]);
        $sub_slug=str_replace('/cn/','',$sub_slug);
        $sub_slug=str_replace('/',' ',$sub_slug);
        // $sub_slug=str_replace('.','',$sub_slug);
        echo'<li><a class="';
            
      

        echo' '.$sub_slug.'" href="'.$sub_url.'">'.$sub_title.'</a></li>';
    }
    echo '</ul>';

}
else
{
echo '<li class="'.($slug ? $slug : 'test' ) .'"><a class="';

echo 'level-1 '.$class;

if(is_archive())
{
    $term = get_queried_object();
    echo $term->slug == $slug ? ' active ' : '';
}



echo $slug.'" href="'.$url.'" >'.$title.'<div class="line"></div></a>';


if($class=='product-list-btn')
{

    
    ?>

            <?php 
                                
                                $page = get_posts([
                                    'name'      => 'mobile-product-submenu',
                                    'post_type' => 'page'
                                ]);
                                if ( $page )
                                {
                                   echo $page[0]->post_content;
                                }

                                ?>



            <!-- <ul class="submenu">
                <li class="cate-title">
                    <a href="javascript:void(0)" class="submenu-a">智能電動搬運工具</a>

                    <ul class="submenu">
                        <li><a href="/electric-handling-tools/master-mover/"> MasterMover</a></li>
                        <li><a href="/electric-handling-tools/zallys/">Zallys</a></li>
                    </ul>
                </li>

                <li class="cate-title"><a href="javascript:void(0)" class="submenu-a">智能環保電池</a>
                    <ul class="submenu">
                        <li><a href="/environmentally-friendly-smart-battery/"> GTP</a></li>

                    </ul>
                </li>

                <li class="cate-title"><a href="javascript:void(0)" class="submenu-a">不鏽鋼產品</a>
                    <ul class="submenu">
                        <li><a href="/stainless-steel/ss不鏽鋼籠車-訂造/"> Logicage SS不鏽鋼籠車/訂造</a></li>
                        <li><a style="font-family: var(--list--font-family); font-size: var(--global--font-size-base);"
                                href="/stainless-steel/ss304不鏽鋼籠車-訂造/">Mover Master SS304不鏽鋼籠車/訂造</a></li>
                        <li><a href="/stainless-steel/不鏽鋼手推車/">不鏽鋼手推車</a></li>
                        <li><a href="/stainless-steel/不銹鋼工程/">不鏽鋼工程</a></li>
                    </ul>
                </li>

                <li class="cate-title"><a href="javascript:void(0)" class="submenu-a">電動電單車</a>
                    <ul class="submenu">
                        <li><a href="/electric-scooter/">CityBlitz</a></li>

                    </ul>
                </li>

                <li class="cate-title"><a href="javascript:void(0)" class="submenu-a">物流搬運設備</a>
                    <ul class="submenu">
                        <li><a href="/logistics-tools/logistics-cage/">物流籠車</a></li>
                        <li><a href="/logistics-tools/手推車/">手推車</a></li>
                        <li><a href="/logistics-tools/木板車/">木板車</a></li>
                        <li><a href="/logistics-tools/手拉車/">手拉車</a></li>
                    </ul>
                </li>

                <li class="cate-title"><a href="javascript:void(0)" class="submenu-a">工業腳輪</a>
                    <ul class="submenu">
                        <li><a href="/logistics-tools/%e5%b7%a5%e6%a5%ad%e8%85%b3%e8%bc%aa/shc/">SHC</a></li>
                        <li><a href="/logistics-tools/%e5%b7%a5%e6%a5%ad%e8%85%b3%e8%bc%aa/supo/">SUPO</a></li>
                    </ul>
                </li>

                <li class="cate-title"><a href="javascript:void(0)" class="submenu-a">訂造產品</a>
                    <ul class="submenu">
                        <li><a href="/custom-made-products/">自選訂造</a></li>

                    </ul>
                </li>

                <li class="cate-title"><a href="javascript:void(0)" class="submenu-a">慈善環保計劃</a>

                    <ul class="submenu">
                        <li><a href="/trade-in/">Trade-In</a></li>
                    </ul>
                </li>





            </ul> -->




            <?php
}

}
echo'</li>';


}



        ?>
        </ul>


    </div>
    <div id="page" class="site">
        <a class="skip-link screen-reader-text"
            href="#content"><?php esc_html_e( 'Skip to content', 'twentytwentyone' ); ?></a>

        <?php //get_template_part( 'template-parts/header/site-header' ); ?>

        <div id="content" class="site-content">
            <div id="primary" class="content-area">
                <main id="main" class="site-main" role="main">

                    <div class="top-div">
                        <div class="container text-center position-relative">

                            <a href="javascript:void(0);" class="mobile-btn"></a>

                            <a href="<?php echo get_site_url();?>" class="logo-a d-inline-block">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="">
                            </a>


                            <ul class="social-media-ul">
                                <li> <a href="https://www.facebook.com/leewaikeehk/" target="_blank"> <img
                                            src="http://138.197.0.237/wp-content/themes/lwkpy/assets/images/fb-icon-2.png"
                                            alt=""></a></li>
                                <li> <a href="https://www.instagram.com/lee_wai_kee_hk/" target="_blank"> <img
                                            src="http://138.197.0.237/wp-content/themes/lwkpy/assets/images/ig-icon-2.png"
                                            alt=""></a></li>
                                <li> <a href="https://www.youtube.com/channel/UCoRd8Gd5_s_NYn_b1XJnfOA" target="_blank">
                                        <img src="http://138.197.0.237/wp-content/themes/lwkpy/assets/images/yt-icon-2.png"
                                            alt=""></a></li>


                            </ul>


                            <!-- <ul class="d-table p-0 float-end right-ele">

                                <li class="d-table-cell">
                                    <ul class="contact-info">
                                        <li> 電話︰(852) 3422 3539 </li>
                                        <li> 電郵︰ <a href="mailto:leewaikee01@gmail.com" target="_blank">
                                                leewaikee01@gmail.com</a>

                                        </li>
                                    </ul>
                                </li>

                                <li class="d-table-cell align-middle">
                                    <ul class="social-icon-lists">
                                        <li class="ps-5">
                                            <a href="#">
                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/fb-icon.png"
                                                    alt=""></a>
                                        </li>
                                        <li class="ps-3"> <a href="#">
                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/yt-icon.png"
                                                    alt=""></a>
                                        </li>
                                    </ul>

                                </li>

                            </ul> -->


                        </div>

                    </div>

                    <div class="top-nav mb-2">

                        <div class="container position-relative">



                            <ul class="top-menu-ul mt-3">

                                <?php
        
        
foreach ($main_menu as $menu_item) {
$url = $menu_item['url'];
$title = $menu_item['title'];
$class = $menu_item['class'];

$temp_arr=explode(get_site_url(),$url);
$slug=str_replace('/en/','',$temp_arr[1]);
$slug=str_replace('/cn/','',$slug);
$slug=str_replace('/','',$slug);



global $post;
$post_slug = $post->post_name;

if(count($menu_item['children']))
{
   
    echo '<li><a class="level-1';
 
    if(is_page())
    {
        echo $post_slug == $slug ? ' active ' : '';
    }

    if(is_archive())
    {
        $term = get_queried_object();
        echo $term->slug == $slug ? ' active ' : '';    
    }


    echo' parent '.$slug.'" href="'.$url.'">'.$title.'</a>';

 
    echo '<ul class="menu-submenu">';
    foreach ($menu_item['children'] as $sub_menu_item) 
    {
        $sub_url = $sub_menu_item['url'];
        $sub_title = $sub_menu_item['title'];
        $sub_temp_arr=explode(get_site_url(),$sub_url);
        $sub_slug=str_replace('/en/','',$sub_temp_arr[1]);
        $sub_slug=str_replace('/cn/','',$sub_slug);
        $sub_slug=str_replace('/',' ',$sub_slug);
        // $sub_slug=str_replace('.','',$sub_slug);
        echo'<li><a class="';
            
      

        echo' '.$sub_slug.'" href="'.$sub_url.'">'.$sub_title.'</a></li>';
    }
    echo '</ul>';

}
else
{
echo '<li class="'.($slug?$slug:'product-submenu-li').'"><a class="';

echo 'level-1 '.$class;

if(is_archive())
{
    $term = get_queried_object();
    echo $term->slug == $slug ? ' active ' : '';

   
}



echo $slug.'" href="'.$url.'" >'.$title.'<div class="line"></div></a>';

}
echo'</li>';


}


?>
                            </ul>

                            <ul class="social-media-ul">
                                <li> <a href="https://www.facebook.com/leewaikeehk/" target="_blank"> <img
                                            src="<?php echo get_template_directory_uri(); ?>/assets/images/fb-icon-2.png"
                                            alt=""></a></li>
                                <li> <a href="https://www.instagram.com/lee_wai_kee_hk/" target="_blank"> <img
                                            src="<?php echo get_template_directory_uri(); ?>/assets/images/ig-icon-2.png"
                                            alt=""></a></li>
                                <li> <a href="https://www.youtube.com/channel/UCoRd8Gd5_s_NYn_b1XJnfOA" target="_blank">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/yt-icon-2.png"
                                            alt=""></a></li>


                            </ul>


                            <div class="product-submenu-div">
                                <?php 
                                
                                $page = get_posts([
                                    'name'      => 'product-submenu',
                                    'post_type' => 'page'
                                ]);
                                if ( $page )
                                {
                                    echo $page[0]->post_content;
                                }

                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="black-top-nav m-0">
                        <div class="container">

                            <ul class="m-0 p-0 text-center">

                                <li>

                                    <a href="javascript:void(0);" class="level-1">物流搬運設備</a>

                                    <ul class="black-top-submenu">
                                        <li><a href="/logistics-tools/logistics-cage/">物流籠車</a></li>
                                        <li><a href="/logistics-tools/手推車/">手推車</a></li>
                                        <li><a href="/logistics-tools/木板車/">木板車</a></li>
                                        <li><a href="/logistics-tools/手拉車/">手拉車</a></li>
                                    </ul>
                                </li>
                                <li> <a href="javascript:void(0);" class="level-1">行李喼維修</a>
                                    <ul class="black-top-submenu">

                                        <li><a href="/luggage-first-aid/">喼救站</a></li>
                                    </ul>
                                </li>
                                <li> <a href="javascript:void(0);" class="level-1">不銹鋼產品</a>
                                    <ul class="black-top-submenu">
                                        <li><a href="/stainless-steel/不鏽鋼手推車/">不銹鋼手推車</a></li>
                                        <li><a href="/stainless-steel/不銹鋼工程/">不銹鋼工程</a></li>
                                    </ul>
                                </li>
                                <li> <a href="/recycle-logistics-cage/" class="level-1">環保回收籠</a></li>
                                <li><a href="javascript:void(0);" class="level-1">智能電動搬運工具</a>
                                    <ul class="black-top-submenu">

                                        <li><a href="/electric-handling-tools/xsto/">Xsto 電動樓梯車</a></li>
                                        <li><a href="/electric-handling-tools/master-mover/">MasterMover 電動搬運設備</a></li>
                                        <li><a href="/electric-handling-tools/zallys/">Zallys 電動搬運設備</a></li>
                                        <li><a href="/electric-handling-tools/hercules/">Hercules 電動手推車</a></li>
                                    </ul>
                                </li>
                                <li><a href="javascript:void(0);" class="level-1">工業腳輪</a>

                                    <ul class="black-top-submenu">
                                        <li><a href="/logistics-tools/%e5%b7%a5%e6%a5%ad%e8%85%b3%e8%bc%aa/shc/">SHC</a>
                                        </li>
                                        <li><a
                                                href="/logistics-tools/%e5%b7%a5%e6%a5%ad%e8%85%b3%e8%bc%aa/supo/">SUPO</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="javascript:void(0);" class="level-1">訂造產品</a>
                                    <ul class="black-top-submenu">
                                        <!-- <li class="cate-title">訂造產品</li> -->
                                        <li><a href="/custom-made-products/">自選訂造</a></li>
                                    </ul>
                                </li>
                                <li><a href="javascript:void(0);" class="level-1">慈善環保計劃</a>
                                    <ul class="black-top-submenu">
                                        <!-- <li class="cate-title">慈善環保計劃</li> -->
                                        <li><a href="/trade-in/">Trade-In</a></li>
                                    </ul>
                                </li>
                                <li><a href="/%E4%B8%AD%E5%8F%A4%E7%94%A2%E5%93%81/%22" class="level-1">中古產品</a> </li>

                            </ul>

                        </div>
                    </div>