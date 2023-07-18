<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

// Home > Tenants
Breadcrumbs::for('tenants_list', function ($trail) {
    $trail->push('Tenants List', route('tenants_list'));
});
// Home > Tenants > Create
Breadcrumbs::for('tenants.create', function ($trail) {
    $trail->parent('tenants_list');
    $trail->push("Creat a Tenant", route('tenants_list'));
});

// Home > Tenants > Edit
Breadcrumbs::for('tenants.edit', function ($trail, $property) {
    $trail->parent('tenants_list');
    $trail->push("Edit Tenant", route('tenants.edit',$property));
});

// Home > Tenants > Show
Breadcrumbs::for('tenants.show', function ($trail, $property) {
    $trail->parent('tenants_list');
    $trail->push("Show Tenant", route('tenants.show',$property));
});
