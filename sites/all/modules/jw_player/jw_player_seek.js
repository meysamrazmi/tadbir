(function ($) {

  /**
   * Check for seeking parameters in the url and trigger a seek.
   */
  Drupal.behaviors.JWPlayerSeek = {
    attach: function(context) {
      var seek = decodeURI((RegExp('seek=(.+?)(&|$)').exec(location.search)||[,null])[1]);
      var url_player_id =  decodeURI((RegExp('#(.+?)(&|$)').exec(location.hash)||[,null])[1]);
      if (seek > 0 && $('#' + url_player_id).size() > 0) {
        jwplayer(url_player_id).seek(seek);
      }
    }
  };

})(jQuery);
