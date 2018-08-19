@extends('layouts.panel')

@section('content')
<div class="row">
    <div class="col-md-12">
        @include('flash::message')
    </div>

    <div class="col-md-12">
        <div class="card">
            <div class="card-header" data-background-color="red">
                <h4 class="title pull-left">Senarai Kemudahan</h4>
                <a type="button" class="pull-right cursor-pointer"
                   data-toggle="modal"
                   data-target="#modal-form"
                   data-action="{{ route('convenience.create') }}"
                   data-title="Tambah"
                >
                    <i class="fa fa-2x fa-plus-circle"></i>
                </a>
                <span class="clearfix"></span>
            </div>
            <div class="card-content">
                <div class="row">
                    <div class="col-sm-4 col-sm-offset-8">
                        {!! Form::open(['url' => route('convenience.index'), 'method' => 'get']) !!}
                        <div class="input-group">
                            {{ Form::text('search', old('search'), ['class' => 'form-control', 'placeholder' => 'Kategori jenis kemudahan']) }}
                            <span class="input-group-addon" style="padding-top: 0;">
                                <button type="submit" class="btn btn-white btn-sm btn-round btn-just-icon" style="margin-top: 0; padding: 8px">
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
                            {{-- <th>Daerah</th> --}}
                            <th>Taman Eco-Rimba</th>
                            <th>Jenis Kemudahan</th>
                            <th>Kategori Jenis Kemudahan</th>
                            <th>Harga</th>
                            <th>Had Daya Tampung</th>
                            <th style="width: 1%"></th>
                        </tr>
                    </thead>
                    <tbody>
                    @php($index = (($conveniences->currentPage() - 1) * $conveniences->perpage()) + 1)
                    @foreach($conveniences as $convenience)
                        <tr>
                            <td>{{ $index++ }}</td>
                            <td>{{ (!empty($convenience->state->name) ? $convenience->state->name : '') }}</td>
                            {{-- <td>{{ (!empty($convenience->area->name) ? $convenience->area->name : '') }}</td> --}}
                            <td>{{ (!empty($convenience->ecoPark->name) ? $convenience->ecoPark->name : '') }}</td>
                            <td>{{ (!empty($convenience->convenience_category->name) ? $convenience->convenience_category->name : '') }}</td>
                            <td>{{ (!empty($convenience->convenience_sub_category->name) ? $convenience->convenience_sub_category->name : '-') }}</td>
                            <td>RM {{ $convenience->price }}</td>
                            <td>{{ $convenience->capacity }}</td>
                            <td class="td-actions text-right">
                                <a type="button" class="btn btn-primary btn-sm"
                                   data-toggle="modal"
                                   data-target="#modal-form"
                                   data-action="{{ route('convenience.edit', $convenience->id) }}"
                                   data-title="Kemaskini {{ $convenience->name }}">
                                    <i class="material-icons">create</i>
                                </a>&nbsp;
                                <a type="button" class="btn btn-danger btn-sm"
                                   data-toggle="modal"
                                   data-target="#modal-delete"
                                   data-action="{{ route('convenience.destroy', $convenience->id) }}"
                                   data-title="Pengesahan"
                                   data-message="Adakah anda pasti untuk memadam rekod {{ $convenience->name }} ?">
                                    <i class="material-icons">clear</i>
                                    <div class="ripple-container"></div>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    @if($conveniences->isEmpty())
                        <tr>
                            <td class="text-center" colspan="8">No records found!</td>
                        </tr>
                    @endif
                    </tbody>
                </table>

                {{ $conveniences->links() }}
            </div>
        </div>
    </div>
</div>
@endsection


@section('modal')
    @include('partials.modal_delete')
    @include('partials.modal_form')
@endsection
