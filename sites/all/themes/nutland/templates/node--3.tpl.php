<?php

/**
 * @file
 * Default theme implementation to display a node.
 *
 * Available variables:
 * - $title: the (sanitized) title of the node.
 * - $content: An array of node items. Use render($content) to print them all,
 *   or print a subset such as render($content['field_example']). Use
 *   hide($content['field_example']) to temporarily suppress the printing of a
 *   given element.
 * - $user_picture: The node author's picture from user-picture.tpl.php.
 * - $date: Formatted creation date. Preprocess functions can reformat it by
 *   calling format_date() with the desired parameters on the $created variable.
 * - $name: Themed username of node author output from theme_username().
 * - $node_url: Direct URL of the current node.
 * - $display_submitted: Whether submission information should be displayed.
 * - $submitted: Submission information created from $name and $date during
 *   template_preprocess_node().
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the
 *   following:
 *   - node: The current template type; for example, "theming hook".
 *   - node-[type]: The current node type. For example, if the node is a
 *     "Blog entry" it would result in "node-blog". Note that the machine
 *     name will often be in a short form of the human readable label.
 *   - node-teaser: Nodes in teaser form.
 *   - node-preview: Nodes in preview mode.
 *   The following are controlled through the node publishing options.
 *   - node-promoted: Nodes promoted to the front page.
 *   - node-sticky: Nodes ordered above other non-sticky nodes in teaser
 *     listings.
 *   - node-unpublished: Unpublished nodes visible only to administrators.
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 *
 * Other variables:
 * - $node: Full node object. Contains data that may not be safe.
 * - $type: Node type; for example, story, page, blog, etc.
 * - $comment_count: Number of comments attached to the node.
 * - $uid: User ID of the node author.
 * - $created: Time the node was published formatted in Unix timestamp.
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 * - $zebra: Outputs either "even" or "odd". Useful for zebra striping in
 *   teaser listings.
 * - $id: Position of the node. Increments each time it's output.
 *
 * Node status variables:
 * - $view_mode: View mode; for example, "full", "teaser".
 * - $teaser: Flag for the teaser state (shortcut for $view_mode == 'teaser').
 * - $page: Flag for the full page state.
 * - $promote: Flag for front page promotion state.
 * - $sticky: Flags for sticky post setting.
 * - $status: Flag for published status.
 * - $comment: State of comment settings for the node.
 * - $readmore: Flags true if the teaser content of the node cannot hold the
 *   main body content.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 *
 * Field variables: for each field instance attached to the node a corresponding
 * variable is defined; for example, $node->body becomes $body. When needing to
 * access a field's raw values, developers/themers are strongly encouraged to
 * use these variables. Otherwise they will have to explicitly specify the
 * desired field language; for example, $node->body['en'], thus overriding any
 * language negotiation rule that was previously applied.
 *
 * @see template_preprocess()
 * @see template_preprocess_node()
 * @see template_process()
 *
 * @ingroup templates
 */
