<?php
global $language;
$lang = $language->language;
drupal_add_css(drupal_get_path('theme', 'nutland') . '/css/owl.carousel.min.css');
drupal_add_css(drupal_get_path('theme', 'nutland') . '/css/owl.theme.default.min.css');

?>
<header id="navbar" role="banner" class="<?php print $navbar_classes; ?> border-0 m-0">
  <div class="<?php print $container_class; ?> px-5">
    <div class="navbar-header">
      <?php if ($logo): ?>
        <a class="logo navbar-btn pull-left" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>">
          <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" class="py-2"/>
        </a>
      <?php endif; ?>

      <?php if (!empty($site_name)): ?>
        <a class="name navbar-brand" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>"><?php print $site_name; ?></a>
      <?php endif; ?>

      <?php if (!empty($primary_nav) || !empty($secondary_nav) || !empty($page['navigation'])): ?>
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
          <span class="sr-only"><?php print t('Toggle navigation'); ?></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      <?php endif; ?>
    </div>

    <?php if (!empty($primary_nav) || !empty($secondary_nav) || !empty($page['navigation'])): ?>
      <div class="navbar-collapse collapse" id="navbar-collapse">
        <nav role="navigation" class="">
          <?php if (!empty($primary_nav)): ?>
            <?php print render($primary_nav); ?>
          <?php endif; ?>
          <?php if (!empty($secondary_nav)): ?>
            <?php print render($secondary_nav); ?>
          <?php endif; ?>
          <?php if (!empty($page['navigation'])): ?>
            <?php print render($page['navigation']); ?>
          <?php endif; ?>
        </nav>
      </div>
      <?php if ($logo): ?>
        <a class="logo navbar-btn mobile" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>">
          <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" class="py-2"/>
        </a>
      <?php endif; ?>
      <div class="left-menu">
        <ul>
          <li class="grob">
            <i class="mdi mdi-magnify"></i>
          </li>
          <li class="hidden-xs d-none">
            <select id="lang">
              <option value="فارسی">فارسی</option>
              <option value="انگلیسی">انگلیسی</option>
            </select>
          </li>
          <li class="hidden-xs subset-link">
            <a>
              <?php
              $menu = menu_link_load(873);
              echo $menu['title'];
              ?>
            </a>
          </li>
        </ul>
      </div>
      <div class="form-search-menu">
        <form action="/search/node" method="get" accept-charset="UTF-8">
          <div>
            <div class="form-item form-item-query form-type-textfield form-group">
              <input class="form-control form-text" type="text" id="edit-query" name="query" value="" size="40" maxlength="128" placeholder="<?php echo $lang == 'fa' ? 'جستجو' : 'Search';?>...">
            </div>
            <button type="submit" id="edit-sa" name="op" value="<?php echo $lang == 'fa' ? 'جستجو' : 'Search';?>" class="btn btn-primary form-submit">
              <i class="mdi mdi-magnify"></i>
            </button>
          </div>
        </form>
      </div>
    <?php endif; ?>
  </div>
</header>

<div class="main-container <?php print $container_class; ?>">
  <div class="row">

    <?php if (!empty($page['sidebar_first'])): ?>
      <aside class="col-sm-3" role="complementary">
        <?php print render($page['sidebar_first']); ?>
      </aside>  <!-- /#sidebar-first -->
    <?php endif; ?>

    <section<?php print $content_column_class; ?>>
      <?php if (!empty($page['highlighted'])): ?>
        <div class="highlighted jumbotron"><?php print render($page['highlighted']); ?></div>
      <?php endif; ?>
      <?php if (!empty($breadcrumb)): print $breadcrumb;
      endif;?>
      <a id="main-content"></a>
      <?php print render($title_prefix); ?>
      <?php if (!empty($title)): ?>
        <h1 class="page-header"><?php print $title; ?></h1>
      <?php endif; ?>
      <?php print render($title_suffix); ?>
      <?php print $messages; ?>
      <?php if (!empty($tabs)): ?>
        <?php print render($tabs); ?>
      <?php endif; ?>
      <?php if (!empty($page['help'])): ?>
        <?php print render($page['help']); ?>
      <?php endif; ?>
      <?php if (!empty($action_links)): ?>
        <ul class="action-links"><?php print render($action_links); ?></ul>
      <?php endif; ?>
      <?php print render($page['content']); ?>
    </section>

    <?php if (!empty($page['sidebar_second'])): ?>
      <aside class="col-sm-3" role="complementary">
        <?php print render($page['sidebar_second']); ?>
      </aside>  <!-- /#sidebar-second -->
    <?php endif; ?>

  </div>
</div>

<?php if (!empty($page['footer'])): ?>
  <footer class="footer p-0 <?php print $container_class; ?>">
    <?php print render($page['footer']); ?>
  </footer>
<?php endif; ?>
<script src="/sites/all/themes/nutland/js/aos.min.js"></script>
<script>
  const $ = jQuery
  $(document).ready(function () {
    $(".view-slideshow .view-content").addClass('owl-carousel owl-theme').owlCarousel({
      items: 2,
      rtl: !(Drupal.settings.hasOwnProperty('pathPrefix') && Drupal.settings.pathPrefix == 'en/'),
      nav: true,
      dots: true,
      loop: true,
      autoWidth: true,
      autoplayTimeout: 10000,
      autoplay:true,
      autoplayHoverPause:true,
      onTranslated: videoPlay,
    });
    function videoPlay(event) {
      let player = new MediaElementPlayer('.active video');
      player.play();
    }
    $('.owl-carousel').click(videoPlay)
  });
</script>
