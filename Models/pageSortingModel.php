<?php
    function isPage(string $uri, string $requested_uri): bool {
        $uri_components = parse_url($uri);
        $path = $uri_components['path'];

        if (str_ends_with($path, $requested_uri)) {
            return true;
        }
        return false;
    }

    function get_query_components(string $uri): array {
        $uri_components = parse_url($uri);
        if (!isset($uri_components['query'])) {
            return [];
        }
        parse_str($uri_components['query'], $components);
        return $components;
    } 