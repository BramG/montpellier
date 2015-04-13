<?php

/**
* @file
* Contains \Drupal\montpellier\Plugin\DsFieldLayout\Montpellier.
*/

namespace Drupal\montpellier\Plugin\DsFieldLayout;

use Drupal\ds\Plugin\DsFieldLayout\DsFieldLayoutBase;

/**
 * @DsFieldLayout(
 *   id = "montpellier",
 *   title = @Translation("Montpellier"),
 *   theme = "theme_ds_field_montpellier",
 *   path = "includes/theme.inc",
 * )
*/
class Montpellier extends DsFieldLayoutBase {
}
