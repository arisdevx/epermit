@extends('account.layouts.backend.panel')

@section('content')
<div class="row">

    <div class="card card-nav-tabs">
        <div class="card-header" data-background-color="green">
            <h4 class="title">&nbsp;</h4>
            <p class="category">Tempahan Kemudahan</p>
        </div>

        <div class="card-content">
            <div id="printData" style="display: none">
                <div id="printArea">
                    {{ $applicant_convenience->state->name }}<br />
                    {{ $applicant_convenience->area->name }}<br />
                    {{ $applicant->user->email }}<br />

                    <hr />

                    <table width="100%" border="0">
                        <tr>
                            <td width="50%">{{ (!empty($phd) ? (!empty($phd->user->name) ? $phd->user->name : (!empty($jpn->user->name) ? $jpn->user->name : 'Pegawai Hutan Daerah')) : 'Pegawai Hutan Daerah') }}</td>
                            <td width="50%">No Rujukan : {{ $applicant->number }}</td>
                        </tr>
                        <tr>
                            <td width="50%">Alamat Pejabat Hutan Daerah</td>
                            <td width="50%">Tarikh : {{ date('d/m/Y') }}</td>
                        </tr>
                    </table>

                    <p>Tuan / Puan, </p>

                    <p style="text-transform: uppercase;"><strong>Permohonan {{-- Menjalankan Aktiviti --}} Tempahan Kemudahan di {{ $applicant_convenience->eco_park->name }}
                        <br />No Permohonan : {{ $applicant->number }}</strong></p>

                        <p><strong>Dengan segala hormatnya, saya merujuk kepada perkara diatas.</strong></p>

                        <p><strong>1. Maklumat aktiviti adalah seperti berikut:</strong></p>
                        <table width="80%" border="1" cellspacing="0" cellpadding="5" style="margin: 0 auto">
                            <tr>
                                <th style="text-align: left; width: 30%">Nama Aktiviti</th>
                                <td colspan="3">Tempahan Kemudahan</td>
                            </tr>
                            <tr>
                                <th style="text-align: left; width: 30%">Tarikh</th>
                                <td width="30%">{{ (!empty($applicant_convenience->starting_date) ? date('d/m/Y', strtotime($applicant_convenience->starting_date)) : '') }}</td>
                                <th style="text-align: left">Hingga</th>
                                <td width="30%">{{ (!empty($applicant_convenience->ending_date) ? date('d/m/Y', strtotime($applicant_convenience->ending_date)) : '') }}</td>
                            </tr>
                            <tr>
                                <th style="text-align: left; width: 30%">Bilangan Hari</th>
                                <td colspan="3">{{ $applicant_convenience->days_total }} Hari</td>
                            </tr>
                            <tr>
                                <th style="text-align: left; width: 30%">Lokasi</th>
                                <td colspan="3">{{ $applicant_convenience->eco_park->name }}</td>
                            </tr>
                            <tr>
                                <th style="text-align: left; width: 30%">Bilangan {{ ((($applicant_convenience->convenience_category_id == '2') OR ($applicant_convenience->convenience_category_id == '3')) ? ' Peserta' : ' Unit') }}</th>
                                <td colspan="3">{{ $applicant_convenience->participant }} {{ ((($applicant_convenience->convenience_category_id == '2') OR ($applicant_convenience->convenience_category_id == '3')) ? 'Orang' : ' Unit') }}</td>
                            </tr>
                            <tr>
                                <th style="text-align: left; width: 30%">Tarikh Permohonan</th>
                                <td colspan="3">{{ date('d/m/Y', strtotime($applicant_convenience->applicant_convenience_declaration->application_date)) }}</td>
                            </tr>
                        </table>
                        <br />
                        <p>3. Saya mengaku bahawa maklumat-maklumat yang diberikan di atas adalah benar. Pihak kerajaan tidak akan dipertanggungjawabkan jika terdapat sebarang kesulitan yang timbul akibat maklumat yang tidak benar. Keselamatan pemohon dan para peserta semasa menjalankan aktiviti adalah dibawah tanggungjawab sendiri.</p>
                        <p>Yang Benar, </p>
                        {{ $applicant_convenience->applicant_convenience_declaration->name }}<br />
                        {{ $applicant_convenience->applicant_convenience_declaration->ic_number }}<br />
                        {{ date('d/m/Y', strtotime($applicant_convenience->applicant_convenience_declaration->application_date)) }}
                    </div>
                </div>
            <h4 class="text-center" style="margin-top: 100px;">Permohonan Anda Telah Berjaya Dihantar Dan Akan Diproses</h4>
            <div class="text-center" style="margin: 20px 0 10px 0">
                <div class="row" style="margin-bottom: 100px;">
                    <div class="col-md-6">
                        <div class="pull-right">
                            <a href="{{ url('account/member-tempahan-kemudahan/'. $applicant->id .'/download') }}" class="btn btn-success"><i class="material-icons">file_download</i></a><br />
                            Muat Turun
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="col-md-6">
                        <div class="pull-left">
                            <a href="#" class="btn btn-primary" id="print"><i class="material-icons">print</i></a><br />
                            Cetak
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    @include('account.partials.script.othersactivity')
@endsection
@section('modal')
    @include('partials.modal_delete')
    @include('partials.modal_form')
@endsection