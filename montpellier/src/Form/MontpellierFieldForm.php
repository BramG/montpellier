<?php

/**
 * @file
 * Contains \Drupal\montpellier\Form\MontpellierFieldForm.
 */

namespace Drupal\montpellier\Form;

use Drupal\Core\Form\FormStateInterface;
use Drupal\ds\Form\FieldFormBase;

/**
 * Configures montpellier fields.
 */
class MontpellierFieldForm extends FieldFormBase {

  /**
   * The type of the dynamic ds field
   */
  const TYPE = 'montpellier';

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'ds_field_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state, $field_key = '') {
    $form = parent::buildForm($form, $form_state, $field_key);
    $field = $this->field;

    $form['content'] = array(
      '#type' => 'text_format',
      '#title' => t('Field content'),
      '#default_value' => isset($field['properties']['content']['value']) ? $field['properties']['content']['value'] : '',
      '#format' => isset($field['properties']['content']['format']) ? $field['properties']['content']['format'] : 'plain_text',
      '#base_type' => 'textarea',
      '#required' => TRUE,
    );

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function getProperties(FormStateInterface $form_state) {
    return array(
      'content' => $form_state->getValue('content'),
    );
  }

  /**
   * {@inheritdoc}
   */
  public function getType() {
    return MontpellierFieldForm::TYPE;
  }

  /**
   * {@inheritdoc}
   */
  public function getTypeLabel() {
    return 'Montpellier field';
  }

}
