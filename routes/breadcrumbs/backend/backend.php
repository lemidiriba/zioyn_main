<?php

Breadcrumbs::for('admin.dashboard', function ($trail) {
    $trail->push(__('strings.backend.dashboard.title'), route('admin.dashboard'));
});
Breadcrumbs::for('admin.ministry.store', function ($trail) {
    $trail->push('Dashboard', route('admin.dashboard'));
});

Breadcrumbs::for('admin.ministry.update', function ($trail) {
    $trail->push('Dashboard', route('admin.dashboard'));
});

Breadcrumbs::for('admin.ministry.index', function ($trail) {
    $trail->push('School', route('admin.ministry.index'));
});


Breadcrumbs::for(
    'blogetc.admin.index',
    function ($trail) {
        $trail->push('Blog Admin', route('blogetc.admin.index'));
    }
);

require __DIR__ . '/auth.php';
require __DIR__ . '/log-viewer.php';