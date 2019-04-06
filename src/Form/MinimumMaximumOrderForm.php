<?php
/**
 * @file
 * Contains Drupal\minimum_maximum_order\Form\MinimumMaximumOrderForm.
 */
namespace Drupal\minimum_maximum_order\Form;
use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

class MinimumMaximumOrderForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'minimum_maximum_order.adminsettings',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'minimum_maximum_order_form';
  }
  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('minimum_maximum_order.adminsettings');

    $form['minimum_order'] = [
      '#type' => 'number',
      '#title' => $this->t('Minimum Order'),
      '#description' => $this->t('Minimum order amount needed to go to checkout page'),
      '#default_value' => $config->get('minimum_order')
    ];

    $form['maximum_order'] = [
      '#type' => 'number',
      '#title' => $this->t('Maximum Order'),
      '#description' => $this->t('Maximum order amount needed to go to checkout page'),
      '#default_value' => $config->get('maximum_order'),
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    $min = $form_state->getValue('minimum_order');
    $max = $form_state->getValue('maximum_order');
    if (!empty($min)) {
      if ($min < 0) {
        $form_state->setError($form['minimum_order'],'Value for minimum order must be greater than 0');
      }
    }
    if (!empty($max)) {
      if ($form_state->getValue('maximum_order') < 0) {
        $form_state->setError($form['maximum_order'],'Value for maximum order must be greater than 0');
      }
    }
    if (!empty($min) && !empty($max) && $min >= $max) {
      $form_state->setError($form['minimum_order'],'Value for minimum order must be less than the maximum order');
    }
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {

    parent::submitForm($form, $form_state);

    $this->config('minimum_maximum_order.adminsettings')
      ->set('minimum_order', $form_state->getValue('minimum_order'))
      ->set('maximum_order', $form_state->getValue('maximum_order'))
      ->save();
  }
}