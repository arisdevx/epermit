@extends('layouts.panel')

@section('content')
<div class="row">
    <div class="col-md-12">
        @include('flash::message')
    </div>

    <div class="col-md-12">
        <div class="card card-nav-tabs">
            <div class="card-header" data-background-color="green">
                <h4 class="title">Konfigurasi Malim</h4>
            </div>
            
            {{ Form::open(['url' => route('guide.store')]) }}
                <div class="card-content">
                    <div class="form-group row">
                        <label class="control-label col-md-2">Jumlah Peserta</label>
                        <div class="col-md-6">
                            <input class="form-control" name="participant" type="number" value="{{ (!empty($guide) ? $guide->participant : 10) }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-2">Jumlah Malim</label>
                        <div class="col-md-6">
                            <input class="form-control" name="guide" type="number" value="{{ (!empty($guide) ? $guide->guide : 2) }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-offset-6 col-md-6">
                            <button type="submit" class="btn btn-primary">Kemaskini<div class="ripple-container"></div></button>
                        </div>
                    </div>
                </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection
