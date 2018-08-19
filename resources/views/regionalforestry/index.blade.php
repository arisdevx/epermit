@extends('layouts.panel')

@section('content')
<div class="row">
    <div class="col-md-12">
        @include('flash::message')
    </div>

    <div class="col-md-12">
        <div class="card">
            <div class="card-header" data-background-color="red">
                <h4 class="title pull-left">Pejabat Hutan Daerah (PHD)</h4>
                <a type="button" class="pull-right cursor-pointer"
                   data-toggle="modal"
                   data-target="#modal-form"
                   data-action="{{ route('regional-forest-officials.create') }}"
                   data-title="Tambah PHD"
                >
                    <i class="fa fa-2x fa-plus-circle"></i>
                </a>
                <span class="clearfix"></span>
            </div>
            <div class="card-content">
                <div class="row">
                    <div class="col-sm-3 col-sm-offset-9">
                        {!! Form::open(['url' => route('regional-forest-officials.index'), 'method' => 'get']) !!}
                        <div class="input-group">
                            {{ Form::text('search', old('search'), ['class' => 'form-control', 'placeholder' => 'Nama Pejabat']) }}
                            <span class="input-group-addon" style="padding-top: 0">
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
                    <thead>
                    <tr class="active">
                        <th style="width: 1%">#</th>
                        <th>Nama Pejabat Hutan Daerah</th>
                        <th>Negeri</th>
                        <th>Daerah</th>
                        <th>Alamat</th>
                        <th>Telefon</th>
                        <th>Fax</th>
                        <th>Email</th>
                        {{-- <th style="text-align: center">Kemaskini</th>
                        <th style="text-align: center">Hapus</th> --}}
                        <th style="width: 1%"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @php($index = 1)
                    @foreach($regionalforestries as $regionalforestry)
                        <tr>
                            <td>{{ $index++ }}</td>
                            <td>{{ $regionalforestry->name }}</td>
                            <td>{{ (!empty($regionalforestry->state->name) ? $regionalforestry->state->name : '') }}</td>
                            <td>{{ (!empty($regionalforestry->area->name) ? $regionalforestry->area->name : '') }}</td>
                            <td>{{ (!empty($regionalforestry->address) ? $regionalforestry->address : '-') }}</td>
                            <td>{{ (!empty($regionalforestry->phone) ? $regionalforestry->phone : '-') }}</td>
                            <td>{{ (!empty($regionalforestry->fax) ? $regionalforestry->fax : '-') }}</td>
                            <td>{{ (!empty($regionalforestry->email) ? $regionalforestry->email : '-') }}</td>
                            {{-- <td align="center">{{ ($regionalforestry->update == 'Y' ? 'Ya' : 'Tidak') }}</td>
                            <td align="center">{{ ($regionalforestry->delete == 'Y' ? 'Ya' : 'Tidak') }}</td> --}}
                            <td class="td-actions text-right">
                                <a type="button" class="btn btn-primary btn-sm"
                                   data-toggle="modal"
                                   data-target="#modal-form"
                                   data-action="{{ route('regional-forest-officials.edit', $regionalforestry->id) }}"
                                   data-title="Kemaskini {{ $regionalforestry->name }}">
                                    <i class="material-icons">create</i>
                                </a>&nbsp;
                                <a type="button" class="btn btn-danger btn-sm"
                                   data-toggle="modal"
                                   data-target="#modal-delete"
                                   data-action="{{ route('regional-forest-officials.destroy', $regionalforestry->id) }}"
                                   data-title="Pengesahan"
                                   data-message="Adakah anda pasti untuk memadam rekod {{ $regionalforestry->name }} ?">
                                    <i class="material-icons">clear</i>
                                    <div class="ripple-container"></div>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    @if($regionalforestries->isEmpty())
                        <tr>
                            <td class="text-center" colspan="5">No records found!</td>
                        </tr>
                    @endif
                    </tbody>
                </table>

                {{ $regionalforestries->links() }}
            </div>
        </div>
    </div>
</div>
@endsection


@section('modal')
    @include('partials.modal_delete')
    @include('partials.modal_form')
@endsection
