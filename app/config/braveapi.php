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

    'application-endpoint'              => 'https://core.braveineve.com/api',   // CORE HTTPS API endpoint
    'application-permission-namespace'  => 'complaint',                         // permission namespace for your application in core
    'application-permission-review'     => 'complaint.test.review',             // review permission, e.g. complaint.test.review

    'permission-review-all'             => 'complaint.test.review',             // review all complaints permission, e.g. complaint.test.review.all
    'permission-review-srp'             => 'complaint.test.review',             // review srp complaints permission, e.g. complaint.test.review.srp
    'permission-review-general'         => 'complaint.test.review',             // review general complaints permission, e.g. complaint.test.review.general
    'permission-review-ownership'       => 'complaint.test.review',             // review ownership complaints permission, e.g. complaint.test.review.ownership
    'permission-review-leadership'      => 'complaint.test.review',             // review leadership complaints permission, e.g. complaint.test.review.leadership
    'permission-review-awoxing'         => 'complaint.test.review',             // review awoxing complaints permission, e.g. complaint.test.review.awoxing
    'permission-review-other'           => 'complaint.test.review',             // review other complaints permission, e.g. complaint.test.review.other

    // Application ID from CORE
    'application-identifier'            => '54b53d30b9e80045936s319ab',
    // from local key generation
    'local-private-key'                 => '4844245954839a7117e18815442986f6807886f6e04ae440f7d7977d8abcd648',
    // from local key generation, not used
    'local-public-key'                  => '659acdc031654125a2325f9268ce7b2ca8729ed680d8553b35c82ac0d076ffcf54f719418fc0ebf32e7324469f6185be0cec6fbc65a9a9ba87d3a9f6d83de61b',
    // form core auth
    'remote-public-key'                 => '84681a3bac40d1565638fcaea186f8306a36ce542c079f1ec733e388861e9bca5f5b8f8928b9401f32844947d6d9f9cb72a79132951fc4647d189f57946b0f9b',
);