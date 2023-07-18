<?php
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;
//Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push(__('home'), route('home'));
});
require __DIR__.'/lead.php';
require __DIR__.'/property.php';
require __DIR__.'/user.php';
require __DIR__.'/tenant.php';