?>
<article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
  <?php if ((!$page && !empty($title)) || !empty($title_prefix) || !empty($title_suffix) || $display_submitted): ?>
    <header>
      <?php print render($title_prefix); ?>
      <?php if (!$page && !empty($title)): ?>

      <?php endif; ?>
      <?php print render($title_suffix); ?>
      <?php if ($display_submitted): ?>
        <span class="submitted">
      <?php print $user_picture; ?>
      <?php print $submitted; ?>
    </span>
      <?php endif; ?>
    </header>
    <?php print views_embed_view('slideshow', 'block'); ?>
  <?php endif; ?>
  <div class="container" id="gozideha" >

    <div class="header_title">
      <h5 class="mb-0">گزیده ها</h5>
    </div>
    <?php
    $node1 = node_load(20);
    $node2 = node_load(10);
    $node3 = node_load(9);
    $node4 = node_load(8);
    $node7 = node_load(36);
    $node8 = node_load(34);
    $node9 = node_load(31);
    $node10 = node_load(32);
    $node11 = node_load(35);
    $node12 = node_load(33);
    //    print $node->title;
    //    print '<img src="'. image_style_url("320x320", $node->field_image['und'][0]['uri']) .'">';
    ?>
    <div class="row">

      <div class="col-md-4">
        <a href="<?php print $node1->field_link['und'][0]['url']; ?>" class="items border_image">
          <img src="<?php print image_style_url("320x320", $node1->field_image['und'][0]['uri']); ?>" alt="">
          <div class="caption_wrap">
            <div class="caption">
              <h4><?php print $node1->title; ?></h4>
              <span><?php print $node1->field_tozih['und'][0]['value']; ?></span>
            </div>
          </div>
          <div class="line_effect"><span class="lineInner"></span></div>
        </a>
      </div>
      <div class="col-md-4">
        <a href="<?php print $node2->field_link['und'][0]['url']; ?>" class="items border_image">
          <img src="<?php print image_style_url("320x320", $node2->field_image['und'][0]['uri']); ?>" alt="">
          <div class="caption_wrap">
            <div class="caption">
              <h4><?php print $node2->title; ?></h4>
              <span><?php print $node2->field_tozih['und'][0]['value']; ?></span>
            </div>
          </div>
          <div class="line_effect"><span class="lineInner"></span></div>
        </a>
      </div>
      <div class="col-md-4">
        <a href="<?php print $node3->field_link['und'][0]['url']; ?>" class="items border_image">
          <img src="<?php print image_style_url("320x320", $node3->field_image['und'][0]['uri']); ?>" alt="">
          <div class="caption_wrap">
            <div class="caption">
              <h4><?php print $node3->title; ?></h4>
              <span><?php print $node3->field_tozih['und'][0]['value']; ?></span>
            </div>
          </div>
          <div class="line_effect"><span class="lineInner"></span></div>
        </a>
      </div>


    </div>
  </div>

  <div class="row" id="sectionText">
    <section>
      <div class="container">
        <div class="article">
          <h3 style="font-weight: bold"><?php print $node4->title; ?></h3>
          <h4><?php print $node4->field_tozih['und'][0]['value']; ?></h4>
          <?php print $node4->body['und'][0]['value']; ?>
        </div>
      </div>
    </section>
  </div>

  <section id="last">
    <div class="container">
      <div class="header_title">
        <h5 class="mb-0 text-primary">آخرین مطالب</h5>
      </div>
      <div class="row">
        <?php print views_embed_view('latest', 'blockk'); ?>
      </div>
      <div class="row">
        <?php print views_embed_view('news', 'block_2'); ?>
      </div>
    </div>
  </section>

  <?php
  $node13 = node_load(140);
  $node14 = node_load(141);
  $node15 = node_load(142);
  $node16 = node_load(143);
  ?>
  <div class="row" id="sectionText">
    <section>
      <div class="container">
        <div class="article">
          <h3 style="font-weight: bold"><?php print $node13->title; ?></h3>
          <div class="sub-item">
            <div class="col-sm-4">
              <?php print isset($node14->field_image['und'][0])? '<img src="'. image_style_url('media_thumbnail', $node14->field_image['und'][0]['uri']) .'">' : ''; ?>
              <?php print isset($node14->body['und'][0])? '<div>'. $node14->body['und'][0]['value'] .'</div>' : ''; ?>
            </div>
            <div class="col-sm-4">
              <?php print isset($node15->field_image['und'][0])? '<img src="'. image_style_url('media_thumbnail', $node15->field_image['und'][0]['uri']) .'">' : ''; ?>
              <?php print isset($node15->body['und'][0])? '<div>'. $node15->body['und'][0]['value'] .'</div>' : ''; ?>
            </div>
            <div class="col-sm-4">
              <?php print isset($node16->field_image['und'][0])? '<img src="'. image_style_url('media_thumbnail', $node16->field_image['und'][0]['uri']) .'">' : ''; ?>
              <?php print isset($node16->body['und'][0])? '<div>'. $node16->body['und'][0]['value'] .'</div>' : ''; ?>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <div id="projects">
    <section>
      <div class="container">
        <div class="header_title text-primary">
          <h5 class="mb-0">پروژه ها</h5>
        </div>
      </div>
      <div class="container" style="padding: 0">
        <?php print views_embed_view('projects', 'block_1'); ?>
      </div>
    </section>
  </div>

  <div id="jobs">

    <section>
      <div class="container">
        <div class="header_title text-primary">
          <h5 class="mb-0">حوزه های اصلی فعالیت</h5>
        </div>
        <div class="container osm owl-carousel owl-theme" style="padding: 0">
          <div>
            <a href="<?php print $node7->field_link['und'][0]['url']; ?>" class="items_img">
              <img class="filter1" src="<?php print image_style_url("medium", $node7->field_image['und'][0]['uri']); ?>" alt="">
              <div class="text">
                <h4><?php print $node7->title; ?></h4>
              </div>
            </a>
          </div>
          <div>
            <a href="<?php print $node8->field_link['und'][0]['url']; ?>" class="items_img">
              <img class="filter2" src="<?php print image_style_url("medium", $node8->field_image['und'][0]['uri']); ?>" alt="">
              <div class="text">
                <h4><?php print $node8->title; ?></h4>
              </div>
            </a>
          </div>
          <div>
            <a href="<?php print $node9->field_link['und'][0]['url']; ?>" class="items_img">
              <img class="filter3" src="<?php print image_style_url("medium", $node9->field_image['und'][0]['uri']); ?>" alt="">
              <div class="text">
                <h4><?php print $node9->title; ?></h4>
              </div>
            </a>
          </div>
          <div>
            <a href="<?php print $node10->field_link['und'][0]['url']; ?>" class="items_img">
              <img class="filter4" src="<?php print image_style_url("medium", $node10->field_image['und'][0]['uri']); ?>" alt="">
              <div class="text">
                <h4><?php print $node10->title; ?></h4>
              </div>
            </a>
          </div>
          <div>
            <a href="<?php print $node11->field_link['und'][0]['url']; ?>" class="items_img">
              <img class="filter5" src="<?php print image_style_url("medium", $node11->field_image['und'][0]['uri']); ?>" alt="">
              <div class="text">
                <h4><?php print $node11->title; ?></h4>
              </div>
            </a>
          </div>
          <div>
            <a href="<?php print $node12->field_link['und'][0]['url']; ?>" class="items_img">
              <img class="filter6" src="<?php print image_style_url("medium", $node12->field_image['und'][0]['uri']); ?>" alt="">
              <div  class="text">
                <h4><?php print $node12->title; ?></h4>
              </div>
            </a>
          </div>
        </div>
      </div>
    </section>
  </div>
  <?php

  // Hide comments, tags, and links now so that we can render them later.
  hide($content['comments']);
  hide($content['links']);
  hide($content['field_tags']);
  print render($content);
  ?>
  <?php
  // Only display the wrapper div if there are tags or links.
  $field_tags = render($content['field_tags']);
  $links = render($content['links']);
  if ($field_tags || $links):
    ?>
    <footer>
      <?php print $field_tags; ?>
      <?php print $links; ?>
    </footer>
  <?php endif; ?>
  <?php print render($content['comments']); ?>
