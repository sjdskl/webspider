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

    public function __construct($contents = '')
    {
        if($contents) {
            $this->_crawlerInstance = new Crawler($contents);
        }
    }

    /**
     * 获取crawler实例
     * @return Crawler
     */
    public function getCrawlerInstance()
    {
        return $this->_crawlerInstance;
    }

    public function setCrawlerInstance($crawler)
    {
        $this->_crawlerInstance = $crawler;
        return $this;
    }

    public function html()
    {
        $html = [];
        if($this->_crawlerInstance->count()) {
            foreach ($this->_crawlerInstance as $node) {
                $html[] = trim(Utils::getDomDocumentHtml($node));
            }
        }
        return new ReturnObject($html);
    }

    public function attrs($name, $value = null)
    {
        $attrs = [];
        if($this->_crawlerInstance->count()) {
            foreach($this->_crawlerInstance as $node) {
                if($value !== null) {
                    $attrs[] = $node->getAttribute($name);
                } else {
                    $node->setAttribute($node, $value);
                }
            }
        }
        return new ReturnObject($attrs);
    }

    public function text()
    {
        $text = [];
        if($this->_crawlerInstance->count()) {
            foreach ($this->_crawlerInstance as $node) {
                $text[] = trim($node->textContent);
            }
        }
        return new ReturnObject($text);
    }

    public function __toString()
    {
        return (string)$this->html();
    }

    public function images()
    {
        return $this->filterXPath('//img');
    }

    /**
     * @param $rule
     * @return bool|Html
     */
    public function filterXPath($rule)
    {
        $crawler = $this->_crawlerInstance->filterXPath($rule);
        if($crawler->count()) {
            return (new Html())->setCrawlerInstance($crawler);
        }
        return false;
    }

    public function count()
    {
        return $this->_crawlerInstance->count();
    }


}