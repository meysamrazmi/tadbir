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
  $node1 = node_load(29);
  $node2 = node_load(110);
  ?>
  <footer id="footer">
    <section id="cards_footer">
      <div class="container">
        <div class="card-header">
          <a href="/" class="logo_footer">
            <img src="http://tadbir.offerbama.com/sites/default/files/logo-header.png" alt="گروه توسعه اقتصادی تدبیر" title="گروه توسعه اقتصادی تدبیر">
          </a>
        </div>
        <div class="row mx-n4">
          <div class="col-md-4 px-4 col-sm-12 col-xs-12 texti">
            <article class="cards cardi card-none">
              <div class="card-body">
                <p class="text-justify">
                  <?php print $node1->body['und'][0]['value']; ?>
                </p>
              </div>
            </article>
          </div>
          <div class="col-md-3 mt-md-0 mt-3 px-4  col-sm-12 col-xs-12 linki" >
            <article class="cards card-none">
              <div class="">
                <h4 class="card-title">دسترسی سریع</h4>
              </div>
              <div class="card-body">
                <?php
                $menu = menu_tree('menu-footer');
                print drupal_render($menu);
                ?>
              </div>
            </article>
          </div>
          <div class="col-md-4  col-sm-12 col-xs-12">
            <article class="cards card-none">
              <div class="">
                <h4 class="card-title">اطلاعات تماس</h4>
              </div>
              <address class="card-body card-address"><?php echo $node2->body['und'][0]['value'];?></address>
            </article>
          </div>
        </div>
      </div>
    </section>
    <section id="copyright">
      <div class="container">
        <p class="text-center">
          <a class="name-co" href="/" target="_blank" style="border-bottom: 2px solid #253A76;width: 430px;margin: auto;max-width: 100%;">
            تمامی حقوق متعلق به گروه توسعه اقتصادی تدبیر می باشد
          </a>
          <a class="name-co" href="https://www.tusi.co/" target="_blank" style="direction: ltr; margin-top: 5px;">
            <span style="padding: 10px 10px 0 0;"> Design and Development by</span> <img src="/sites/all/themes/nutland/images/tusi.svg" style="width: 40px;filter: brightness(0.3);vertical-align: top;display: inline-block;">
          </a>
        </p>
      </div>
    </section>
  </footer>

</section>
<style>
  #cards_footer {
    padding: 60px 0;
  }
  section#cards_footer:before {
    content: "";
    position: absolute;
    top: 60px;
    width: 100%;
    height: 100px;
    background: url(/sites/all/themes/nutland/images/pattern-tadbir.png);
    background-size: auto 100%;
    opacity: 0.2;
    z-index: -1;
  }
  address.card-body.card-address {
    white-space: pre-line;
    line-height: 25px;
  }
  .texti article {
    border-top: 1px solid #fff;
    padding-top: 20px;
    margin-top: 20px;
  }
  .linki {
    margin-right: 5%;
  }
  @media (max-width: 992px) {
    .linki {
      margin-right: 0;
    }

  }
</style>