</article>
<style>
  @media (max-width: 768px) {
    #last .col-md-6{
      flex: 0 0 96% !important;
      max-width: 100% !important;
      margin: 10px;
    }
  }
  @media (min-width: 768px) and  (max-width: 992px){
    #gozideha .items, #projects .items{
      height: 250px !important;
    }
  }
  #last .row {
    display: flex;
    flex-wrap: wrap;
    margin-bottom: 32px;
  }
  #last .col-md-6 {
    flex: 0 0 50%;
    max-width: 50%
  }
  #last .view-news .view-content {
    display: flex;
  }
  @media (max-width: 767px) {
    #last .view-news .view-content {
      flex-direction: column;
    }
  }
  #last .view-news .views-field-created {
    border-bottom: 1px solid #C4C4C4;
    margin-bottom: 10px;
  }
  #last .view-news .views-field-created > span {
    display: flex;
    justify-content: space-between;
  }
  #last .view-news .views-field-created > span span:first-child {
    color: #253A76;
    font-weight: bold;
  }
  #last .view-news .views-field-title a {
    color: #000;
    font-weight: bold;
    line-height: 2;
  }
  #last .view-news .views-field-body {
    color: #808080;
    line-height: 1.8;
    text-align: justify;
  }
  .col-6,
  [class^=col-sm-],
  [class^=col-md-],
  [class^=col-lg-],
  [class^=col-xl-] {
    display: inherit;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -ms-flex-direction: column;
    flex-direction: column
  }
  #last .caption_wrap {
    position: absolute;
    z-index: 3;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -ms-flex-direction: column;
    flex-direction: column
  }
  [dir=rtl] #last .caption {
    border-right: 3px solid rgba(255, 255, 255, .9);
    padding-right: 0.625rem
  }
  #last .caption span {
    display: table
  }
  #last .caption span:before {
    content: "";
    height: 0.125rem;
    position: relative;
    top: 2rem;
    display: block;
    width: 0;
    transition: width .3s ease-in-out
  }
  #last .caption span:before {
    background-color: rgba(255, 255, 255, .8);
    -webkit-transition: width .3s ease-in-out
  }
  #last  .caption span:after {
    content: "";
    width: 100%;
    height: 0.0625rem;
    position: relative;
    top: 0.3125rem;
    display: block
  }
  [dir] #last .caption span:after {
    background-color: rgba(255, 255, 255, .4)
  }
  #last .items_text {
    position: relative;
    height: 300px;
    color: #fff !important;
    overflow: hidden
  }
  #last .items_text img {
    min-height: 100%;
    min-width: 100%;
    height: auto;
    width: auto;
    max-width: none;
    transition: -webkit-transform .5s ease-in-out;
    transition: transform .5s ease-in-out;
  }
  #last .items_text .caption {
    top: auto;
    bottom: 1.25rem
  }
  #last .items_text .caption h4 {
    line-height: 20px;
    height: 40px;
    overflow: hidden;
  }
  #last .items_text .caption_wrap {
    top: 0.3125rem;
    bottom: 0.3125rem;
    width: 180px;
    -webkit-box-pack: end;
    -ms-flex-pack: end;
    justify-content: flex-end;
    transition: width .5s ease-in-out;
    background-color: rgba(0, 36, 122, .5);
    padding-bottom: 1.875rem;
    -webkit-transition: all .5s ease-in-out;
    right: 0.3125rem
  }
  [dir] #last  .items_text .caption_wrap .caption {
    margin: 0
  }
  #last .items_text:hover img {
    -webkit-transform: scale(1.1)
  }
  [dir] #last .items_text:hover img {
    transform: scale(1.1)
  }
  #last .items_text:hover .caption_wrap {
    width: 200px
  }
  [dir] #last .items_text:hover .caption_wrap {
    background-color: rgba(0, 36, 122, .9)
  }
  #last .items_text:before {
    content: "";
    position: absolute;
    top: 0.3125rem;
    bottom: 0.3125rem
  }
  [dir=rtl] #last .items_text:before {
    right: 0.3125rem;
    left: 0.3125rem
  }


  /* #gozideha  */

  #gozideha .row {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap
  }
  #gozideha .row .col-md-4 {
    -webkit-box-flex: 0;
    -ms-flex: 0 0 33.3333333333%;
    flex: 0 0 33.3333333333%;
    max-width: 33.3333333333%
  }
  [dir=rtl] #gozideha .caption span {
    line-height: 1.2;
    font-size: 14px !important;
  }
  #gozideha .row .col-md-4
  [class^=col-sm-],
  [class^=col-md-],
  [class^=col-lg-],
  [class^=col-xl-] {
    display: inherit;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -ms-flex-direction: column;
    flex-direction: column
  }
  #gozideha  .caption_wrap {
    position: absolute;
    z-index: 3;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -ms-flex-direction: column;
    flex-direction: column
  }
  [dir=rtl] #gozideha .caption {
    border-right: 3px solid rgba(255, 255, 255, .9);
    padding-right: 0.625rem
  }
  #gozideha .caption span {
    display: table
  }
  #gozideha .caption h4 {
    font-weight: bold;
    position: relative;
  }
  #gozideha .caption h4:before {
    content: "";
    height: 2px;
    position: absolute;
    bottom: -7px;
    display: block;
    width: 0px;
    transition: width .3s ease-in-out;
    background-color: #F95109;
    -webkit-transition: width .3s ease-in-out;
  }
  #gozideha .items:hover .caption h4:before {
    width: 100%
  }
  #gozideha .items {
    color: #fff;
    overflow: hidden;
    text-shadow: 1px 1px #000000;
  }
  #gozideha .items img {
    min-height: 100%;
    width: auto;
    transition: all .4s ease-in-out;
    min-width: 100%;
    height: auto;
    filter: grayscale(1);
  }
  #gozideha .items .caption_wrap {
    top: 3.125rem;
    margin: 0.3125rem
  }
  #gozideha .items:hover img {
    filter: grayscale(0);
  }
  #gozideha .items_text {
    position: relative;
    height: 15.625rem;
    color: #fff !important;
    overflow: hidden
  }
  #gozideha .items_text img {
    height: 100%;
    width: 100%;
    transition: -webkit-transform .5s ease-in-out;
    transition: transform .5s ease-in-out;
    transition: transform .5s ease-in-out, -webkit-transform .5s ease-in-out;
    -webkit-transition: -webkit-transform .5s ease-in-out
  }
  #gozideha .items_text .caption {
    top: auto;
    bottom: 1.25rem
  }
  #gozideha .items_text .caption_wrap {
    top: 0.3125rem;
    bottom: 0.3125rem;
    width: 11.25rem;
    -webkit-box-pack: end;
    -ms-flex-pack: end;
    justify-content: flex-end;
    transition: width .5s ease-in-out;
    background-color: rgba(0, 36, 122, .5);
    padding-bottom: 1.875rem;
    -webkit-transition: width .5s ease-in-out;
    right: 0.3125rem
  }
  [dir] #gozideha .items_text .caption_wrap .caption {
    margin: 0
  }
  #gozideha .items_text:hover img {
    -webkit-transform: scale(1.1);
    transform: scale(1.1);
  }
  #gozideha .items_text:hover .caption_wrap {
    width: 14.375rem;
    background-color: rgba(0, 36, 122, .9)
  }
  #gozideha .items_text:before {
    content: "";
    position: absolute;
    top: 0.3125rem;
    bottom: 0.3125rem;
    right: 0.3125rem;
    left: 0.3125rem
  }
</style>
<script>
  $("#jobs .owl-carousel").owlCarousel({
    rtl: true,
    loop: true,
    margin: 15,
    responsiveClass: true,
    nav: true,
    dots: false,
    responsive: {
      0: { items: 2 },
      500: { items: 3 },
      700: { items: 4 },
      900: { items: 5 },
      1100: {
        items: 6,
        loop: false,
      },
    },
  });
</script>
