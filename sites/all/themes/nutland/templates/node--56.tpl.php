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
  <?php endif; ?>

  <?php
  $node1 = node_load(20);
  $node2 = node_load(10);
  $node3 = node_load(9);
  $node4 = node_load(8);
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
  .menu.nav:nth-child(2):hover  {
    color: red;
  }
  #block--block-5{
    display: none;
  }
  #main{
    padding-top: 50px;
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
    white-space: nowrap;
    display: none
  }
  [dir] .figures .caption {
    background-color: rgba(255, 255, 255, .8);
    padding: 15px;
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
