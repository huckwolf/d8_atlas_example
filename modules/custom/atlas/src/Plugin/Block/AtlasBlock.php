<?php
/**
 * Created by PhpStorm.
 * User: huckw
 * Date: 10/1/2017
 * Time: 12:49 AM
 */

/**
 * @file
 * Contains \Drupal\atlas\Plugin\Block\AtlasBlock.
 */
namespace Drupal\atlas\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'Atlas' Block. Those info must be provided, otherwise block will not display in Place Block
 *
 * @Block(
 *   id = "atlas_block",
 *   admin_label = @Translation("Atlas Block"),
 *   category = @Translation("Atlas Block"),
 * )
 */
class AtlasBlock extends BlockBase {
  /**
   * {@inheritdoc}
   */
  public function build() {
    $form = \Drupal::formBuilder()->getForm('Drupal\atlas\Form\AtlasForm');
    return $form;
  }
}