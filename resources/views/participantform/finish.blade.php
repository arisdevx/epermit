@extends('participantform.layout.panel')

@section('content')
    <h4 class="text-center" style="margin-top: 100px;">Permohonan Anda Telah Berjaya Dihantar Dan Akan Diproses <br><i>Your Application Has Been Successfully Delivered And Will Be Processed</i></h4>
    <div id="printData" style="display: none">
        <div id="printArea">
            @include('participantform.download')
        </div>
    </div>
    <div class="text-center" style="margin: 20px 0 10px 0">
        
        <div class="row" style="margin-bottom: 100px;">
            <div class="col-md-6">
                <div class="pull-right">
                    <a href="{{ url('form/download/' . request()->segment(3)) .'/'. request()->segment(4) }}" class="btn btn-lg btn-success"><i class="glyphicon glyphicon-download-alt"></i></a><br />
                    Muat Turun / <i>Download</i>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="col-md-6">
                <div class="pull-left">
                    <a href="javascript:void(0)" class="btn btn-lg  btn-primary" id="print"><i class="glyphicon glyphicon-print"></i></a><br />
                    Cetak / <i>Print</i>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        
    </div>
@endsection