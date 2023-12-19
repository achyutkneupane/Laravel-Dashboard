<?php


$stages = [];

return [
    /**
     * Your product has logo or not
     */
    'hasLogo' => false,

    /**
     * Title on the sidebar top
     */
    'title' => env('APP_NAME', 'Dashboard'),

    /**
     * Logo on the sidebar top
     */
    'logo' => asset('image/logo.svg'),

    /**
     * Show logo or title
     * options => 'logo' or 'title'
     */
    'showLogoTitle' => 'title',

    /**
     * Background for the sidebar
     * options => 'image' or 'color'
     */
    'background' => 'color',

    /**
     * background color for the sidebar
     * options => HEX color
     */
    'background-color' => '#000000',

    /**
     * background image for the sidebar
     */
    'background-image' => asset('image/bg.svg'),

    /**
     * UI Framework for the sidebar
     * options => 'bootstrap' or 'tailwind'
     */
    'theme' => 'bootstrap',

    /**
     * Text color for the sidebar
     * options => HEX color
     */
    'text-color' => '#ffffff',

    /**
     * Rows of the sidebar
     *
     * 'sidebar' is the parent for the return array where children are:
     * - 'title' => Title of the row
     * - 'icon' => Icon of the row. Use SVG path only
     * - 'route' => Route Name of the row.
     * - 'submenu' => Submenu of the row. The row with submenu should
     *                not have a route.
     * - 'submenu.*.title' => Title of the submenu
     * - 'submenu.*.icon' => Icon of the submenu. Use SVG path only
     * - 'submenu.*.route' => Route Name of the submenu
     * - 'noMenuRoutes' => Routes that should not be shown in the
     *                     sidebar but being on the page will make
     *                     the row highlighted
     *
     */
    'sidebar' => [
        [
            'title' => 'Link1',
            'route' => 'link1',
            'icon' => "M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z",
        ], [
            'title' => 'Parent Link',
            'icon' => "M272 384c9.6-31.9 29.5-59.1 49.2-86.2l0 0c5.2-7.1 10.4-14.2 15.4-21.4c19.8-28.5 31.4-63 31.4-100.3C368 78.8 289.2 0 192 0S16 78.8 16 176c0 37.3 11.6 71.9 31.4 100.3c5 7.2 10.2 14.3 15.4 21.4l0 0c19.8 27.1 39.7 54.4 49.2 86.2H272zM192 512c44.2 0 80-35.8 80-80V416H112v16c0 44.2 35.8 80 80 80zM112 176c0 8.8-7.2 16-16 16s-16-7.2-16-16c0-61.9 50.1-112 112-112c8.8 0 16 7.2 16 16s-7.2 16-16 16c-44.2 0-80 35.8-80 80z",
            'submenu' => [
                [
                    'title' => 'Sub link1',
                    'route' => 'parent.sub1',
                    'icon' => "M40 48C26.7 48 16 58.7 16 72v48c0 13.3 10.7 24 24 24H88c13.3 0 24-10.7 24-24V72c0-13.3-10.7-24-24-24H40zM192 64c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zM16 232v48c0 13.3 10.7 24 24 24H88c13.3 0 24-10.7 24-24V232c0-13.3-10.7-24-24-24H40c-13.3 0-24 10.7-24 24zM40 368c-13.3 0-24 10.7-24 24v48c0 13.3 10.7 24 24 24H88c13.3 0 24-10.7 24-24V392c0-13.3-10.7-24-24-24H40z",
                ], [
                    'title' => 'Sub link2',
                    'route' => 'parent.sub2',
                    'icon' => "M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z",
                ]
            ],
            'noMenuRoutes' => [
                'parent.sub3',
            ],
        ]
    ]
];
