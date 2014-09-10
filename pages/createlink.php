<?php
/*
    Copyright 2014 Franc[e]sco (lolisamurai@tfwno.gf)
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

require_once hnngRoot . 'includecheck.php';
require_once hnngRoot . 'conf.php';
require_once hnngRoot . 'dbmanager.php';

if (!isset($_POST['hnngUrl'])) {
?>
<h1>Oreru&#126;</h1>
<p class="lead">No url provided.</p>
<p><img src="<?php echo $hnngConf['siteroot']; ?>/img/hnng.jpg" width="80%" height="80%"></p>
<p><small>If the issue persists, the server might be experiencing some issues.</small></p>
<?php
}
else {
    $url = $_POST['hnngUrl'];
    $result = hnngShortenUrl($url);
    $shortened = $result['url'];
    $deleteurl = $result['deletelink'];
    
    if ($result['status'] != 'OK') {
?>
        <h1>Oreru&#126;</h1>
        <p class="lead"><?php echo $result['status']; ?></p>
        <p><img src="<?php echo $hnngConf['siteroot']; ?>/img/hnng.jpg" width="80%" height="80%"></p>
        <p><small>If the issue persists, the server might be experiencing some issues.</small></p>
<?php
    }

    else {
?>
        <h1>Dekita! Here's your URL!</h1>
        <form>
            <div class="form-group">
<?php
            echo '<input class="form-control" type="text" value="' . $shortened . '">';
            
            /*
            if ($deleteurl == 'http://hnng.moe') {

                <p>&nbsp;</p>
                <p><sub>This url was already submitted by someone else, so you won't get a deletion link. 
                If you are the original submitter and you need to delete this url, just use the deletion 
                link you recieved the first time.</sub></p>

            }
            else {

                <p>&nbsp;</p>
                <p><sub>To delete your url, just save this link and visit it when you need to delete it:</sub></p>

                echo '<input class="form-control" type="text" value="' . $deleteurl . '">';
            }
            */
?>
            </div>
        </form>
<?php
    }
}
?>