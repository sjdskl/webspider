<?php
/**
 * 获取网页内容
 */

include_once '../vendor/autoload.php';

use sjdskl\WebSpider;

$webSpider = WebSpider::getInstance();
$url = 'http://b.skl9.com';
$html = $webSpider->createWebInstance($url);
//实现了tostring
echo $html . "\n";
echo $html->html() . "\n";
echo $html->text() . "\n";
