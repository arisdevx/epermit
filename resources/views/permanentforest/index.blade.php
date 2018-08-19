@extends('layouts.panel')

@section('content')
<div class="row">
    <div class="col-md-12">
        @include('flash::message')
    </div>

    <div class="col-md-12">
        <div class="card">
            <div class="card-header" data-background-color="red">
                <h4 class="title pull-left">Senarai Hutan Simpan Kekal (HSK)</h4>
                <a type="button" class="pull-right cursor-pointer"
                   data-toggle="modal"
                   data-target="#modal-form"
                   data-action="{{ route('permanent-forest.create') }}"
                   data-title="Tambah HSK"
                >
                    <i class="fa fa-2x fa-plus-circle"></i>
                </a>
                <span class="clearfix"></span>
            </div>
            <div class="card-content">
                <div class="row">
                    <div class="col-sm-4 col-sm-offset-8">
                        {!! Form::open(['url' => route('permanent-forest.index'), 'method' => 'get']) !!}
                        <div class="input-group">
                            {{ Form::text('search', old('search'), ['class' => 'form-control', 'placeholder' => 'Nama hutan simpan kekal']) }}
                            <span class="input-group-addon" style="padding-top: 0">
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
                    <thead>
                    <tr class="active">
                        <th style="width: 1%">#</th>
                        <th>Negeri</th>
                        <th>Daerah</th>
                        <th>Nama Hutan Simpan Kekal</th>
                        {{-- <th>Had Daya Tampung</th> --}}
                        {{-- <th>Harga</th> --}}
                        <th style="width: 1%"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @php($index = 1)
                    @foreach($forests as $forest)
                        <tr>
                            <td>{{ $index++ }}</td>
                            <td>{{ (!empty($forest->state->name) ? $forest->state->name : '') }}</td>
                            <td>{{ (!empty($forest->area->name) ? $forest->area->name : '') }}</td>
                            <td>{{ $forest->name }}</td>
                            {{-- <td>{{ $forest->capacity }}</td> --}}
                            {{-- <td>RM {{ (!empty($forest->price) ? $forest->price : '0') }}</td> --}}
                            <td class="td-actions text-right">
                                <a type="button" class="btn btn-primary btn-sm"
                                   data-toggle="modal"
                                   data-target="#modal-form"
                                   data-action="{{ route('permanent-forest.edit', $forest->id) }}"
                                   data-title="Kemaskini {{ $forest->name }}">
                                    <i class="material-icons">create</i>
                                </a>&nbsp;
                                <a type="button" class="btn btn-danger btn-sm"
                                   data-toggle="modal"
                                   data-target="#modal-delete"
                                   data-action="{{ route('permanent-forest.destroy', $forest->id) }}"
                                   data-title="Pengesahan"
                                   data-message="Adakah anda pasti untuk memadam rekod {{ $forest->name }}?">
                                    <i class="material-icons">clear</i>
                                    <div class="ripple-container"></div>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    @if($forests->isEmpty())
                        <tr>
                            <td class="text-center" colspan="9">No records found!</td>
                        </tr>
                    @endif
                    </tbody>
                </table>

                {{ $forests->links() }}
            </div>
        </div>
    </div>
</div>
@endsection


@section('modal')
    @include('partials.modal_delete')
    @include('partials.modal_form')
@endsection
