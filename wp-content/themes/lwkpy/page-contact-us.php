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

    <span class="breadcrumb mt-4">


        <?php echo get_field('breadcrumb'); ?>


    </span>

    <div class="grey-container">

        <div class="row g-0">
            <div class="col-lg-4 col-md-12 col-sm-12 col-12 contact-logo-col position-relative ">
                <img src="<?php echo get_template_directory_uri() ?>/assets/images/logo.png" alt="">
            </div>
            <div class="col-lg-8 col-md-12 col-sm-12 col-12  p-5">
                <div class="mb-3">
                    客戶如有詢問，請填寫以下資料，我們的客戶主任會儘快與您聯絡。
                </div>
                <?php
echo do_shortcode( '[wpforms id="2234"]	' );
?>
            </div>
        </div>
    </div>
</div>


<div class="container mt-5 about-middle mb-5">

    <div class="grey-container p-4">
        <div class="row">

            <!-- 總店 
陳列室 


香港九龍油麻地新填地街226號地下
 (油麻地港鐵站B2出口直行窩打老道口)


SHOW ROOM分店

油麻地東安街24號地下
 (油麻地港鐵站A1出口直行至東安街)

 -->

            <?php echo get_the_content();?>
        </div>

        <!-- <h2>公司介紹</h2>
    李維記有限公司<br>
    李維記成立於1950年,致力於有效結合各行業的搬運工具, 依據客戶需求而建立有效的雙向溝通與合作模式，以全方位整合行銷策略，為客戶達成效益卓越的市場定位及營造成品牌為目標，李永強先生現任公司之董事。
    擁有三十多年經驗老字號<br>
    專營各類物流設備搬運設備、工業腳輪及膠轆，訂造不銹鋼燒焊及維修工程，更可代客戶設計專用手推車及運輸設備本公司常備各款運輸，搬運用手推車，歡迎來版及查詢。
    <br><br>
    <h2>以「堅持」為宗旨</h2>
    公司服務的客戶橫跨高科技、生活消費、傳統產業、藝術與文化創意等行業,藉由熟悉的市場運作模式與脈動，累積豐富的實務與市場行銷經驗，為客戶提供專業的建議與服務，讓他們更有效地提高企業價值及發展動力。
    <br><br>
    公司多年來以「堅持」之宗旨作為座右銘,在未來仍將持續以下的營運策略,堅持效率:領先業界的速度，滿足客戶時效性的需求；堅持品質:保證遵守嚴密的製造標準，提供客戶優異的品質及卓越的效能；堅持技術：優秀的研發技術團隊，提供客戶最新技術的產品；堅持服務：提供完善的服務團隊與客戶群有清晰及明確的售前溝通，而售後更提供妥善及快速的服務。本著「堅持」的宗旨，公司旗下品牌「MoveMaster」在2014年更榮獲「香港最受歡迎品牌」，由此更印證公司對產品的四大堅持。


    <div class="row mt-5">
        <div class="col-6">
            <img class="w-100" src="http://138.197.0.237/wp-content/uploads/2021/05/shop-img.png" alt="">
        </div>
        <div class="col-6"><img class="famous-brand-logo"
                src="http://138.197.0.237/wp-content/uploads/2021/05/famous-brand.png" alt=""></div>
    </div> -->

    </div>







</div>

<script type="text/javascript">
$(function() {

    // var h = $('.map iframe').width();

    // $('.map iframe').height(h);
})
</script>
<?php
get_footer();