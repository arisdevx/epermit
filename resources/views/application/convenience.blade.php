@extends('account.layouts.backend.panel')

@section('content')
	@include('flash::message')
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
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 1%">No.</th>
                        <th>Negeri</th>
                        <th>Daerah</th>
                        <th>Jenis Kemudahan</th>
                        <th>Tarikh Mula</th>
                        <th>Tarikh Akhir</th>
                        <th>Jumlah Peserta</th>
                        <th>Jumlah Hari</th>
                        <th>Harga</th>
                    </tr>
                </thead>
                <tbody>
                    @php($index = 1)
                    @php($days = 0)
                    @php($participan_total = 0)
                    @php($amount_total = 0)
                    @foreach($applicant->applicantConvenience as $convenience)
                        <tr>
                            <td style="width: 1%">{{ $index }}</td>
                            <td>{{ (!empty($convenience->state->name) ? $convenience->state->name : '') }}</td>
                            <td>{{ (!empty($convenience->area->name) ? $convenience->area->name : '') }}</td>
                            <td>{{ $convenience->convenience->name }}</td>
                            <td>{{ date('d/m/Y', strtotime($convenience->starting_date)) }}</td>
                            <td>{{ date('d/m/Y', strtotime($convenience->ending_date)) }}</td>
                            <td>{{ $convenience->participant }}</td>
                            <td>{{ $convenience->days_total }}</td>
                            <td>RM {{ $convenience->amount }}</td>
                        </tr>
                        @php($days += $convenience->days_total)
                        @php($participan_total += $convenience->participant)
                        @php($amount_total += $convenience->amount)
                    @endforeach
                    <tr>
                        <td colspan="6" align="right">Total</td>
                        <td>{{ $participan_total }}</td>
                        <td>{{ $days }}</td>
                        <td>RM {{ $amount_total }}</td>
                    </tr>
                </tbody>
            </table>
            <a href="{{ url('account/member-application-status') }}" class="btn btn-default">Kembali</a>
        </div>
    </div>
</div>
@endsection

{{-- @section('scripts')
	@include('account.partials.script.applicationcancel')
@endsection --}}


@section('modal')
    @include('partials.modal_delete')
    @include('partials.modal_form')
@endsection