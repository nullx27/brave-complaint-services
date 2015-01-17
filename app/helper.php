<?php

class BraveComplaintHelper {

    public static $status = array(
        'new' => 'New',
        'inprogress' => 'In Progress',
        'resolved' => 'Resolved',
        'rejected' => 'Rejected',
        'withdraw' => 'Withdraw'
    );

    public static $types = array(
        'general' => 'General',
        'ownership' => 'Ownership',
        'awoxing' => 'Awoxing',
        'srp' => 'SRP',
        'leadership' => 'Leadership',
        'other' => 'Other'
    );
}