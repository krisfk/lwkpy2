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

    <div class="grey-container p-4">


        <?php
        // echo date('Y');
        //echo get_the_content();?>

        <div class="text-center mb-3"> <select class="form-select news-select news-select-y "
                aria-label="Default select example">
                <option value="" selected>所有年份</option>
                <?php for($i=date('Y');$i>date('Y')-10;$i--)
                {
                    ?>
                <option value="<?php echo $i;?>"><?php echo $i;?>年</option>

                <?php
                }
                    ?>
                <!-- <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option> -->
            </select> <select class="form-select  news-select news-select-m" aria-label="Default select example">
                <option value="" selected>所有月份</option>
                <?php for($i=12;$i>=1;$i--)
                {
                    ?>
                <option value="<?php echo $i;?>"><?php echo $i;?>月</option>

                <?php
                }
                    ?>
            </select></div>

        <div class="purple-line"></div>

        <ul class="news-list-ul">

            <?php
            
            $args = array(
                // 'post_status' => 'publish',
                'post_type' => 'lwkpy_news',
                'meta_key'          => 'news_date',
                'orderby'           => 'meta_value_num',
                'order'             => 'DESC'
                );

                $loop = new WP_Query( $args );
        
                while ( $loop->have_posts() ) {
                     $loop->the_post(); 
                     ?>
            <?php
            $str = get_field('news_date');
            $year = explode("年", $str)[0];
            $month = explode("月", explode("年", $str)[1])[0];

                       
            ?>

            <li class="y<?php echo $year;?> m<?php echo $month;?>">

                <a href="<?php echo get_permalink(); ?>">
                    <table>
                        <tr>
                            <td class="news-date-td"><?php echo get_field('news_date');?> </td>
                            <td> <?php echo get_the_title();?></td>
                        </tr>
                    </table>
                </a>
            </li>
            <?php
               }
                ?>

            <!-- <li><a href="#">
                    <table>
                        <tr>
                            <td class="news-date-td">2021年6月7日 </td>
                            <td> 文字內容的位置這段是文字這段是文字內容的位置</td>
                        </tr>
                    </table>
                </a></li>
            <li><a href="#">
                    <table>
                        <tr>
                            <td class="news-date-td">2021年6月7日 </td>
                            <td> 文字內容的位置這段是文字這段是文字內容的位置</td>
                        </tr>
                    </table>
                </a></li>
            <li><a href="#">
                    <table>
                        <tr>
                            <td class="news-date-td">2021年6月7日 </td>
                            <td> 文字內容的位置這段是文字這段是文字內容的位置</td>
                        </tr>
                    </table>
                </a></li> -->
        </ul>



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