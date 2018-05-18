<?php
/**
 * Created by PhpStorm.
 * User: kailishen
 * Date: 2018/5/18
 * Time: 下午4:54
 */

namespace sjdskl\Libraries;


use Symfony\Component\DomCrawler\Crawler;

class Html
{
    /**
     * @var Crawler
     */
    protected $_crawlerInstance;

    public function __construct($contents)
    {
        if(!$contents) {
            return false;
        }
        $this->_crawlerInstance = new Crawler($contents);
    }

    /**
     * 获取crawler实例
     * @return Crawler
     */
    public function getCrawlerInstance()
    {
        return $this->_crawlerInstance;
    }

    public function html()
    {
        if($this->_crawlerInstance->count()) {
            return $this->_crawlerInstance->html();
        }

        return false;
    }

    public function text()
    {
        if($this->_crawlerInstance->count()) {
            return $this->_crawlerInstance->text();
        }

        return false;
    }

    /**
     * @param $rule
     * @return bool|Crawler
     */
    public function filterXPath($rule)
    {
        $crawler = $this->_crawlerInstance->filterXPath($rule);
        if($crawler->count()) {
            return new Html($crawler->html());
        }
        return false;
    }

}