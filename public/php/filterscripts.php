<?php

function filterbycategory(&$products, $category) {
    $exclude = [];
    if ($category == 'all') {
        return;
    }
    for($i=0;$i<count($products);$i++) {
        if (strcasecmp($products[$i]['category'], $category) != 0) {
            $exclude[] = $i;
        }
    }
    foreach ($exclude as $i) {
        unset($products[$i]);
    }
    $products = array_values($products); 
}

function filterbytype(&$products, $type) {
    $exclude = [];
    
    for($i=0;$i<count($products);$i++) {
        
        if (!in_array($products[$i]['type'], $type)) {
            $exclude[] = $i;
        }
        
    }
    foreach ($exclude as $i) {
        unset($products[$i]);
    }
    $products = array_values($products); 
}

function filterbycolor(&$products, $color) {
    $exclude = [];
    for($i=0;$i<count($products);$i++) {
        if (!in_array($products[$i]['color'], $color)) {
            $exclude[] = $i;
        }
    }
    foreach ($exclude as $i) {
        unset($products[$i]);
    }
    $products = array_values($products);
}

function filterbysize(&$products, $size) {
    $exclude = [];
    for($i=0;$i<count($products);$i++) {
        if (!in_array($products[$i]['size'], $size)) {
            $exclude[] = $i;
        }
    }
    foreach ($exclude as $i) {
        unset($products[$i]);
    }
    $products = array_values($products);
}

function filterbysearch(&$products, $searchstr) {
    $exclude = [];
    for($i=0;$i<count($products);$i++) {
        if (!str_contains(strtolower($products[$i]['name']), strtolower($searchstr))) {
            $exclude[] = $i;
        }
    }
    foreach ($exclude as $i) {
        unset($products[$i]);
    }
    $products = array_values($products);
}