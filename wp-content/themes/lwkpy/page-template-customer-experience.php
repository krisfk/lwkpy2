<?php
/**
 * Template Name: Customer Experience page
 * Template Post Type: post, page
 **/

get_header();

?>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/alloy_finger.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/lc_lightbox.lite.js"></script>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/lc_lightbox.css" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/minimal.css" />


<div class="banner-div" style="background:<?php echo get_field('top_banner_bg_color');?>">
    <div class="bg-color-2" style="background:<?php echo get_field('top_banner_bg_color_2');?>"></div>
    <div class="container">

        <?php
    $img_url = wp_get_attachment_image_src(get_field('top_banner'), 'full')[0];

    ?>
        <img class="w-100 banner-img " src="<?php echo $img_url;?>" alt="">


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

<div class="container popup-container popup-a-elem8 mb-5">
    <div class="client-popup-outer">

        <a href="javascript:void(0);" class="back-arrow-button  mt-3 mb-3">
            &#8592;
            返回

        </a>
        <div class="client-popup" style="background:#808080;">

            <img class="w-100 pt-5 px-5 pb-0" src="https://lwkpy.com.hk/wp-content/uploads/2022/09/sf-banner.jpg"
                alt="">

            <div class="container gx-0 p-5">

                <div class="row gx-5">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12 ">
                        <img class="w-100" src="https://lwkpy.com.hk/wp-content/uploads/2022/09/sf-image-1@2x-80.jpg"
                            alt="">

                        <div class="text-center mt-5 mb-5">
                            <img class="popup-client-logo"
                                src="https://lwkpy.com.hk/wp-content/uploads/2022/09/sf-logo.png" alt="">


                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12 ">


                        <div class="client-popup-text" style="color:#fff;">
                            這是假的文字內容這是假的文字內容，這是假的文字內容這是假的文字內容這是假的文字內容，這是假的文字內容這是假的文字內容，這是假的文字內容這是假的文字內容這是假的文字內容，這是假的文字內容這是假的文字內容，這是假的文字內容這是假的文字內容，這是假的文字內容這是假的文字內容這是假的文字內容這是假的文字內容，這是假的文字內容這是假的文字內容，這是假的文字內容這是假的文字內容，這是假的文字內容這是假的文字內容，這是假的文字內容這是假的文字內容，這是假的文字內容這是假的文字內容，這是假的文字內容這是假的文字內容，這是假的文字內容這是假的文字內容，這是假的文字內容這是假的文字內容，這是假的文字內容這是假的文字內容，這是假的文字內容。
                        </div>
                        <div class="row mt-5">

                            <div class="col-lg-6 col-md-6 col-sm-12 col-12 mb-4">

                                <img class="w-100" src="https://lwkpy.com.hk/wp-content/uploads/2022/09/sf-sq-img-1.jpg"
                                    alt="">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12 mb-4">
                                <img class="w-100" src="https://lwkpy.com.hk/wp-content/uploads/2022/09/sf-sq-img-1.jpg"
                                    alt="">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12 mb-4">
                                <img class="w-100" src="https://lwkpy.com.hk/wp-content/uploads/2022/09/sf-sq-img-1.jpg"
                                    alt="">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12 mb-4">
                                <img class="w-100" src="https://lwkpy.com.hk/wp-content/uploads/2022/09/sf-sq-img-1.jpg"
                                    alt="">
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>
</div>

