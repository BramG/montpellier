<?php

/**
 * @file
 * Contains \Drupal\montpellier\Plugin\Derivative\DynamicMontpellierField.
 */

namespace Drupal\montpellier\Plugin\Derivative;

use Drupal\montpellier\Form\MontpellierFieldForm;
use Drupal\ds\Plugin\Derivative\DynamicField;

/**
 * Retrieves dynamic code field plugin definitions.
 */
class DynamicMontpellierField extends DynamicField {

  /**
   * {@inheritdoc}
   */
  protected function getType() {
    return MontpellierFieldForm::TYPE;
  }

}
