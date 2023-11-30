<?php

return [
    'metunic' => [
        'name' => 'METUnic',
        'description' => "<p>I was part of the team that developed the metunic.com.tr website during my time at Metunic company.
                    The main objective of this project was to sell domain names such as \"com\", \"net\", \"org\" to users (similar to GoDaddy).
                    The tasks performed in this project include:</p>\n
                    <p>1. Providing basic functions such as acquiring, using, and renewing a user\'s domain name</p>\n
                    <p>2.Integrating order forms and payment systems</p>\n
                    <p>3. Adding new domain name extensions</p>\n
                    <p>4. Allowing users to manage their DNS settings</p>\n
                    <p>5. Making improvements to the database</p>\n
                    <p>6. Developing front-end designs</p>",
        'status' => 'active',
        'icon' => 'fa-solid fa-sitemap',
        'production_date' => '2020-02-15',
        'order' => 1,
        'links' => [
            'https://app.metunic.com.tr/order/config/preconfig/domain'
        ],
        'images' => [
            public_path('images/projects/metunic-order-form.gif'),
            public_path('images/projects/metunic-manage.png'),
        ],
        'tags' => ['php', 'laravel', 'mysql', 'javascript', 'docker', 'gitlab', 'linux']
    ],
    'trabis' => [
        'name' => 'Trabis.gov.tr',
        'description' => '<p>The trabis.gov.tr project is a Laravel-based website for sharing news, statistics
                    and information about ".tr" domain names belonging to the Turkish government.
                    I worked on this project as a full-stack developer. During my time working on the project, I designed various components from scratch such as:</p>
                    <p>1. the <a class="inline-flex items-center font-medium text-blue-600 dark:text-blue-500 hover:underline"
                    href="https://www.trabis.gov.tr/detay" target="_blank">statistics page</a> (using chart.js)</p>
                    <p>2. sliders</p>
                    <p>3. news boxes</p>
                    <p>4.&nbsp;<a class="inline-flex items-center font-medium text-blue-600 dark:text-blue-500 hover:underline"
                    href="https://www.trabis.gov.tr/whois" target="_blank">whois query feature</a></p>
                    <p>5. the mega menu</p>
                    <p>6. Additionally, I developed the admin panel and handled the backend tasks on my own.</p>',
        'status' => 'active',
        'icon' => 'fa-solid fa-sitemap',
        'production_date' => '2022-01-01',
        'order' => 10,
        'links' => [
            'https://trabis.gov.tr/'
        ],
        'images' => [
            public_path('images/projects/trabis_gov_tr_1.gif'),
            public_path('images/projects/trabis_gov_tr_2.gif'),
            public_path('images/projects/trabis_gov_tr_3.gif'),
        ],
        'tags' => [
            'php',
            'laravel',
            'chart.js',
            'mysql',
            'css',
            'soap',
        ]
    ],
    'tictactoe' => [
        'name' => 'TicTacToe Game',
        'description' => '<p>This is a simple <b>TicTacToe</b> game built using React</p>
                    <p>The task project given by <b>Nic.tr</b> company during my interview with them at 2020.</p>',
        'status' => 'active',
        'icon' => 'fa-solid fa-gamepad',
        'production_date' => '2020-02-15',
        'order' => 15,
        'links' => [
            'https://game.aliozendev.com',
            'https://github.com/aozen/tic-tac-toe'
        ],
        'images' => [
            public_path('images/projects/xox_1.gif'),
            public_path('images/projects/xox_2.png'),
        ],
        'tags' => [
            'react', 'javascript', 'css'
        ]
    ],
    'language-detector' => [
        'name' => 'Language Detector',
        'description' => '<p>Language Detector is a composer package.
                    <br/><br/> This package provides a set of functions to detect and manipulate language-specific strings,
                    including language detection, case conversion and language-based filtering.</p>',
        'status' => 'active',
        'icon' => 'fa-solid fa-language',
        'production_date' => '2022-01-01',
        'order' => 20,
        'links' => [
            'https://packagist.org/packages/aozen/language-detector',
            'https://github.com/aozen/language-detector',
        ],
        'images' => [
            public_path('images/projects/language_detector.gif'),
            public_path('images/projects/language_detector_1.png'),
        ],
        'tags' => [
            'php', 'composer', 'package'
        ]
    ],
    'covid19' => [
        'name' => 'Covid 19 Statistics',
        'description' => '<p>Charts that show the current number of confirmed <span style="font-weight: bold;">coronavirus</span> cases, deaths, and recoveries in Turkey.
                    Fetching data from an <span style="font-weight: bold;">API</span>, parsing it with <span style="font-weight: bold;">jquery</span>
                    and then displaying it on the frontend using <span style="font-weight: bold;">chart.js</span>.</p>
                    <p>Note: api service stopped at middle of the 2021. I have a backup at May 2020. This website running on it.</p>',
        'status' => 'active',
        'icon' => 'fa-solid fa-virus-covid',
        'production_date' => '2020-04-21',
        'order' => 25,
        'links' => [
            'https://covid19.aliozendev.com/',
            'https://github.com/aozen/covid-19',

        ],
        'images' => [
            public_path('images/projects/covid19.gif'),
        ],
        'tags' => [
            'javascript', 'chart.js', 'api', 'jquery', 'css'
        ]
    ],
    'pentayazilim' => [
        'name' => 'Penta Software',
        'description' => '<p>Pentayazilim was the first company I worked for and I took part in the development of the company`s website, pentayazilim.com.
                    I contributed to the development of many front-end elements such as the proposal form, slider, divs displaying statistics, image galleries etc.</p>',
        'status' => 'active',
        'icon' => 'fa-solid fa-sitemap',
        'production_date' => '2018-01-01',
        'order' => 65,
        'links' => [
            'https://www.pentayazilim.com/'
        ],
        'images' => [

        ],
        'tags' => [
            'php', 'laravel', 'javascript', 'css'
        ]
    ],
    'portfolio' => [
        'name' => 'Personal Portfolio (This Website)',
        'description' => 'Here is my portfolio website! I developed it using php8.2 and laravel10.
                    I used tailwind for the CSS and vite as the build tool.
                    It is deployed on AWS servers (AWS Lightsail) and the database is also hosted on AWS servers.
                    <p>Enjoy - Made with&nbsp;🧡</p>',
        'status' => 'active',
        'icon' => 'fa-solid fa-heart',
        'production_date' => '2023-04-15',
        'order' => 30,
        'links' => [
            'https://github.com/aozen/portfolio',
        ],
        'images' => [

        ],
        'tags' => [
            'php', 'laravel', 'javascript', 'tailwind', 'mysql', 'vite'
        ]
    ],
    'astar' => [
        'name' => 'A* Algorithm',
        'description' => '<p>This project is an example of the A* algorithm designed and visualized with PHP.
                    The A* algorithm is widely used by robot vacuums and is considered one of the best methods available.</p>
                    <p>There are a total of eight houses represented by circles in the images below.
                    Each house is labeled with a number, which is written in green next to the house.
                    There are a certain number of connecting roads between the houses, and the length of each road is indicated by a blue number.
                    The shortest route is marked in red.</p>
                    <p>The program`s goal is to find the shortest path from point X to point Y.
                    In the example below, when the generate_map.php file is executed, a random number of houses are generated,
                    as well as randomly generated road lengths, house positions, and connecting roads.
                    The A* algorithm is then used to calculate the shortest connection between the houses.
                    Then it generates an image of the map.</p>',
        'status' => 'active',
        'icon' => 'fa-solid fa-robot',
        'production_date' => '2023-02-19',
        'order' => 35,
        'links' => [
            'https://github.com/aozen/astar',
            'https://packagist.org/packages/aozen/astar',
        ],
        'images' => [
            public_path('images/projects/astar_1.png'),
            public_path('images/projects/astar_2.png'),
            public_path('images/projects/astar_3.png'),
        ],
        'tags' => [
            'php', 'image', 'algorithm', 'composer', 'package'
        ]
    ],
    'words2number' => [
        'name' => 'Words To Number',
        'description' => '<p>In number_convert.php, NumberConvert class can convert given textual written number to digits.
                    For example the result of One hundred twenty four thousand three hundred and fifty is 124350</p>
                    <p>Note: This project was created for a challenge and fun. I hope that one day someone will find a suitable application for this project :)</p>',
        'status' => 'active',
        'icon' => 'fa-solid fa-language',
        'production_date' => '2022-01-23',
        'order' => 40,
        'links' => [
            'https://github.com/aozen/words2number'
        ],
        'images' => [
            public_path('images/projects/words_to_number.png')
        ],
        'tags' => [
            'php', 'algorithm'
        ]
    ],
    'turkish-datetime' => [
        'name' => 'Turkish DateTime',
        'description' => '<p>This package provides a datetime field with Turkish words. It was built with Vue.js and made for Laravel Nova. (deprecated)</p>',
        'status' => 'active',
        'icon' => 'fa-solid fa-calendar',
        'production_date' => '2019-01-10',
        'order' => 45,
        'links' => [
            'https://github.com/aozen/turkish-date-time',
            'https://packagist.org/packages/aozen/turkish-date-time',
            'https://github.com/aozen/turkish-date',
            'https://packagist.org/packages/aozen/turkish-date',
        ],
        'images' => [
            public_path('images/projects/turkish_date.png'),
            public_path('images/projects/turkish_datetime.png'),
        ],
        'tags' => [
            'php', 'vue.js', 'nova', 'composer', 'package'
        ]
    ],
    'flipflop' => [
        'name' => 'FlipFlop Game',
        'description' => '<p>FlipFlop is a simple card flipping game where you flip over one of the face-down cards and
                    try to find the matching one among the remaining face-down cards. If you can`t find a match, the cards that you flipped over will be turned back down.
                    You continue this process until you flip over all the cards.</p>
                    <p>I created this game as a surprise for my beloved wife on a special day.
                    We played the game using the pictures we took together. The original version was even more meaningful :)&nbsp;</p>
                    <p>The game was built with vanilla JavaScript and used CSS rotate and transform animations.<br/></p>',
        'status' => 'active',
        'icon' => 'fa-solid fa-gamepad',
        'production_date' => '2022-03-13',
        'order' => 50,
        'links' => [
            'https://aozen.github.io/flip-flop',
            'https://github.com/aozen/flip-flop',
            'https://flipflop.aliozendev.com/',
        ],
        'images' => [
            public_path('images/projects/flipflop.gif')
        ],
        'tags' => [
            'javascript', 'css', 'dwight schrute'
        ]
    ],
    'depremyardim' => [
        'name' => 'Deprem Yardim',
        'description' => '<p>depremyardim.com is currently closed, and we hope that we never have to open it again.</p>
                    <p>On February 6th, at 4:17 am, a 7.7 magnitude earthquake struck, and before the pain of this disaster could fade away,
                    another earthquake with a magnitude of 7.6 occurred at 1:24 pm on the same day.
                    Unfortunately, tens of thousands of people were trapped under the rubble, and tens of thousands of people lost their lives.</p>
                    <p>Due to people trying every possible way to reach their loved ones trapped under the rubble or to find out their well-being,
                    we felt the need to create this website. Authorities could also anticipate where there could be problems by looking at the data collected by the website.
                    We hope that we have been able to help at least one person on this terrible day. We wish that no country ever has to experience this again.</p>
                    <p>During the earthquake, various projects were developed on GitHub under an open source organization named
                    <a class="inline-flex items-center font-medium text-blue-600 dark:text-blue-500 hover:underline"
                    href="https://github.com/acikkaynak" target="_blank">acikkaynak</a>.
                    All of them were based on voluntary work. As for depremyardim.com,
                    it was developed by myself and my colleagues at the first company I worked for
                    (<a class="inline-flex items-center font-medium text-blue-600 dark:text-blue-500 hover:underline" href="https://www.pentayazilim.com/">Penta Yazılım</a>).
                    I am grateful to all of them for their contributions to this project.<br/></p>',
        'status' => 'active',
        'icon' => 'fa-solid fa-heart-crack',
        'production_date' => '2022-02-10',
        'order' => 55,
        'links' => [
            'https://depremyardim.com/',
            'https://github.com/acikkaynak/deprem-yardim-com',
        ],
        'images' => [
            public_path('images/projects/deprem_yardim_1.png'),
            public_path('images/projects/deprem_yardim_2.png'),
        ],
        'tags' => [
            'laravel', 'mysql'
        ]
    ],
    'chessboard' => [
        'name' => 'Chess Board',
        'description' => '<p>A chessboard made with JavaScript and CSS where the pieces don`t move and chess can`t be played. Just for fun. Because I love chess :) </p>',
        'status' => 'active',
        'icon' => 'fa-solid fa-gamepad',
        'production_date' => '2021-06-14',
        'order' => 60,
        'links' => [
            'https://chessboard.aliozendev.com/',
            'https://github.com/aozen/chess-board',
            'https://aozen.github.io/chess-board',
        ],
        'images' => [
            public_path('images/projects/chess_board.png')
        ],
        'tags' => [
            'javascript', 'css', 'jquery'
        ]
    ],
    'womensbest' => [
        'name' => 'WomensBest',
        'description' => '<p>Worked for ecommerce website`s admin panel as a backend developer.</p>
                    <p>Added some new features to the project</p>
                    <p>Worked with Shopify, used GraphQL most of the time. Sometimes Restful was used when needed</p>
                    <p>Added unittests</p>',
        'status' => 'active',
        'icon' => 'fa-solid fa-face-meh',
        'production_date' => '2023-06-01',
        'order' => 65,
        'links' => [
            'https://www.womensbest.com/'
        ],
        'images' => [

        ],
        'tags' => [
            'php', 'laravel', 'shopify', 'graphql', 'restful', 'pest', 'unittest'
        ]
    ],
    'all-websites' => [
        'name' => 'Other Projects',
        'description' => '<p>Below are the websites and images that I have worked on or was
                    involved in a significant part of the projects during my previous employments.
                    They were mainly developed using php/laravel and I personally set up the admin panels for almost all of them.
                    I also took on important roles in the front-end development of many of these websites.
                    I deployed these websites on a Linux Debian infrastructure.</p>
                    <hr><p>During my first employment at Penta Yazılım, I created the following websites:</p>
                    <a class="inline-flex items-center font-medium text-blue-600 dark:text-blue-500 hover:underline"
                    href="https://bacas.com.tr/" target="_blank">https://bacas.com.tr/</a><br>
                    <a class="inline-flex items-center font-medium text-blue-600 dark:text-blue-500 hover:underline"
                    href="https://cakirprefabrik.com/" target="_blank">https://cakirprefabrik.com/</a><br>
                    <a class="inline-flex items-center font-medium text-blue-600 dark:text-blue-500 hover:underline"
                    href="https://spdmuhendislik.com/" target="_blank">https://spdmuhendislik.com/</a><br>
                    <a class="inline-flex items-center font-medium text-blue-600 dark:text-blue-500 hover:underline"
                    href="https://rosensea.com/" target="_blank">https://rosensea.com/</a><br>
                    <a class="inline-flex items-center font-medium text-blue-600 dark:text-blue-500 hover:underline"
                    href="https://sistemyedekparca.com/" target="_blank">https://sistemyedekparca.com/</a><br>
                    <p>For each of these websites, I developed an admin panel and took on significant responsibilities in the front-end development.</p>
                    <hr><p>During my second employment, I was actively involved in the following two websites:</p>
                    <a class="inline-flex items-center font-medium text-blue-600 dark:text-blue-500 hover:underline"
                    href="https://www.gulangrup.com/" target="_blank">https://www.gulangrup.com/</a><br>
                    <a class="inline-flex items-center font-medium text-blue-600 dark:text-blue-500 hover:underline"
                    href="https://www.aracbul.com/" target="_blank">https://www.aracbul.com/</a>
                    <p>Both websites were focused on searching and filtering second-hand cars.
                    I spent time actively working on database operations, and we created microservices with Laravel.</p>
                    <a class="inline-flex items-center font-medium text-blue-600 dark:text-blue-500 hover:underline"
                    href="https://qiblalastik.com/" target="_blank">https://qiblalastik.com/</a>
                    <p>Additionally, I prepared a total of 6 websites similar to this one.
                    Similar to what I did at Penta Yazılım, I developed an admin panel for all of them.
                    I converted the HTML files provided to me for the front-end into Laravel Blade format, connected the variables, and made some API calls with JavaScript.
                    Other websites are not publicly available right now.</p>
                    <hr><p>At my last employment, I worked on the backend of &nbsp</p>
                    <a class="inline-flex items-center font-medium text-blue-600 dark:text-blue-500 hover:underline"
                    href="https://nic.tr/" target="_blank">https://nic.tr/</a> <p>It is not a system with a front-end. It is connected to &nbsp</p>
                    <a class="inline-flex items-center font-medium text-blue-600 dark:text-blue-500 hover:underline"
                    href="https://trabis.gov.tr" target="_blank">https://trabis.gov.tr</a> <p>and</p>
                    <a class="inline-flex items-center font-medium text-blue-600 dark:text-blue-500 hover:underline"
                    href="https://kk.trabis.gov.tr" target="_blank">https://kk.trabis.gov.tr</a>
                    <p>websites, and the backend feeds these services. I also worked on making these two websites operational.
                    We did not use any frameworks, only PHP.
                    I also had to write Python and Java code for a few specific cases.</p>
',
        'status' => 'active',
        'icon' => 'fa-solid fa-sitemap',
        'production_date' => '2020-01-01',
        'order' => 1000,
        'links' => [

        ],
        'images' => [
            public_path('images/projects/turkey_map.gif'),
            public_path('images/projects/arac_bul.gif'),
            public_path('images/projects/bacas.gif'),
            public_path('images/projects/cakir_prefabrik.gif'),
        ],
        'tags' => [
            'php', 'laravel', 'laravel-nova', 'mysql', 'html', 'css', 'javascript', 'vue.js', 'python', 'jquery', 'tailwind'
        ]
    ],
];
