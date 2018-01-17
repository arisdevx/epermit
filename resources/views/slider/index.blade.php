@extends('layouts.panel')

@section('content')
<div class="row">
    <div class="col-md-12">
        @include('flash::message')
    </div>

    <div class="col-md-12">
        <div class="card">
            <div class="card-header" data-background-color="red">
                <h4 class="title pull-left">Senarai Slider</h4>
                <a href="{{ route('slider-setting.create') }}" class="pull-right cursor-pointer">
                    <i class="fa fa-2x fa-plus-circle"></i>
                </a>
                <span class="clearfix"></span>
            </div>
            <div class="card-content">
                <table class="table table-bordered">
                    <thead>
                    <tr class="active">
                        <th style="width: 1%">#</th>
                        <th>Gambar</th>
                        {{-- <th>Tajuk</th> --}}
                        <th style="width: 1%"></th>
                    </tr>
                    </thead>
                    <tbody>
                        @if(!$sliders->isEmpty())
                            @php($index = (($sliders->currentPage() - 1) * $sliders->perpage()) + 1)
                            @foreach($sliders as $slider)
                                <tr>
                                    <td width="1%">{{ $index++ }}</td>
                                    <td width="20%"><img src="{{ asset('img/slider/' . $slider->image) }}" style="width: 150px"></td>
                                    {{-- <td>{{ $slider->title }}</td> --}}
                                    <td class="td-actions text-right">
                                        <a class="btn btn-primary btn-sm" href="{{ route('slider-setting.edit', $slider->id) }}"><i class="material-icons">create</i></a>&nbsp;
                                         {{ Form::open(['url' => route('slider-setting.destroy', $slider->id), 'method' => 'DELETE']) }} <button class="btn btn-danger btn-sm"><i class="material-icons">clear</i></button>{{ Form::close() }}
                                        {{-- <div class="row">
                                            <div class="col-md-3">
                                                
                                            </div>
                                            <div class="col-md-3">
                                               
                                            </div>
                                        </div> --}}
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
                {{ $sliders->links() }}                
            </div>
        </div>
    </div>
</div>
@endsection


@section('modal')
    @include('partials.modal_delete')
    @include('partials.modal_form')
@endsection