<div class="logo">
    <a class="simple-text text-center">
        <img class="img-responsive center-block" src="{{ asset('img/taip-jpsm-logo-white.png') }}">
    </a>
</div>

<div class="sidebar-wrapper">
    <?php
    Menu::make('MyNavBar', function($menu) {
        $menu->add(
            '<i class="material-icons">dashboard</i><p>Dashboard</p>',
            route('member-home.index')
        );

        $menu->add(
            '<i class="material-icons">face</i><p>Profile Saya</p>',
            route('member-profile.index')
        );

        $menu->add(
            '<i class="material-icons">receipt</i><p>Status Permohonan</p>',
            route('member-application-status.index')
        );
    });

    echo Menu::get('MyNavBar')->asUl(['class' => 'nav']);

    ?>
</div>