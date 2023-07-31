<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('dashboard'));
});

Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Dashboard', route('dashboard'));
});

Breadcrumbs::for('profile.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Profile', route('profile.edit'));
});


Breadcrumbs::for('admin', function (BreadcrumbTrail $trail) {
    $trail->push('Admin', route('admin.dashboard'));
});

Breadcrumbs::for('admin.dashboard', function (BreadcrumbTrail $trail) {
    $trail->parent('admin');
    $trail->push('Dashboard', route('admin.dashboard'));
});

Breadcrumbs::for('admin.profile.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Profile Admin', route('admin.profile.edit'));
});

Breadcrumbs::for('tu', function (BreadcrumbTrail $trail) {
    $trail->push('Tata Usaha', route('tu.dashboard'));
});

Breadcrumbs::for('tu.dashboard', function (BreadcrumbTrail $trail) {
    $trail->parent('tu');
    $trail->push('Dashboard', route('tu.dashboard'));
});

Breadcrumbs::for('tu.profile.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('tu.dashboard');
    $trail->push('Profile Staft TU', route('tu.profile.edit'));
});
