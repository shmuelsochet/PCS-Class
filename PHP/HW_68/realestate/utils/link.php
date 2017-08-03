<?php

function getLink($replace = []) {
    $link = "index.php?";

    $params = array_merge($_GET, $replace);

    $link .= http_build_query($params);

    return $link;
}

?>