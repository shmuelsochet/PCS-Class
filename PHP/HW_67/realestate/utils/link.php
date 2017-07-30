<?php

function getLink($replace = []) {
    $link = "index.php?";

    /*$params = $_GET;
    foreach($replace as $key=>$value) {
        $params[$key] = $value;
    }*/

    $params = array_merge($_GET, $replace);

    /*foreach($params as $key=>$value) {
        $link .= urlencode($key) . "=" . urlencode($value);
        $link .= "&";
    }*/

    $link .= http_build_query($params);

    return $link;
}

?>