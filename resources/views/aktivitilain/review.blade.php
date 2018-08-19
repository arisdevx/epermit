@extends('layouts.panel')

@section('content')
<div class="row">

    <div class="card card-nav-tabs">
        <div class="card-header" data-background-color="green">
            <h4 class="title"><strong>Lain-lain Aktiviti</strong></h4>
            <p class="category"><strong><i>Others Activities</i></strong></p>
        </div>

        <div class="card-content">
            {{-- <table class="table table-bordered" style="margin-bottom: 10px; width: 30%">
                <thead>
                    <tr class="active">
                        <th colspan="2">Pemohon</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Nama</td>
                        <td>{{ $applicant->user->name }}</td>
                    </tr>
                    <tr>
                        <td>ID/IC/Passport No.</td>
                        <td>{{ $applicant->user->username }}</td>
                    </tr>
                </tbody>
            </table>
            <table class="table table-bordered">
                <thead>
                    <tr class="active">
                        <th colspan="2">A. Maklumat Pemohon</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td width="20%">Negeri</td>
                        <td>{{ (!empty($other->state->name) ? $other->state->name : '-') }}</td>
                    </tr>
                    <tr>
                        <td>Daerah</td>
                        <td>{{ (!empty($other->area->name) ? $other->area->name : '-') }}</td>
                    </tr>
                    <tr>
                        <td>Kategori</td>
                        <td>
                            @if($other->type == 'ter')
                                Taman Eko-Rimba (TER)
                            @elseif($other->type == 'htn')
                                Hutan Taman Negeri (HTN)
                            @elseif($other->type == 'hsk')
                                Hutan Simpan Kekal (HSK)
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>Tempat Aktiviti</td>
                        <td>
                            @if($other->type == 'ter' OR $other->type == 'htn')
                                {{ (!empty($other->eco_park->name) ? $other->eco_park->name : '-') }}
                            @else
                                {{ (!empty($other->permanent_forest->name) ? $other->permanent_forest->name : '-') }}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td>{{ (!empty($other->applicant_other_activity_detail->name) ? $other->applicant_other_activity_detail->name : '') }}</td>
                    </tr>
                    <tr>
                        <td>No Telefon</td>
                        <td>{{ (!empty($other->applicant_other_activity_detail->phone) ? $other->applicant_other_activity_detail->phone : '') }}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>{{ (!empty($other->applicant_other_activity_detail->email) ? $other->applicant_other_activity_detail->email : '') }}</td>
                    </tr>
                    <tr>
                        <td>No Faks</td>
                        <td>{{ (!empty($other->applicant_other_activity_detail->fax) ? $other->applicant_other_activity_detail->fax : '') }}</td>
                    </tr>
                    <tr>
                        <td>Nama Agensi/Persatuan</td>
                        <td>{{ (!empty($other->applicant_other_activity_detail->agency) ? $other->applicant_other_activity_detail->agency : '') }}</td>
                    </tr>
                    <tr>
                        <td>Poskod</td>
                        <td>{{ (!empty($other->applicant_other_activity_detail->postcode) ? $other->applicant_other_activity_detail->postcode : '') }}</td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>{{ (!empty($other->applicant_other_activity_detail->address) ? $other->applicant_other_activity_detail->address : '') }}</td>
                    </tr>
                    <tr>
                        <td>Bandar</td>
                        <td>{{ (!empty($other->applicant_other_activity_detail->bandar) ? $other->applicant_other_activity_detail->bandar : '') }}</td>
                    </tr>
                    <tr>
                        <td>Negeri</td>
                        <td>{{ (!empty($other->applicant_other_activity_detail->state) ? $other->applicant_other_activity_detail->state : '') }}</td>
                    </tr>
                    <tr>
                        <td>Negara</td>
                        <td>{{ (!empty($other->applicant_other_activity_detail->country->name) ? $other->applicant_other_activity_detail->country->name : '') }}</td>
                    </tr>
                    <tr>
                        <td>Tarikh Mula</td>
                        <td>{{ (!empty($other->applicant_other_activity_detail->starting_date) ? date('d/m/Y', strtotime($other->applicant_other_activity_detail->starting_date)) : '') }}</td>
                    </tr>
                    <tr>
                        <td>Tarikh Akhir</td>
                        <td>{{ (!empty($other->applicant_other_activity_detail->ending_date) ? date('d/m/Y', strtotime($other->applicant_other_activity_detail->ending_date)) : '') }}</td>
                    </tr>
                    <tr>
                        <td>Keterangan</td>
                        <td>{{ (!empty($other->applicant_other_activity_detail->description) ? $other->applicant_other_activity_detail->description : '') }}</td>
                    </tr>
                    <tr>
                        <td>Senarai Peserta</td>
                        <td>{!! (!empty($other->applicant_other_activity_detail->participant_file) ? '<a href="'. url('files/' . $other->applicant_other_activity_detail->participant_file) .'">Download</a>' : '-') !!}</td>
                    </tr>
                    <tr>
                        <td>Tentative Program</td>
                        <td>{!! (!empty($other->applicant_other_activity_detail->program_file) ? '<a href="'. $other->applicant_other_activity_detail->program_file .'">Download</a>' : '') !!}</td>
                    </tr>
                    <tr>
                        <td>Bilangan Peserta</td>
                        <td>{{ (!empty($other->applicant_other_activity_detail->participant) ? $other->applicant_other_activity_detail->participant : '') }}</td>
                    </tr>
                    <tr>
                        <td>Bilangan Hari</td>
                        <td>{{ (!empty($other->applicant_other_activity_detail->day) ? $other->applicant_other_activity_detail->day : '') }}</td>
                    </tr>
                </tbody>
            </table>
            <table class="table table-bordered" style="margin-top: 10px;">
                <thead>
                    <tr class="active">
                        <th colspan="2">B. Pengesahan Pemohon</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td width="20%">Nama Penuh</td>
                        <td>{{ (!empty($other->applicant_other_activity_declaration->name) ? $other->applicant_other_activity_declaration->name : '-') }}</td>
                    </tr>
                    <tr>
                        <td>Daerah</td>
                        <td>{{ (!empty($other->applicant_other_activity_declaration->ic_number) ? $other->applicant_other_activity_declaration->ic_number : '-') }}</td>
                    </tr>
                    <tr>
                        <td>Tarikh</td>
                        <td>
                            {{ (!empty($other->applicant_other_activity_declaration->application_date) ? date('d/m/Y', strtotime($other->applicant_other_activity_declaration->application_date)) : '-') }}
                        </td>
                    </tr>
                </tbody>
            </table> --}}
            {{-- {{ dd($phd_data) }} --}}
            <div id="printData" style="display: none">
                <div id="printArea">
                    <table border="0" width="100%" style="padding: 0; margin: 0">
                      <tr>
                        <td width="20%" align="center">
                          <img src="{{ url('img/jpsm-tiger-logo.png') }}" style="width: 150px">
                        </td>
                        <td width="50%" align="center">
                        JABATAN PERHUTANAN NEGERI<br /> 
                        {{ (!empty($phd_data->name) ? $phd_data->name : 'Pegawai Hutan Daerah') }}<br />
                        {{ (!empty($phd_data->address) ? $phd_data->address : 'Alamat Pejabat Hutan Daerah') }}<br />
                        No. Tel: {{ (!empty($phd_data->phone) ? $phd_data->phone : '-') }} Fax: {{ (!empty($phd_data->fax) ? $phd_data->fax : '-') }} Email: {{ (!empty($phd_data->email) ? $phd_data->email : '-') }} 
                        </td>
                        <td width="20%" align="center">
                          <img src="{{ url('img/jpsm-mail-logo.png') }}" style="width: 100px">
                        </td>
                      </tr>
                    </table>
                    {{-- <table border="0" width="100%">
                        <tr>
                            <td colspan="2">{{ (!empty($other->applicant_other_activity_detail->agency) ? $other->applicant_other_activity_detail->agency : '') }}</td>
                        </tr>
                        <tr>
                            <td colspan="2">{{ (!empty($other->applicant_other_activity_detail->address) ? $other->applicant_other_activity_detail->address : '') }}</td>
                        </tr>
                        <tr>
                            <td colspan="2">{{ (!empty($other->applicant_other_activity_detail->postcode) ? $other->applicant_other_activity_detail->postcode : '') }} {{ (!empty($other->applicant_other_activity_detail->bandar) ? $other->applicant_other_activity_detail->bandar : '') }}</td>
                        </tr>
                        <tr>
                            <td colspan="2">{{ (!empty($other->applicant_other_activity_detail->state->name) ? $other->applicant_other_activity_detail->state->name : '') }}</td>
                        </tr>
                        <tr>
                            <td colspan="2">{{ (!empty($other->applicant_other_activity_detail->country->name) ? ucwords(strtolower($other->applicant_other_activity_detail->country->name)) : '') }}</td>
                        </tr>
                        <tr>
                            <td width="20%">Tel : {{ (!empty($other->applicant_other_activity_detail->phone) ? $other->applicant_other_activity_detail->phone : '') }}</td>
                            <td>Fax : {{ (!empty($other->applicant_other_activity_detail->fax) ? $other->applicant_other_activity_detail->fax : '') }}</td>
                        </tr>
                        <tr>
                            <td colspan="2">{{ (!empty($other->applicant_other_activity_detail->email) ? $other->applicant_other_activity_detail->email : '') }}</td>
                        </tr>
                    </table> --}}
                    <hr />

                    <table width="100%" border="0">
                        <tr>
                            <td width="50%">{{ (!empty($phd) ? (!empty($phd->user->name) ? $phd->user->name : (!empty($jpn->user->name) ? $jpn->user->name : 'Pegawai Hutan Daerah')) : 'Pegawai Hutan Daerah') }}</td>
                            <td width="50%">No Rujukan : {{ $applicant->number }}</td>
                        </tr>
                        <tr>
                            <td width="50%">{{ (!empty($phd_data->address) ? $phd_data->address : 'Alamat Pejabat Hutan Daerah') }}<br /></td>
                            <td width="50%">Tarikh : {{ date('d/m/Y') }}</td>
                        </tr>
                    </table>
                    <br />
                    <p>Tuan / Puan, </p>

                    <p style="text-transform: uppercase;"><strong>Permohonan Menjalankan Aktiviti {{ (!empty($other->applicant_other_activity_detail->name) ? $other->applicant_other_activity_detail->name : '') }} di {{ ($other->type == 'hsk' ? (!empty($other->permanent_forest->name) ? $other->permanent_forest->name : '') : (!empty($other->eco_park->name) ? $other->eco_park->name : '')) }} 
                        <br />No Permohonan : {{ $applicant->number }}</strong></p>

                        <p><strong>Dengan segala hormatnya, saya merujuk kepada perkara diatas.</strong></p>

                        <p><strong>1. Maklumat aktiviti adalah seperti berikut:</strong></p>
                        <table width="100%" border="0" cellspacing="0" cellpadding="2" style="margin: 0 auto">
                            <tr>
                                <th style="text-align: left; width: 30%">Nama Aktiviti</th>
                                <td colspan="3">{{ (!empty($other->applicant_other_activity_detail->name) ? $other->applicant_other_activity_detail->name : '') }}</td>
                            </tr>
                            <tr>
                                <th style="text-align: left; width: 30%">Tarikh</th>
                                <td width="30%">{{ (!empty($other->applicant_other_activity_detail->starting_date) ? date('d/m/Y', strtotime($other->applicant_other_activity_detail->starting_date)) : '') }}</td>
                                <th style="text-align: left">Hingga</th>
                                <td width="30%">{{ (!empty($other->applicant_other_activity_detail->ending_date) ? date('d/m/Y', strtotime($other->applicant_other_activity_detail->ending_date)) : '') }}</td>
                            </tr>
                            <tr>
                                <th style="text-align: left; width: 30%">Lokasi</th>
                                <td colspan="3">{{ ($other->type == 'hsk' ? (!empty($other->permanent_forest->name) ? $other->permanent_forest->name : '') : (!empty($other->eco_park->name) ? $other->eco_park->name : '')) }}</td>
                            </tr>
                            <tr>
                                <th style="text-align: left; width: 30%">Bilangan Peserta</th>
                                <td colspan="3">{{ (!empty($other->applicant_other_activity_detail->participant) ? $other->applicant_other_activity_detail->participant : '') }}</td>
                            </tr>
                            <tr>
                                <th style="text-align: left; width: 30%">Tarikh Permohonan</th>
                                <td colspan="3">{{ (!empty($other->applicant_other_activity_declaration->application_date) ? date('d/m/Y', strtotime($other->applicant_other_activity_declaration->application_date)) : '') }}</td>
                            </tr>
                        </table>
                        <br>
                        <p><strong>3. {{ (!empty($other->applicant_other_activity_detail->description) ? $other->applicant_other_activity_detail->description : '') }}</strong></p>
                        <p>4. Saya mengaku bahawa maklumat-maklumat yang diberikan di atas adalah benar. Pihak kerajaan tidak akan dipertanggungjawabkan jika terdapat sebarang kesulitan yang timbul akibat maklumat yang tidak benar. Keselamatan pemohon dan para peserta semasa menjalankan aktiviti adalah dibawah tanggungjawab sendiri.</p>
                        <p>Yang Benar, </p>
                        {{ (!empty($other->applicant_other_activity_declaration->name) ? $other->applicant_other_activity_declaration->name : '') }}<br />
                        {{ (!empty($other->applicant_other_activity_declaration->ic_number) ? $other->applicant_other_activity_declaration->ic_number : '') }}<br />
                        {{ (!empty($other->applicant_other_activity_declaration->application_date) ? date('d/m/Y', strtotime($other->applicant_other_activity_declaration->application_date)) : '') }}
                    </div>
                </div>
            <h4 class="text-center" style="margin-top: 100px;">Permohonan Anda Telah Berjaya Dihantar Dan Akan Diproses <br><i>Your Application Has Been Successfully Delivered And Will Be Processed</i></h4>
            <div class="text-center" style="margin: 20px 0 10px 0">
                <div class="row" style="margin-bottom: 100px;">
                    <div class="col-md-6">
                        <div class="pull-right">
                            <a href="{{ url('aktiviti-lain/'. request()->segment(2) .'/download') }}" class="btn btn-success"><i class="material-icons">file_download</i></a><br />
                            Muat Turun / <i>Download</i>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="col-md-6">
                        <div class="pull-left">
                            <a href="javascript:void(0)" class="btn btn-primary" id="print"><i class="material-icons">print</i></a><br />
                            Cetak / <i>Print</i>
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
    @include('partials.script.othersactivity')
@endsection
@section('modal')
    @include('partials.modal_delete')
    @include('partials.modal_form')
@endsection