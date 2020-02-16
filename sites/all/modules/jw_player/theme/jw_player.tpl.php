<?php
/**
 * @file
 * Display the JW Player.
 *
 * Variables available:
 * - $html_id: Unique id generated for each video.
 * - $jw_player_inline_js_code: JSON data with configuration settings for the video player.
 *
 * @see template_preprocess_jw_player()
 */
?>
<div id="<?php print $html_id ?>" class="jwplayer-video">
Loading Video...
</div>
<?php if(isset($jw_player_inline_js_code)): ?>
  <script type="text/javascript">
    jwplayer('<?php print $html_id ?>').setup(<?php print $jw_player_inline_js_code?>);
  </script>
<?php endif ?>
