<?php
/*
 * created_at 2020-05-25
 * created_by caoayu
 * myBlog https://www.caoayu.xyz
 */
//baidu push api
$api = 'http://data.zz.baidu.com/urls?site=https://www.caoayu.xyz&token=Ip5jHLVfm2aoHOcI';

//get site urls
function GetUrls($api):string{
    $site = "https://www.caoayu.xyz/sitemap.xml";
    //获取 xml 信息
    $XmlUrls = curl($site,null);
    //将 xml 转为数组
    $resource = xml_parser_create();
    xml_parse_into_struct($resource,$XmlUrls,$value,$index);
    xml_parser_free($resource);
    /*
     * 打印输出后发现,所有连接的 tag 都为 LOC
     *      [tag] => LOC
            [type] => complete
            [level] => 3
            [value] => https://www.caoayu.xyz/scp01/
       所以筛选出所有 tag = LOC 的 value 值 即为我们需要上传的 链接地址
     */
    //$urlArr 即为接受所有 url 的数组
    $urlArr = [];
    foreach ($value as $content){
        if ($content["tag"] === "LOC"){
            $urlArr[] = $content["value"];
        }

    }
    //开始上传
    $response = curl($api,$urlArr,1);
    //将响应 json 转为 对象
    $result = json_decode($response);
    if ($result->success != 0){
        return "主动提交成功!";
    }else{
        return  "主动提交失败!";
    }
}

function curl($url,$params,$is_post = 0){
    $ch = curl_init();

    curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,60);
    curl_setopt($ch,CURLOPT_TIMEOUT,60);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_FOLLOWLOCATION,true);
    curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);//禁止验证对等证书,默认为true
    curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);//检查服务器SSL证书中是否存在一个公用名,值0|2,
    if($is_post){
        curl_setopt($ch,CURLOPT_POST,true);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$params);
        curl_setopt($ch,CURLOPT_URL,$url);
    }else{
        if($params){
            curl_setopt($ch,CURLOPT_URL,$url.'?'.$params);
        }else{
            curl_setopt($ch,CURLOPT_URL,$url);
        }
    }
    $response = curl_exec($ch);
    return $response;
}
echo GetUrls($api);
