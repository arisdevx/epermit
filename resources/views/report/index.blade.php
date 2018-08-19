@extends('layouts.panel')

@section('content')
<div class="row">
    <div class="col-md-12">
        @if(session()->has('status'))
            @if(session()->get('status') == 'success-completed')
                <div class="alert alert-success">Success, menunggu pembayaran</div>
            @elseif(session()->get('status') == 'success-finish')
                <div class="alert alert-success">Success, aktiviti selesai</div>
            @elseif(session()->get('status') == 'success-cancel')
                <div class="alert alert-success">Success, aktiviti dibatalkan</div>
            @endif
        @endif
    </div>

    <div class="card card-nav-tabs">
        <div class="card-header" data-background-color="green">
            <h4 class="title">Laporan Status Permohonan</h4>
            <p class="category">Senarai laporan permohonan</p>
        </div>

        <div class="card-content">

            {{ Form::open(['url' => url('report'), 'method' => 'get']) }}
                <div class="row">
                    <div class="col-md-9 col-md-offset-3">

                        {{-- <div class="row">
                            <div class="col-md-3">
                                <select class="form-control select2" name="type" data-placeholder="Jenis Permohonan" style="width: 100%">
                                    <option></option>
                                     <option value="all"{{ (request()->type == 'all' ? ' selected' : '') }}>Semua</option>
                                    <option value="hiking"{{ (request()->type == 'hiking' ? ' selected' : '') }}>Aktiviti Pendakian</option>
                                    <option value="convenience"{{ (request()->type == 'convenience' ? ' selected' : '') }}>Tempahan Kemudahan</option>
                                    <option value="other"{{ (request()->type == 'other' ? ' selected' : '') }}>Lain-lain Aktiviti</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group label-floating" style="padding-bottom: 0">
                                    
                                    <input class="form-control" name="datefrom" type="date" id="date1" value="{{ request()->datefrom }}">
                                </div>
                                
                            </div>
                            <div class="col-md-3">
                                <div class="form-group label-floating" style="padding-bottom: 0">
                                    
                                    <input class="form-control" name="dateuntil" type="date" id="date2" value="{{ request()->dateuntil }}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <select class="form-control select2" name="status" data-placeholder="Status Permohonan" style="width: 100%">
                                    <option></option>
                                    <option value="all"{{ (request()->status == 'all' ? ' selected' : '') }}>Semua</option>
                                    <option value="processed"{{ (request()->status == 'processed' ? ' selected' : '') }}>Baru</option>
                                    <option value="completed"{{ (request()->status == 'completed' ? ' selected' : '') }}>Diluluskan & Menunggu Bayaran</option>
                                    <option value="finished"{{ (request()->status == 'finished' ? ' selected' : '') }}>Selesai</option>
                                    <option value="canceled"{{ (request()->status == 'canceled' ? ' selected' : '') }}>Batal</option>
                                </select>
                            </div>
                            
                        </div>     --}}
                        <div class="row">
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-3">
                                        <select class="form-control select2" name="year" data-placeholder="Pilih Tahun" style="width: 100%">
                                            <option></option>
                                            @for($i = date('Y'); $i >= (date('Y')-20); $i--)
                                                <option value="{{ $i }}"{{ (request()->get('year') == $i ? ' selected' : '') }}>{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <select class="form-control select2" name="month" data-placeholder="Pilih Bulan" style="width: 100%">
                                            <option></option>
                                            @for($i = 1; $i <= 12; $i++)
                                                @php $month = ($i < 10 ? $i = '0' . $i : $i) @endphp
                                                <option value="{{ $month }}"{{ (request()->get('month') == $month ? ' selected' : '') }}>{{ date('F', strtotime('2018/'. $month .'/01')) }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <select class="form-control select2" name="state" data-placeholder="Pilih Negeri" id="state" style="width: 100%">
                                            <option></option> 
                                            @foreach($states as $state)
                                                <option value="{{ $state->id }}"{{ (request()->get('state') == $state->id ? ' selected' : '') }}>{{ $state->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <select class="form-control select2" name="area" data-placeholder="Pilih Daerah" id="area" style="width: 100%">
                                            <option></option>
                                            @if($areas)
                                                @foreach($areas as $area)
                                                    <option value="{{ $area->id }}"{{ (request()->get('area') == $area->id ? ' selected' : '') }}>{{ $area->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3" style="padding-top: 12px">
                                <select class="form-control select2" name="type" data-placeholder="Pilih Aktiviti" style="width: 100%">
                                    <option></option>
                                    <option value="hiking"{{ (request()->get('type') == 'hiking' ? ' selected' : '') }}>Pendakian</option>
                                    <option value="convenience"{{ (request()->get('type') == 'convenience' ? ' selected' : '') }}>Kemudahan</option>
                                    <option value="other"{{ (request()->get('type') == 'other' ? ' selected' : '') }}>Lain-lain Aktiviti</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-md-offset-9">
                                
                                <button type="submit" class="btn btn-primary btn-just-icon" style="margin: 0px; padding: 8px">
                                    <i class="material-icons">search</i>
                                    <div class="ripple-container"></div>
                                </button>
                                <a href="{{ url('report') }}" class="btn btn-default btn-just-icon" style="margin: 0px; padding: 8px">
                                    <i class="material-icons">autorenew</i>
                                </a>
                                <a href="{{ url('report/export' . (!empty($_SERVER['QUERY_STRING']) ? '?' . $_SERVER['QUERY_STRING'] : '')) }}" class="btn btn-default btn-just-icon" style="margin: 0px; padding: 8px">
                                    <i class="material-icons">print</i>
                                </a>
                                
                                
                            </div>
                        </div>                    
                    </div>
                </div>
            {{ Form::close() }}

            <table class="table table-bordered">
                <thead>
                    <tr class="active">
                        <th style="width: 1%">No.</th>
                        <th>Tarikh Permohonan</th>
                        <th>No Permohonan</th>
                        <th>Nama Pemohon</th>
                        <th>No K/P & Pasport</th>
                        <th>Kategori Permohonan</th>
                        <th>Tarikh Mula</th>
                        <th>Tarikh Akhir</th>
                        <th width="16%">Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    @php($index = (($statuses->currentPage() - 1) * $statuses->perpage()) + 1)
                    @if(!$statuses->isEmpty())
                    @foreach($statuses as $status)
                         <tr>
                            <td style="width: 1%">{{ $index++ }}</td>
                            <td>{{ date('d/m/Y', strtotime($status->created_at)) }}</td>
                            <td>{{ $status->number }}</td>
                            <td>{{ $status->user->name }}</td>
                            <td>
                                @if($status->user->profile->citizen == '1')
                                    {{ $status->user->profile->nokp }}
                                @else
                                    {{ $status->user->profile->passport }}
                                @endif
                            </td>
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
                                @if($status->type == 'hiking')
                                    {{ date('d/m/Y', strtotime($status->hikingInformation->starting_date)) }}
                                @elseif($status->type == 'convenience')
                                    {{ date('d/m/Y', strtotime($status->applicantConvenience->starting_date)) }}
                                @elseif($status->type == 'other')
                                    
                                    {{ date('d/m/Y', strtotime($status->applicantOtherActivity->applicant_other_activity_detail['starting_date'])) }}
                                    
                                @endif
                            </td>
                            <td>
                                @if($status->type == 'hiking')
                                    {{ date('d/m/Y', strtotime($status->hikingInformation->ending_date)) }}
                                @elseif($status->type == 'convenience')
                                    {{ date('d/m/Y', strtotime($status->applicantConvenience->ending_date)) }}
                                @elseif($status->type == 'other')
                                    {{ date('d/m/Y', strtotime($status->applicantOtherActivity->applicant_other_activity_detail['ending_date'])) }}
                                @endif
                            </td>
                            <td>
                                @if($status->type == 'convenience')
                                    <a href="{{ url('report/convenience/' . $status->id . '/pdf') }}" class="btn btn-danger btn-sm">PDF</a>
                                    <a href="{{ url('report/convenience/' . $status->id . '/excel') }}" class="btn btn-success btn-sm">Excel</a>
                                @elseif($status->type == 'other')
                                    <a href="{{ url('report/other-activities/' . $status->id . '/pdf') }}" class="btn btn-danger btn-sm">PDF</a>
                                    <a href="{{ url('report/other-activities/' . $status->id . '/excel') }}" class="btn btn-success btn-sm">Excel</a>
                                @elseif($status->type == 'hiking')
                                    <a href="{{ url('report/hiking-activity/' . $status->id . '/pdf') }}" class="btn btn-danger btn-sm">PDF</a>
                                    <a href="{{ url('report/hiking-activity/' . $status->id . '/excel') }}" class="btn btn-success btn-sm">Excel</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="9" align="center">No records found!</td>
                    </tr>
                    @endif
                </tbody>
            </table>
            {{ $statuses->links() }}
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
    (function($){
        'use strict';
        $(document).ready(function(){
           $('body').on('change', '#state', function(){
                var state_id = $(this).val();

                $.ajax({
                    type: 'POST',
                    url: '{{ url('/report/data/find-area') }}',
                    data: {
                        _token: '{{ csrf_token() }}',
                        state: state_id
                    },
                    success: function(data)
                    {
                        $('#area').select2('destroy').empty().select2({data: data});
                    }
                });
           });
        });
    })(jQuery);
</script>
@endsection
@section('modal')
    @include('partials.modal_delete')
    @include('partials.modal_form')
@endsection