@extends('layouts.panel')

@section('content')
<div class="row">
    <div class="col-md-12">
        @if(session()->has('status'))
            @if(session()->get('status') == 'success-completed')
                <div class="alert alert-success">{{ session()->get('status-text') }}</div>
            @elseif(session()->get('status') == 'success-finish')
                <div class="alert alert-success">Success, aktiviti selesai</div>
            @elseif(session()->get('status') == 'success-cancel')
                <div class="alert alert-success">Success, aktiviti dibatalkan</div>
            @elseif(session()->get('status') == 'success-delete')
                <div class="alert alert-success">Permohonan telah berjaya dihapuskan</div>
            @endif
        @endif
    </div>

    <div class="card card-nav-tabs">
        <div class="card-header" data-background-color="green">
            <h4 class="title">Senarai Status Permohonan</h4>
            <p class="category">Senarai status permohonan</p>
        </div>
        
        <div class="card-content">
            {{ Form::open(['url' => url('applicant-status'), 'method' => 'get']) }}
                <div class="row">
                    <div class="col-md-8 col-md-offset-4">

                        <div class="row">
                            {{-- <div class="col-md-3 col-md-offset-1">
                                <input type="text" class="form-control" name="ic" value="{{ request()->ic }}" placeholder="IC Number">
                            </div> --}}
                            <div class="col-md-offset-4 col-md-3">
                                <select class="form-control select2" name="type" data-placeholder="Jenis Permohonan" style="width: 100%">
                                    <option></option>
                                    <option value="hiking"{{ (request()->type == 'hiking' ? ' selected' : '') }}>Aktiviti Pendakian</option>
                                    <option value="convenience"{{ (request()->type == 'convenience' ? ' selected' : '') }}>Tempahan Kemudahan</option>
                                    <option value="other"{{ (request()->type == 'other' ? ' selected' : '') }}>Lain-lain Aktiviti</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select class="form-control select2" name="status" data-placeholder="Status Permohonan" style="width: 100%">
                                    <option></option>
                                    <option value="processed"{{ (request()->status == 'processed' ? ' selected' : '') }}>Baru</option>
                                    <option value="completed"{{ (request()->status == 'completed' ? ' selected' : '') }}>Diluluskan & Menunggu Bayaran</option>
                                    <option value="finished"{{ (request()->status == 'finished' ? ' selected' : '') }}>Selesai</option>
                                    <option value="canceled"{{ (request()->status == 'canceled' ? ' selected' : '') }}>Batal</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary btn-just-icon" style="margin: 0; padding: 8px">
                                    <i class="material-icons">search</i>
                                    <div class="ripple-container"></div>
                                </button>
                                <a href="{{ url('applicant-status') }}" class="btn btn-default btn-just-icon" style="margin: 0; padding: 8px">
                                    <i class="material-icons">autorenew</i>
                                </a>
                            </div>
                        </div>                        
                    </div>
                </div>
            {{ Form::close() }}
            <div style="">
                <table class="table table-bordered">
                    <thead>
                        @if(auth()->user()->hasRole(['super', 'admin']))
                            <tr>
                                <td colspan="8">
                                    <a href="javascript:void(0)" id="del_batch" class="btn btn-danger btn-sm pull-right">Hapus</a>
                                </td>
                            </tr>
                        @endif
                        <tr class="active">
                            @if(auth()->user()->hasRole(['super', 'admin']))
                                <th>#</th>
                            @endif
                            <th style="width: 1%">No.</th>
                            <th style="text-align: center; width: 35%">Maklumat<br /> Permohonan</th>
                            <th style="text-align: center; width: 40%">Keterangan</th>
                            <th style="text-align: center; width: 10%">Jumlah<br /> Perlu<br /> Dibayar</th>
                            <th style="text-align: center">Status</th>
                            <th style="text-align: center; width: 10%">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($index = (($statuses->currentPage() - 1) * $statuses->perpage()) + 1)
                        @if(!$statuses->isEmpty())
                            @foreach($statuses as $status)
                                <tr>
                                    @if(auth()->user()->hasRole(['super', 'admin']))
                                        <td><input type="checkbox" class="checked" value="{{ $status->id }}"></td>
                                    @endif
                                    <td>{{ $index++ }}</td>
                                    <td>
                                        No Permohonan: <strong>{{ (!empty($status->number) ? $status->number : '') }}</strong> <br />
                                        Tarikh Permohonan: <strong>{{ date('d/m/Y', strtotime($status->created_at)) }}</strong><br />
                                        Jenis Permohonan: 
                                        @if($status->type == 'hiking')
                                            <strong>Aktiviti Pendakian</strong>
                                        @elseif($status->type == 'convenience')
                                            <strong>Tempahan Kemudahan</strong>
                                        @elseif($status->type == 'other')
                                            <strong>Lain-lain Aktiviti</strong>
                                        @endif
                                        <br />
                                        Tarikh Mula:
                                        @if($status->type == 'hiking')
                                            <strong>{{ date('d/m/Y', strtotime($status->hikingInformation->starting_date)) }}</strong>
                                        @elseif($status->type == 'other')
                                            @if(!empty($status->applicantOtherActivity->applicant_other_activity_detail->starting_date))
                                                <strong>{{ date('d/m/Y', strtotime($status->applicantOtherActivity->applicant_other_activity_detail->starting_date)) }}</strong>
                                            @else
                                             - 
                                            @endif
                                            
                                        @elseif($status->type == 'convenience')
                                            {{-- <strong>{{ date('d/m/Y', strtotime($status->applicantConvenience->starting_date)) }}</strong> --}}
                                        @endif
                                        <br />
                                        Tarikh Akhir:
                                        @if($status->type == 'hiking')
                                            <strong>{{ date('d/m/Y', strtotime($status->hikingInformation->ending_date)) }}</strong>
                                        @elseif($status->type == 'other')
                                            @if(!empty($status->applicantOtherActivity->applicant_other_activity_detail->starting_date))
                                                <strong>{{ date('d/m/Y', strtotime($status->applicantOtherActivity->applicant_other_activity_detail->ending_date)) }}</strong>
                                            @else
                                             - 
                                            @endif
                                            
                                        @elseif($status->type == 'convenience')
                                            {{-- <strong>{{ date('d/m/Y', strtotime($status->applicantConvenience->ending_date)) }}</strong> --}}
                                        @endif
                                        <br />
                                        @if($status->type == 'other')
                                            Negeri: <strong>{{ (!empty($status->applicantOtherActivity->state->name) ? $status->applicantOtherActivity->state->name : '-') }}</strong><br />
                                            Daerah: <strong>{{ (!empty($status->applicantOtherActivity->area->name) ? $status->applicantOtherActivity->area->name : '-') }}</strong><br />
                                            @if($status->applicantOtherActivity->type == 'hsk')
                                                Tempat: <strong>{{ (!empty($status->applicantOtherActivity->permanent_forest->name) ? $status->applicantOtherActivity->permanent_forest->name : '') }}</strong>
                                            @else
                                                Tempat: <strong>{{ (!empty($status->applicantOtherActivity->eco_park->name) ? $status->applicantOtherActivity->eco_park->name : '') }}</strong>
                                            @endif

                                        @elseif($status->type == 'hiking')
                                            Negeri: <strong>{{ (!empty($status->hikingLocation->state->name) ? $status->hikingLocation->state->name : '-') }}</strong><br />
                                            Daerah: <strong>{{ (!empty($status->hikingLocation->area->name) ? $status->hikingLocation->area->name : '-') }}</strong><br />
                                            Tempat: <strong>{{ (!empty($status->hikingInformation->mountain->name) ? $status->hikingInformation->mountain->name : '-') }}</strong>
                                        @elseif($status->type == 'convenience')
                                            Negeri: <strong>{{ (!empty($status->applicantConvenience->state->name) ? $status->applicantConvenience->state->name : '-') }}</strong><br />
                                            Daerah: <strong>{{ (!empty($status->applicantConvenience->area->name) ? $status->applicantConvenience->area->name : '-') }}</strong><br />
                                            Tempat: <strong>{{ (!empty($status->applicantConvenience->eco_park->name) ? $status->applicantConvenience->eco_park->name : '-') }}</strong>
                                        @endif 
                                    </td>
                                    <td>
                                        @if($status->type == 'hiking')
                                            @if($status->hikingParticipant->isEmpty())
                                                <p class="text-center">Tiada Maklumat</p>
                                            @else
                                                
                                                Jumlah Peserta: {{ $status->hikingInformation->participants_total }}<br /><br />
                                                @php($hikers = 1)
                                                
                                                @foreach($status->hikingParticipant as $participant)
                                                    {{ $hikers++ }}. 
                                                    {{ $participant->hikingBiodata->fullname }} {{ (in_array($participant->id, $status->hikingGuide->pluck('participant_id')->toArray()) ? '(Malim)' : '') }}
                                                    <br />
                                                @endforeach
                                                
                                            @endif

                                        @elseif($status->type == 'convenience')
                                            @if(!empty($status->applicantConvenience))
                                                <table border="0" width="80%" style="margin: 0 auto;">
                                                    @php($num = 1)
                                                    @foreach($status->applicant_convenience as $convenience)
                                                        @if($convenience->convenience_category_id == '2' OR $convenience->convenience_category_id == '3')
                                                            
                                                        @else
                                                            <tr>
                                                                <td width="1%" valign="top" align="left">{{ $num }}.</td>
                                                                <td width="70%" valign="top">{{ $convenience->convenience_category->name }} - {{ $convenience->applicant_convenience_unit->convenience_sub_category->name }}</td>
                                                                <td width="5%" valign="top">:</td>
                                                                <td valign="top"> {{ $convenience->participant }} Unit</td>
                                                            </tr>
                                                        @endif
                                                        @php($num++)
                                                    @endforeach
                                                </table>
                                            @else
                                                <p class="text-center">Tiada maklumat</p>
                                            @endif
                                        @else
                                            <p class="text-center">N/A</p>
                                        @endif
                                    </td>
                                    <td align="right">
                                        RM {{ $status->amount }}
                                    </td>
                                    <td>
                                        @if($status->status == 'processed')
                                            Baru
                                        @elseif($status->status == 'completed')
                                            Lulus & Menunggu Bayaran
                                        @elseif($status->status == 'finished')
                                            Selesai
                                        @elseif($status->status == 'canceled')
                                            Batal
                                        @endif
                                    </td>
                                    <td>
                                        @if(auth()->user()->hasRole(['super', 'admin', 'pegawai_hutan_daerah']))
                                            @if($status->status == 'processed')
                                                <a href="{{ url('applicant-status/view/' . $status->type . '/' . $status->id) }}" class="btn btn-primary btn-sm btn-block">Luluskan</a>
                                                {{-- <a href="{{ url('applicant-status/complete/' . $status->id) }}" class="btn btn-primary btn-sm btn-block">Luluskan</a> --}}
                                            @elseif($status->status == 'completed')
                                                <a type="button" class="btn btn-primary btn-sm btn-block"
                                                   data-toggle="modal"
                                                   data-target="#modal-form"
                                                   data-action="{{ route('applicant-status.edit', $status->id) }}"
                                                   data-title="Masukan No Resit">
                                                    Telah Dibayar
                                                </a>
                                                {{-- <a href="{{ url('applicant-status/finish/' . $status->id) }}" class="btn btn-primary btn-sm btn-block">Telah Dibayar</a> --}}
                                            @endif

                                            @if($status->status == 'processed' OR $status->status == 'completed')
                                                <a href="{{ url('applicant-status/cancel/' . $status->id) }}" class="btn btn-danger btn-sm btn-block">Batal</a>
                                            @elseif($status->status == 'finished')
                                                {{-- <button class="btn btn-success btn-sm btn-block" disabled>Selesai</button> --}}
                                                @if($status->type == 'convenience')
                                                    <a href="{{ url('applicant-status/convenience/' . $status->id) }}" class="btn btn-default btn-xs btn-block"><i class="material-icons">remove_red_eye</i></a>
                                                @elseif($status->type == 'other')
                                                    <a href="{{ url('applicant-status/other-activities/' . $status->id) }}" class="btn btn-default btn-xs btn-block"><i class="material-icons">remove_red_eye</i></a>
                                                @elseif($status->type == 'hiking')
                                                    <a href="{{ url('applicant-status/hiking-activity/' . $status->id) }}" class="btn btn-default btn-xs btn-block"><i class="material-icons">remove_red_eye</i></a>
                                                @endif
                                            @elseif($status->status == 'canceled')
                                                <button class="btn btn-danger btn-sm btn-block" disabled>Batal</button>
                                            @endif
                                        @else
                                            @if($status->type == 'convenience')
                                                <a href="{{ url('applicant-status/convenience/' . $status->id) }}" class="btn btn-default btn-xs btn-block"><i class="material-icons">remove_red_eye</i></a>
                                            @elseif($status->type == 'other')
                                                <a href="{{ url('applicant-status/other-activities/' . $status->id) }}" class="btn btn-default btn-xs btn-block"><i class="material-icons">remove_red_eye</i></a>
                                            @elseif($status->type == 'hiking')
                                                <a href="{{ url('applicant-status/hiking-activity/' . $status->id) }}" class="btn btn-default btn-xs btn-block"><i class="material-icons">remove_red_eye</i></a>
                                            @endif
                                        @endif
                                        @if(auth()->user()->hasRole(['super', 'admin']))
                                            <a href="javascript:void(0)" data-toggle="modal" data-target="#modal-delete" data-title="Pengesahan" data-action="{{ url('applicant-status/delete/' . $status->id) }}" data-message="Adakah anda pasti untuk memadam rekod {{ (!empty($status->number) ? $status->number : '') }}?" class="btn btn-danger btn-sm btn-block">Hapus</a>
                                            {{-- <a href="{{ url('applicant-status/delete/' . $status->id) }}" class="btn btn-danger btn-sm btn-block">Hapus</a> --}}

                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
                @php /*
                <table class="table table-bordered" width="150%">
                    <thead>
                        @if(auth()->user()->hasRole(['super', 'admin']))
                            <tr>
                                <td colspan="13">
                                    <a href="javascript:void(0)" id="del_batch" class="btn btn-danger btn-sm">Hapus</a>
                                </td>
                            </tr>
                        @endif
                        
                        <tr class="active">
                            @if(auth()->user()->hasRole(['super', 'admin']))
                                    <th>#</th>
                            @endif
                            
                            <th style="width: 1%">No.</th>
                            <th>No Permohonan</th>
                            <th>Tarikh Permohonan</th>
                            <th style="width: 20%">Nama Pemohon</th>
                            <th style="width: 20%">No K/P & Pasport</th>
                            <th style="width: 20%">Jenis Permohonan</th>
                            <th style="width: 30%">Lokasi</th>
                            <th style="width: 20%">Tarikh Aktiviti <br />Mula & Hingga</th>
                            <th style="width: 20%">Bil Peserta / Unit</th>
                            <th style="width: 20%">Jumlah Perlu<br />Dibayar</th>
                            <th>Status</th>
                            <th style="text-align: center; width: 5%">Tindakan</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @php($index = (($statuses->currentPage() - 1) * $statuses->perpage()) + 1)
                        @if(!$statuses->isEmpty())
                        @foreach($statuses as $status)

                             <tr>
                                @if(auth()->user()->hasRole(['super', 'admin']))
                                    <td><input type="checkbox" class="checked" value="{{ $status->id }}"></td>
                                @endif
                                
                                <td style="width: 1%">{{ $index++ }}</td>
                                <td>{{ (!empty($status->number) ? $status->number : '') }}</td>
                                <td>{{ date('d/m/Y', strtotime($status->created_at)) }}</td>
                                <td>{{ $status->user->name }}</td>
                                <td>{{ ($status->user->profile->citizen == '1' ? (!empty($status->user->profile->nokp) ? $status->user->profile->nokp : '-') : (!empty($status->profile->passport) ? $status->profile->passport : '-')) }}</td>
                                <td>
                                    @if($status->type == 'hiking')
                                        Aktiviti Pendakian
                                    @elseif($status->type == 'convenience')
                                        Tempahan Kemudahan
                                    @elseif($status->type == 'other')
                                        Lain-lain Aktiviti
                                    @endif
                                </td>
                                <td width="15%">
                                    @if($status->type == 'other')
                                        @if($status->applicantOtherActivity->type == 'hsk')
                                            {{ (!empty($status->applicantOtherActivity->permanent_forest->name) ? $status->applicantOtherActivity->permanent_forest->name : '') }}
                                        @else
                                            {{ (!empty($status->applicantOtherActivity->eco_park->name) ? $status->applicantOtherActivity->eco_park->name : '') }}
                                        @endif
                                    @elseif($status->type == 'hiking')
                                        {{ (!empty($status->hikingInformation->permanent_forest->name) ? $status->hikingInformation->permanent_forest->name : '') }}
                                    @elseif($status->type == 'convenience')
                                        {{ (!empty($status->applicant_convenience->eco_park->name) ? $status->applicant_convenience->eco_park->name : '-') }}
                                    @endif
                                </td>
                                
                                <td>
                                    @if($status->type == 'hiking')
                                        {{ date('d/m/Y', strtotime($status->hikingInformation->starting_date)) }} - {{ date('d/m/Y', strtotime($status->hikingInformation->ending_date)) }}
                                    @elseif($status->type == 'other')
                                        @if(!empty($status->applicantOtherActivity->applicant_other_activity_detail->starting_date))
                                            {{ date('d/m/Y', strtotime($status->applicantOtherActivity->applicant_other_activity_detail->starting_date)) }} - {{ date('d/m/Y', strtotime($status->applicantOtherActivity->applicant_other_activity_detail->ending_date)) }}
                                        @else
                                         - 
                                        @endif
                                        
                                    @elseif($status->type == 'convenience')
                                        {{ date('d/m/Y', strtotime($status->applicantConvenience->starting_date)) }} - {{ date('d/m/Y', strtotime($status->applicantConvenience->ending_date)) }}
                                    @endif
                                </td>
                                <td>
                                    @if($status->type == 'hiking')
                                        @if($status->hikingParticipant->isEmpty())
                                            Empty
                                        @else
                                            @php($hiker = 1)
                                            @foreach($status->hikingParticipant as $participant)
                                                {{ $hiker++ }}. {{ $participant->hikingBiodata->fullname }}
                                                <a class="btn btn-default btn-xs" href="{{ url('applicant-status/hiker/' . $status->id . '/' . $participant->id) }}"><i class="material-icons">remove_red_eye</i></a>
                                                <br />
                                            @endforeach
                                        @endif
                                    @elseif($status->type == 'convenience')
                                        @if($status->applicantConvenience->convenience_category_id == '2' OR $status->applicantConvenience->convenience_category_id == '3')
                                            {{ $status->applicantConvenience->participant }} Orang
                                        @else
                                            {{ $status->applicantConvenience->participant }} Unit
                                        @endif
                                    @elseif($status->type == 'other')
                                        {{ (!empty($status->applicantOtherActivity->applicant_other_activity_detail->participant) ? $status->applicantOtherActivity->applicant_other_activity_detail->participant : '0') }} Orang
                                    @endif
                                </td>
                                <td>RM {{ $status->amount }}</td>
                                <td>
                                    @if($status->status == 'processed')
                                        Baru
                                    @elseif($status->status == 'completed')
                                        Lulus & Menunggu Bayaran
                                    @elseif($status->status == 'finished')
                                        Selesai
                                    @elseif($status->status == 'canceled')
                                        Batal
                                    @endif
                                </td>
                                <td width="5%">
                                    @if(auth()->user()->hasRole(['super', 'admin', 'pegawai_hutan_daerah']))
                                        @if($status->status == 'processed')
                                            <a href="{{ url('applicant-status/view/' . $status->type . '/' . $status->id) }}" class="btn btn-primary btn-sm btn-block">Luluskan</a>
                                            {{-- <a href="{{ url('applicant-status/complete/' . $status->id) }}" class="btn btn-primary btn-sm btn-block">Luluskan</a> --}}
                                        @elseif($status->status == 'completed')
                                            <a type="button" class="btn btn-primary btn-sm btn-block"
                                               data-toggle="modal"
                                               data-target="#modal-form"
                                               data-action="{{ route('applicant-status.edit', $status->id) }}"
                                               data-title="Masukan No Resit">
                                                Telah Dibayar
                                            </a>
                                            {{-- <a href="{{ url('applicant-status/finish/' . $status->id) }}" class="btn btn-primary btn-sm btn-block">Telah Dibayar</a> --}}
                                        @endif

                                        @if($status->status == 'processed' OR $status->status == 'completed')
                                            <a href="{{ url('applicant-status/cancel/' . $status->id) }}" class="btn btn-danger btn-sm btn-block">Batal</a>
                                        @elseif($status->status == 'finished')
                                            {{-- <button class="btn btn-success btn-sm btn-block" disabled>Selesai</button> --}}
                                            @if($status->type == 'convenience')
                                                <a href="{{ url('applicant-status/convenience/' . $status->id) }}" class="btn btn-default btn-xs btn-block"><i class="material-icons">remove_red_eye</i></a>
                                            @elseif($status->type == 'other')
                                                <a href="{{ url('applicant-status/other-activities/' . $status->id) }}" class="btn btn-default btn-xs btn-block"><i class="material-icons">remove_red_eye</i></a>
                                            @elseif($status->type == 'hiking')
                                                <a href="{{ url('applicant-status/hiking-activity/' . $status->id) }}" class="btn btn-default btn-xs btn-block"><i class="material-icons">remove_red_eye</i></a>
                                            @endif
                                        @elseif($status->status == 'canceled')
                                            <button class="btn btn-danger btn-sm btn-block" disabled>Batal</button>
                                        @endif
                                    @else
                                        @if($status->type == 'convenience')
                                            <a href="{{ url('applicant-status/convenience/' . $status->id) }}" class="btn btn-default btn-xs btn-block"><i class="material-icons">remove_red_eye</i></a>
                                        @elseif($status->type == 'other')
                                            <a href="{{ url('applicant-status/other-activities/' . $status->id) }}" class="btn btn-default btn-xs btn-block"><i class="material-icons">remove_red_eye</i></a>
                                        @elseif($status->type == 'hiking')
                                            <a href="{{ url('applicant-status/hiking-activity/' . $status->id) }}" class="btn btn-default btn-xs btn-block"><i class="material-icons">remove_red_eye</i></a>
                                        @endif
                                    @endif
                                    @if(auth()->user()->hasRole(['super', 'admin', 'pegawai_hutan_daerah']))
                                        <a href="{{ url('applicant-status/delete/' . $status->id) }}" class="btn btn-danger btn-sm btn-block">Hapus</a>
                                    @endif
                                </td>
                                {{-- <td class="td-actions text-right" valign="middle">
                                    @if($status->type == 'convenience')
                                        <a href="{{ url('applicant-status/convenience/' . $status->id) }}" class="btn btn-default btn-xs btn-block"><i class="material-icons">remove_red_eye</i></a>
                                    @elseif($status->type == 'other')
                                        <a href="{{ url('applicant-status/other-activities/' . $status->id) }}" class="btn btn-default btn-xs btn-block"><i class="material-icons">remove_red_eye</i></a>
                                    @elseif($status->type == 'hiking')
                                        <a href="{{ url('applicant-status/hiking-activity/' . $status->id) }}" class="btn btn-default btn-xs btn-block"><i class="material-icons">remove_red_eye</i></a>
                                    @endif
                                </td> --}}
                            </tr>
                        @endforeach
                        @else
                            <tr>
                                <td colspan="10" align="center">No records found!</td>
                            </tr>
                        @endif
                    </tbody>
                </table> */
                @endphp
            </div>
            {{ $statuses->links() }}
        </div>
    </div>
</div>
<script type="text/javascript">
    (function($){
        'use strict';

        $(document).ready(function(){
            $('body').on('click', '#del_batch', function(e){
                e.preventDefault();

                var id = $('.checked:checked').map(function(){
                    return $(this).val();
                }).get();

                if(confirm('Are you sure?'))
                {
                    $.ajax({
                        type: 'POST',
                        url: '{{ url('applicant-status/delete-batch') }}',
                        data: {
                            ids: JSON.stringify(id),
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(data)
                        {
                            console.log(data);

                            window.location.href = '{{ url('applicant-status') }}';
                        }
                    });
                }

            });


        });

    })(jQuery);
</script>
@endsection



@section('modal')
    @include('partials.modal_delete_get')
    @include('partials.modal_form')
@endsection
