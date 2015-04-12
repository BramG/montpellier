<?php
/**
 * @file
 * Contains \Drupal\montpellier\Plugin\DsField\MontpellierTitle.
 */

namespace Drupal\montpellier\Plugin\DsField;

use Drupal\ds\Plugin\DsField\DsFieldBase;

/**
 * Plugin that prefixes the title with "Montpellier"
 *
 * @DsField(
 *   id = "montpellier_title",
 *   title = @Translation("Montpellier title"),
 *   entity_type = "node",
 * )
 */
class MontpellierTitle extends DsFieldBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    // Fetch the entity
    $node = $this->entity();

    // Always return a render array!
    return array(
        '#markup' => $node->title->value,
        '#prefix' => 'Montpellier ',
    );
  }
}
