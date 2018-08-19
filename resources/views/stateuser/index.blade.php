@extends('layouts.panel')

@section('content')
<div class="row">
    <div class="col-md-12">
        @include('flash::message')
    </div>

    <div class="col-md-12">
        <div class="card">
            <div class="card-header" data-background-color="red">
                <h4 class="title pull-left">Senarai Negeri</h4>
                <a type="button" class="pull-right cursor-pointer"
                   data-toggle="modal"
                   data-target="#modal-form"
                   data-action="{{ route('state-user.create') }}"
                   data-title="Tambah Negeri"
                >
                    <i class="fa fa-2x fa-plus-circle"></i>
                </a>
                <span class="clearfix"></span>
            </div>
            <div class="card-content">
                <div class="row">
                    <div class="col-sm-3 col-sm-offset-9">
                        {!! Form::open(['url' => route('state-user.index'), 'method' => 'get']) !!}
                        <div class="input-group">
                            {{ Form::text('search', old('search'), ['class' => 'form-control', 'placeholder' => 'Nama Negeri..']) }}
                            <span class="input-group-addon" style="padding-top: 0;">
                                <button type="submit" class="btn btn-white btn-round btn-just-icon" style="margin-top: 0; padding: 8px">
                                    <i class="material-icons">search</i>
                                    <div class="ripple-container"></div>
                                </button>
                            </span>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>

                <table class="table table-bordered">
                    <thead >
                    <tr class="active">
                        <th style="width: 1%">#</th>
                        <th>Negeri</th>                        
                        <th style="width: 1%"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @php($index = (($states->currentPage() - 1) * $states->perpage()) + 1)
                    @foreach($states as $state)
                        <tr>
                            <td>{{ $index++ }}</td>
                            <td>{{ $state->name }}</td>
                            <td class="td-actions text-right">
                                <a type="button" class="btn btn-primary btn-sm"
                                   data-toggle="modal"
                                   data-target="#modal-form"
                                   data-action="{{ route('state-user.edit', $state->id) }}"
                                   data-title="Kemaskini {{ $state->name }}">
                                    <i class="material-icons">create</i>
                                </a>&nbsp;
                                <a type="button" class="btn btn-danger btn-sm"
                                   data-toggle="modal"
                                   data-target="#modal-delete"
                                   data-action="{{ route('state-user.destroy', $state->id) }}"
                                   data-title="Hapus"
                                   data-message="You are about to delete {{ $state->name }} record, this procedure is irreversible. Do you want to proceed?">
                                    <i class="material-icons">clear</i>
                                    <div class="ripple-container"></div>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    @if($states->isEmpty())
                        <tr>
                            <td class="text-center" colspan="5">No records found!</td>
                        </tr>
                    @endif
                    </tbody>
                </table>

                {{ $states->links() }}
            </div>
        </div>
    </div>
</div>
@endsection


@section('modal')
    @include('partials.modal_delete')
    @include('partials.modal_form')
@endsection