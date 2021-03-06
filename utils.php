<?php
/*
    Copyright 2014-2016 Franc[e]sco (lolisamurai@waifu.club)
    This file is part of hnng.moe.
    hnng.moe is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.
    hnng.moe is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
    GNU General Public License for more details.
    You should have received a copy of the GNU General Public License
    along with hnng.moe. If not, see <http://www.gnu.org/licenses/>.
*/

if (!defined('hnngAllowInclude')) {
    header('HTTP/1.0 403 Forbidden');
    die('You are not allowed to access this file.');
}

require_once hnngRoot . 'conf.php';

function hnngEchoRobots() {
    global $hnngConf;
    
    if ($hnngConf['nofollow'] == true) { 
        echo '<meta name="robots" content="noindex, nofollow">';
        return;
    } 
    
    echo '<meta name="robots" content="noarchive">';
}

// sanitizes a string array and removes everything except for a-ZA-Z0-9_.-&=
function hnngSanitizeArray($url) {
    if (is_array($url)) {
        foreach ($url as $key => $value) {
            $url[$key] = hnngSanitizeArray($value);
        }

        return $url;
    }

    else {
        // remove everything except for a-ZA-Z0-9_.-&=
        $url = preg_replace('/[^a-zA-Z0-9_\.\-&=@\s]/', '', $url);
        return $url;
    }
}
?>
