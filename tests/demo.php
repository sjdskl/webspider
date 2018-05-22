<?php
/**
 * Created by PhpStorm.
 * User: kailishen
 * Date: 2018/5/22
 * Time: 上午9:45
 */

include_once '../vendor/autoload.php';

use sjdskl\WebSpider;

$webSpider = WebSpider::getInstance();

$url = 'https://voice.itjuzi.com/?p=18944';
/** @var \sjdskl\Libraries\Html $html */
$html = $webSpider->createWebInstance($url);
$title = $html->filterXPath('//*[@id="post-18944"]/header/h1');
echo $title->text();

$contents = $html->filterXPath('//*[@id="post-18944"]/div[2]');
echo $contents->html();
$images = $contents->filterXPath("//img");
foreach ($images->getCrawlerInstance() as $img) {
    echo $img->getAttribute('src');
    //上传
    $img->setAttribute('src', 'https://www.baidu.com');
}

echo $html->html();