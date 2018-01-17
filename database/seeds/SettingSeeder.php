<?php

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::truncate();

        $homepage = '<p><b><span style="font-size: 18px;">Langkah-langkah</span></b></p>
        			<ol><li><span style="font-size: 12px;">﻿Pengguna perlu melayari </span><a href="http://www.e-permit.gov.my">www.e-permit.gov.my</a><span style="font-size: 12px;">&nbsp;(sample)</span></li><li><span style="font-size: 12px;">Untuk memohon e-permit, pengguna perlu mendaftar sebagai ahli sebelum memohon permit secara online.</span></li><li><span style="font-size: 12px;">Pengguna perlu menekan butang <b>"Daftar" </b>bagi memohon e-permit memasuki hutan.<br></span><b><span style="font-size: 18px;"><br></span></b></li></ol>';

        $footer = '<p style="text-align: center; ">Sebarang pertanyaan sila hubungi:</p>
        			<p style="text-align: center; ">Unit Hutan Lipur<br>Jabatan Perhutanan Negeri Pahang<br>Tingkat 5, Kompleks Tun Razak<br>Bandar Indera Mahkota, 25990 Kuantan<br>Pahang Darul Makmur <br>Tel : 09-573 2911<br>Faks : 09-573 6152</p>';

        Setting::insert([
        	'setting_key' => 'homepage',
        	'setting_value' => $homepage
        ]);

        Setting::insert([
        	'setting_key' => 'footer',
        	'setting_value' => $footer
        ]);

        Setting::insert([
            'setting_key' => 'logs_id',
            'setting_value' => ''
        ]);
    }
}
