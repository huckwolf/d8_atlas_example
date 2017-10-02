<?php
/**
 * Created by PhpStorm.
 * User: huckw
 * Date: 10/1/2017
 * Time: 12:34 AM
 */
namespace Drupal\atlas\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;

/**
 * Implements an example form.
 */
class AtlasForm extends FormBase
{
  /**
   * {@inheritdoc}
   */
  public function getFormId()
  {
    return 'atlas_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state)
  {
    $form['region'] = [
      '#type' => 'select',
      '#title' => $this->t('Regions'),
      '#options' => [
        'Blue Mountains'=>'Blue Mountains',
        'Central Coast'=>'Central Coast',
        'Country NSW'=>'Country NSW',
        'Hunter'=>'Hunter',
        'Lord Howe Island'=>'Lord Howe Island',
        'North Coast'=>'North Coast',
        'Outback NSW'=>'Outback NSW',
        'Snowy Mountains'=>'Snowy Mountains',
        'South Coast'=>'South Coast',
      ]
    ];
    $form['actions']['#type'] = 'actions';
    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Search'),
      '#button_type' => 'primary',
    ];
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state)
  {

  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state)
  {
    $url = Url::fromRoute('atlas.search_atlas',
      ['region' => $form_state->getValue('region')]
    );
    return $form_state->setRedirectUrl($url);
  }

}