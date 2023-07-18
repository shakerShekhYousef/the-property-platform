<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;
// Home > Properties
Breadcrumbs::for('properties_list', function ($trail) {
    $trail->push(__('sidebar.properties.list'), route('properties_list'));
});
// Home > Properties > Create
Breadcrumbs::for('properties.create', function ($trail) {
    $trail->parent('properties_list');
    $trail->push(__('sidebar.properties.create'), route('properties_list'));
});

// Home > Properties > Edit
Breadcrumbs::for('properties.edit', function ($trail, $property) {
    $trail->parent('properties_list');
    $trail->push("Edit Property", route('properties.edit',$property));
});

// Home > Tenants > Show
Breadcrumbs::for('properties.show', function ($trail, $property) {
    $trail->parent('properties_list');
    $trail->push("Show Property", route('properties.show',$property));
});
