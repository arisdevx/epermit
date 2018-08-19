@extends('layouts.panel')

@section('content')
<div class="row">
    <div class="col-md-12">
        @include('flash::message')
    </div>

    <div class="col-md-12">
        <div class="card">
            <div class="card-header" data-background-color="red">
                <h4 class="title pull-left">Senarai Akaun Pemohon</h4>
                {{-- <a type="button" class="pull-right cursor-pointer"
                   data-toggle="modal"
                   data-target="#modal-form"
                   data-action="{{ route('user.create') }}"
                   data-title="Buat Pengguna"
                >
                    <i class="fa fa-2x fa-plus-circle"></i>
                </a> --}}
                <span class="clearfix"></span>
            </div>
            <div class="card-content">
                <div class="row">
                    <div class="col-sm-3 col-sm-offset-9">
                        {!! Form::open(['url' => route('applicants-list.index'), 'method' => 'get']) !!}
                        <div class="input-group">
                            {{ Form::text('search', old('search'), ['class' => 'form-control', 'placeholder' => 'Nama Pemohon']) }}
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
                    <thead>
                    <tr class="active">
                        <th style="width: 1%">#</th>
                        <th>Nama</th>
                        <th>No K.P/Passport
                        <th>Email</th>
                        <th>Tarikh Daftar</th>
                        <th style="width: 1%"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @php($index = (($users->currentPage() - 1) * $users->perpage()) + 1)
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $index++ }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ ($user->profile->citizen == '1' ? $user->profile->nokp : $user->profile->passport) }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ date('d/m/Y', strtotime($user->created_at)) }}</td>
                            <td class="td-actions text-right">
                                <a type="button" class="btn btn-primary btn-xs"
                                   data-toggle="modal"
                                   data-target="#modal-form"
                                   data-action="{{ route('applicants-list.edit', $user->id) }}"
                                   data-title="Edit {{ $user->name }}"
                                >
                                    <i class="material-icons">create</i>
                                </a>
                                &nbsp;
                                <a type="button" class="btn btn-danger btn-xs"
                                   data-toggle="modal"
                                   data-target="#modal-delete"
                                   data-action="{{ route('applicants-list.destroy', $user->id) }}"
                                   data-title="Pengesahan"
                                   data-message="Adakah anda pasti untuk memadam rekod {{ $user->name }} ?"
                                >
                                    <i class="material-icons">clear</i>
                                    <div class="ripple-container"></div>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    @if(!$users->count())
                        <tr>
                            <td class="text-center" colspan="5">No records found!</td>
                        </tr>
                    @endif
                    </tbody>
                </table>

                {{ $users->links() }}
            </div>
        </div>
    </div>
</div>
@endsection


@section('modal')
    @include('partials.modal_delete')
    @include('partials.modal_form')
@endsection