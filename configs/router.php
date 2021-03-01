<?php

return [
    "" => [
        "GET" => [
            "controller" => "\\controllers\\HomeController",
            "action" => "home",
            "params" => "",
        ],
    ],
    "section" => [
        "GET" => [
            "controller" => "\\controllers\\HomeController",
            "action" => "section",
            "params" => "",
        ],
    ],
    "register" => [
        "GET" => [
            "controller" => "\\controllers\\HomeController",
            "action" => "register",
            "params" => "",
        ],
    ],
    "administrator" => [
        "GET" => [
            "controller" => "\\controllers\\HomeController",
            "action" => "administrator",
            "params" => "",
        ],
    ],
    "age/(.*)/name/(.*)" => [
        "GET" => [
            "controller" => "\\controllers\\HomeController",
            "action" => "sum",
            "params" => "$1/$2",
        ],
    ],
    "/age/(.*)/name/(.*)" => [
        "GET" => [
            "controller" => "\\controllers\\HomeController",
            "action" => "sum",
            "params" => "$1/$2",
        ],
    ],
];