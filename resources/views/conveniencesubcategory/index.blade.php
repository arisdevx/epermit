@extends('layouts.panel')

@section('content')
<div class="row">
    <div class="col-md-12">
        @include('flash::message')
    </div>

    <div class="col-md-12">
        <div class="card">
            <div class="card-header" data-background-color="red">
                <h4 class="title pull-left">Senarai Sub Jenis Kemudahan</h4>
                <a type="button" class="pull-right cursor-pointer"
                   data-toggle="modal"
                   data-target="#modal-form"
                   data-action="{{ route('convenience-sub-category.create') }}"
                   data-title="Tambah"
                >
                    <i class="fa fa-2x fa-plus-circle"></i>
                </a>
                <span class="clearfix"></span>
            </div>
            <div class="card-content">
                <div class="row">
                    <div class="col-sm-3 col-sm-offset-9">
                        {!! Form::open(['url' => route('convenience.index'), 'method' => 'get']) !!}
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
                            <th>Jenis Kemudahan</th>
                            <th>Sub Jenis Kemudahan</th>
                            <th style="width: 1%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($index = 1)
                        @if(!$subcategories->isEmpty())
                            @foreach($subcategories as $subcategory)
                                <tr>
                                    <td>{{ $index++ }}</td>
                                    <td>{{ $subcategory->convenience_category->name }}</td>
                                    <td>{{ $subcategory->name }}</td>
                                    <td class="td-actions text-right">
                                        <a type="button" class="btn btn-primary btn-sm"
                                           data-toggle="modal"
                                           data-target="#modal-form"
                                           data-action="{{ route('convenience-sub-category.edit', $subcategory->id) }}"
                                           data-title="Edit {{ $subcategory->name }}">
                                            <i class="material-icons">create</i>
                                        </a>&nbsp;
                                        <a type="button" class="btn btn-danger btn-sm"
                                           data-toggle="modal"
                                           data-target="#modal-delete"
                                           data-action="{{ route('convenience-sub-category.destroy', $subcategory->id) }}"
                                           data-title="Delete Confirmation!"
                                           data-message="You are about to delete {{ $subcategory->name }} record, this procedure is irreversible. Do you want to proceed?">
                                            <i class="material-icons">clear</i>
                                            <div class="ripple-container"></div>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <td colspan="4" align="center">No records found!</td>
                        @endif
                    </tbody>
                </table>

               {{ $subcategories->links() }}
            </div>
        </div>
    </div>
</div>
@endsection


@section('modal')
    @include('partials.modal_delete')
    @include('partials.modal_form')
@endsection
