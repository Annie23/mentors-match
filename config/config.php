<?php


return [

    'CsvInterface' => function (\DI\Container $c) {
        return new \Src\Classes\Csv();
    },

    'MentorsMatchInterface' => function (\DI\Container $c) {
        return new \Src\Classes\MentorsMatch();
    },

 ];
