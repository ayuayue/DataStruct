<?php

/*
 * created_at 2020-05-25
 * created_by caoayu
 * myBlog https://www.caoayu.xyz
 */

interface toString
{
    public function say();
}

class BaiduPush implements toString
{
    //baidu push api
    private $api = 'http://data.zz.baidu.com/urls?site=https://www.caoayu.xyz&token=Ip5jHLVfm2aoHOcI';

    /**
     * @return string
     */
    public function GetUrls(): string
    {
        $site = "https://www.caoayu.xyz/sitemap.xml";
        //获取 xml 信息
        $XmlUrls = $this->curl($site, null);
        //将 xml 转为数组
        $resource = xml_parser_create();
        xml_parse_into_struct($resource, $XmlUrls, $value, $index);
        xml_parser_free($resource);
        //$urlArr 接受所有 url 的数组
        $urlArr = [];
        foreach ($value as $content) {
            if ($content["tag"] === "LOC") {
                $urlArr[] = $content["value"];
            }

        }
        //总共上传的条数
        $amount = count($urlArr);
        //开始上传
        $response = $this->curl($this->api, $urlArr, 1);
        //将响应 json 转为 对象
        $result = json_decode($response);
        if ($result->success != 0) {
            return sprintf("共有: %d 条链接主动提交成功!", $amount);
        } else {
            return "主动提交失败!";
        }
    }

    /**
     * @param $url
     * @param $params
     * @param int $is_post
     * @return bool|string
     */
    public function curl($url, $params, $is_post = 0)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);//禁止验证对等证书,默认为true
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);//检查服务器SSL证书中是否存在一个公用名,值0|2,
        if ($is_post) {
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
            curl_setopt($ch, CURLOPT_URL, $url);
        } else {
            if ($params) {
                curl_setopt($ch, CURLOPT_URL, $url . '?' . $params);
            } else {
                curl_setopt($ch, CURLOPT_URL, $url);
            }
        }
        $response = curl_exec($ch);
        return $response;
    }

    /**
     * @return string
     */
    public function say()
    {
        echo $this->GetUrls();
        return ;
    }
}

$action = new BaiduPush();
$action->say();

