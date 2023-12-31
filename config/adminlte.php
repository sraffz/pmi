<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | The default title of your admin panel, this goes into the title tag
    | of your page. You can override it per page with the title section.
    | You can optionally also specify a title prefix and/or postfix.
    |
    */

    'title' => 'e-PMI',

    'title_prefix' => '',

    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | This logo is displayed at the upper left corner of your admin panel.
    | You can use basic HTML here if you want. The logo has also a mini
    | variant, used for the mini side bar. Make it 3 letters or so
    |
    */

    'logo' => '<b>e-PMI</b>',

    'logo_mini' => '<b>E</b>',

    /*
    |--------------------------------------------------------------------------
    | Skin Color
    |--------------------------------------------------------------------------
    |
    | Choose a skin color for your admin panel. The available skin colors:
    | blue, black, purple, yellow, red, and green. Each skin also has a
    | light variant: blue-light, purple-light, purple-light, etc.
    |
    */

    'skin' => 'purple',

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Choose a layout for your admin panel. The available layout options:
    | null, 'boxed', 'fixed', 'top-nav'. null is the default, top-nav
    | removes the sidebar and places your menu in the top navbar
    |
    */

    'layout' => null,

    /*
    |--------------------------------------------------------------------------
    | Collapse Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we choose and option to be able to start with a collapsed side
    | bar. To adjust your sidebar layout simply set this  either true
    | this is compatible with layouts except top-nav layout option
    |
    */

    'collapse_sidebar' => false,

    /*
    |--------------------------------------------------------------------------
    | Control Sidebar (Right Sidebar)
    |--------------------------------------------------------------------------
    |
    | Here we have the option to enable a right sidebar.
    | When active, you can use @section('right-sidebar')
    | The icon you configured will be displayed at the end of the top menu,
    | and will show/hide de sidebar.
    | The slide option will slide the sidebar over the content, while false
    | will push the content, and have no animation.
    | You can also choose the sidebar theme (dark or light).
    | The right Sidebar can only be used if layout is not top-nav.
    |
    */

    'right_sidebar' => false,
    'right_sidebar_icon' => 'fas fa-cogs',
    'right_sidebar_theme' => 'dark',
    'right_sidebar_slide' => true,

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Register here your dashboard, logout, login and register URLs. The
    | logout URL automatically sends a POST request in Laravel 5.3 or higher.
    | You can set the request to a GET or POST with logout_method.
    | Set register_url to null if you don't want a register link.
    |
    */

    'dashboard_url' => 'halaman-utama',

    'logout_url' => 'logout',

    'logout_method' => null,

    'login_url' => 'login',

    'register_url' => 'register',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Specify your menu items to display in the left sidebar. Each menu item
    | should have a text and a URL. You can also specify an icon from Font
    | Awesome. A string instead of an array represents a header in sidebar
    | layout. The 'can' is a filter on Laravel's built in Gate functionality.
    */

    'menu' => [
        
        [
            'text' => 'main_navigation',
            'route'  => 'home',
            'icon' => 'fas fa-fw fa-home',
        ],

        [
            'text' => 'Individu',
            'icon' => 'fas fa-fw fa-user',
            'role' => ['individu'],
            'submenu' => [
                [
                    'text'      => 'Senarai Permohonan',
                    'route'       => 'senarai.permohonan.individu',
                    'icon'      => '',
                    'role'      => ['individu'],
                ],
                [
                    'text'      => 'Senarai Penyertaan',
                    'route'       => 'senarai.penyertaan.individu',
                    'icon'      => '',
                    'role'      => ['individu'],
                ]
                     
            ]
        ],

        [
            'text' => 'Rekod Program',
            'icon' => 'fas fa-fw fa-tags',
            'role' => ['superadmin','urusetia','pengurusan'],
            'submenu' => [

                [
                    'text' => 'Pengurusan Program',
                    'route'=> 'program.index',
                    'role' => ['superadmin','urusetia','pengurusan'],
                    'icon' => '',
                    
                ],

                [
                    'text' => 'Status Program',
                    'route'=> 'pengurusan_program',
                    'role' => ['superadmin','urusetia','pengurusan'],
                    'icon' => '',
                ],
                
                [
                    'text'  => 'Senarai Program Dibuka',
                    'route' => 'senarai.program.aktif',
                    'role' => ['superadmin','urusetia','pengurusan'],
                    'icon'  => ''
                ],

                
            
            ]
        ],
        

        // [
        //     'text' => 'Kumpulan',
        //     'icon' => 'fas fa-fw fa-users',
        //     'role' => ['individu'],
        //     'submenu' => [
        //         [
        //             'text'      => 'Incoming Works',
        //             'url'       => '',
        //             'icon'      => '',
        //             'role'      => ['individu'],
        //         ],
                
                     
        //     ]
        // ],

        [
            'text'  => 'Rekod Peserta',
            'role'  => ['superadmin','urusetia','pengurusan'],
            'icon'  => 'fas fa-fw fa-users',
            'submenu' => [
                [
                    'text' => 'Senarai Peserta',
                    'route'=> 'program.senarai-peserta',
                    'role' => ['superadmin','urusetia','pengurusan'],
                    'icon' => '',
                ],
                [
                    'text' => 'Permohonan Peserta',
                    'route'=> 'program.permohonan-peserta',
                    'role' => ['superadmin','urusetia','pengurusan'],
                    'icon' => '',
                ],
                [
                    'text'  => 'Kehadiran Peserta',
                    'route' => 'program.kehadiran-peserta',
                    'role' => ['superadmin','urusetia','pengurusan'],
                    'icon'  => ''
                ],
            ]
        ],

        [
           
            
            'text' => 'Rekod Kaji Selidik',
            'route'  => 'kaji-selidik.index',
            'icon' => 'fas fa-fw fa-chart-bar',
            'role' => ['superadmin','urusetia'],
        ],

        [
            'text' => 'Rekod Tempat Program',
            'route'=> 'tempat_program.index',
            'role' => ['superadmin','urusetia','pengurusan'],
            'icon' => 'fas fa-fw fa-edit',
        ],
       
        [
            'text' => 'Rekod jenis Program',
            'route'=> 'jenis_program.index',
            'role' => ['superadmin','urusetia','pengurusan'],
            'icon' => 'fas fa-fw fa-edit',
        ],
        
        [
            'text' => 'Rekod Penceramah',
            'url'  => 'senarai-penceramah',
            'icon' => 'fas fa-fw fa-folder-open',
            'role' =>['superadmin','urusetia'],
        ],

        [
            'text' => 'Rekod Makluman',
            'route'  => 'makluman.index',
            'icon' => 'fas fa-fw fa-bullhorn',
            'role' =>['superadmin','urusetia'],
        ],

        [
            'text' => 'Rekod Pengguna',
            'route'=> 'senarai.pengguna',
            'icon' => 'fas fa-fw fa-users',
            'role' => ['superadmin','urusetia','pengurusan'],
        ],

        // [
        //     'text' => 'Senarai Belanjawan',
        //     'route'  => 'belanjawan.index',
        //     'role' => ['superadmin','urusetia','pengurusan'],
        //     'icon' => 'fas fa-fw fa-folder-open',
        // ],


        ['header' => 'account_settings'],
        [
            'text' => 'profile',
            'route' => 'profile.index',
            'icon' => 'fas fa-fw fa-user',
        ],
        [
            'text' => 'change_password',
            'route'  => 'reset_password.index',
            'icon' => 'fas fa-fw fa-lock',
        ],

        // [
        //     'text' => 'Jejak Audit',
        //     'route'=> 'audit.index',
        //     'icon' => 'fas fa-fw fa-folder-open',
        //     'role' =>['superadmin'],
        // ],
       
    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Choose what filters you want to include for rendering the menu.
    | You can add your own filters to this array after you've created them.
    | You can comment out the GateFilter if you don't want to use Laravel's
    | built in Gate functionality
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        // JeroenNoten\LaravelAdminLte\Menu\Filters\SubmenuFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        // JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
        App\MenuFilters\LaratrustMenuFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\LangFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Configure which JavaScript plugins should be included. At this moment,
    | DataTables, Select2, Chartjs and SweetAlert are added out-of-the-box,
    | including the Javascript and CSS files from a CDN via script and link tag.
    | Plugin Name, active status and files array (even empty) are required.
    | Files, when added, need to have type (js or css), asset (true or false) and location (string).
    | When asset is set to true, the location will be output using asset() function.
    |
    */

    'plugins' => [
        [
            'name'   => 'Datatables',
            'active' => true,
            'files'  => [
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => '/vendor/datatables/datatables.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => '/vendor/datatables/datatables.min.css',
                ],
            ],
        ],
        [
            'name'   => 'Select2',
            'active' => true,
            'files'  => [
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css',
                ],
            ],
        ],
        [
            'name'   => 'Chartjs',
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => 'https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js',
                ],
            ],
        ],
        [
            'name'   => 'Sweetalert2',
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => '/vendor/sweatalert2/sweatalert2.all.min.js',
                ],
            ],
        ],
        [
            'name'   => 'Pace',
            'active' => true,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => '/vendor/pace/themes/blue/pace-theme-minimal.css',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => '/vendor/pace/pace.min.js',
                ],
            ],
        ],
    ],

    
];
