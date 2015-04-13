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

    // Fetch formatter
    $field = $this->getFieldConfiguration();
    $formatter = $field['formatter'];

    if ($formatter == 'italic') {
      $prefix = '<em>' . $config['prefix'] . '</em>';
    }
    else {
      $prefix = $config['prefix'];
    }

    // Fetch the entity
    $node = $this->entity();

    // Always return a render array!
    return array(
      '#markup' => $node->title->value,
      '#prefix' => $prefix . ' ',
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

  /**
   * {@inheritdoc}
   */
  public function formatters() {
    return array(
      'normal' => 'Normal',
      'italic' => 'Italic',
    );
  }

  /**
   * {@inheritdoc}
   */
  public function isAllowed() {
    if ($this->bundle() != 'article') {
      return FALSE;
    }
    else if ($this->viewMode() == 'teaser') {
      return FALSE;
    }

    return TRUE;
  }

}
