<?php

/**
 * Created by PhpStorm.
 * User: huckw
 * Date: 9/29/2017
 * Time: 11:41 AM
 */
namespace Drupal\atlas\Controller;

use Drupal\Core\Controller\ControllerBase;
use GuzzleHttp\Exception\RequestException;

/**
 * Class AtlasController
 *
 * @package Drupal\atlas\Controller
 */
class AtlasController extends ControllerBase
{
  private $key_word;
  private $pager;

  /**
   * AtlasController constructor.
   */
  function __construct() {
    $this->key_word = \Drupal::request()->query->get('region');
    $this->pager = \Drupal::request()->query->get('page');
    if (empty($this->key_word)) {
      $this->key_word = '';
    }
    if (empty($this->pager) || $this->pager == 0) {
      $this->pager = 1;
    }else{
      // sync with ATLAS API pager
      $this->pager += 1;
    }
  }

  /**
   * @return array
   */
  public function searchAtlas() {
    $request_result = $this->__getAtlasResult();

    // return if there is something happen to the REST call
    if(!$request_result){
      $element = [
        '#markup' => 'System has encountered a problem, please try again later.',
      ];
      return $element;
    }

    $num_per_page = \Drupal::config('atlas.settings')->get('num_per_page');
    if($request_result['numberOfResults']){
      pager_default_initialize($request_result['numberOfResults'], $num_per_page);
    }

    // Next, retrieve the items for the current page and put them into a
    // render array.
    $render[] = [
      '#theme'      => 'property_list',
      '#properties' => $request_result,
    ];

    // Finally, add the pager to the render array, and return.
    $render[] = ['#type' => 'pager'];
    return $render;
  }

  /**
   * @return mixed
   */
  private function __getAtlasResult(){
    $client = \Drupal::httpClient();

    $query = [
      'key'   => \Drupal::config('atlas.settings')->get('api_key'),
      'out'   => 'json',
      'pge'   => $this->pager,
      'size'  => \Drupal::config('atlas.settings')->get('num_per_page')
    ];

    if($this->key_word){
      $query['rg'] = $this->key_word;
    }

    try {
      $response = $client->get(
        \Drupal::config('atlas.settings')->get('api_path'),
        [
          'query' => $query
        ]
      );
      // Expected result.
      // getBody() returns an instance of Psr\Http\Message\StreamInterface.
      $result = iconv($in_charset = 'UTF-16LE' , $out_charset = 'UTF-8' , $response->getBody()->__toString());
      return json_decode($result, true);
    }
    catch (RequestException $e) {
      watchdog_exception('atlas', $e);
    }

    return false;
  }
}