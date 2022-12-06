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

<div class="container">


    <div class=" mt-4 text-center">

        <?php
echo get_field('text_1');
?>
    </div>



    <span class="breadcrumb mt-3">


        <?php echo get_field('breadcrumb'); ?>

    </span>

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
                    <a class="large-product-img-a" data-lightbox="product-img" href="<?php echo $product_url_arr[0];?>">
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
                        <a style="display:none;" data-lightbox="product-img"
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

                <?php if (get_field('product_weight'))
                {
                    ?>
                <div class="product-weight"><img class="mt-2 weight-icon"
                        src="<?php echo get_template_directory_uri(); ?>/assets/images/weight-img.png" alt="">
                    <?php echo get_field('product_weight');?>

                </div>

                <?php
                }?>

                <div class="mt-3 product-description-div">

                    <?php echo get_field('product_description');?>
                </div>

                <?php
if(have_rows('pdfs'))
{
?>

                <div class="mt-5"> PDF DOWNLOAD</div>
                <ul class="pdf-ul mt-1">


                    <?php

while( have_rows('pdfs') ) { the_row();
?>

                    <li>
                        <a target="_blank" href="<?php echo get_sub_field('pdf');?>">


                            <?php echo get_sub_field('pdf_name');?> <img class="red-arrow-down"
                                src="<?php echo get_template_directory_uri(); ?>/assets/images/red-arrow-down.png"
                                alt="">
                        </a>
                    </li>
                    <?php
}

                ?>


                </ul>

                <?php
}
?>



            </div>
            <?php
            }
            ?>

        </div>

    </div>

    <?php if(get_field('youtube_video'))
    {
        ?>

    <div class="youtube-div text-center pt-5 pb-5 mt-5">

        <?php echo get_field('youtube_video');?>



        <div class="mt-4"><?php echo get_field('youtube_video_caption');?></div>

    </div>
    <?php

    } ?>

    <div class="container">

        <div class="row points-intro-div mt-5 gx-5">

            <div class="col-6">


                <?php
            $img_url = wp_get_attachment_image_src(get_field('point_introduction_image'), 'full')[0];

            ?>

                <img class="w-100" src="<?php echo $img_url;?>" alt="">
            </div>
            <div class="col-6 ps-5 mb-5">

                <?php echo get_field('point_introduction_content');?>
            </div>

            <?php echo get_field('content_under_point_introduction');?>
            <!-- <div class="row mt-5 gx-5">
                <div class="col-3 text-center mb-4">
                    <img class="w-100 mb-3"
                        src="http://64.227.13.14/lwkpy/wp-content/uploads/2022/05/Point-Touch-Button.jpeg" alt="">
                    <div class="mb-4">點觸控按鈕</div>
                </div>
                <div class="col-3 text-center mb-4">

                    <img class="w-100 mb-3"
                        src="http://64.227.13.14/lwkpy/wp-content/uploads/2022/05/2-Working-Mode.jpeg" alt="">
                    <div class="mb-4">2 種工作模式</div>
                </div>
                <div class="col-3 text-center mb-4">
                    <img class="w-100 mb-3" src="http://64.227.13.14/lwkpy/wp-content/uploads/2022/05/Armrest.jpeg"
                        alt="">
                    <div class="mb-4">手柄</div>
                </div>
                <div class="col-3 text-center mb-4">
                    <img class="w-100 mb-3" src="http://64.227.13.14/lwkpy/wp-content/uploads/2022/05/Battery.jpeg"
                        alt="">
                    <div class="mb-4">電池</div>
                </div>
                <div class="col-3 text-center mb-4">
                    <img class="w-100 mb-3"
                        src="http://64.227.13.14/lwkpy/wp-content/uploads/2022/05/Crawler-Track-2.jpeg" alt="">
                    <div class="mb-4">履帶式軌道</div>
                </div>
                <div class="col-3 text-center mb-4">
                    <img class="w-100 mb-3" src="http://64.227.13.14/lwkpy/wp-content/uploads/2022/05/Button.jpeg"
                        alt="">
                    <div class="mb-4">按鈕</div>
                </div>
                <div class="col-3 text-center mb-4">
                    <img class="w-100 mb-3"
                        src="http://64.227.13.14/lwkpy/wp-content/uploads/2022/05/Mode-Shift-Module.jpeg" alt="">
                    <div class="mb-4">模式切換欄</div>
                </div>
                <div class="col-3 text-center mb-4">
                    <img class="w-100 mb-3"
                        src="http://64.227.13.14/lwkpy/wp-content/uploads/2022/05/Loading-Board-1.jpeg" alt="">
                    <div class="mb-4">裝載板</div>
                </div>
            </div> -->

        </div>

        <div class="youtube-slides" style="<?php 
            if( !have_rows('bottom_banners') )
            { echo 'display:none;';}?>">


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
        <?php
        
        
       if( get_field('feature_points') || get_field('feature_image'))
       {
           ?>

        <div class="feature-div mt-5 ">
            <h2>主要特點</h2>

            <div class="row justify-content-center">

                <?php
if(get_field('feature_points'))
{                
                ?>
                <div class="col-lg-4 col-md-12 col-sm-12 col-12 ">
                    <?php echo get_field('feature_points');?>

                </div>
                <?php
}
                    ?>

                <?php
                    if(get_field('feature_image'))
                    {
                        
                    ?>
                <div class="
                    <?php
                    if(get_field('feature_points'))
                    {
                        ?>
                                            col-lg-8

                        <?php
                    }
                    else
                    {
                        ?>
                                                                    col-lg-8

                        <?php
                    }
                    ?>
                    
                    
                    col-md-12 col-sm-12 col-12 ">


                    <?php 
            $img_url = wp_get_attachment_image_src(get_field('feature_image'), 'full')[0];

        ?>
                    <img class="w-100 " src="<?php echo $img_url;?>" alt="">

                    <div class="mt-4">
                        <?php echo get_field('content_under_feature_image');?>
                    </div>
                    <!-- <img class="w-100" src="http://138.197.0.237/wp-content/uploads/2021/04/moving-feature.png" alt=""> -->
                </div>
                <?php
                    }
                    ?>

            </div>



        </div>

        <?php
       }
        ?>


        <div class="bottom-menu mt-5">

            <?php
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);
            
            $tabs_arr=array();
    if( have_rows('tabs') ){

        // Loop through rows.
        $idx=0;
        while( have_rows('tabs') ) { the_row();
            // echo 1;
            // array_push($tabs_arr, get_sub_field('tab_name'));

            // $tab = new stdObject();
            // $tab->tab_name=get_sub_field('tab_name');
            $tabs_arr[$idx]['tab_name']=get_sub_field('tab_name');
                    // echo 1;
                    // $tab->tab_name = get_sub_field('tab_name');
                

                $idx2=0;
                $tab_content_arr=array();

            while( have_rows('tab_contents') ) { the_row();
               
                // $name = new stdClass();
                    $tab_content_arr[$idx2]['tab_content_txt']= get_sub_field('tab_content_txt');
                    $tab_content_arr[$idx2]['tab_content_img']=wp_get_attachment_image_src(get_sub_field('tab_content_img'), 'full')[0];

                    // $img_url = wp_get_attachment_image_src(get_field('top_banner'), 'full')[0];

                // $tabs_arr[$idx][$idx2]=new stdClass();
                // $tabs_arr[$idx][$idx2]['tab_content_txt'] = get_sub_field('tab_content_txt');

               $idx2++;
                
            }

            $tabs_arr[$idx]['tab_content']=$tab_content_arr;
            

                //  array_push($tabs_arr, $tab);

            $idx++;
        }
    }


    // print_r($tabs_arr);
