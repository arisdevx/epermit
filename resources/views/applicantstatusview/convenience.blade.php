@extends('layouts.panel')

@section('content')
<div class="row">

    <div class="card card-nav-tabs">
        <div class="card-header" data-background-color="green">
            <h4 class="title">Kajian Semula Tempahan Kemudahan</h4>
            <p class="category">Kajian semula tempahan kemudahan </p>
        </div>

        <div class="card-content">
            <table class="table table-bordered" style="margin-bottom: 10px; width: 30%">
                <thead>
                    <tr>
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
            {{-- <table class="table table-bordered">
                <thead>
                    <tr>
                        <th colspan="2">A. Maklumat Permohonan</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <th width="15%">Negeri</th>
                        <td>{{ (!empty($applicant->applicantConvenience->state->name) ? $applicant->applicantConvenience->state->name : '-') }}</td>
                    </tr>
                    <tr>
                        <th width="15%">Daerah</th>
                        <td>{{ (!empty($applicant->applicantConvenience->area->name) ? $applicant->applicantConvenience->area->name : '-') }}</td>
                    </tr>
                    <tr>
                        <th width="15%">TER/HTN</th>
                        <td>
                            @if($applicant->applicantConvenience->eco_park_type == 'ter')
                                Taman Eko-Rimba (TER)
                            @elseif($applicant->applicantConvenience->eco_park_type == 'htn')
                                Hutan Taman Negeri (HTN)
                            @elseif($applicant->applicantConvenience->eco_park_type == 'hsk')
                                Hutan Simpan Kekal (HSK)
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th width="15%">Nama TER/HTN</th>
                        <td>{{ (!empty($applicant->applicantConvenience->eco_park->name) ? $applicant->applicantConvenience->eco_park->name : '-') }}</td>
                    </tr>
                    <tr>
                        <th width="15%">Tarikh Mula</th>
                        <td>{{ date('d/m/Y', strtotime($applicant->applicantConvenience->starting_date)) }}</td>
                    </tr>
                    <tr>
                        <th width="15%">Tarikh Akhir</th>
                        <td>{{ date('d/m/Y', strtotime($applicant->applicantConvenience->ending_date)) }}</td>
                    </tr>
                    <tr>
                        <th width="15%">Bil. Hari</th>
                        <td>{{ (!empty($applicant->applicantConvenience->days_total) ? $applicant->applicantConvenience->days_total : '-') }} Hari</td>
                    </tr>
                    <tr>
                        <th width="15%">Jenis Kemudahan</th>
                        <td>{{ (!empty($applicant->applicantConvenience->convenience->convenience_category->name) ? $applicant->applicantConvenience->convenience->convenience_category->name : '-') }}</td>
                    </tr>

                    @if($applicant->applicantConvenience->convenience_category_id == '2' OR $applicant->applicantConvenience->convenience_category_id == '3')
                        <tr>
                            <th width="15%">Warganegara</th>
                            <td>
                                @if($applicant->applicantConvenience->nationality == '0')
                                    Bukan Warganegara
                                @else
                                    Warganegara
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th width="15%">Bil. Peserta</th>
                            <td>{{ (!empty($applicant->applicantConvenience->participant) ? $applicant->applicantConvenience->participant : '-') }} Orang</td> 
                        </tr>
                    @else
                        <tr>
                            <th width="15%">Kategori</th>
                            <td>{{ (!empty($applicant->applicantConvenience->convenience->convenience_sub_category->name) ? $applicant->applicantConvenience->convenience->convenience_sub_category->name : '-') }}</td>
                        </tr>
                        <tr>
                            <th width="15%">Jumlah Unit</th>
                            <td>{{ (!empty($applicant->applicantConvenience->participant) ? $applicant->applicantConvenience->participant : '-') }} Unit</td> 
                        </tr>
                    @endif
                </tbody>
            </table> --}}
             <table class="table table-bordered">
                <thead>
                    <tr>
                        <th colspan="6"><strong>A. Maklumat Permohonan</strong></th>
                    </tr>
                    <tr>
                        <th>No</th>
                        <th>Maklumat Permohonan</th>
                        <th>Tarikh Mula</th>
                        <th>Tarikh Akhir</th>
                        <th>Bil Hari</th>
                        <th>Kemudahan</th>
                    </tr>
                </thead>
                <tbody>
                    @if(!$applicant->applicant_convenience->isEmpty())
                        @php($no = 1)
                        @foreach($applicant->applicant_convenience as $convenience)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>
                                    Negeri: <strong>{{ (!empty($convenience->state->name) ? $convenience->state->name : '-') }}</strong><br />
                                    Daerah: <strong>{{ (!empty($convenience->area->name) ? $convenience->area->name : '-') }}</strong><br />
                                    TER/HTN:    <strong>@if($convenience->eco_park_type == 'ter')
                                                    Taman Eko-Rimba (TER)
                                                @elseif($convenience->eco_park_type == 'htn')
                                                    Hutan Taman Negeri (HTN)
                                                @elseif($convenience->eco_park_type == 'hsk')
                                                    Hutan Simpan Kekal (HSK)
                                                @endif
                                                </strong>
                                                <br />
                                    Nama TER/HTN: <strong>{{ (!empty($convenience->eco_park->name) ? $convenience->eco_park->name : '-') }}</strong><br />
                                </td>
                                <td>{{ date('d/m/Y', strtotime($convenience->starting_date)) }}</td>
                                <td>{{ date('d/m/Y', strtotime($convenience->ending_date)) }}</td>
                                <td>{{ (!empty($convenience->days_total) ? $convenience->days_total : '-') }} Hari</td>
                                <td>
                                    @if($convenience->convenience_category_id == '2' OR $convenience->convenience_category_id == '3')
                                        {{ (!empty($convenience->participant) ? $convenience->participant : '-') }} Orang 
                                        @if($applicant->applicantConvenience->nationality == '0')
                                            Bukan Warganegara
                                        @else
                                            Warganegara
                                        @endif
                                    @else
                                        {{ (!empty($convenience->participant) ? $convenience->participant : '-') }} Unit {{ (!empty($convenience->convenience->convenience_category->name) ? $convenience->convenience->convenience_category->name : '-') }} - {{ (!empty($convenience->convenience->convenience_sub_category->name) ? $convenience->convenience->convenience_sub_category->name : '-') }}
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
            <br />
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th colspan="2"><strong>B. Pengesahan Permohonan</strong></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th width="15%">Nama Penuh</th>
                        <td>{{ $applicant->applicant_convenience_declaration->name }}</td>
                    </tr>
                    <tr>
                        <th width="15%">No. K/P / No. Passport / IC</th>
                        <td>{{ $applicant->applicant_convenience_declaration->ic_number }}</td>
                    </tr>
                    <tr>
                        <th width="15%">Tarikh Permohonan</th>
                        <td>{{ date('d/m/Y', strtotime($applicant->applicant_convenience_declaration->application_date)) }}</td>
                    </tr>
                </tbody>
            </table>
             <a href="{{ url('applicant-status') }}" class="btn btn-default">Kembali</a>
            <a href="{{ url('applicant-status/complete/' . $applicant->id) }}" class="btn btn-primary">Luluskan</a>
            
        </div>
    </div>
</div>
@endsection


@section('modal')
    @include('partials.modal_delete')
    @include('partials.modal_form')
@endsection