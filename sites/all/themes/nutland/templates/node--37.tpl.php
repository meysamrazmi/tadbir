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

    <?php
    $node1 = node_load(38);
    $node2 = node_load(39);
    $node3 = node_load(40);
    $node4 = node_load(41);
    $node5 = node_load(42);
    $node6 = node_load(43);
    $node7 = node_load(44);
    //    print $node->title;
    //    print '<img src="'. image_style_url("320x320", $node->field_image['und'][0]['uri']) .'">';
    ?>

  <section id="top">
    <div class="container">
      <div class="container mb-4">
        <div class="col-md-3">
          <figure class="logo_tadbir">
            <img src="<?php print image_style_url("320x320", $node1->field_image['und'][0]['uri']); ?>" alt="">
          </figure>
        </div>
        <div class="col-md-9">
          <div>
            <span class="text-primary">شرکت نواندیشان کشت و صنعت تدبیر</span>
            <?php print $node1->body['und'][0]['value']; ?>
          </div>
        </div>
      </div>
      <div class="header_title">
        <h5 class="mb-0">ارزش های سازمانی</h5>
      </div>
      <div class="container">
        <div class="col-md-6">
          <img src="<?php print image_style_url("320x320", $node2->field_image['und'][0]['uri']); ?>" alt="">
        </div>
        <div class="col-md-6">
          <h6 class="text-primary"><?php print $node2->title; ?></h6>

          <?php print $node2->body['und'][0]['value']; ?>
        </div>
      </div>
    </div>
  </section>

  <section id="sectionJobs">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <div class="card_jobs flex-none"><h5 class="mb-0">فعالیت ها</h5></div>
          <div class="card_jobs mt3">
            <h6 class="title"><?php print $node3->title; ?></h6>
            <p>
              <?php print $node3->body['und'][0]['value']; ?>
            </p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card_jobs">
            <h6 class="title"><?php print $node4->title; ?></h6>
            <p>
              <?php print $node4->body['und'][0]['value']; ?>
            </p>
          </div>
          <div class="card_jobs mt-3">
            <h6 class="title"><?php print $node5->title; ?></h6>
            <p>
              <?php print $node5->body['und'][0]['value']; ?>
            </p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card_jobs">
            <h6 class="title"><?php print $node6->title; ?></h6>
            <p>
              <?php print $node6->body['und'][0]['value']; ?>
            </p>
          </div>
          <div class="card_jobs mt-3">
            <h6 class="title"><?php print $node7->title; ?></h6>
            <p>
              <?php print $node7->body['und'][0]['value']; ?>
            </p>
          </div>
        </div>
        </divc>
      </div>
  </section>

  <section id="custom">
    <div class="container swiper_frame">
      <div class="header_title text-primary">
        <h5 class="mb-0"> شرکت های تابعه</h5>
      </div>
      <div class="container">
        <?php $block = module_invoke('views', 'block_view', 'custom-block_1'); print render($block['content']);; ?>
      </div>
    </div>
  </section>
  <div id="projects">
    <section>
      <div class="container">
        <div class="header_title text-primary">
          <h5 class="mb-0">پروژه ها</h5>
        </div>
      </div>
      <div class="container">
        <?php $block = module_invoke('views', 'block_view', 'projects-block'); print render($block['content']);; ?>
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

</style>
<script src="/sites/all/themes/nutland/js/owl.carousel.min.js"></script>
<script>
  $(document).ready(function () {

    $(".view-slideshow .view-content").addClass('owl-carousel owl-theme').owlCarousel({
      items: 2,
      loop: true,
      rtl: true,
      nav: true,
      dots: true,
      autoWidth: true,
    });
  });
</script>