?>
            <ul class="bottom-menu-ul">

                <?php

for($i=0;$i<count($tabs_arr);$i++)
{

    ?>
                <li> <a href="javascript:void(0);"
                        class="<?php echo $i==0 ? 'active':'';?>"><?php echo$tabs_arr[$i]['tab_name']; ?></a></li>
                <?php
}
    ?>
                <!-- <li> <a class="active" href="javascript:void(0);"> Coupling Options</a></li>
                <li> <a href="javascript:void(0);">Machine Options</a></li>
                <li> <a href="javascript:void(0);">Safety Features</a></li>
             -->

            </ul>


            <?php
            for($i=0;$i<count($tabs_arr);$i++)
            {
                
                    ?>

            <ul class="bottom-menu-select-show-table mt-5">


                <?php
            
            
            for($j=0;$j<count($tabs_arr[$i]['tab_content']);$j++)
            {
                

?>
                <li><img src="<?php echo $tabs_arr[$i]['tab_content'][$j]['tab_content_img']?>" alt="">
                    <div class="txt"><?php echo $tabs_arr[$i]['tab_content'][$j]['tab_content_txt']?></div>
                </li>
                <?php
                }
                
                ?>

            </ul>
            <?php
            }
            ?>


            <!-- <ul class="bottom-menu-select-show-table mt-5">
                <li><img src="http://138.197.0.237/wp-content/uploads/2021/04/AT200-TOW-Coupling-male-tow.jpg" alt="">
                    <div class="txt">聯軸器 - 男 - 針</div>
                </li>
                <li><img src="http://138.197.0.237/wp-content/uploads/2021/04/AT200-TOW-Coupling-male-pin.jpg" alt="">
                    <div class="txt">聯軸器 - 男 -
                        50毫米拖車球</div>

                </li>
                <li><img src="http://138.197.0.237/wp-content/uploads/2021/04/AT200-TOW-Coupling-male-box.jpg" alt="">
                    <div class="txt">聯軸器 - 男 -
                        高度可調箱</div>
                </li>
                <li><img src="http://138.197.0.237/wp-content/uploads/2021/04/AT-TOW-Coupling-female-box.jpg" alt="">
                    <div class="txt">聯軸器 - 女性 - 箱</div>
                </li>

            </ul>

            <ul class="bottom-menu-select-show-table mt-5">
                <li><img src="http://138.197.0.237/wp-content/uploads/2021/05/AT200-TOW-ATEX-EX.jpg" alt="">
                    <div class="txt"></div>
                </li>
                <li><img src="http://138.197.0.237/wp-content/uploads/2021/05/AT200-TOW-Fifth-wheel.jpg" alt="">
                    <div class="txt"></div>
                </li>
                <li><img src="http://138.197.0.237/wp-content/uploads/2021/05/AT200-TOW-lithium-battery.jpg" alt="">
                    <div class="txt"></div>
                </li>
                <li><img src="http://138.197.0.237/wp-content/uploads/2021/05/AT200-TOW-Machine-crawl-coupling-assist.jpg"
                        alt="">
                    <div class="txt"></div>
                </li>
                <li><img src="http://138.197.0.237/wp-content/uploads/2021/05/AT200-TOW-Option-flashing-safety-light-and-motion-bleeper.jpg"
                        alt="">
                    <div class="txt"></div>
                </li>

            </ul>

            <ul class="bottom-menu-select-show-table mt-5">
                <li><img src="http://138.197.0.237/wp-content/uploads/2021/05/AT200-TOW-Anti-crush-button-rotated.jpg"
                        alt="">
                    <div class="txt"></div>
                </li>
                <li><img src="http://138.197.0.237/wp-content/uploads/2021/05/AT200-TOW-Automatic-cut-off-as-tiller-arm-returns-to-vertical.jpg"
                        alt="">
                    <div class="txt"></div>
                </li>
                <li><img src="http://138.197.0.237/wp-content/uploads/2021/05/AT200-TOW-Emergency-stop-button.jpg"
                        alt="">
                    <div class="txt"></div>
                </li>

                <li><img src="http://138.197.0.237/wp-content/uploads/2021/05/AT200-TOW-Warning-horn.jpg" alt="">
                    <div class="txt"></div>
                </li>
            </ul> -->



        </div>



    </div>
