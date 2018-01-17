@extends('layouts.panel')

@section('content')
<div class="row">
    <div class="col-md-12">
        @include('flash::message')
    </div>

    <div class="col-md-12">
        
        <div class="card">
            <div class="card-header" data-background-color="blue">
                <h4 class="title pull-left">Senarai Admin</h4>
                <a type="button" class="pull-right cursor-pointer"
                   data-toggle="modal"
                   data-target="#modal-form"
                   data-action="{{ route('admin.create') }}"
                   data-title="Buat Admin"
                >
                    <i class="fa fa-2x fa-plus-circle"></i>
                </a>
                <span class="clearfix"></span>
            </div>
            <div class="card-content">
                <div class="row">
                    <div class="col-sm-3 col-sm-offset-9">
                        {!! Form::open(['url' => route('admin.index'), 'method' => 'get']) !!}
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
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Peranan</th>
                            <th>E-Mel</th>
                            <th>Negeri</th>
                            <th>Daerah</th>
                            <th style="width: 1%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($index = (($admins->currentPage() - 1) * $admins->perpage()) + 1)
                        @foreach($admins as $admin)
                            <tr>
                                <td>{{ $index++ }}</td>
                                <td>{{ $admin->name }}</td>
                                <td>{{ $admin->username }}</td>
                                <td>{{ $admin->roles->first()->display_name }}</td>
                                <td>{{ $admin->email }}</td>
                                <td>{{ (!empty($admin->userLocation->state->name) ? $admin->userLocation->state->name : '-') }}</td>
                                <td>{{ (!empty($admin->userLocation->area->name) ? $admin->userLocation->area->name : '-') }}</td>
                                <td class="td-actions text-right">
                                    <a type="button" class="btn btn-primary btn-sm"
                                       data-toggle="modal"
                                       data-target="#modal-form"
                                       data-action="{{ route('admin.edit', $admin->id) }}"
                                       data-title="Edit {{ $admin->name }}"
                                    >
                                        <i class="material-icons">create</i>
                                    </a>&nbsp;
                                    <a type="button" class="btn btn-danger btn-sm"
                                       data-toggle="modal"
                                       data-target="#modal-delete"
                                       data-action="{{ route('admin.destroy', $admin->id) }}"
                                       data-title="Delete {{ $admin->name }}"
                                       data-message="Adakah anda ingin hapuskan akaun {{ $admin->name }}?"
                                    >
                                        <i class="material-icons">clear</i>
                                        <div class="ripple-container"></div>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        @if(!$admins->count())
                            <tr>
                                <td class="text-center" colspan="8">No records found!</td>
                            </tr>
                        @endif
                    </tbody>
                </table>

                {{ $admins->links() }}
            </div>
        </div>
    </div>
</div>
@endsection


@section('modal')
    @include('partials.modal_delete')
    @include('partials.modal_form')
@endsection