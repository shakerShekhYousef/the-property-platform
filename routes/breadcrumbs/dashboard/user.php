<?php

use Illuminate\Support\Facades\Auth;
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

// 1 > Users//parent
Breadcrumbs::for('creat', function ($trail) {
    $trail->push(__('sidebar.users.create'), route('creat'));
});
// Home > Users > Create
Breadcrumbs::for('index', function ($trail) {
    $trail->parent('creat');
    $trail->push(__('sidebar.users.list'), route('index'));
});
// Home > Users > update
Breadcrumbs::for('update', function ($trail) {
    $trail->parent('index');
    $trail->push(__('sidebar.users.update'), route('creat'));
});
// Home > Users > update
Breadcrumbs::for('Reset Password', function ($trail) {
    $trail->parent('index');
    $trail->push(__('sidebar.users.Reset Password'), route('creat'));
});


// 2 > profile//parent
Breadcrumbs::for('profile', function ($trail) {
    $trail->push(__('sidebar.users.profile'), route('profile', Auth::user()->id));
});
// Home > Users > change
Breadcrumbs::for('change Password', function ($trail) {
    $trail->parent('profile');
    $trail->push(__('sidebar.users.change Password'), route('creat'));
});
// Home > Users > changeimage
Breadcrumbs::for('image', function ($trail) {
    $trail->parent('profile');
    $trail->push(__('sidebar.users.image'), route('creat'));
});


