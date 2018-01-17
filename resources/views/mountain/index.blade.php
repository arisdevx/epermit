@extends('layouts.panel')

@section('content')
<div class="row">
    <div class="col-md-12">
        @include('flash::message')
    </div>

    <div class="col-md-12">
        <div class="card">
            <div class="card-header" data-background-color="red">
                <h4 class="title pull-left">Senarai Gunung/Pendakian</h4>
                <a type="button" class="pull-right cursor-pointer"
                   data-toggle="modal"
                   data-target="#modal-form"
                   data-action="{{ route('hiking.create') }}"
                   data-title="Tambah"
                >
                    <i class="fa fa-2x fa-plus-circle"></i>
                </a>
                <span class="clearfix"></span>
            </div>
            <div class="card-content">
                <div class="row">
                    <div class="col-sm-3 col-sm-offset-9">
                        {!! Form::open(['url' => route('hiking.index'), 'method' => 'get']) !!}
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
                        <th>Lokasi</th>
                        <th>Nama Gunung</th>
                        <th>Caj Permit/Org</th>
                        <th>Tapak Perkhemahan</th>
                        <th>Had Daya Tampung Perkhemahan</th>
                        <th>Masa Perjalanan</th>
                        <td class="text-center">Status</td>
                        <th style="width: 1%"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @php($index = (($mountains->currentPage() - 1) * $mountains->perpage()) + 1)
                    @foreach($mountains as $mountain)
                        <tr>
                            <td>{{ $index++ }}</td>
                            <td>{{ (!empty($mountain->state->name) ? $mountain->state->name : '') }}</td>
                            <td>{{ (!empty($mountain->area->name) ? $mountain->area->name : '') }}</td>
                            <td>{{ (!empty($mountain->permanent_forest->name) ? $mountain->permanent_forest->name : '') }}</td>
                            <td>{{ $mountain->location }}</td>
                            <td>{{ $mountain->name }}</td>
                            <td>RM{{ $mountain->price }}</td>
                            <td>{{ ($mountain->campground == 'Y' ? 'Ada' : 'Tiada') }}</td>
                            <td>{{ $mountain->capacity }}</td>
                            <td>
                                @if($mountain->travel_day == '1' && $mountain->travel_night == '0')
                                    Daypack
                                @else
                                    {{ $mountain->travel_day }}H{{ $mountain->travel_night }}M
                                @endif
                            </td>
                            <td align="center">
                                @if($mountain->active == '1')
                                    <span class="label label-success">Enable</span>
                                @else
                                    <span class="label label-danger">Disable</span>
                                @endif
                            </td>
                            <td class="td-actions text-right">
                                <a type="button" class="btn btn-primary btn-sm"
                                   data-toggle="modal"
                                   data-target="#modal-form"
                                   data-action="{{ route('hiking.edit', $mountain->id) }}"
                                   data-title="Edit {{ $mountain->name }}">
                                    <i class="material-icons">create</i>
                                </a>&nbsp;
                                <a type="button" class="btn btn-danger btn-sm"
                                   data-toggle="modal"
                                   data-target="#modal-delete"
                                   data-action="{{ route('hiking.destroy', $mountain->id) }}"
                                   data-title="Delete Confirmation!"
                                   data-message="You are about to delete {{ $mountain->name }} record, this procedure is irreversible. Do you want to proceed?">
                                    <i class="material-icons">clear</i>
                                    <div class="ripple-container"></div>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    @if($mountains->isEmpty())
                        <tr>
                            <td class="text-center" colspan="12">No records found!</td>
                        </tr>
                    @endif
                    </tbody>
                </table>

                {{ $mountains->links() }}
            </div>
        </div>
    </div>
</div>
@endsection


@section('modal')
    @include('partials.modal_delete')
    @include('partials.modal_form')
@endsection
