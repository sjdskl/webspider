<?php
/**
 * Created by PhpStorm.
 * User: kailishen
 * Date: 2018/5/18
 * Time: 下午5:15
 */

include_once '../vendor/autoload.php';

use sjdskl\WebSpider;

$webSpider = WebSpider::getInstance();
$url = 'http://b.skl9.com';
$html = $webSpider->createWebInstance($url);
//获取html内容
//echo $html . "\n";
//或者
//echo $html->html() . "\n";

$a = $html->filterXPath('//*[@id="newList"]/li');
//echo $a->count() . "\n";
//echo ($a->html()) . "\n";

//$b = $html->filterXPath('//*[@id="newList"]/li[1]/a/@href');
//echo ($b->text()) . "\n";
//echo "\n";
/** @var \sjdskl\Libraries\Html $b */
$b = $a->filterXPath("//a");
//as string
echo $b->html() . "\n";
//as array
foreach ($b->html() as $v) {
    echo $v . "\n";
}