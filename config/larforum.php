<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Forum or Site name here
    |--------------------------------------------------------------------------
    |
    | Name of your site and/or forum.
    |
    */
    'name' => 'LarForum',

    /*
    |--------------------------------------------------------------------------
    | Forum or Site logo image url here
    |--------------------------------------------------------------------------
    |
    | URL address of your website and/or forum logo image.
    | its ok if you dont have one. Just leave this blank then.
    |
    */
    'logo' => '',

    /*
    |--------------------------------------------------------------------------
    | Display Type
    |--------------------------------------------------------------------------
    |
    | 'standalone' -> This will cause LarForum to display on its own.
    |  A Route to /forum is required.
    |
    | 'integrated' -> integrates seemlessly into your existing website.
    | Use of LarForum namespacing in your blade views and/or controllers is required.
    |
    */
    'displaytype' => 'standalone',

    /*
    |--------------------------------------------------------------------------
    | Use Gravatar?
    |--------------------------------------------------------------------------
    | 
    | true -> will use the gravatar's API to fetch the avatar pic of your users in the topic page
    | false -> will NOT use gravatar's API
    | LarForum now uses Gravatar's secured SSL url
    |
    */
    'usegravatar' => true,

    /*
    |--------------------------------------------------------------------------
    | Redirect to the home view
    |--------------------------------------------------------------------------
    | 
    | Leave blank if you like to use the default home view, most useful for standalone.
    | set this to the view name if you have a custom view.
    |
    */
    'redirectohome' => '',

    /*
    |--------------------------------------------------------------------------
    | Format to display the date and time
    |--------------------------------------------------------------------------
    |
    | How do you want the date and time to display for topics and replies.
    | Please see http://php.net/manual/en/function.date.php for help.
    | Default is 'D M j Y g:ia T'
    | Example: Sat May 23 2015 9:37pm UTC
    */
    'datetimeformat' => 'D M j Y g:ia T',
];
