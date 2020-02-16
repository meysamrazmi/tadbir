<?php

/**
 * @file
 * Default theme implementation to display a block.
 *
 * Available variables:
 * - $block->subject: Block title.
 * - $content: Block content.
 * - $block->module: Module that generated the block.
 * - $block->delta: An ID for the block, unique within each module.
 * - $block->region: The block region embedding the current block.
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the
 *   following:
 *   - block: The current template type, i.e., "theming hook".
 *   - block-[module]: The module generating the block. For example, the user
 *     module is responsible for handling the default user navigation block. In
 *     that case the class would be 'block-user'.
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 *
 * Helper variables:
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 * - $block_zebra: Outputs 'odd' and 'even' dependent on each block region.
 * - $zebra: Same output as $block_zebra but independent of any block region.
 * - $block_id: Counter dependent on each block region.
 * - $id: Same output as $block_id but independent of any block region.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 * - $block_html_id: A valid HTML ID and guaranteed unique.
 *
 * @see bootstrap_preprocess_block()
 * @see template_preprocess()
 * @see template_preprocess_block()
 * @see bootstrap_process_block()
 * @see template_process()
 *
 * @ingroup templates
 */
?>
<section id="<?php print $block_html_id; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>

  <?php print render($title_prefix); ?>
  <?php if ($title): ?>
    <h2<?php print $title_attributes; ?>><?php print $title; ?></h2>
  <?php endif;?>
  <?php print render($title_suffix); ?>

  <span class="top-bg"></span>
  <div class="footer-sections d-flex justify-content-between">
    <div class="footer-logo">
      <a href="/"><img src="/sites/all/themes/nutland/images/logo.png"></a>
    </div>

    <?php
      $menu = menu_tree('menu-footer');
      print drupal_render($menu);
    ?>
    <div class="addresses">
      <p>
        <i class="mdi mdi-map-marker pl-3"></i>
        <span>تهران/خ۱۵ خرداد/انتهای بازار آهنگران/سرای دالان دراز پلاک ۴۷</span>
      </p>
      <p>
        <i class="mdi mdi-phone pl-3"></i>
        <span style="direction: ltr;unicode-bidi: embed;">۰۲۱ - ۵۵۱۵۹۷۰۸</span>
      </p>
      <p>
        <i class="mdi mdi-email pl-3"></i>
        <span>info@zigno.ir</span>
      </p>
      <div>
        <p class="pr-4 mt-2">ما را در شبکه‌های اجتماعی دنبال کنید</p>
        <div>
          <a href="https://www.instagram.com/nutland_co/" target="_blank"><i class="mdi mdi-instagram"></i></a>
<!--          <a href=""><i class="mdi mdi-linkedin"></i></a>-->
<!--          <a href=""><i class="mdi mdi-twitter"></i></a>-->
<!--          <a href=""><i class="mdi mdi-facebook"></i></a>-->
        </div>
      </div>
    </div>

    <div class="align-items-start d-flex justify-content-around outer-links">
      <a href="/" class="ml-4"><img src="/sites/all/themes/nutland/images/samandehi.png"></a>
      <a href="/"><img src="/sites/all/themes/nutland/images/etehadie.png"></a>
    </div>
  </div>
  <span class="backtotop"></span>
  <span class="bottom-bg top-bg"></span>
  <p class="end-footer pb-5 text-center">.تمامی حقوق مادی و معنوی این سامانه به متعلق است</p>

</section>
