@extends('layouts.panel')

@section('content')
<div class="row">
    <div class="col-md-12">
        @include('flash::message')
    </div>

    <div class="col-md-12">
        <div class="card">
            <div class="card-header" data-background-color="red">
                <h4 class="title pull-left">Senarai Taman Eko-Rimba (TER) / Hutan Taman Negeri (HTN)</h4>
                <a type="button" class="pull-right cursor-pointer"
                   data-toggle="modal"
                   data-target="#modal-form"
                   data-action="{{ route('eco-park.create') }}"
                   data-title="Tambah"
                >
                    <i class="fa fa-2x fa-plus-circle"></i>
                </a>
                <span class="clearfix"></span>
            </div>
            <div class="card-content">
                <div class="row">
                    <div class="col-sm-3 col-sm-offset-9">
                        {!! Form::open(['url' => route('eco-park.index'), 'method' => 'get']) !!}
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
                        <th>Negeri</th>
                        <th>Daerah</th>
                        <th>Hutan Simpan Kekal</th>
                        <th>Kategori Taman</th>
                        <th>Nama Taman</th>
                        <th>Daya Tampung</th>
                        <th class="text-center">Status</th>
                        {{-- <th>Harga</th> --}}
                        <th style="width: 1%"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @php($index = (($ecoparks->currentPage() - 1) * $ecoparks->perpage()) + 1)
                    @foreach($ecoparks as $ecopark)
                        <tr>
                            <td>{{ $index++ }}</td>
                            <td>{{ (!empty($ecopark->state->name) ? $ecopark->state->name : '') }}</td>
                            <td>{{ (!empty($ecopark->area->name) ? $ecopark->area->name : '') }}</td>
                            <td>{{ (!empty($ecopark->permanent_forest->name) ? $ecopark->permanent_forest->name : '') }}</td>
                            <td>
                                @if($ecopark->type == 'ter')
                                    Taman Eko-Rimba (TER)
                                @elseif($ecopark->type == 'htn')
                                    Hutan Taman Negeri (HTN)
                                @endif
                            </td>
                            <td>{{ $ecopark->name }}</td>
                            <td>{{ $ecopark->capacity }}</td>
                            {{-- <td>RM {{ (!empty($ecopark->price) ? $ecopark->price : '') }}</td> --}}
                            <td align="center">
                                @if($ecopark->active == '1')
                                    <span class="label label-success">Enable</span>
                                @else
                                    <span class="label label-danger">Disable</span>
                                @endif
                            </td>
                            <td class="td-actions text-right">
                                <a type="button" class="btn btn-primary btn-sm"
                                   data-toggle="modal"
                                   data-target="#modal-form"
                                   data-action="{{ route('eco-park.edit', $ecopark->id) }}"
                                   data-title="Edit {{ $ecopark->name }}">
                                    <i class="material-icons">create</i>
                                </a>&nbsp;
                                <a type="button" class="btn btn-danger btn-sm"
                                   data-toggle="modal"
                                   data-target="#modal-delete"
                                   data-action="{{ route('eco-park.destroy', $ecopark->id) }}"
                                   data-title="Delete Confirmation!"
                                   data-message="You are about to delete {{ $ecopark->name }} record, this procedure is irreversible. Do you want to proceed?">
                                    <i class="material-icons">clear</i>
                                    <div class="ripple-container"></div>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    @if($ecoparks->isEmpty())
                        <tr>
                            <td class="text-center" colspan="8">No records found!</td>
                        </tr>
                    @endif
                    </tbody>
                </table>

                {{ $ecoparks->links() }}
            </div>
        </div>
    </div>
</div>
@endsection


@section('modal')
    @include('partials.modal_delete')
    @include('partials.modal_form')
@endsection
