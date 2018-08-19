@extends('layouts.panel')

@section('content')
<div class="row">
    <div class="col-md-12">
        @include('flash::message')
    </div>

    <div class="col-md-12">
        <div class="card">
            <div class="card-header" data-background-color="red">
                <h4 class="title pull-left">Senarai Daerah</h4>
                <a type="button" class="pull-right cursor-pointer"
                   data-toggle="modal"
                   data-target="#modal-form"
                   data-action="{{ route('area.create') }}"
                   data-title="Tambah Daerah"
                >
                    <i class="fa fa-2x fa-plus-circle"></i>
                </a>
                <span class="clearfix"></span>
            </div>
            <div class="card-content">
                <div class="row">
                    <div class="col-sm-3 col-sm-offset-9">
                        {!! Form::open(['url' => route('area.index'), 'method' => 'get']) !!}
                        <div class="input-group">
                            {{ Form::text('search', old('search'), ['class' => 'form-control', 'placeholder' => 'Nama Daerah..']) }}
                            <span class="input-group-addon" style="padding-top: 0;">
                                <button type="submit" class="btn btn-white btn-round btn-just-icon" style="margin-top: 0; padding: 8px;">
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
                        <th>Nama Daerah</th>
                        
                        <th style="width: 1%"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @php($index = (($areas->currentPage() - 1) * $areas->perpage()) + 1)
                    @foreach($areas as $area)
                        <tr>
                            <td>{{ $index++ }}</td>
                            <td>{{ (!empty($area->state->name) ? $area->state->name : '') }}</td>
                            <td>{{ $area->name }}</td>
                            <td class="td-actions text-right">
                                <a type="button" class="btn btn-primary btn-sm"
                                   data-toggle="modal"
                                   data-target="#modal-form"
                                   data-action="{{ route('area.edit', $area->id) }}"
                                   data-title="Kemaskini {{ $area->name }}">
                                    <i class="material-icons">create</i>
                                </a>&nbsp;
                                <a type="button" class="btn btn-danger btn-sm"
                                   data-toggle="modal"
                                   data-target="#modal-delete"
                                   data-action="{{ route('area.destroy', $area->id) }}"
                                   data-title="Pengesahan"
                                   data-message="Adakah anda pasti untuk memadam rekod {{ $area->name }}?">
                                    <i class="material-icons">clear</i>
                                    <div class="ripple-container"></div>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    @if($areas->isEmpty())
                        <tr>
                            <td class="text-center" colspan="5">No records found!</td>
                        </tr>
                    @endif
                    </tbody>
                </table>

                {{ $areas->links() }}
            </div>
        </div>
    </div>
</div>
@endsection


@section('modal')
    @include('partials.modal_delete')
    @include('partials.modal_form')
@endsection