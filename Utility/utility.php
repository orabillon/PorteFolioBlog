<?php
function getUri($url)
{
    $url_components = parse_url($url);
    parse_str($url_components['path'], $params);
    return end(mb_split('/', key($params)));
}