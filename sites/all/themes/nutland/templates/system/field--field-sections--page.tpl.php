<?php
//handle page header
foreach ($items as $delta => $item){
  $entity = reset($item['entity']['field_collection_item']);
  if(isset($entity['field_diplay_type']['#items'][0]['value']) && $entity['field_diplay_type']['#items'][0]['value'] == 'main_header'){
    costum_collection_main_header($entity);
  }
}

?>
<div class="<?php print $classes; ?> costum-collection"<?php print $attributes; ?>>
  <?php if (!$label_hidden): ?>
    <div class="field-label"<?php print $title_attributes; ?>><?php print $label ?>:&nbsp;</div>
  <?php endif; ?>
  <div class="field-items"<?php print $content_attributes; ?>>
    <?php
    foreach ($items as $delta => $item):
      $entity = reset($item['entity']['field_collection_item']);

      $classes = $delta % 2 ? 'odd' : 'even';
      if(isset($entity['field_classes']['#items'])){
        foreach($entity['field_classes']['#items'] as $class){
          $classes .= ' '. $class['value'];
        }
      }
      ?>
      <div class="field-item <?php print $classes; ?>"<?php print $item_attributes[$delta]; ?>>
        <div class="container">
          <?php
          if(isset($entity['field_diplay_type']['#items'][0]['value'])){
            switch($entity['field_diplay_type']['#items'][0]['value']){
              case 'right_image':
                costum_collection_right_image($entity);
                break;
              case 'left_image':
                costum_collection_left_image($entity);
                break;
              case 'slider':
                costum_collection_slide($entity);
                break;
              case 'body':
                costum_collection_body($entity);
                break;
              case 'image':
                costum_collection_image($entity);
                break;
              case 'main_header':
                break;
              default:
                print render($item);
            };
          }
          ?>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>
