<?php
/**
 * Created by PhpStorm.
 * User: kailishen
 * Date: 2018/5/18
 * Time: 下午4:49
 */

namespace sjdskl\Libraries;

use GuzzleHttp\Client;

class Utils
{
    /**
     * 获取网页内容
     * @param $url
     * @param $method
     * @param $params
     * @param $headers
     * @return bool|string
     */
    public static function getUrlContents($url, $method, $params, $headers, $options = [])
    {
        $client = new Client();
        $reqeustParams = [];
        if($headers) {
            $reqeustParams['headers'] = $headers;
        }
        if($params && $method == 'POST') {
            $reqeustParams['body'] = http_build_query($params);
        }
        if(self::checkHttps($url)) {
            $reqeustParams['verify'] = false;
        }
        try {
            $response = $client->request($method, $url, $reqeustParams);
            $contents = $response->getBody()->getContents();
            return $contents;
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * @param \DOMElement $el
     * @return string
     */
    public static function getDomDocumentHtml($el)
    {
        $innerHTML = '';
        $children = $el->childNodes;
        foreach ($children as $child) {
            $innerHTML .= $child->ownerDocument->saveHTML($child);
        }

        return $innerHTML;
    }

    public static function checkHttps($url)
    {
        $urlArr = parse_url($url);
        if($urlArr['scheme'] == 'https') {
            return true;
        }

        return false;
    }
}