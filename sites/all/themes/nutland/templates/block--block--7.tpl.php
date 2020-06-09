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


  <?php
  ?>
  <div id="block7">

    <section id="sectionBanner">
      <div class="container" style="padding: 25px 10px;">
        <div class="caption_slide">
          <div class="caption_write">
            <h1>مرکز عکس ها</h1>
          </div>
        </div>
      </div>
    </section>
  </div>

</section>
<style>
  #block-block-7{
    position: relative;
    width: 100vw;
    top: 0px;
    padding: 40px 0;
    right: calc(50% - 50vw);
    background: url("/sites/all/themes/nutland/images/sktemplate1.jpg");
    background-position: center;
    background-size: cover;
  }
  #block-block-7:before{
    content: " ";
    background: rgba(0,0,0,0.5);
    position: absolute;
    top: 0;
    height: 100%;
    width: 100%;
  }
  #block7{
    z-index: 5;
    position: relative;
  }
  #sectionBanner .container{
    max-width: 1000px;
  }
  #sectionBanner h1{
    font-size: 26px;
  }
  .block-title{
    display: none;
  }
  .caption_slide {
    min-height: 160px
  }
  [dir] .caption_slide {
    border: 1px solid #fff;
    background-color: rgba(255, 255, 255, .2);
    padding: 2rem 0
  }
  .caption_write {
    display: table;
    color: #fff
  }
  [dir] .caption_write {
    padding: 2.25rem
  }
  [dir=rtl] .caption_write {
    border-right: 4px solid #fff;
    border-left: 4px solid #fff;
    margin-right: -0.5rem
  }

  @media (min-width: 320px) and (max-width: 600px) {
    #block-block-7{
      display: none
    }
    .page-header, .breadcrumb{
      display: none !important;
    }
  }
</style>
