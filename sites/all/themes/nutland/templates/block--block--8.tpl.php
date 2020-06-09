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

  <?php
  $node1 = node_load(41);
  $node2 = node_load(42);
  $node3 = node_load(43);
  $node4 = node_load(44);
  $node5 = node_load(50);
  $node6 = node_load(51);
  $node7 = node_load(53);
  $node8 = node_load(49);
  //    print $node->title;
  //    print '<img src="'. image_style_url("320x320", $node->field_image['und'][0]['uri']) .'">';
  ?>

  <section id="main">
    <div class="container">
      <ul class="accordion">
        <li>
          <a href="<?php print $node1->field_link['und'][0]['url']; ?>" class="figures">
            <img src="<?php print image_style_url("320x320", $node1->field_image['und'][0]['uri']); ?>" alt="">
            <div class="caption"><?php print $node1->title; ?></div>
          </a>
        </li>
        <li>
          <a href="<?php print $node2->field_link['und'][0]['url']; ?>" class="figures">
            <img src="<?php print image_style_url("320x320", $node2->field_image['und'][0]['uri']); ?>" alt="">
            <div class="caption"><?php print $node2->title; ?></div>
          </a>
        </li>
        <li>
          <a href="<?php print $node3->field_link['und'][0]['url']; ?>" class="figures">
            <img src="<?php print image_style_url("320x320", $node3->field_image['und'][0]['uri']); ?>" alt="">
            <div class="caption"><?php print $node3->title; ?></div>
          </a>
        </li>
        <li>
          <a href="<?php print $node4->field_link['und'][0]['url']; ?>" class="figures">
            <img src="<?php print image_style_url("320x320", $node4->field_image['und'][0]['uri']); ?>" alt="">
            <div class="caption"><?php print $node4->title; ?></div>
          </a>
        </li>
        <li>
          <a href="<?php print $node5->field_link['und'][0]['url']; ?>" class="figures">
            <img src="<?php print image_style_url("320x320", $node5->field_image['und'][0]['uri']); ?>" alt="">
            <div class="caption"><?php print $node5->title; ?></div>
          </a>
        </li>
        <li>
          <a href="<?php print $node6->field_link['und'][0]['url']; ?>" class="figures">
            <img src="<?php print image_style_url("320x320", $node6->field_image['und'][0]['uri']); ?>" alt="">
            <div class="caption"><?php print $node6->title; ?></div>
          </a>
        </li>
        <li>
          <a href="<?php print $node7->field_link['und'][0]['url']; ?>" class="figures">
            <img src="<?php print image_style_url("320x320", $node7->field_image['und'][0]['uri']); ?>" alt="">
            <div class="caption"><?php print $node7->title; ?></div>
          </a>
        </li>
        <li>
          <a href="<?php print $node8->field_link['und'][0]['url']; ?>" class="figures">
            <img src="<?php print image_style_url("320x320", $node8->field_image['und'][0]['uri']); ?>" alt="">
            <div class="caption"><?php print $node8->title; ?></div>
          </a>
        </li>
      </ul>
    </div>
  </section>

  <style>

    #block-block-8{
      width: 100%;
      background: white;
      text-align: -webkit-center;
    }
    .block-title{
      display: none;
    }
    #main{
      padding: 25px;
      background: white;
      max-width: 1000px;
    }
    .figures {
      display: block;
      position: relative;
      height: 280px;
      width: 250px
    }
    .figures img {
      height: 100%;
      width: 100%
    }
    .figures:after {
      content: "";
      position: absolute;
      top: 0;
      bottom: 0;
      transition: -webkit-transform .3s ease-in-out;
      transition: transform .3s ease-in-out;
      transition: transform .3s ease-in-out, -webkit-transform .3s ease-in-out
    }
    [dir] .figures:after {
      background-color: rgba(0, 0, 0, .5);
      -webkit-transition: -webkit-transform .3s ease-in-out
    }
    [dir=rtl] .figures:after {
      right: 0;
      left: 0
    }
    .figures .caption {
      position: absolute;
      bottom: 0.625rem;
      color: #00247a;
      font-size: 18px;
      display: none;
      width: 100%;
      white-space: normal;
      text-align: right;
      max-height: 65px;
      overflow: hidden;
      line-height: 25px;
    }
    [dir] .figures .caption {
      background-color: rgba(255, 255, 255, .8);
      padding: 10px 15px;
    }
    [dir=rtl] .figures .caption {
      right: 0;
      left: 0
    }
    .figures:hover:after,
    .figures:focus:after {
      -webkit-transform: scale(0)
    }
    [dir] .figures:hover:after,
    [dir] .figures:focus:after {
      transform: scale(0)
    }
    .figures:hover .caption,
    .figures:focus .caption {
      display: block
    }
    .accordion {
      display: -webkit-box;
      display: -ms-flexbox;
      display: flex;
      overflow-y: hidden;
      max-width: 100vw
    }
    [dir=rtl] .accordion {
      margin-right: -0.625rem;
      margin-left: -0.625rem;
      padding-right: 0;
    }
    .accordion li {
      -webkit-box-flex: 1;
      -ms-flex: 1;
      flex: 1;
      overflow: hidden;
      transition: all .3s ease-in-out
    }
    [dir] .accordion li {
      -webkit-transition: all .3s ease-in-out
    }
    [dir=rtl] .accordion li {
      padding-left: 0.625rem;
      padding-right: 0.625rem
    }
    @media (max-width: 768px) {
     #main{
       max-width: calc(100vw - 20px)!important;
       overflow: overlay;
       padding: 25px 0.625rem;
       margin: 0 -30px !important;
       background: #eee;
     }
      ul.accordion li{
        padding: 0 6px!important;
      }
    }
    @media only screen and (max-width: 36rem) {
      .accordion li {
        max-width: 6.25rem;
        -webkit-box-flex: 0;
        -ms-flex: 0 0 100px;
        flex: 0 0 6.25rem
      }
    }
    .accordion li:hover {
      max-width: 250px;
      -webkit-box-flex: 0;
      -ms-flex: 0 0 250px;
      flex: 0 0 250px
    }
  </style>
