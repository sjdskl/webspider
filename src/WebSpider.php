<?php
/**
 * Created by PhpStorm.
 * User: kailishen
 * Date: 2018/5/18
 * Time: 下午4:47
 */

namespace sjdskl;

use sjdskl\Libraries\Html;
use sjdskl\Libraries\Utils;

define('APP_PATH', __DIR__);

class WebSpider
{
    private static $_ins;

    private function __construct()
    {

    }

    private function __clone()
    {
        // TODO: Implement __clone() method.
    }

    public static function getInstance()
    {
        if(!(self::$_ins instanceof self)) {
            self::$_ins = new self();
        }

        return self::$_ins;
    }

    /**
     * @param $url
     * @param string $method
     * @param array $params
     * @param array $headers
     * @return Html
     */
    public function createWebInstance($url, $method = 'GET', $params = [], $headers = [
        'accept' => 'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8',
        'accept-encoding' => 'gzip, deflate, br',
        'accept-language' => 'zh-CN,zh;q=0.9',
        'cache-control' => 'max-age=0',
        'upgrade-insecure-requests' => '1',
        'user-agent' => 'Mozilla/5.0 (iPhone; CPU iPhone OS 11_0 like Mac OS X) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/11.0 Mobile/15A372 Safari/604.1',], $options = [])
    {
        $contents = Utils::getUrlContents($url, $method, $params, $headers, $options);
        $html = new Html($contents);
        return $html;
    }


}