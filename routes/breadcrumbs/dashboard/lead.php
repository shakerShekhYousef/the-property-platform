<?php
// Home > Leads
Breadcrumbs::for('leads.index', function ($trail) {
    $trail->push('Leads', route('leads.index'));
});
// Home > Leads > Create
Breadcrumbs::for('leads.create', function ($trail) {
    $trail->parent('leads.index');
    $trail->push("Create a new lead", route('leads.create'));
});
// Home > Leads > Show
Breadcrumbs::for('leads.show', function ($trail, $lead) {
    $trail->parent('leads.index');
    $trail->push('Show Lead', route('leads.show', $lead));
});
// Home > Leads > Edit
Breadcrumbs::for('leads.edit', function ($trail, $lead) {
    $trail->parent('leads.index');
    $trail->push('Edit Lead', route('leads.edit', $lead));
});
// Home > Leads > Import
Breadcrumbs::for('leads.import', function ($trail) {
    $trail->parent('leads.index');
    $trail->push('Import Lead', route('leads.import'));
});