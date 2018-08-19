@extends('layouts.panel')

@section('content')
<div class="row">

    <div class="card card-nav-tabs">
        <div class="card-header" data-background-color="green">
            <h4 class="title">Kajian Semula Lain-lain Aktiviti</h4>
            <p class="category">Lain-lain Aktiviti</p>
        </div>

        <div class="card-content">
            <table class="table table-bordered" style="margin-bottom: 10px; width: 30%">
                <thead>
                    <tr class="active">
                        <th colspan="2"><strong>Pemohon</strong></th>
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
                        <th colspan="2"><strong>A. Maklumat Pemohon</strong></th>
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
                        <td>{{ (!empty($other->applicant_other_activity_detail->state->name) ? $other->applicant_other_activity_detail->state->name : '') }}</td>
                    </tr>
                    <tr>
                        <td>Negara</td>
                        <td>{{ (!empty($other->applicant_other_activity_detail->country->name) ? ucwords(strtolower($other->applicant_other_activity_detail->country->name)) : '') }}</td>
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
                        <th colspan="2"><strong>B. Pengesahan Pemohon</strong></th>
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
            </table>
            <a href="{{ url('applicant-status') }}" class="btn btn-default">Semula</a>
        </div>
    </div>
</div>
@endsection


@section('modal')
    @include('partials.modal_delete')
    @include('partials.modal_form')
@endsection