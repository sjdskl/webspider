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