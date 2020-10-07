<?php
global $language;
$lang = $language->language;
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
  if($lang == 'fa'){
    $node1 = node_load(61);
    $node2 = node_load(62);
    $node3 = node_load(63);
    $node4 = node_load(64);
    $node5 = node_load(65);
    $node6 = node_load(66);
  }
  else {
    $node1 = node_load(176);
    $node2 = node_load(177);
    $node3 = node_load(178);
    $node4 = node_load(179);
    $node5 = node_load(180);
    $node6 = node_load(175);
  }
  ?>
  <section id="map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2645.9487698538337!2d51.41660390238768!3d35.73155633965012!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3f8e014e96cc6c55%3A0x3124d88e89ed2139!2sTadbir%20Economical%20Development%20Group!5e0!3m2!1sen!2sus!4v1594055325516!5m2!1sen!2sus"
            width="1920" height="500" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0">
    </iframe>
  </section>
  <section id="content">
    <div class="text">
      <p><?php print $node1->body[$lang][0]['value'];?></p>
    </div>
    <div class="tab-contact">
      <div class="tab-info container">
        <div class="grid">
          <div class="tab tab--1-of-3">
            <div class="menu">
              <h4 style="padding-bottom: 0!important;border-bottom: 0!important;"><?php echo $lang == 'fa' ? 'اطلاعات تماس' : 'CONTACT INFO';?></h4>
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
              <li class="active"><div class="table"><?php print $node2->body[$lang][0]['value']?></div></li>
              <li><div class="table"><?php print $node3->body[$lang][0]['value']?></div></li>
              <li><div class="table"><?php print $node4->body[$lang][0]['value']?></div></li>
              <li><div class="table"><?php print $node5->body[$lang][0]['value']?></div></li>
              <li><div class="table"><?php print $node6->body[$lang][0]['value']?></div></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="tab-mobile container" style="display: none">
      <h4><?php echo $lang == 'fa' ? 'اطلاعات تماس' : 'CONTACT INFO';?></h4>
      <div class="tab-container">
        <div class="tab-navigation">
          <select id="select-box">
            <option value="1"><?php echo $lang == 'fa' ? 'دپارتمان انرژی' : 'Energy Department';?></option>
            <option value="2"><?php echo $lang == 'fa' ? 'دپارتمان کشاورزی' : 'Agriculture Department';?></option>
            <option value="3"><?php echo $lang == 'fa' ? 'دپارتمان دارویی' : 'Medical Department';?></option>
            <option value="4"><?php echo $lang == 'fa' ? 'دپارتمان ساختمان' : 'Construction Department';?></option>
            <option value="5"><?php echo $lang == 'fa' ? 'دپارتمان سرمایه گذاری' : 'Investment Department';?></option>
          </select>
        </div>

        <div id="tab-1" class="tab-content">
          <div><span><?php print $node2->body[$lang][0]['value']; ?></span></div>
        </div>
        <div id="tab-2" class="tab-content">
          <div class="table"><?php print $node3->body[$lang][0]['value']?></div>
        </div>
        <div id="tab-3" class="tab-content">
          <div class="table"><?php print $node4->body[$lang][0]['value']?></div>
        </div>
        <div id="tab-4" class="tab-content">
          <div class="table"><?php print $node5->body[$lang][0]['value']?></div>
        </div>
        <div id="tab-5" class="tab-content">
          <div class="table"><?php print $node6->body[$lang][0]['value']?></div>
        </div>
      </div>
    </div>
    <h4 class="hform" style="margin: 10px 0px;"><?php echo $lang == 'fa' ? 'فرم تماس' : 'CONTACT FORM';?></h4>
    <div class="form">
      <?php
      $block = module_invoke('webform', 'block_view', 'client-block-21');
      print render($block['content']);
      ?>
    </div>
    <h4 class="hbottom"><?php echo $lang == 'fa' ? 'گروه اقتصادی تدبیر در شبکه های اجتماعی :' : 'Social Media:';?></h4>
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

