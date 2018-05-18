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
//$url = 'https://blog.skl9.com';
$url = 'http://b.skl9.com';
$html = $webSpider->createWebInstance($url);
//echo $html->html();
$a = $html->filterXPath('//*[@id="newList"]/li');
echo $a->count() . "\n";
foreach ($a as $v) {
    echo $v->textContent . "\n";
}

$a = $html->filterXPath('//*[@id="newList"]/li[1]/a/@href');

echo $a->text() . "\n";