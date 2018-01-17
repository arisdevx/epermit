<?php
Breadcrumbs::for('main.index', function($breadcrumbs) {
    $breadcrumbs->add('<i class="fa fa-home"></i>', url('/'));
});


Breadcrumbs::for('home.index', function($breadcrumbs) {
    $breadcrumbs->parent('main.index');
    $breadcrumbs->add('Dashboard', route('home.index'));
});


Breadcrumbs::for('profile.index', function($breadcrumbs) {
    $breadcrumbs->parent('main.index');
    $breadcrumbs->add('Profile Saya', route('profile.index'));
});


Breadcrumbs::for('role.index', function($breadcrumbs) {
    $breadcrumbs->parent('main.index');
    $breadcrumbs->add('Menguruskan Peranan', route('role.index'));
});


Breadcrumbs::for('admin.index', function($breadcrumbs) {
    $breadcrumbs->parent('main.index');
    $breadcrumbs->add('Senarai Admin', route('admin.index'));
});


Breadcrumbs::for('user.index', function($breadcrumbs) {
    $breadcrumbs->parent('main.index');
    $breadcrumbs->add('Senarai User', route('user.index'));
});

Breadcrumbs::for('homepage-setting.index', function($breadcrumbs) {
    $breadcrumbs->parent('main.index');
    $breadcrumbs->add('Pengaturan Laman Utama', route('homepage-setting.index'));
});
Breadcrumbs::for('slider-setting.index', function($breadcrumbs) {
    $breadcrumbs->parent('main.index');
    $breadcrumbs->add('Pengaturan Slider', route('slider-setting.index'));
});
Breadcrumbs::for('slider-setting.create', function($breadcrumbs) {
    $breadcrumbs->parent('slider-setting.index');
    $breadcrumbs->add('Tambah Slider', route('slider-setting.create'));
});

echo Breadcrumbs::render(Route::currentRouteName());
?>