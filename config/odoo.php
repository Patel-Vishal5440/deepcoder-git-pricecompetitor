<?php

return [
    'host'     => env('ODOO_HOST', 'https://mobilenzo1-printnode-18541827.dev.odoo.com'),
    'db'       => env('ODOO_DB', 'mobilenzo1-printnode-18541827'),
    'username' => env('ODOO_USERNAME', 'admin'),
    'password' => env('ODOO_PASSWORD', 'admin'),
    'protocol' => env('ODOO_PROTOCOL', 'xml-rpc'), // or 'json-rpc'
];
