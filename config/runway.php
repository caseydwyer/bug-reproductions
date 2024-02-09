<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Resources
    |--------------------------------------------------------------------------
    |
    | Configure the resources (models) you'd like to be available in Runway.
    |
    */

    'resources' => [
        \App\Models\City::class => [
            'name' => 'Cities',
            'title_field' => 'title',
        ],
        \App\Models\Country::class => [
            'name' => 'Countries',
            'title_field' => 'title',
        ],
        \App\Models\State::class => [
            'name' => 'States',
            'title_field' => 'title',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Disable Migrations?
    |--------------------------------------------------------------------------
    |
    | Should Runway's migrations be disabled?
    | (eg. not automatically run when you next vendor:publish)
    |
    */

    'disable_migrations' => false,

];
