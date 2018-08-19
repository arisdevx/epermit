@extends('layouts.panel')

@section('content')
<div class="row">
    <div class="col-md-12">
        @include('flash::message')
    </div>

    <div class="col-md-12">
        <div class="card">
            <div class="card-header" data-background-color="red">
                <h4 class="title pull-left">Senarai Maklumat</h4>
               <a type="button" class="pull-right cursor-pointer"
                   data-toggle="modal"
                   data-target="#modal-form"
                   data-action="{{ route('post-information.create') }}"
                   data-title="Tambah"
                >
                    <i class="fa fa-2x fa-plus-circle"></i>
                </a>
                <span class="clearfix"></span>
            </div>
            <div class="card-content">
                <table class="table table-bordered">
                    <thead>
                    <tr class="active">
                        <th style="width: 1%">#</th>
                        <th>Tajuk</th>
                        <th>Konten</th>
                        <th style="width: 1%"></th>
                    </tr>
                    </thead>
                    <tbody>
                        @if(!$posts->isEmpty())
                            @php($index = (($posts->currentPage() - 1) * $posts->perpage()) + 1)
                            @foreach($posts as $post)
                                <tr>
                                    <td width="1%">{{ $index++ }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>{!! substr($post->content, 0, 200) !!}</td>
                                    <td class="td-actions text-right">
                                        <a type="button" class="btn btn-primary btn-sm"
                                           data-toggle="modal"
                                           data-target="#modal-form"
                                           data-action="{{ route('post-information.edit', $post->id) }}"
                                           data-title="Kemaskini {{ $post->name }}">
                                            <i class="material-icons">create</i>
                                        </a>&nbsp;
                                        <a type="button" class="btn btn-danger btn-sm"
                                           data-toggle="modal"
                                           data-target="#modal-delete"
                                           data-action="{{ route('post-information.destroy', $post->id) }}"
                                           data-title="Hapus"
                                           data-message="You are about to delete {{ $post->name }} record, this procedure is irreversible. Do you want to proceed?">
                                            <i class="material-icons">clear</i>
                                            <div class="ripple-container"></div>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="4" align="center">No data</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
                {{ $posts->links() }}                
            </div>
        </div>
    </div>
</div>
@endsection


@section('modal')
    @include('partials.modal_delete')
    @include('partials.modal_form')
@endsection