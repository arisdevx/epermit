@extends('layouts.panel')

@section('content')
<div class="row">
    <div class="col-md-12">
        @include('flash::message')
    </div>

    <div class="col-md-12">
        <div class="card">
            <div class="card-header" data-background-color="red">
                <h4 class="title pull-left">Audit Trail Pangkalan Data (Rekod Aktiviti) Detail</h4>
                
                <span class="clearfix"></span>
            </div>
            <div class="card-content">
                <div class="row">
                    <div class="col-sm-3 col-sm-offset-9">
                        {!! Form::open(['url' => route('state-forestry-department.index'), 'method' => 'get']) !!}
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
                        <th style="width: 10%">ID Aktiviti</th>
                        <th style="width: 20%">Masa/Tarikh</th>
                        <th>Aktiviti</th>
                        <th style="width: 1%"></th>
                    </tr>
                    </thead>
                    <tbody>
                        @if(!$details->isEmpty())
                            @php($index = 1)
                            @foreach($details as $detail)
                            <tr>
                                <td>{{ $index++ }}</td>
                                <td>{{ $detail->activity_log_id }}</td>
                                <td>{{ date('d/m/Y', strtotime($detail->created_at)) }}</td>
                                <td>{{ $detail->activity }}</td>
                                <td class="td-actions text-right"><a class="btn btn-sm btn-danger" href="{{ url('audit-trail-activity/detail/delete/6') }}"><i class="material-icons">clear</i></a></td>
                            </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6" align="center">No records found!</td>
                            </tr>
                        @endif
                    </tbody>
                </table>

                {{ $details->links() }}
            </div>
        </div>
    </div>
</div>
@endsection


@section('modal')
    @include('partials.modal_delete')
    @include('partials.modal_form')
@endsection
