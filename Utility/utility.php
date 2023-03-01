<?php
function getUri($url)
{
    $url_components = parse_url($url);
    parse_str($url_components['path'], $params);
    return end(mb_split('/', key($params)));
}

function getUriParam($url)
{
    $url_components = parse_url($url);
    parse_str($url_components['query'], $params);
    return $params;
}
