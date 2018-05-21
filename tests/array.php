<?php
/**
 * 获取内容
 */

include_once '../vendor/autoload.php';

use sjdskl\WebSpider;

$webSpider = WebSpider::getInstance();
$url = 'http://b.skl9.com';
/** @var \sjdskl\Libraries\Html $html */
$html = $webSpider->createWebInstance($url);
/** @var \sjdskl\Libraries\Html $a */
$a = $html->filterXPath('//*[@id="newList"]/li');
/** @var \sjdskl\Libraries\ReturnObject $rows */
$rows = $a->html();
echo $rows . "\n";
foreach($rows as $row) {
    echo $row . "\n";
}
/** @var \sjdskl\Libraries\ReturnObject $rows */
$rows = $a->text();
echo $rows . "\n";
foreach($rows as $row) {
    echo $row . "\n";
}

//替换图片网址，然后生成html
foreach($html->filterXPath("//img")->getCrawlerInstance() as $node) {
    echo $node->getAttribute('src') . "\n";
    //可以做上传七牛后生成地址啥的
    $node->setAttribute('src', 'https://baidu.com');
}
//修改后的内容会体现在原有内容里，可以方便提花内容
echo $html->html();