</div>






</div>

<div class="container text-center mb-5 mt-5">
    <div class="you-may-also-like-title mb-4">你可能也會喜歡</div>

    <?php
  global $post;
  $terms = wp_get_post_terms( get_the_id(), 'product_type');
//   print_r($terms); #displays the output
  $term_id = $terms[0]->term_id;
//   echo $term_id;

  $args = array(
    'post_type' => 'product',
    'posts_per_page' => 3,
    'orderby'        => 'rand',
    'tax_query' => array(
        array(
        'taxonomy' => 'product_type',
        'field' => 'term_id',
        'terms' => $term_id,
         )
      )
    );
    $query = new WP_Query( $args );
    
    ?>
    <div class="row justify-content-center">
        <?php
    if($query->have_posts())
    {
        while($query->have_posts())
        {
            $query->the_post();
            ?>

        <div class="col-4 product-div"">

        <a class=" product-cat-a" href="<?php echo get_permalink(get_the_ID())?>">
            <?php
                $img_id = get_field('product_images')[0]['product_image'];
                $product_img = wp_get_attachment_image_src($img_id, 'full')[0];
               ?>
            <img class="w-100" src="<?php echo $product_img;?>" alt="">
            <div class="text-center mt-3"><?php echo get_the_title(get_the_ID());?></div>
            </a>

        </div>


        <?php
            // echo 1;
        }
    }


//   echo $term_id;
    ?>
    </div>
</div>

<script type="text/javascript">
$(function() {




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
        $('.large-product-img').attr('src', bg);
        $('.large-product-img-a').attr('href', bg);


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