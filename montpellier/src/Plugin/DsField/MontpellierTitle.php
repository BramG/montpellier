<?php
/**
 * @file
 * Contains \Drupal\montpellier\Plugin\DsField\MontpellierTitle.
 */

namespace Drupal\montpellier\Plugin\DsField;

use Drupal\ds\Plugin\DsField\DsFieldBase;
use Drupal\Core\Form\FormStateInterface;

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
    $config = $this->getConfiguration();

    // Fetch the entity
    $node = $this->entity();

    // Always return a render array!
    return array(
      '#markup' => $node->title->value,
      '#prefix' => $config['prefix'] . ' ',
    );
  }

  /**
   * {@inheritdoc}
   */
  public function settingsForm($form, FormStateInterface $form_state) {
    $config = $this->getConfiguration();

    $settings['prefix'] = array(
      '#type' => 'textfield',
      '#title' => 'Prefix',
      '#default_value' => $config['prefix'],
    );

    return $settings;
  }

  /**
   * {@inheritdoc}
   */
  public function settingsSummary($settings) {
    $config = $this->getConfiguration();

    $summary = array();
    if (!empty($config['prefix'])) {
      $summary[] = 'Prefix: ' . $config['prefix'];
    }

    return $summary;
  }

  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    return array(
      'prefix' => 'Montpellier',
    );
  }

}
