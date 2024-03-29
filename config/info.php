<?php

return [
    'full_name' => env('PORTFOLIO_FULL_NAME'),
    'title' => env('PORTFOLIO_TITLE'),
    'email' => env('PORTFOLIO_EMAIL'),
    'image_myself' => env('PORTFOLIO_IMAGE_PATH'),
    'github' => env('PORTFOLIO_GITHUB'),
    'linkedin' => env('PORTFOLIO_LINKEDIN'),
    'instagram' => env('PORTFOLIO_INSTAGRAM'),
    'twitter' => env('PORTFOLIO_TWITTER'),
    'country' => env('PORTFOLIO_COUNTRY'),
    'details' => [
        'who_am_i' => [
            'description' => env('PORTFOLIO_WHO_AM_I_DESCRIPTION'),
            'resume_link' => env('PORTFOLIO_WHO_AM_I_RESUME_LINK'),
        ],
    ]
];
