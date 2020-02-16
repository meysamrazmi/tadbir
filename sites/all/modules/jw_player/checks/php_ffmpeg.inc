<?php
/**
 * Implements hook_jw_player_supports().
 */
function php_ffmpeg_jw_player_supports($file) {
  try {
    if ($streams = php_ffmpeg_probe()->streams(drupal_realpath($file->uri))) {
      $supported_video_codecs = variable_get('php_ffmpeg_jw_player_video_codecs', array('h264', 'h263', 'vp8'));
      $supported_audio_codecs = variable_get('php_ffmpeg_jw_player_audio_codecs', array('aac', 'mp3','vorbis'));
      // Assume video/audio is supported if the file has no video/audio stream.
      $video_supported = !$streams->videos()->count();
      $audio_supported = !$streams->audios()->count();
      // Search for a supported audio and video streams.
      $stream_iterator = $streams->getIterator();
      $stream = reset($stream_iterator);
      while (!($video_supported  && $audio_supported) && $stream) {
        if ($stream->isVideo() && !$video_supported) {
          $video_supported = $stream->has('codec_name') && in_array($stream->get('codec_name'), $supported_video_codecs);
        }
        if ($stream->isAudio() && !$audio_supported) {
          $audio_supported = $stream->has('codec_name') && in_array($stream->get('codec_name'), $supported_audio_codecs);
        }
        $stream = next($stream_iterator);
      }
      return  $video_supported && $audio_supported;
    }
  }
  catch (Exception $e) {
    watchdog('jw_player', 'Error while probing @uri, check php_ffmpeg log.', array('@uri' => $file->uri), WATCHDOG_ERROR);
  }
  return FALSE;
}