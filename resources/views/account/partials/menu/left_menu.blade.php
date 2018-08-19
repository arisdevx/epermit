<div class="logo">
    <a class="simple-text text-center">
        <img class="img-responsive center-block" src="{{ asset('img/taip-jpsm-logo-white.png') }}">
    </a>
</div>

<div class="sidebar-wrapper">
    <?php
    Menu::make('MyNavBar', function($menu) {
        $menu->add(
            '<i class="material-icons">dashboard</i><p>Utama<br><span style="display:block; margin-left: 45px">Dashboard</span></p>',
            route('member-home.index')
        );

        $menu->add(
            '<i class="material-icons">face</i><p>Profile Saya<br><span style="display:block; margin-left: 45px">My Profile</span></p>',
            route('member-profile.index')
        );

        $menu->add(
            '<i class="material-icons">receipt</i><p>Permohonan Saya<br><span style="display:block; margin-left: 45px">My Application</span></p>',
            route('member-application-status.index')
        );
    });

    echo Menu::get('MyNavBar')->asUl(['class' => 'nav']);

    ?>
</div>