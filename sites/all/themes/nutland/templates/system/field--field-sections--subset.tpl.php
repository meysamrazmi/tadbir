<div class="<?php print $classes; ?> subset-collection"<?php print $attributes; ?>>
  <?php if (!$label_hidden): ?>
    <div class="field-label"<?php print $title_attributes; ?>><?php print $label ?>:&nbsp;</div>
  <?php endif; ?>
  <section id="slide-1" class="homeSlide">
    <div class="bcg"
         data-center="background-position: 50% 0px;"
         data-bottom-top="background-position: 50% 150px;"
         data-top-bottom="background-position: 50% -150px;"
         data-anchor-target="#slide-1">
      <div class="hsContainer">

        <div class="header-style">
          <div class="container">
            <div class="text-border">
              <div class="text-border-inside">
                <h2>فعالیت های گروه</h2>
              </div>

              <div class="field-items"<?php print $content_attributes; ?>>
                <?php
                foreach ($items as $delta => $item):
                  ?>
                  <div class="field-item <?php print $classes; ?>"<?php print $item_attributes[$delta]; ?>>
                    <div class="container">
                      <?php
                      print render($item);
                      ?>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>
</div>
<?php
function isMobile() {
  return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}
if(!isMobile()){
  drupal_add_js('/sites/all/themes/nutland/js/skrollr.js');
}
?>

<?php
$node = node_load(arg(1));
?>

<style>
.hsContainer {
  display: table;
  table-layout: fixed;
  width: 100%;
  height: 100%;
  overflow: hidden;
  position: relative;
}
.bcg {
  background-position: center center;
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
  height: 100%;
  width: 100%;
}
#slide-1 .bcg {
  background-image:url(<?php
    echo isset($node->field_main_image['und'][0])? image_style_url('1366x670', $node->field_main_image['und'][0]['uri']) : '/sites/all/themes/nutland/images/sktemplate3.jpg';
  ?>);
  padding: 50px 0;
}
</style>
<script>
  $( function( $ ) {
    skrollr.init({
      render: function(data) {
        //Debugging - Log the current scroll position.
        //console.log(data.curTop);
      }
    });
  });
</script>