<div class="container products-list logo-list mb-5">

    <span class="breadcrumb mt-3">


        <?php echo get_field('breadcrumb'); ?>

    </span>




    <div class="row mt-0 g-2">

        <div class="col-12 text-center mb-0"><?php echo get_field('text_content');?></div>


        <div class="text-center mt-0">（以下客戶排名不分先後）</div>
        <?php
      if( have_rows('customers') ){

        // Loop through rows.
        $idx=1;
        while( have_rows('customers') ) { the_row();
        
            $customer_logo_img = wp_get_attachment_image_src(get_sub_field('logo'), 'full')[0];

            
            if (get_sub_field('hide_from_list') === NULL || get_sub_field('hide_from_list')) {
                $hide_from_list=true;
              } else {
                $hide_from_list=false;
              }
            //   echo 

              
            $gallery_img_arr =array();
            while( have_rows('fotos') ) { the_row();
                array_push($gallery_img_arr, wp_get_attachment_image_src(get_sub_field('foto_img'), 'full')[0]);
            }
        ?>

        <div class="customer-col" style="display:<?php echo $hide_from_list ? 'none':'block';?>">

            <?php 
           
           if(count($gallery_img_arr)>0)
           {
               ?>

            <a href="<?php echo $gallery_img_arr[0];?>" class="customer-logo elem<?php echo $idx;?>"
                style="background:url(<?php echo $customer_logo_img;?>);"></a>

            <?php
           
           }
           else
           {
               ?>

            <div class="customer-logo no-gallery " style="background:url(<?php echo $customer_logo_img;?>)">
            </div>
            <?php
           }
           ?>


            <?php
            for($i=1;$i<count($gallery_img_arr);$i++)
            {
                ?>
            <div class="elem<?php echo $idx;?>" href="<?php echo $gallery_img_arr[$i]; ?>">
            </div>

            <?php
            }
        ?>
        </div>

        <?php
        $idx++;
        }
    }
    ?>

        <!-- <div class="col-3">
            <a href="https://images.unsplash.com/photo-1502082553048-f009c37129b9?dpr=1&auto=format&fit=crop&w=2000&q=80&cs=tinysrgb"
                class="customer-logo elem1"
                style="background:url(http://138.197.0.237/wp-content/uploads/2021/06/Asset-1@2x-1.png)"></a>
        </div>
        <div class="col-3">
            <a href="https://images.unsplash.com/photo-1431794062232-2a99a5431c6c?dpr=1&auto=format&fit=crop&w=2000&q=80&cs=tinysrgb"
                class="customer-logo elem2"
                style="background:url(http://138.197.0.237/wp-content/uploads/2021/06/Asset-1@2x-1.png)"></a>
        </div>
        <div class="col-3">
            <a href="https://images.unsplash.com/photo-1431794062232-2a99a5431c6c?dpr=1&auto=format&fit=crop&w=2000&q=80&cs=tinysrgb"
                class="customer-logo elem2"
                style="background:url(http://138.197.0.237/wp-content/uploads/2021/06/Asset-1@2x-1.png)"></a>
        </div>
        <div class="col-3">
            <a href="https://images.unsplash.com/photo-1431794062232-2a99a5431c6c?dpr=1&auto=format&fit=crop&w=2000&q=80&cs=tinysrgb"
                class="customer-logo elem2"
                style="background:url(http://138.197.0.237/wp-content/uploads/2021/06/Asset-1@2x-1.png)"></a>
        </div> -->

    </div>

    <div class="row">

        <div class="col-12">
            <img class="w-100" src="https://lwkpy.com.hk/wp-content/uploads/2021/07/long-logo-list.jpg" alt="">
        </div>
    </div>
</div>


</div>

<script type="text/javascript">
$(function() {
    $(document).ready(function(e) {

        // live handler

        for (i = 1; i <= $('.customer-col').length; i++) {
            lc_lightbox('.elem' + i, {
                wrap_class: 'lcl_fade_oc',
                gallery: true,
                thumb_attr: 'data-lcl-thumb',

                skin: 'minimal',
                radius: 0,
                padding: 0,
                border_w: 0,
                carousel: false,

            });
        }



    });

    $('.popup-a').click(function(e) {
        e.preventDefault();
        $('.logo-list').fadeOut(0);
        var ele = $(this).attr("class").split(' ')[1];

        $('.popup-container').fadeOut(0);
        $('.popup-container.' + ele).fadeIn(500);

        $('.logo-list').fadeOut(0);

        $('html,body').scrollTop(0);

    })
    $('.back-arrow-button').click(function() {
        $('.popup-container').fadeOut(0);
        $('.logo-list').fadeIn(500);


    })


})
</script>
<?php
get_footer();