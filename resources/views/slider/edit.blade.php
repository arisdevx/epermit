@extends('layouts.panel')

@section('content')
<div class="row">
    <div class="col-md-12">
        @include('flash::message')
    </div>

    <div class="col-md-12">
        <div class="card">
            <div class="card-header" data-background-color="red">
                <h4 class="title pull-left">Edit Slider</h4>
                <span class="clearfix"></span>
            </div>
            <div class="card-content">
                {!! Form::open(['url' => route('slider-setting.update', $slider->id), 'files' => true, 'method' => 'PUT']) !!}
                <table width="100%">
                    {{-- <tr>
                        <th>Tajuk</th>
                        <th>
                            <div class="form-group">
                                <label class="control-label">
                                    <span></span>
                                    <span>Tajuk</span>
                                </label>
                                <input type="text" class="form-control" name="title" value="{{ $slider->title }}">
                                <span class="material-icons form-control-feedback">clear</span>
                            </div>
                            
                        </th>
                    </tr> --}}
                    <tr>
                        <th>Muat Naik Slider</th>
                        <th>
                            <label class="control-label" style="display: block; margin-bottom: 10px">
                                <span v-if="errors.image"></span>
                                <span v-else>Gambar</span>
                            </label>
                            @if(!empty($slider->image))
                                <img src="{{ asset('img/slider/' . $slider->image) }}" style="width: 150px; margin-bottom: 10px">
                            @endif
                            <input type="file" name="files">
                            
                        </th>
                    </tr>
                </table>
                <button type="submit" class="pull-right btn btn-success">Upload</button>
                <div class="clearfix"></div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection