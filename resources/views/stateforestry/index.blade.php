@extends('layouts.panel')

@section('content')
<div class="row">
    <div class="col-md-12">
        @include('flash::message')
    </div>

    <div class="col-md-12">
        <div class="card">
            <div class="card-header" data-background-color="red">
                <h4 class="title pull-left">Jabatan Perhutanan Negeri (JPN)</h4>
                <a type="button" class="pull-right cursor-pointer"
                   data-toggle="modal"
                   data-target="#modal-form"
                   data-action="{{ route('state-forestry-department.create') }}"
                   data-title="Tambah JPN"
                >
                    <i class="fa fa-2x fa-plus-circle"></i>
                </a>
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
                        <th>Nama Jabatan Perhutanan Negeri</th>
                        <th>Negeri</th>
                        <th style="text-align: center">Kemaskini</th>
                        <th style="text-align: center">Hapus</th>
                        <th style="width: 1%"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @php($index = 1)
                    @foreach($stateforestries as $stateforestry)
                        <tr>
                            <td>{{ $index++ }}</td>
                            <td>{{ $stateforestry->name }}</td>
                            <td>{{ (!empty($stateforestry->state->name) ? $stateforestry->state->name : '') }}</td>
                            <td align="center">{{ ($stateforestry->update == 'Y' ? 'Ya' : 'Tidak') }}</td>
                            <td align="center">{{ ($stateforestry->delete == 'Y' ? 'Ya' : 'Tidak') }}</td>
                            <td class="td-actions text-right">
                                <a type="button" class="btn btn-primary btn-sm"
                                   data-toggle="modal"
                                   data-target="#modal-form"
                                   data-action="{{ route('state-forestry-department.edit', $stateforestry->id) }}"
                                   data-title="Edit {{ $stateforestry->name }}">
                                    <i class="material-icons">create</i>
                                </a>&nbsp;
                                <a type="button" class="btn btn-danger btn-sm"
                                   data-toggle="modal"
                                   data-target="#modal-delete"
                                   data-action="{{ route('state-forestry-department.destroy', $stateforestry->id) }}"
                                   data-title="Delete Confirmation!"
                                   data-message="You are about to delete {{ $stateforestry->name }} record, this procedure is irreversible. Do you want to proceed?">
                                   <i class="material-icons">clear</i>
                                    <div class="ripple-container"></div>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    @if($stateforestries->isEmpty())
                        <tr>
                            <td class="text-center" colspan="5">No records found!</td>
                        </tr>
                    @endif
                    </tbody>
                </table>

                {{ $stateforestries->links() }}
            </div>
        </div>
    </div>
</div>
@endsection


@section('modal')
    @include('partials.modal_delete')
    @include('partials.modal_form')
@endsection
