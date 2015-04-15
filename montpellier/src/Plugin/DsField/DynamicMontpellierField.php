<?php

/**
 * @file
 * Contains \Drupal\montpellier\Plugin\DsField\DynamicMontpellierField.
 */

namespace Drupal\montpellier\Plugin\DsField;

use Drupal\ds\Plugin\DsField\DsFieldBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Defines a generic dynamic montpellier field.
 *
 * @DsField(
 *   id = "dynamic_montpellier_field",
 *   deriver = "Drupal\montpellier\Plugin\Derivative\DynamicMontpellierField"
 * )
 */
class DynamicMontpellierField extends DsFieldBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $content = $this->content();
    $format = $this->format();

    return array(
      '#type' => 'processed_text',
      '#text' => $content,
      '#format' => $format,
      '#filter_types_to_skip' => array(),
      '#langcode' => '',
    );
  }

  /**
   * {@inheritdoc}
   */
  public function content() {
    $definition = $this->getPluginDefinition();
    return $definition['properties']['content']['value'];
  }

  /**
   * {@inheritdoc}
   */
  public function format() {
    $definition = $this->getPluginDefinition();
    return $definition['properties']['content']['format'];
  }

  /**
   * {@inheritdoc}
   */
  public function isAllowed() {
    $definition = $this->getPluginDefinition();
    return DsFieldBase::dynamicFieldIsAllowed($definition, $this->bundle(), $this->viewMode());
  }

}
