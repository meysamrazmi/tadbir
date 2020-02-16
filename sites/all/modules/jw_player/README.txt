-- SUMMARY --

The JW Player module adds a new field for displaying video files in a JW Player.

For a full description visit the project page:
  http://drupal.org/project/jw_player
Bug reports, feature suggestions and latest developments:
  http://drupal.org/project/issues/jw_player


-- REQUIREMENTS --

* This module depends on the File module, which is part of Drupal core, Chaos
  Tools (http://drupal.org/project/ctools) and the Libraries module
  (http://drupal.org/project/libraries).


-- INSTALLATION --

* Install this module as described at http://drupal.org/node/895232.

* For a Cloud-Hosted Player, visit admin/config/media/jw_player/settings and
  configure your Cloud-Hosted Account Token.

* For a Self-Hosted Player:

  * Download the self-hosted version of JW Player from http://www.jwplayer.com/

  * Extract the zip file and put the contents of the extracted folder in
    libraries/jwplayer.
    E.g.: sites/all/libraries/jwplayer or sites/<sitename>/libraries/jwplayer

  * Visit admin/config/media/jw_player/settings and configure your Self-Hosted
    Player License Key.

* Go to Administration > Reports > Status reports (admin/reports/status) to
  check your configuration.

-- BASIC USAGE --

In that majority of cases JW Player is used as a field formatter on a file
field. Before enabling JW Player on a field visit /admin/config/media/jw_player
to configure one or more presets. A preset is a group of JW Player settings,
such as dimentions and skin, that can be re-used multiple times.

Once a preset has been defined visit /admin/structure/types and select "manage
display" for the content type you'd like to configure and select "JW player" as
the formatter on the relevant file field. At this point you will also need to
click on the cog beside the field to select the preset you'd like to apply to
the file. That's it - videos uploaded to this field should now be displayed
using JW Player!

-- URL BASED SEEKING --

You can create permanent links that make jWPlayer start playing at a given
time frame. The url must look like this:

 /path/to/site?seek=<TIME>#<PLAYER_ID>

<TIME> is the offset in seconds the player should start and <PLAYER_ID>
is the id of the player the seeking is targeted on. This enables seeking
for sites with multiple instances of jWPlayer on it.

Not that seeking only works if the server delivering the media file is
capable of doing so. If the Server does not support this the player will
always start at the beginning.
