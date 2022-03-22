<?php

return [

    /*
     * Application title to display in <title> tag
     */
    'title' => 'Voetbal Camera installatie',

    /*
     * Text to put in the top-left of the menu bar. logo_mini is shown when the navbar is collapsed.
     * NOTE: This is a non-escaped string, so you can put HTML in here
     */
    'logo' => 'Bedrijfs LOGO',
    'logo_mini' => 'logo_mini',

    /*
     * Menu builder
     */
    'menu' => [
         [
            'permission' => 'see influencer',
            'text' => 'Dashboard',
            'url'  => '/home',
            'icon' => 'a-solid fa-home',
            // 'submenu' => [
            //      [
            //         'text' => 'Alle influencers',
            //         'icon' => 'calendar-alt far',
            //         'url'  => '/influencers',    
            //     ]
            // ]
         ],
         [
            'text' => 'Match Recording',
            'url'  => '/Recording',
            //'icon' => 'users-cog fas',
            'submenu' => [
                [
                    'text' => 'Schedule',
                    'icon' => 'fa-solid fa-clock',
                    'url'  => '/schedule',    
                ],
            ]
         ],
         [
            'text' => 'Hardware',
            'url'  => '/Hardware',
            //'icon' => 'fa-solid fa-server',
            'submenu' => [
                [
                    'text' => 'Cameras',
                    'icon' => 'fa-solid fa-camera',
                    'url'  => '/cameras',    
                ],
                                [
                    'text' => 'Servers',
                    'icon' => 'fa-solid fa-server',
                    'url'  => '/servers',    
                ],
            ]
         ],
         [
            'text' => 'Customers',
            'url'  => '/Customers',
           // 'icon' => 'users fas',
            'submenu' => [
                [
                    'text' => 'Customers',
                    'icon' => 'users fas',
                    'url'  => '#',    
                ],
            ]
         ]

//        [
//            'text' => 'Dashboard',          // The text to be displayed inside the menu.
//            'url' => 'admin/dashboard',     // The URL behind the text. Mutually exclusive with "route" option.
//            'icon' => 'chart-bar far',      // Name of FontAwesome icon to display. Note that you have to use the "far", "fas" or "fal" modifier behind the icon.
//            'target' => '_blank'            // Target attribute of <a> tag.
//        ],
//        'First section',                    // Section header
//        [
//            'text' => 'Users',
//            'route' => 'admin.users',       // The route behind the text. Mutually exclusive with "url" option.
//            'icon' => 'users fas'
//        ],
//        'Admin only',
//        [
//            'can' => 'edit-settings',       // Use Laravel's Gate functionality via the 'can' keyword to show menu items to specific user (roles)
//            'text' => 'Settings',
//            'icon' => 'cog',
//            'submenu' => [
//                [
//                    'text' => 'Level one',
//                    'icon' => 'bell',       // Tip: always set icons. Submenus in particular tend to get misaligned plus it's more accessible and user friendly.
//                    'url' => 'admin/settings/level-one'
//                ],
//                [
//                    'text' => 'Level two',
//                    'icon' => 'clock',
//                    'submenu' => [
//                        [
//                            'text' => 'Add as many as you like',
//                            'url' => '#'
//                        ]
//                    ]
//                ]
//            ]
//        ]
    ],

    /**
     * Filters that parse above menu configuration and add some sparkling things, like .active classes on active
     * menu items and parsing routes and URLs into the correct href attributes.
     */
    'filters' => [
        HzHboIct\LaravelCoreUI\Menu\Filters\HrefFilter::class,
        HzHboIct\LaravelCoreUI\Menu\Filters\ActiveFilter::class,
        HzHboIct\LaravelCoreUI\Menu\Filters\SubmenuFilter::class,
        HzHboIct\LaravelCoreUI\Menu\Filters\ClassesFilter::class,
    ],
];
