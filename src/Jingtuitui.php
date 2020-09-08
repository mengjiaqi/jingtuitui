<?php

namespace Wanzhong;

use GuzzleHttp\Client;

class Jingtuitui
{
  /**
   * @var int
   */
  private $appid;

  /**
   * @var string
   */
  private $appkey;

  /**
   * @var Client
   */
  private $http;

  public function __constuct($appid, $appkey)
  {
    $this->appid = $appid;
    $this->appkey = $appkey;

    $this->http = new Client([
      'base_uri' => 'http://japi.jingtuitui.com/api/'
    ]);
  }

  /**
   * 商品基础信息
   *
   * 通过商品的SKU查询单个商品的基础信息，可使用返回的数据构建单品的基础页面，
   * 包括但不限于商品名称、商品图片、佣金比例、商品类目、商品价格等基础商品信
   * 息，向客户展示基础且全面的商品信息。
   *
   * @param int $sku
   */
  public function get_goods_info($sku)
  {
    $response = $this->http->get('get_goods_info', ['query' => [
      'appid' => $this->appid,
      'appkey' => $this->appkey,
      'sku' => $sku
    ]]);

    return $response->getBody();
  }

  /**
   * 优惠券信息
   *
   * 通过领券链接查询优惠券的平台、面额、期限、可用状态、剩余数量等详细信息，通
   * 常用于和商品信息一起展示优惠券券信息。
   *
   * @param string $url
   */
  public function get_coupom_info($url)
  {
    $response = $this->http->get('get_goods_info', ['query' => [
      'appid' => $this->appid,
      'appkey' => $this->appkey,
      'sku' => urlencode($url)
    ]]);

    return $response->getBody();
  }
}
