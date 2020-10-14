<section id="<?php print $block_html_id; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
  <link rel="stylesheet" href="/sites/all/themes/nutland/css/aos.min.css">
  <?php print render($title_prefix); ?>
  <?php if ($title): ?>
    <h2<?php print $title_attributes; ?>><?php print $title; ?></h2>
  <?php endif; ?>
  <?php print render($title_suffix); ?>
  <div id="useroverlay"></div>
  <section>
    <div class="subsets">
      <?php print views_embed_view('ubsets', 'blockk'); ?>
    </div>
  </section>
</section>

<style>

  #block-block-9 {
    position: fixed;
    left: -400px;
    height: calc(100vh - 83px);
    width: 400px;
    overflow: overlay;
    background: #fff;
    transition: all 0.3s ease;
  }
  .i18n-en #block-block-9 {
    right: -400px;
    left: unset;
  }

  #block-block-9::-webkit-scrollbar {
    width: 0px;
  }

  .fixed #block-block-9 {
    height: calc(100vh - 48px);
  }

  #block-block-9.open {
    left: 0;
  }
  .i18n-en #block-block-9.open {
    right: 0;
    left: unset;
  }

  .subsets {
    display: flex;
    flex-direction: column;
  }

  .subsets > div > a {
    height: 120px;
    width: 100%;
    border-bottom: 1px solid #fff;
    overflow: hidden;
    position: relative;
    display: block;
  }

  .block-title {
    display: none;
  }

  #main {
    padding: 25px;
    background: white;
    max-width: 1000px;
  }

  .subsets a img {
    filter: brightness(0.8);
    position: absolute;
    width: 100%;
    right: 0;
    top: 1px;
    transition: all 0.3s ease;
  }

  .subsets a .caption {
    width: 100%;
    height: 100%;
    display: flex;
    color: #fff;
    z-index: 1;
    position: relative;
    justify-content: center;
    align-items: center;
    font-size: 17px;
  }

  .subset-link {
    background: #253A76;
    white-space: nowrap;
    color: #fff;
    min-width: 150px !important;
    justify-content: center;
    z-index: 100;
  }

  .overlay-open .subset-link {
    z-index: 100;
  }

  .search-open .subset-link {
    z-index: 1;
  }

  .subset-link a {
    color: #fff !important;
    padding: 10px 20px;
  }

  .subsets a:hover img {
    filter: brightness(0.5);
  }

  .subsets a .caption:before {
    content: "";
    position: absolute;
    background: #F95109;
    width: 0%;
    top: 75px;
    height: 3px;
    transition: all 0.3s ease;
  }

  .subsets a:hover .caption:before {
    width: 60%;
  }

  #useroverlay {
    position: fixed;
    top: 0;
    width: 100%;
    height: 100%;
    right: 0;
    background: rgba(0, 0, 0, 0.8);
    z-index: 0;
    transition: all .3s ease;
    -webkit-transition: all .3s ease;
    pointer-events: none;
    opacity: 0;
  }

  div#useroverlay.open,
  #block-block-9.open div#useroverlay {
    pointer-events: auto;
    opacity: 1;
    cursor: pointer;
  }
</style>

