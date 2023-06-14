<?php

return array(
    'dsn' => env('SENTRY_LARAVEL_DSN'),

    // capture release as git sha
    // 'release' => trim(exec('git log --pretty="%h" -n1 HEAD')),

    // Capture bindings on SQL queries
    'breadcrumbs.sql_bindings' => true,

    // Capture default user context
    // 'user_context' => false,

    'traces_sample_rate' => env('SENTRY_TRACES_SAMPLE_RATE=1', 1.0)  # be sure to lower this in production to prevent quota issues
);
