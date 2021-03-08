<?php
/* ----------------------------------------------  /
/  Relax Player                                    /
/                                                  /
/  Get the first URL out of a netradio PLAYLIST    /
/  ---------------------------------------------- */

session_start();

ini_set('default_mimetype', 'text/javascript');
header("Content-type: text/javascript; charset=utf-8");

if (isset($_SESSION['relaxx'])) {
	$playlist = $_GET['playlist'];
	$url = "";
	// no http entered
	if ((substr($playlist, 0, 4) != 'http') && (substr($playlist, 0, 3) != 'mms')) {
		$playlist = "http://" . $playlist;
	}
	// Get Playlist from URL - playlist format if no port is given
	if (substr($playlist, 0, 3) == 'mms') {
		$url = $playlist;
	} elseif (strpos($playlist, ":", 5) === false) {
		$ext = substr(strrchr($playlist, '.'), 1);
		switch ($ext) {
			case "pls":
				$url = getPlaylist($playlist, "file");
				$url = substr($url, (strpos($url, "=") + 1));
				break;
			case "m3u":
				$url = getPlaylist($playlist, "http:");
				$url = $url;
				break;
			case "asx":
				libxml_use_internal_errors();
				$xmlFile = file_get_contents($playlist);
				$xml = mb_strtolower($xmlFile, 'UTF-8');
				$xml = simplexml_load_string($xml);
				if ($xml instanceof SimpleXMLElement) {
					foreach ($xml->entry[0]->ref as $ref) {
						if (strpos($ref['href'], 'mms://') !== false) {
							$url = (string)$ref['href'];
							break;
						}
					}
				}
				break;
			case "aspx":
				$aspxFile = file_get_contents($playlist);
				$aspx = @parse_ini_string($aspxFile);
				$url = isset($aspx['File1']) ? $aspx['File1'] : "";
				break;
			case "wax":
				$url = getPlaylist($playlist, "<ref");
				$url = eregi_replace("[ >\"']", "", substr($url, strpos($url, "=") + 1, -2));
				break;
			case "xspf":
				$xml = simplexml_load_file($playlist);
				if ($xml->trackList) $url = $xml->trackList->track[0]->location;
				break;
			default:  // try to match first url in file if content is unknown
				$url = $playlist;
				//			$lines = file ($playlist);
				//     			if ($lines) {
				//	 	 	    foreach ($lines as $line) {
				// 	  	 		$url = getPlaylist($playlist);
				//				$fu = preg_match('~http:(.+?)[ "\'>]~is',trim($line)." ", $matches);
				//				if ($fu) { $url = substr($matches[0],0,-1); break; }
				//				}
				//			}
				break;
		}
	} else {
		//TODO: add more URLs supported by youtube-dl here
		if (str_contains($playlist, 'youtube.com') || str_contains($playlist, 'youtu.be')) {
			if(!exec('youtube-dl --version')){
				echo '({"error":"youtube-dl binary missing"})';
				die();
			}

			$output;
			$returnCode;
			exec("youtube-dl -gx '".escapeshellarg($playlist)."'", $output, $returnCode);
			if($returnCode !== 0) {
				exec("youtube-dl -gx '".escapeshellarg($playlist)."' 2>&1", $output, $returnCode);
				echo '({"error":'.json_encode(implode("\n", $output)).'})';
				die();
			}

			$url = $output[0];
		} else {
			// assume it is a raw url to a steam and return
			$url = $playlist;
		}
	}
	if ($url != "") {
		echo '({"url":"' . $url . '"})';
	} else {
		echo '({"error":"radiostream"})';
	}
}

// read a playlist and searchs for pattern
function getPlaylist($playlist, $tag = "")
{
	$lines = file($playlist);
	if ($lines) {
		// Search for http line and return first URL
		foreach ($lines as $line) {
			$line = strtolower(trim($line));
			// check if stream url
			if (($line != "") && ($tag == (substr($line, 0, strlen($tag)))) && ($line[0] != "#")) return $line;
		}
	}
	return false;
}
