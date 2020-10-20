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


  <?php
  ?>
  <div id="block6">

    <section id="sectionBanner">
      <div class="container" style="padding: 25px 10px;">
        <div class="caption_slide">
          <div class="caption_write">
            <h1><?php echo $lang == 'fa' ? 'فرم همکاری' : 'Cooperation Form';?></h1>
            <h1></h1>
          </div>
        </div>
      </div>
    </section>
  </div>

</section>
<style>
  #block-block-6{
    position: relative;
    width: 100vw;
    top: 0px;
    padding: 40px 0;
    right: calc(50% - 50vw);
    background: url("/sites/all/themes/nutland/images/sktemplate1.jpg");
    background-position: center;
    background-size: cover;
  }
  .i18n-en #block-block-6{
    right: unset;
    left: calc(50% - 50vw);
  }
  #block-block-6:before{
    content: " ";
    background: rgba(0,0,0,0.5);
    position: absolute;
    top: 0;
    height: 100%;
    width: 100%;
  }
  #block6{
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
    padding: 22px;
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
    #block-block-6{
      padding: 44px 0 !important;
    }
    #sectionBanner .container{
      padding: 0 33px !important;
    }
    .caption_slide {
      min-height: 120px !important;
    }
    .caption_write {
      padding: 0 2.25rem !important;
    }
  }
</style>
