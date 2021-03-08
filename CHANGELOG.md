Changelog for RelaXXPlayer
==========================

This file is used to list changes made in each version of RelaXX

* Home: https://github.com/priestjim/relaxx
* Original home: http://relaxx.dirk-hoeschen.de

Copyright (C) 2010 Dirk Hoeschen

Further modifications by Panagiotis Papadomitsos

## v0.5a - Released 21/02/2008

This is first and early alpha version so expect bugs and missing features.

## v0.5b - Released 25/02/2008

* Drag and Drop : drag selected songs from TRACKLIST to PLAYLIST and sort the PLAYLIST by dragging the songs from one position to another.

## v0.5b2 - Released 27/02/2008

* Client: Fixed a bug in the playlist refresh, when deleting entries.
* Admin: MPD-Outputs can be enabled and disabled.

## v0.5b3 - Released 01/03/2008

* Client: Fixed another bug in the playlist refresh
* Client: Included songinfo and mpd-database statistics
* Templates: Made some minor layout changes

## v0.5b4 - Released 04/03/2008

* Some layout changes.

## v0.5 - Released 12/03/2008

* Added a new darkblue-skin
* Completely recoded the directory-tree
* Fixed some timing bugs
* Many lauyout- and codechanges for better preformance on slow CPUs
* Some changes, to make relaxx compatible with safari and opera

## v0.51 - Released 15/03/2008

* Minor changes to the language-files
* Shift and mouseclick will now select a range between two tablerows

## v0.52 - Released 19/03/2008

* Shanged function xxDirectory in /include/class-player.php. The player will open much faster on large collections.

## v0.53 - Released 23/03/2008

* Due a bug in the php MPD::lib relaxx was unable to connect with password. FIXED!!!
* Rewrite of the rights-management in the controller-files.
* Fixed a bug in xxDirectory. The directory tree will now be build up correctly.

## v0.54 - Released 25/03/2008

* The content of directories with quotes was not visible
  The entries in the directory tree are now escaped correctely
* Fixed table-width problems wit IE on vista
* Fixed problem with bubbeling events in the directory-tree on ie 6
* The javascript-files are now compressed with yui
  
## v0.55 - Released 14/04/2008

* If a song is untagged, relaxx try to suggest songname and artist
* Fixxed the border-collapse bug with IE6 since v0.52
* The "I" key shows the filename with path
* Some minor layout fixes
  
## v0.56 - Released 14/04/2008

* Important Bugfix: Keyactions will now be ignored, when the cursor is on a input field
* Bugfix: The info-marquee shows the full text on firefox even with long titles
* French and Dutch Language-Files added. Thanks to Matthieu Simon and Eric van der Sanden
* Implemented a function to add internet radio streams to the playlist. "A"

## v0.57 - Released 22/05/2008

* Multiple entries can be moved inside playlist
* Bugfix: Track from the end of the playlist will be removed correctly.

## v0.6b - Released 02/06/2008

* The columns in playlist and tracklist are now customizable 
* Filenames with pathinfo will popup delayed automatically

## v0.6b2 - Released 02/06/2008

* Fixed a playlength bug at the IE playing radio streams

## v0.6 - Released 31/08/2008

* Cleaned up the code
* MPD - Lib does not need PEAR anymore
* Complete rewrite of the tree-directory.
  Start on large collections will be faster
* Relaxx is less sensible to MPD-Errors now
* Handles various stream playlist-formats like pls,m3u and asx

## v0.65 - Released 01/03/2009

* Implemented a simple plugin system.  (very experimental)
* First example: play song in the local browser window usinf flash. 
  Only works if there is a directory called "music" pointing to the
  mpd collection. The HTTP-Server must have read access to the 
  collection
* All javascript sources whe crunched un the 0.6 Package. I am sorry for
  that. You will find the sources in the ./js/src directory now.
* Fixed several Problems related to keyboard and input fields
* Fixed a sorting bug in the table
* Songinfos are now displayed in the Browser window title

## v0.66 - Released 15/03/2009

* context menu in IE was broken in v0.66-2 - fixed it
* context menu in opera browsers will work now
* playing songs via flash plugin works now also on IE-Browsers
* drag and drop of complete directories and subdirectories is implemented now

## v0.67 - Released 11/05/2009

* rewrite of the handling of radio streams
* radio streams and playlists in XSPF-Format can be added
* fixed some issues wit the experimental flash-player plugin
* changed the output of the directory-tree (hopefully no more linebreaks)

## v0.69 - Released 27/09/2009

* fixed a js-bug "function ping_mpd not found when sorting the playlist
* partitial rewrite of netradio-controller.php. Unknown playlist formats may work.
* fixed a bug in the MPD-lib which causes relaxx not to work with mpd version 1.5.
* added a russian language file. thanks to Roman Verbitskiy
* some minor changes at the templates. (new default template)
* first collumn in the tracklist will sort correctly now

## v0.70 - Released 29/08/2010

* fixed a bug with select form elements in chrome
* fixed table in firefox 3.6+
* added chinese langauge file. thanks to edward who

## v0.71 - Release 08/10/2012

* removed authentication, please implement it using HTTP methods
* added support for mms,asx and unknown streams
* ajaxified update DB
* cosmetic fixes

## v0.8.0 - Release 08/03/2021

* dug up this old piece of software to resurrect it (for a while at least)
* PHP 8 support
* Docker support
* fix misc JS errors
* fix misc PHP errors
* fix table headers with displays larger than 1200px
* remove debugging alert() in "search in"-field
* fix adding/deleting playlists and radio streams with special chars (like spaces, &, *, ?)
* fix playlist list reload after adding/deleting
* add youtube-dl support to "Append radio stream" context menu entry
