<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>
</main><!-- #main -->
</div><!-- #primary -->
</div><!-- #content -->

<?php get_template_part( 'template-parts/footer/footer-widgets' ); ?>

<footer id="colophon" class="site-footer mt-lg-4 mt-md-0 mt-sm-0 mt-0 " role="contentinfo">

    <div class="footer-container">
        <div class="row">
            <div class="col-lg-2 col-md-12 col-sm-12 col-12"> <a href="<?php echo get_site_url();?>"
                    class="logo-a d-inline-block">
                    <img class="logo" src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="">
                </a>
                <div class="social-media-icons">
                    <a href="https://www.facebook.com/leewaikeehk/" target="_blank"><img
                            src="<?php echo get_template_directory_uri(); ?>/assets/images/bottom-s-icon-1.png" alt="">
                    </a>
                    <a href="https://www.instagram.com/lee_wai_kee_hk/" target="_blank"><img
                            src="<?php echo get_template_directory_uri(); ?>/assets/images/bottom-s-icon-2.png" alt="">
                    </a>
                    <a href="https://www.youtube.com/channel/UCoRd8Gd5_s_NYn_b1XJnfOA" target="_blank"><img
                            src="<?php echo get_template_directory_uri(); ?>/assets/images/bottom-s-icon-3.png" alt="">
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-12 col-sm-12 col-12 ">
                熱線：(852) 3422 3539 / 9738 1932 <br>
                <div class="whatsapp-txt"> Whatsapp：(852) 9738 1932</div>
                傳真：(852) 3422 3790<br>
                電郵： <a href="mailto:enquiry@leewaikee.com" target="_blank" style="color:#fff;">enquiry@leewaikee.com</a>





            </div>
            <!-- <div class="col-lg-2 col-md-12 col-sm-12 col-12 ">營業時間： <br>
                星期一至星期五 9:30 - 18:30<br>
                星期六 10:00 - 17:00<br>
                星期日及公眾假期休息
            </div> -->
            <div class="col-lg-3 col-md-12 col-sm-12 col-12">
                <!-- 總店<br> -->
                <!-- 香港九龍油麻地新填地街226號地下 (油麻地港鐵站B2出口直行窩打老道口) -->
                <!-- <br><br> -->
                <!-- 陳列室及總店地址<br>
                新蒲崗大有街32號泰力工業中心1606室 (鑽石山港鐵站A2出口大有街直行)
                <br><br>
                維修點地址<br>
                九龍油麻地東安街24號地下 (油麻地港鐵站A1出口直行至東安街) -->


                陳列室及總店地址 <br>
                新蒲崗大有街32號泰力工業中心1606室<br>(鑽石山港鐵站A2出口大有街直行)<br>
                營業時間：星期一至五 09:00 - 18:00<br>星期六、日及公眾假期休息


            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                <!-- 總店<br> -->
                <!-- 香港九龍油麻地新填地街226號地下 (油麻地港鐵站B2出口直行窩打老道口) -->
                <!-- <br><br> -->
                <!-- 陳列室及總店地址<br>
                新蒲崗大有街32號泰力工業中心1606室 (鑽石山港鐵站A2出口大有街直行)
                <br><br>
                維修點地址<br>
                九龍油麻地東安街24號地下 (油麻地港鐵站A1出口直行至東安街) -->



                維修點地址<br>
                新蒲崗大有街32號泰力工業中心1612室 <br>
                (鑽石山港鐵站A2出口大有街直行) <br>
                營業時間：星期一至五 09:30 - 17:30 <br>
                星期六：10:00 - 16:00 星期日及公眾假期休息

            </div>
        </div>

    </div>
</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>