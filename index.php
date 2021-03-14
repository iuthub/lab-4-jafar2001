<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="viewer.css" type="text/css" rel="stylesheet" />
    <title>Music Viewer</title>
</head>
<body>
<div id="header">
    <h1>190M Music Playlist Viewer</h1>
    <h2>Search Through Your Playlists and Music</h2>
</div>

<div id="listarea">
    <ul id="musiclist">
        <?php
        $playlist = $_REQUEST["playlist"];
        if(isset($playlist) == false){
            foreach (glob("songs/*.mp3") as $item){
                $value = filesize($item);
                if($value > 1048576) {
                    $value /= 1048576;
                    $value = round($value, 2);
                    $value = $value." mb";
                }
                elseif ($value > 1024) {
                    $value /= 1024;
                    $value = round($value, 2);
                    $value = $value . " kb";
                }
                else
                    $value = $value." byte";
                ?>
                <li class="mp3item"><a href="<?php print "$item"; ?>"><?php print basename($item, 'songs/')." (".$value.")"; ?></a></li>
            <?php } ?>

            <?php foreach (glob("songs/*.txt") as $item){?>
                <li class="playlistitem"><a href=""><?php print basename($item, 'songs/'); ?></a></li>
                <?php $playlist = basename($item, 'songs/')?>
            <?php }} ?>
    </ul>
</div>

</body>
</html>
