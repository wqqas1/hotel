<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default settings for charts
    |--------------------------------------------------------------------------
    */

    'default' => [
        'type'          => 'line',
        'library'       => 'google',
        'element_label' => 'Element',
        'title'         => 'My chart',
        'height'        => 400,
        'width'         => 500,
        'responsive'    => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | Assets required by the libraries
    |--------------------------------------------------------------------------
    */

    'assets' => [
        'global' => [
            'scripts' => [
                'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js',
            ],
        ],

        'canvas-gauges' => [
            'scripts' => [
                'https://cdn.rawgit.com/Mikhus/canvas-gauges/gh-pages/download/2.0.9/all/gauge.min.js',
            ],
        ],

        'chartist' => [
            'scripts' => [
                'https://cdnjs.cloudflare.com/ajax/libs/chartist/0.10.1/chartist.min.js',
            ],
            'styles' => [
                'https://cdnjs.cloudflare.com/ajax/libs/chartist/0.10.1/chartist.min.css',
            ],
        ],

        'chartjs' => [
            'scripts' => [
                'https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js',
            ],
        ],

        'fusioncharts' => [
            'scripts' => [
                'https://static.fusioncharts.com/code/latest/fusioncharts.js',
                'https://static.fusioncharts.com/code/latest/themes/fusioncharts.theme.fint.js',
            ],
        ],

        'google' => [
            'scripts' => [
                'https://www.google.com/jsapi',
                'https://www.gstatic.com/charts/loader.js',
                "google.charts.load('current', {'packages':['corechart', 'gauge', 'geochart', 'bar', 'line']})",
            ],
        ],

        'highcharts' => [
            'styles' => [
                'https://cdnjs.cloudflare.com/ajax/libs/highcharts/5.0.4/css/highcharts.css',
            ],
            'scripts' => [
                'https://cdnjs.cloudflare.com/ajax/libs/highcharts/5.0.2/highcharts.js',
                'https://cdnjs.cloudflare.com/ajax/libs/highcharts/5.0.2/js/modules/exporting.js',
                'https://cdnjs.cloudflare.com/ajax/libs/highmaps/5.0.2/js/modules/map.js',
                'https://cdnjs.cloudflare.com/ajax/libs/highmaps/5.0.2/js/modules/data.js',
                'https://code.highcharts.com/mapdata/custom/world.js',
            ],
        ],

        'justgage' => [
            'scripts' => [
                'https://cdnjs.cloudflare.com/ajax/libs/raphael/2.2.6/raphael.min.js',
                'https://cdnjs.cloudflare.com/ajax/libs/justgage/1.2.2/justgage.min.js',
            ],
        ],

        'morris' => [
            'styles' => [
                'https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css',
            ],
            'scripts' => [
                'https://cdnjs.cloudflare.com/ajax/libs/raphael/2.2.6/raphael.min.js',
                'https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js',
            ],
        ],

        'plottablejs' => [
            'scripts' => [
                'https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.5/d3.min.js',
                'https://cdnjs.cloudflare.com/ajax/libs/plottable.js/2.2.0/plottable.min.js',
            ],
            'styles' => [
                'https://cdnjs.cloudflare.com/ajax/libs/plottable.js/2.2.0/plottable.css',
            ],
        ],

        'progressbarjs' => [
            'scripts' => [
                'https://cdnjs.cloudflare.com/ajax/libs/progressbar.js/1.0.1/progressbar.min.js',
            ],
        ],

        'c3' => [
            'scripts' => [
                'https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.5/d3.min.js',
                'https://cdnjs.cloudflare.com/ajax/libs/c3/0.4.11/c3.min.js',
            ],
            'styles' => [
                'https://cdnjs.cloudflare.com/ajax/libs/c3/0.4.11/c3.min.css',
            ],
        ],
    ],
];
