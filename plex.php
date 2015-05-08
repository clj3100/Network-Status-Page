<?php
include 'init.php';
include ROOT_DIR . '/assets/php/functions.php';
$image_url = $_GET['img'];
global $plex_instances;
foreach ($plex_instances as $instance) {
    $plex_port = $instance[1];
    $network = getNetwork($instance[3]);


    $plexAddress = $network . ':' . $plex_port;
    $addressPosition = strpos($image_url, $plexAddress);
    if ($addressPosition !== false && $addressPosition == 0) {
        $image_src = $image_url . '?X-Plex-Token=' . $plexToken;
        header('Content-type: image/jpeg');
        //header("Content-Length: " . filesize($image_src));
        readfile($image_src);
    } else {
        echo "Bad Plex Image Url";
    }
}
?>