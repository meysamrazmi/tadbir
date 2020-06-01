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
    $node1 = node_load(61);
    $node2 = node_load(62);
    $node3 = node_load(63);
    $node4 = node_load(64);
    $node5 = node_load(65);
    $node6 = node_load(66);
  ?>
  <section id="map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3238.7561093010218!2d51.41780451634272!3d35.73221623057533!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3f8e06b4c28eed93%3A0x2df56dbfdf9b9fbc!2z2KjZhtuM2KfYryDYqNix2qnYqg!5e0!3m2!1sen!2s!4v1587106093726!5m2!1sen!2s"
            width="1920" height="500" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0">
    </iframe>
  </section>
  <section id="content">
    <div class="text">
      <p><?php print $node1->body['und'][0]['value'];?></p>
    </div>
    <div class="tab-contact">
      <div class="tab-info container">
        <div class="grid">
          <div class="tab tab--1-of-3">
            <div class="menu">
              <h4 style="padding-bottom: 0!important;border-bottom: 0!important;"> اطلاعات تماس </h4>
              <div class="active"><span><?php print $node2->field_tozih['und'][0]['value']; ?></span></div>
              <div><span> <?php print $node3->field_tozih['und'][0]['value']; ?></span></div>
              <div><span><?php print $node4->field_tozih['und'][0]['value']; ?> </span></div>
              <div><span><?php print $node5->field_tozih['und'][0]['value']; ?> </span></div>
              <div><span> <?php print $node6->field_tozih['und'][0]['value']; ?> </span></div>
            </div>
          </div>
          <div class="tab tab--2-of-3">
            <ul class="nacc">
              <li></li>
              <li class="active"><div class="table"><?php print $node2->body['und'][0]['value']?></div></li>
              <li><div class="table"><?php print $node3->body['und'][0]['value']?></div></li>
              <li><div class="table"><?php print $node4->body['und'][0]['value']?></div></li>
              <li><div class="table"><?php print $node5->body['und'][0]['value']?></div></li>
              <li><div class="table"><?php print $node6->body['und'][0]['value']?></div></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="tab-mobile container" style="display: none">
      <h4>اطلاعات تماس</h4>
      <div class="tab-container">
        <div class="tab-navigation">
          <select id="select-box">
            <option value="1">دپارتمان انرژی</option>
            <option value="2">دپارتمان کشاورزی</option>
            <option value="3">دپارتمان دارویی</option>
            <option value="4">دپارتمان ساختمان</option>
            <option value="5">دپارتمان سرمایه گذاری</option>
          </select>
        </div>

        <div id="tab-1" class="tab-content">
          <div><span><?php print $node2->body['und'][0]['value']; ?></span></div>
        </div>
        <div id="tab-2" class="tab-content">
          <div class="table"><?php print $node3->body['und'][0]['value']?></div>
        </div>
        <div id="tab-3" class="tab-content">
          <div class="table"><?php print $node4->body['und'][0]['value']?></div>
        </div>
        <div id="tab-4" class="tab-content">
          <div class="table"><?php print $node5->body['und'][0]['value']?></div>
        </div>
        <div id="tab-5" class="tab-content">
          <div class="table"><?php print $node6->body['und'][0]['value']?></div>
        </div>
      </div>
    </div>
    <h4 class="hform" style="margin: 10px 0px;">فرم تماس</h4>
    <div class="form">
      <?php
      $block = module_invoke('webform', 'block_view', 'client-block-21');
      print render($block['content']);
      ?>
    </div>
    <h4 class="hbottom">گروه اقتصادی تدبیر در شبکه های اجتماعی : </h4>
    <div class="social">
      <ul class="list" style="padding-right: 0px;">
        <a href=""> <li class="social1"></li></a>
        <a href=""> <li class="social2"></li></a>
        <a href=""> <li class="social3"></li></a>
        <a href=""> <li class="social4"></li></a>
        <a href=""> <li class="social5"></li></a>
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
  @media (max-width: 1200px) {
    .hform, .hbottom{
      margin: 10px 35px!important;
    }
  }
  @media (max-width: 768px) and (min-width: 600px) {
    .tab-mobile {
      padding: 0 30px;
    }
  }
  @media (max-width: 768px) {
    .tab-mobile{
      display: block !important;
    }
    .tab-container{
      text-align: -webkit-center;
      padding: 10px 0 20px 0;

    }
    #select-box{
      outline: none;
      width: 100vw;
      margin: 15px auto;
      padding: 10px;
      border-color: #ccc !important;

    }
    .tab-content{
      text-align: justify;
    }
    .select-selected {
      background-color: DodgerBlue;
    }
  }
</style>
<script>
  // tab  info
  $(document).on("click", ".tab-info .menu div", function() {
    var numberIndex = $(this).index();
    tabs(numberIndex)
  });
  function tabs(numberIndex) {
    if (!$(this).is("active")) {
      $(".tab-info .menu div").removeClass("active");
      $(".tab-info ul li").removeClass("active");
      $(this).addClass("active");
      $(".tab-info ul").find("li:eq(" + numberIndex + ")").addClass("active");
      var listItemHeight = $(".tab-info ul")
        .find("li:eq(" + numberIndex + ")")
        .innerHeight();
      $(".tab-info ul").height(listItemHeight + "px");
    }

  }
  $('.tab-content').hide();
  $('#tab-1').show();
  $('#select-box').change(function () {
    dropdown = $('#select-box').val();
    $('.tab-content').hide();
    $('#' + "tab-" + dropdown).show();
  });

</script>

