<?php
return array(
    /*
    |--------------------------------------------------------------------------
    | Application Debug Mode
    |--------------------------------------------------------------------------
    |
    | When your application is in debug mode, detailed error messages with
    | stack traces will be shown on every error that occurs within your
    | application. If disabled, a simple generic error page is shown.
    |
    */

    'application-endpoint' => '',   // CORE HTTPS API endpoint
    'application-permission-namespace' => '', // permission namespace for your application in core
    'application-permission-review' => '', // review permission, e.g. complaint.test.review
    'application-identifier' => '', // Application ID from CORE
    'local-private-key' => '',     // from local key generation
    'local-public-key'  => '',      // from local key generation, not used
    'remote-public-key' => '',      // form core auth
);