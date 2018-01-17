@extends('layouts.panel')

@section('content')
<div class="row">
    <div class="col-md-12">
        @include('flash::message')
    </div>

    <div class="col-md-12">
        {{ Form::open(['url' => route('homepage-setting.store'), 'files' => true]) }}
        <div class="card">
            <div class="card-header" data-background-color="red">
                <h4 class="title pull-left">Pengaturan Laman Utama</h4>
                <button type="submit" class="pull-right btn btn-primary btn-sm cursor-pointer">
                    <i class="fa fa-2x fa-save"></i>
                </button>
                <span class="clearfix"></span>
            </div>
            <div class="card-content">
                <h3>Logo</h3>
                @if(!empty($logo->setting_value))
                    <img src="{{ url($logo->setting_value) }}" style="width: 80px; margin-bottom: 20px">
                @endif
                {!! Form::file('logo') !!}
                <small>Note: image height 40px</small>
                <hr />
                <h3>Laman Utama</h3>
                <textarea class="texteditor" name="homepage">{{ (!empty($homepage->setting_value) ? $homepage->setting_value : '') }}</textarea>
                <hr />
                <h3>Footer</h3>
                <textarea class="texteditor" name="footer">{{ (!empty($footer->setting_value) ? $footer->setting_value : '') }}</textarea>
            </div>
        </div>
        {{ Form::close() }}
    </div>
</div>
@endsection


@section('modal')
    @include('partials.modal_delete')
    @include('partials.modal_form')
@endsection