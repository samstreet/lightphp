<?php

namespace LightPHP;

return [
    "routes" => [
        [
            "method" => ["GET"],
            "name" => "index",
            "route" => "/home",
            "callable" => [
                "controller" => "",
                "action" => "index",
                "view" => "index/index"
            ]
        ],
        [
            "method" => ["GET"],
            "name" => "about",
            "route" => "/about",
            "callable" => function(){
                die("about");
            }
        ]
    ],
    "services" => [
        "core_service" => "LightPHP\Services\CoreService"
    ],
    "database" => [
        // any database logic here
    ]
];