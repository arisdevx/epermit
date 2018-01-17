<?php
Breadcrumbs::for('main.index', function($breadcrumbs) {
    $breadcrumbs->add('<i class="fa fa-home"></i>', url('/'));
});


Breadcrumbs::for('member-home.index', function($breadcrumbs) {
    $breadcrumbs->parent('main.index');
    $breadcrumbs->add('Dashboard', route('member-home.index'));
});


Breadcrumbs::for('member-profile.index', function($breadcrumbs) {
    $breadcrumbs->parent('member-home.index');
    $breadcrumbs->add('Profile Saya', route('member-profile.index'));
});


Breadcrumbs::for('member-application.index', function($breadcrumbs) {
    $breadcrumbs->parent('member-home.index');
    $breadcrumbs->add('Permohonan', route('member-application.index'));
});


Breadcrumbs::for('member-application-status.index', function($breadcrumbs) {
    $breadcrumbs->parent('member-home.index');
    $breadcrumbs->add('Status Permohonan', route('member-application-status.index'));
});


Breadcrumbs::for('user.index', function($breadcrumbs) {
    $breadcrumbs->parent('main.index');
    $breadcrumbs->add('Senarai User', route('user.index'));
});

Breadcrumbs::for('member-tempahan-kemudahan.index', function($breadcrumbs) {
    $breadcrumbs->parent('member-home.index');
    $breadcrumbs->add('Tempahan Kemudahan', route('member-tempahan-kemudahan.index'));
});

Breadcrumbs::for('member-aktiviti-pendakian.index', function($breadcrumbs) {
    $breadcrumbs->parent('member-home.index');
    $breadcrumbs->add('Aktiviti Pendakian', route('member-aktiviti-pendakian.index'));
});

Breadcrumbs::for('member-aktiviti-lain.index', function($breadcrumbs) {
    $breadcrumbs->parent('member-home.index');
    $breadcrumbs->add('Lain-lain Aktiviti', route('member-aktiviti-lain.index'));
});

echo Breadcrumbs::render(Route::currentRouteName());
?>