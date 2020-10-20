<?php
global $language;
$lang = $language->language;
?>
<section id="<?php print $block_html_id; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>

  <?php print render($title_prefix); ?>
  <?php if ($title): ?>
    <h2<?php print $title_attributes; ?>><?php print $title; ?></h2>
  <?php endif;?>
  <?php print render($title_suffix); ?>

  <div id="block3">
    <section id="sectionBanner">
      <div class="container" style="padding: 25px 10px;">
        <div class="caption_slide">
          <div class="caption_write">
            <?php
              $alias = drupal_get_path_alias();
              switch ($alias){
                case 'projects':
                  print "<h1>". ($lang == 'fa' ? 'پروژه ها' : 'Projects') ."</h1>";
                  break;
                case 'news':
                  print "<h1>". ($lang == 'fa' ? 'مرکز اخبار' : 'News') ."</h1>";
                  break;
              }
            ?>
          </div>
        </div>
      </div>
    </section>
  </div>

</section>
<?php
  $node = node_load(91);
  switch ($alias){
    case 'projects':
      $node = node_load(122);
      break;
    case 'news':
      $node = node_load(91);
      break;
  }
?>
<style>
  #block-block-3{
    width: 100vw;
    top: 0px;
    padding: 40px 0;
    right: calc(50% - 50vw);
    background: url(<?php echo isset($node->field_image['und'][0])? file_create_url($node->field_image['und'][0]['uri']) : '';?>);
    background-position: center;
    background-size: cover;
    position: relative;
  }
  .i18n-en #block-block-3{
    right: unset;
    left: calc(50% - 50vw);
  }
  #block3{
    z-index: 5;
    position: relative;
  }
  #block-block-3:before{
    content: " ";
    background: rgba(0,0,0,0.5);
    position: absolute;
    top: 0;
    height: 100%;
    width: 100%;
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
  .caption_slide {
    border: 1px solid #fff;
    background-color: rgba(255, 255, 255, .2);
    padding: 2rem 0
  }
  .caption_write {
    display: table;
    color: #fff
  }
  .caption_write {
    padding: 13px;
    margin-top: 10px;
  }
  .caption_write {
    border-right: 4px solid #fff;
    border-left: 4px solid #fff;
    margin-right: -4px;
  }
  .i18n-en .caption_write {
    margin-right: 0;
    margin-left: -4px;
  }

  @media (min-width: 320px) and (max-width: 600px) {
    .page-header, .breadcrumb{
      display: none !important;
    }
  }
</style>
