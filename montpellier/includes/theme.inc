<?php

/**
 * Wraps the output in a montpellier class
 */
function theme_ds_field_montpellier($variables) {
  $output = '';

  // Render the label.
  if (!$variables['label_hidden']) {
    $output .= '<div class="field-label-' . $variables['element']['#label_display'] . '">' . $variables['label'];
    if (\Drupal::config('ds.settings')->get('ft-show-colon')) {
      $output .= ':';
    }
    $output .= '</div>';
  }

  // Render the items.
  foreach ($variables['items'] as $item) {
    $output .= drupal_render($item['content']);
  }

  return '<div class="montpellier">' . $output .'</div>';
}
