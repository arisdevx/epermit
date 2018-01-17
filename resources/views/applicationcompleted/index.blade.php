@extends('layouts.panel')

@section('content')
<div class="row">
    <div class="col-md-12">
        @include('flash::message')
    </div>

    <div class="card card-nav-tabs">
        <div class="card-header" data-background-color="green">
            <h4 class="title">Status Permohonan Diluluskan</h4>
            <p class="category">Senarai permohonan diluluskan</p>
        </div>

        <div class="card-content">
            <table class="table">
                <thead>
                    <tr>
                        <th style="width: 1%">No.</th>
                        <th>Tarikh</th>
                        <th>Permohonan</th>
                        <th>Peserta</th>
                        <th>Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    @php($index = 1)
                    @foreach($statuses as $status)
                        <tr>
                            <td style="width: 1%">{{ $index++ }}</td>
                            <td>{{ (!empty($status->created_at) ? date('d/m/Y', strtotime($status->created_at)) : '-') }}</td>
                            <td>
                                @if($status->type == 'hiking')  
                                    Aktiviti Pendakian
                                @elseif($status->type == 'convenience')
                                    Tempahan Kemudahan
                                @elseif($status->type == 'other')
                                    Lain-lain Aktiviti
                                @endif
                            </td>
                            <td>

                                @if(!empty($status->hikingInformation->participants_total))
                                    {{ $status->hikingInformation->participants_total }} Orang
                                @elseif(!empty($status->applicantOtherActivity->participant))
                                    {{ $status->applicantOtherActivity->participant }} Orang
                                @endif
                            </td>
                            <td>
                                @if($status->type == 'hiking')
                                    <a href="">Lihat</a>
                                @elseif($status->type == 'convenience')
                                    <a href="">Lihat</a>
                                @elseif($status->type == 'other')
                                    <a href="">Lihat</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection


@section('modal')
    @include('partials.modal_delete')
    @include('partials.modal_form')
@endsection