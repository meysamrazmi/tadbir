<div class="<?php print $classes; ?> subset-collection"<?php print $attributes; ?>>
  <?php if (!$label_hidden): ?>
    <div class="field-label"<?php print $title_attributes; ?>><?php print $label ?>:&nbsp;</div>
  <?php endif; ?>
  <div class="header-style">
    <div class="container">
      <div class="text-border">
        <div class="text-border-inside">
          <h2>فعالیت های گروه</h2>
        </div>

        <div class="field-items"<?php print $content_attributes; ?>>
          <?php
          foreach ($items as $delta => $item):
            ?>
            <div class="field-item <?php print $classes; ?>"<?php print $item_attributes[$delta]; ?>>
              <div class="container">
                <?php
                print render($item);
                ?>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</div>
