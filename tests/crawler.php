<?php
/**
 * 获取crawler实例
 */

include_once '../vendor/autoload.php';

use sjdskl\WebSpider;

$webSpider = WebSpider::getInstance();
$url = 'http://b.skl9.com';
/** @var \sjdskl\Libraries\Html $html */
$html = $webSpider->createWebInstance($url);
/** @var \Symfony\Component\DomCrawler\Crawler $crawler */
$crawler = $html->getCrawlerInstance();