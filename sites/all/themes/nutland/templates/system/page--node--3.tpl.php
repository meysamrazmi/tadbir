<?php

/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template in this directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see bootstrap_preprocess_page()
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see bootstrap_process_page()
 * @see template_process()
 * @see html.tpl.php
 *
 * @ingroup templates
 */
drupal_add_css(drupal_get_path('theme', 'nutland') . '/css/owl.carousel.min.css');
drupal_add_css(drupal_get_path('theme', 'nutland') . '/css/owl.theme.default.min.css');

?>
<header id="navbar" role="banner" class="<?php print $navbar_classes; ?> border-0 m-0">
  <div class="<?php print $container_class; ?> px-5">
    <div class="user-menu">
      <?php if(!user_is_logged_in()):?>
        <ul class="nav navbar-nav navbar-right login-link p-0">
          <li><a href="/user/register"><i class="mdi mdi-account-plus pl-3"></i>ثبت نام</a></li>
          <li><a href="/user/login"><i class="mdi mdi-login-variant pl-3" style="vertical-align: sub;"></i>ورود</a></li>
        </ul>
      <?php else:?>
      <?php global $user; ?>
      <ul class="nav navbar-nav navbar-right user-links">
        <button class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
          <?php echo $user->name; ?><span class="caret"></span>
        </button>
        <ul class="dropdown-menu">
          <li><a href="/user">پروفایل</a></li>
          <li><a href="/logout">خروج</a></li>
        </ul>
      </ul>
      <?php endif;?>
    </div>

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

    <a href="https://www.instagram.com/nutland_co/" target="_blank" class="btn btn-default instagram-link border-0 px-4">
      <i class="mdi mdi-instagram pl-2"></i>
      اینستاگرام ناتلند
    </a>

    <?php if (!empty($primary_nav) || !empty($secondary_nav) || !empty($page['navigation'])): ?>
      <div class="navbar-collapse collapse" id="navbar-collapse">
        <nav role="navigation">
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
    <?php endif; ?>
  </div>
</header>

<div class="main-container <?php print $container_class; ?>">
  <div class="row">
    <?php print views_embed_view('slideshow', 'block'); ?>

    <link href=/sites/all/themes/nutland/vue/css/app.cb2b9190.css rel=preload as=style>
    <link href=/sites/all/themes/nutland/vue/css/chunk-vendors.388ca547.css rel=preload as=style>
    <link href=/sites/all/themes/nutland/vue/js/app.4ce37162.js rel=preload as=script>
    <link href=/sites/all/themes/nutland/vue/js/chunk-vendors.c3a3cd61.js rel=preload as=script>
    <link href=/sites/all/themes/nutland/vue/css/chunk-vendors.388ca547.css rel=stylesheet>
    <link href=/sites/all/themes/nutland/vue/css/app.cb2b9190.css rel=stylesheet>

    <div id=app></div>
    <script src=/sites/all/themes/nutland/vue/js/chunk-vendors.c3a3cd61.js></script>
    <script src=/sites/all/themes/nutland/vue/js/app.4ce37162.js></script>

    <section<?php print $content_column_class; ?>>
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

<script src="/sites/all/themes/nutland/js/owl.carousel.min.js"></script>
<script>
  const $ = jQuery
  $(document).ready(function(){

      $(".view-slideshow .view-content").addClass('owl-carousel owl-theme').owlCarousel({
          items:2,
          loop: true,
          rtl:true,
          nav: true,
          dots:true,
          autoWidth:true,
      });
  });
</script>