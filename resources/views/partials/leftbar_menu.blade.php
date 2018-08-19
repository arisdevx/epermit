<div class="logo">
    <a class="simple-text text-center">
        <img class="img-responsive center-block" src="{{ asset('img/taip-jpsm-logo-white.png') }}">
    </a>
</div>

<div class="sidebar-wrapper">
    <?php
    /*
    Menu::make('MyNavBar', function($menu) {
        if(Auth::user()->can('read-module-home')) {
            $menu->add(
                '<i class="material-icons">dashboard</i><p>Dashboard</p>',
                route('home.index')
            );
        }

        if(Auth::user()->can('read-module-profile')) {
            $menu->add(
                '<i class="material-icons">person</i><p>Profil Saya</p>',
                route('profile.index')
            );
        }

        if(Auth::user()->can('read-module-roles')) {
            $menu->add(
                '<i class="fa fa-certificate"></i><p>Menguruskan Peranan</p>',
                route('role.index')
            );
        }

        if(Auth::user()->can('read-module-admins')) {
            $menu->add(
                '<i class="fa fa-user-circle-o"></i><p>Senarai Admin</p>',
                route('admin.index')
            );
        }

        if(Auth::user()->can('read-module-users')) {
            $menu->add(
                '<i class="fa fa-user-circle"></i><p>Pengurusan Pengguna</p>',
                route('user.index')
            );
        }

        if(Auth::user()->can('read-module-admins')) {
            $menu->add(
                '<i class="fa fa-user-circle-o"></i><p>Senarai Akaun Pemohon</p>',
                route('applicants-list.index')
            );
        }
        if(Auth::user()->can('read-module-admins')) {
            $menu->add(
                '<i class="fa fa-user-circle-o"></i><p>Konfigurasi Hutan Simpan Kekal (HSK)</p>',
                route('permanent-forest.index')
            );
        }
        if(Auth::user()->can('read-module-admins')) {
            $menu->add(
                '<i class="fa fa-user-circle-o"></i><p>Konfigurasi Taman Eco-Rimba (TER)</p>',
                route('eco-park.index')
            )
            ->add('Level 2', 'test');
        }
        if(Auth::user()->can('read-module-admins')) {
            $menu->add(
                '<i class="fa fa-user-circle-o"></i><p>Senarai Gunung/Lokasi Pendakian</p>',
                route('mounth.index')
            );
        }
        if(Auth::user()->can('read-module-admins')) {
            $menu->add(
                '<i class="fa fa-user-circle-o"></i><p>Konfigurasi Senarai Kemudahan</p>',
                route('convenience.index')
            );
        }
        if(Auth::user()->can('read-module-admins')) {
            $menu->add(
                '<i class="fa fa-user-circle-o"></i><p>Konfigurasi Lain-lain Aktiviti</p>',
                route('others-activity.index')
            );
        }
        if(Auth::user()->can('read-module-admins')) {
            $menu->add(
                '<i class="fa fa-user-circle-o"></i><p>Konfigurasi Negeri</p>',
                route('state.index')
            );
        }
        if(Auth::user()->can('read-module-admins')) {
            $menu->add(
                '<i class="fa fa-user-circle-o"></i><p>Konfigurasi Pejabat Hutan Negeri</p>',
                route('state-forestry-department.index')
            );
        }
        if(Auth::user()->can('read-module-admins')) {
            $menu->add(
                '<i class="fa fa-user-circle-o"></i><p>Konfigurasi Pejabat Hutan Negeri</p>',
                route('regional-forest-officials.index')
            );
        }
        if(Auth::user()->can('read-module-admins')) {
            $menu->add(
                '<i class="fa fa-user-circle-o"></i><p>Audit Trial (Access Pengguna)</p>',
                route('audit-trail-access.index')
            );
        }
        if(Auth::user()->can('read-module-admins')) {
            $menu->add(
                '<i class="fa fa-user-circle-o"></i><p>Audit Trial (Aktiviti Pengguna)</p>',
                route('audit-trail-activity.index')
            );
        }
        if(Auth::user()->can('read-module-admins')) {
            $menu->add(
                '<i class="fa fa-user-circle-o"></i><p>Laporan</p>',
                route('report.index')
            );
        }
        if(Auth::user()->can('read-module-admins')) {
            $menu->add(
                '<i class="fa fa-user-circle-o"></i><p>Senarai Pemohon</p>',
                route('applicant.index')
            );
        }
    });
    echo Menu::get('MyNavBar')->asUl(['class' => 'nav']);
    */?>
    <ul class="nav">
        <li>
            <a href="{{ route('home.index') }}">
                <i class="material-icons">dashboard</i>
                <p>Dashboard</p>
            </a>
        </li>
        <li>
            <a href="{{ route('profile.index') }}">
                <i class="material-icons">face</i>
                <p>Profile Saya</p>
            </a>
        </li>
        @if(auth()->user()->hasRole(['super', 'admin', 'jabatan_perhutanan_negeri']))
            <li>
                <a href="{{ route('admin.index') }}">
                    <i class="material-icons">https</i>
                    <p>Senarai Pengguna</p>
                </a>
            </li>
        @endif
        {{-- <li>
            <a href="{{ route('user.index') }}">
                <i class="material-icons">person</i>
                <p>Senarai Pengguna</p>
            </a>
        </li> --}}
        @if(auth()->user()->hasRole(['super', 'admin']))
            <li>
                <a href="{{ route('applicants-list.index') }}">
                    <i class="material-icons">person</i>
                    <p>Senarai Pemohon</p>
                </a>
            </li>
        @endif
        <li>
            <a href="{{ url('applicant-status') }}">
                <i class="material-icons">assignment</i>
                <p>Status Permohonan</p>
                @if(get_applicant_total() != 0)
                    <div data-background-color="red" class="badge badge-danger pull-right" style="margin-top: -25px; margin-right: -20px; background-color: #ef5350">{{ get_applicant_total() }}</div>
                @endif
            </a>
        </li>
        @if(auth()->user()->hasRole(['super', 'admin', 'jabatan_perhutanan_negeri', 'pegawai_hutan_daerah']))
            <li>
                <a data-toggle="collapse" href="#applications">
                    <i class="material-icons">settings</i>
                    <p>Permohonan
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse{{ (in_array(request()->segment(1), ['aktiviti-pendakian', 'tempahan-kemudahan', 'aktiviti-lain', 'application-status']) ? ' in' : '') }}" id="applications">
                    <ul class="nav">
                        <li>
                            <a href="{{ route('aktiviti-pendakian.index') }}">
                                <span class="sidebar-normal">Aktiviti Pendakian</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('tempahan-kemudahan.index') }}">
                                <span class="sidebar-normal">Tempahan Kemudahan</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('aktiviti-lain.index') }}">
                                <span class="sidebar-normal">Aktiviti Lain-lain</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('application-status.index') }}">
                                <span class="sidebar-normal">Status Permohonan</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        @endif
        @if(auth()->user()->hasRole(['super', 'admin', 'jabatan_perhutanan_negeri']))
            <li>
                <a data-toggle="collapse" href="#configuration">
                    <i class="material-icons">settings</i>
                    <p>Konfigurasi
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse{{ (in_array(request()->segment(1), ['permanent-forest', 'eco-park', 'hiking', 'convenience', 'state-user', 'area', 'guide', 'regional-forest-officials']) ? ' in' : '') }}" id="configuration">
                    <ul class="nav">
                        <li>
                            <a href="{{ route('permanent-forest.index') }}">
                                <span class="sidebar-normal">Hutan Simpan Kekal (HSK)</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('eco-park.index') }}">
                                <span class="sidebar-normal">Taman Eko-Rimba (TER/HTN)</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('hiking.index') }}">
                                <span class="sidebar-normal">Lokasi Pendakian</span>
                            </a>
                        </li>
                        {{-- <li>
                            <a href="{{ route('campground.index') }}">
                                <span class="sidebar-normal">Tapak Perkhemahan</span>
                            </a>
                        </li> --}}
                        <li>
                            <a href="{{ route('convenience.index') }}">
                                <span class="sidebar-normal">Kemudahan</span>
                            </a>
                        </li>
                        {{-- <li>
                            <a href="{{ route('convenience-category.index') }}">
                                <span class="sidebar-normal">Jenis Kemudahan</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('convenience-sub-category.index') }}">
                                <span class="sidebar-normal">Kategori Kemudahan</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('capacity-category.index') }}">
                                <span class="sidebar-normal">Jenis Kapasiti</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('price-category.index') }}">
                                <span class="sidebar-normal">Jenis Harga</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('others-activity.index') }}">
                                <span class="sidebar-normal">Lain-lain Aktiviti</span>
                            </a>
                        </li> --}}
                        {{-- @if(auth()->user()->hasRole(['super', 'admin']))
                        <li>
                            <a href="{{ route('state.index') }}">
                                <span class="sidebar-normal">Negeri</span>
                            </a>
                        </li>
                        @endif --}}
                        <li>
                            <a href="{{ route('state-user.index') }}">
                                <span class="sidebar-normal">Negeri</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('area.index') }}">
                                <span class="sidebar-normal">Daerah</span>
                            </a>
                        </li>
                        @if(auth()->user()->hasRole('super', 'admin'))
                            <li>
                                <a href="{{ route('guide.index') }}">
                                    <span class="sidebar-normal">Malim</span>
                                </a>
                            </li>
                        @endif
                        {{-- @if(auth()->user()->hasRole(['super', 'admin']))
                         <li>
                            <a href="{{ route('state-forestry-department.index') }}">
                                <span class="sidebar-normal">Jabatan Perhutanan Negeri</span>
                            </a>
                        </li>
                        @endif --}}
                         <li>
                            <a href="{{ route('regional-forest-officials.index') }}">
                                <span class="sidebar-normal">Pejabat Hutan Daerah</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        @endif

        @if(auth()->user()->hasRole(['super', 'admin']))
            <li>
                <a data-toggle="collapse" href="#settings">
                    <i class="material-icons">settings</i>
                    <p>Pengaturan
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse{{ (in_array(request()->segment(1), ['homepage-setting', 'slider-setting', 'post-information']) ? ' in' : '') }}" id="settings">
                    <ul class="nav">
                        <li>
                            <a href="{{ route('homepage-setting.index') }}">
                                <span class="sidebar-normal">Laman Utama</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('slider-setting.index') }}">
                                <span class="sidebar-normal">Slider</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('post-information.index') }}">
                                <span class="sidebar-normal">Maklumat</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li>
                <a data-toggle="collapse" href="#audit">
                    <i class="material-icons">subject</i>
                    <p>Audit Log
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse{{ (in_array(request()->segment(1), ['audit-trail-access', 'audit-trail-activity']) ? ' in' : '') }}" id="audit">
                    <ul class="nav">
                        <li>
                            <a href="{{ route('audit-trail-access.index') }}">
                                <span class="sidebar-normal">Access Pengguna</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('audit-trail-activity.index') }}">
                                <span class="sidebar-normal">Aktiviti Pengguna</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        @endif
        @if(auth()->user()->hasRole(['super', 'admin', 'jabatan_perhutanan_negeri', 'pegawai_hutan_daerah']))
            <li>
                <a href="{{ route('report.index') }}">
                    <i class="material-icons">info</i>
                    <p>Laporan</p>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="material-icons">search</i>
                    <p>Carian</p>
                </a>
            </li>
        @endif
    </ul>
</div>