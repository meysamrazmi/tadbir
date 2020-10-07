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
  $node1 = node_load(20);
  $node2 = node_load(10);
  $node3 = node_load(9);
  $node4 = node_load(9);
  $node5 = node_load(7);
  $node6 = node_load(6);
  $node7 = node_load(31);
  $node8 = node_load(39);
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

    #block-block-5{
      position: absolute;
      top: 11%;
      z-index: 100;
      width: 100%;
    }
    .block-title{
      display: none;
    }
    #main{
      padding-top: 50px;
      background: white;
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
    .figures:after {
      background-color: rgba(0, 0, 0, .5);
      -webkit-transition: -webkit-transform .3s ease-in-out
    }
    .figures:after {
      right: 0;
      left: 0
    }
    .figures .caption {
      position: absolute;
      bottom: 0.625rem;
      color: #00247a;
      font-size: 18px;
      white-space: nowrap;
      display: none
    }
    .figures .caption {
      background-color: rgba(255, 255, 255, .8);
      padding: 15px;
    }
    .figures .caption {
      right: 0;
      left: 0
    }
    .figures:hover:after,
    .figures:focus:after {
      -webkit-transform: scale(0)
    }
    .figures:hover:after,
    .figures:focus:after {
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
    .accordion {
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
    .accordion li {
      -webkit-transition: all .3s ease-in-out
    }
    .accordion li {
      padding-left: 0.625rem;
      padding-right: 0.625rem
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
