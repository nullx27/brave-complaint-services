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

    'application-endpoint'              => '',             // CORE HTTPS API endpoint
    'application-permission-namespace'  => '',             // permission namespace for your application in core
    'application-permission-review'     => '',             // review permission, e.g. complaint.test.review

    'permission-review-all'             => '',             // review all complaints permission, e.g. complaint.test.review.all
    'permission-review-srp'             => '',             // review srp complaints permission, e.g. complaint.test.review.srp
    'permission-review-general'         => '',             // review general complaints permission, e.g. complaint.test.review.general
    'permission-review-ownership'       => '',             // review ownership complaints permission, e.g. complaint.test.review.ownership
    'permission-review-leadership'      => '',             // review leadership complaints permission, e.g. complaint.test.review.leadership
    'permission-review-awoxing'         => '',             // review awoxing complaints permission, e.g. complaint.test.review.awoxing
    'permission-review-other'           => '',             // review other complaints permission, e.g. complaint.test.review.other

    'application-identifier'            => '',             // Application ID from CORE
    'local-private-key'                 => '',             // from local key generation
    'remote-public-key'                 => '',             // form core auth
);