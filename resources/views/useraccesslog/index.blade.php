@extends('layouts.panel')

@section('content')
<div class="row">
    <div class="col-md-12">
        @include('flash::message')
    </div>

    <div class="col-md-12">
        <div class="card">
            <div class="card-header" data-background-color="red">
                <h4 class="title pull-left">Audit Trail Access Pengguna</h4>
                
                <span class="clearfix"></span>
            </div>
            <div class="card-content">
                <div class="row">
                    <div class="col-sm-3 col-sm-offset-9">
                        {!! Form::open(['url' => route('state-forestry-department.index'), 'method' => 'get']) !!}
                        <div class="input-group">
                            {{ Form::text('search', old('search'), ['class' => 'form-control', 'placeholder' => 'Pencarian...']) }}
                            <span class="input-group-addon">
                                <button type="submit" class="btn btn-white btn-round btn-just-icon">
                                    <i class="material-icons">search</i>
                                    <div class="ripple-container"></div>
                                </button>
                            </span>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>

                <table class="table table-bordered">
                    <thead>
                    <tr class="active">
                        <th style="width: 1%">#</th>
                        <th>Nama Pengguna</th>
                        <th>Peranan Pengguna</th>
                        <th style="text-align: center">Masa/Tarikh Log Masuk</th>
                        <th style="text-align: center">Masa/Tarikh Log Keluar</th>
                        <th style="width: 1%"></th>
                    </tr>
                    </thead>
                    <tbody>
                        @if(!$logs->isEmpty())
                            @php($index = 1)
                            @foreach($logs as $log)
                            <tr>
                                <td style="width: 1%">{{ $index++ }}</td>
                                <td>{{ $log->user->name }}</td>
                                <td>{{ $log->user->user_role2->role->name }}</td>
                                <td style="text-align: center">{{ date('d/m/Y H:i:s', strtotime($log->login_date)) }}</td>
                                <td style="text-align: center">{{ ($log->logout_date != '0000-00-00 00:00:00' ? date('d/m/Y H:i:s', strtotime($log->logout_date)) : '-') }}</td>
                                <td class="td-actions text-right">
                                    <a type="button" class="btn btn-danger btn-sm"
                                       data-toggle="modal"
                                       data-target="#modal-delete"
                                       data-action="{{ url('audit-trail-access/' . $log->id) }}"
                                       data-title="Delete Confirmation!"
                                       data-message="You are about to delete this record, this procedure is irreversible. Do you want to proceed?">
                                        <i class="material-icons">clear</i>
                                        <div class="ripple-container"></div>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6" align="center">No records found!</td>
                            </tr>
                        @endif
                    </tbody>
                </table>

                {{ $logs->links() }}
            </div>
        </div>
    </div>
</div>
@endsection


@section('modal')
    @include('partials.modal_delete')
    @include('partials.modal_form')
@endsection
