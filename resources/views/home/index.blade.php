@extends('layouts.panel')

{{-- @section('content')
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header" data-background-color="orange">
                    <i class="material-icons">content_copy</i>
                </div>
                <div class="card-content">
                    <p class="category">Ruang yang telah digunakan</p>
                    <h3 class="title">49/50<small>GB</small></h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons text-danger">warning</i> <a href="#pablo">Get More Space...</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header" data-background-color="green">
                    <i class="material-icons">store</i>
                </div>
                <div class="card-content">
                    <p class="category">Pendapatan</p>
                    <h3 class="title">$34,245</h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">date_range</i> Last 24 Hours
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header" data-background-color="red">
                    <i class="material-icons">info_outline</i>
                </div>
                <div class="card-content">
                    <p class="category">Isu Tetap</p>
                    <h3 class="title">75</h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">local_offer</i> Tracked from Github
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header" data-background-color="blue">
                    <i class="fa fa-twitter"></i>
                </div>
                <div class="card-content">
                    <p class="category">Pengikut</p>
                    <h3 class="title">+245</h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">update</i> Just Updated
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header card-chart" data-background-color="green">
                    <div class="ct-chart" id="dailySalesChart"></div>
                </div>
                <div class="card-content">
                    <h4 class="title">Jualan Harian</h4>
                    <p class="category"><span class="text-success"><i class="fa fa-long-arrow-up"></i> 55%  </span> increase in today sales.</p>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">access_time</i> updated 4 minutes ago
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header card-chart" data-background-color="orange">
                    <div class="ct-chart" id="emailsSubscriptionChart"></div>
                </div>
                <div class="card-content">
                    <h4 class="title">Langganan E-Mel</h4>
                    <p class="category">Last Campaign Performance</p>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">access_time</i> campaign sent 2 days ago
                    </div>
                </div>

            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header card-chart" data-background-color="red">
                    <div class="ct-chart" id="completedTasksChart"></div>
                </div>
                <div class="card-content">
                    <h4 class="title">Tugas Selesai</h4>
                    <p class="category">Last Campaign Performance</p>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">access_time</i> campaign sent 2 days ago
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6 col-md-12">
            <div class="card card-nav-tabs">
                <div class="card-header" data-background-color="purple">
                    <div class="nav-tabs-navigation">
                        <div class="nav-tabs-wrapper">
                            <span class="nav-tabs-title">Tugas:</span>
                            <ul class="nav nav-tabs" data-tabs="tabs">
                                <li class="active">
                                    <a href="#profile" data-toggle="tab">
                                        <i class="material-icons">bug_report</i>
                                        Bugs
                                        <div class="ripple-container"></div></a>
                                </li>
                                <li class="">
                                    <a href="#messages" data-toggle="tab">
                                        <i class="material-icons">code</i>
                                        Website
                                        <div class="ripple-container"></div></a>
                                </li>
                                <li class="">
                                    <a href="#settings" data-toggle="tab">
                                        <i class="material-icons">cloud</i>
                                        Server
                                        <div class="ripple-container"></div></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="card-content">
                    <div class="tab-content">
                        <div class="tab-pane active" id="profile">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <td>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="optionsCheckboxes" checked>
                                            </label>
                                        </div>
                                    </td>
                                    <td>Sign contract for "What are conference organizers afraid of?"</td>
                                    <td class="td-actions text-right">
                                        <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-simple btn-xs">
                                            <i class="material-icons">edit</i>
                                        </button>
                                        <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                                            <i class="material-icons">close</i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="optionsCheckboxes">
                                            </label>
                                        </div>
                                    </td>
                                    <td>Lines From Great Russian Literature? Or E-mails From My Boss?</td>
                                    <td class="td-actions text-right">
                                        <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-simple btn-xs">
                                            <i class="material-icons">edit</i>
                                        </button>
                                        <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                                            <i class="material-icons">close</i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="optionsCheckboxes">
                                            </label>
                                        </div>
                                    </td>
                                    <td>Flooded: One year later, assessing what was lost and what was found when a ravaging rain swept through metro Detroit
                                    </td>
                                    <td class="td-actions text-right">
                                        <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-simple btn-xs">
                                            <i class="material-icons">edit</i>
                                        </button>
                                        <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                                            <i class="material-icons">close</i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="optionsCheckboxes" checked>
                                            </label>
                                        </div>
                                    </td>
                                    <td>Create 4 Invisible User Experiences you Never Knew About</td>
                                    <td class="td-actions text-right">
                                        <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-simple btn-xs">
                                            <i class="material-icons">edit</i>
                                        </button>
                                        <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                                            <i class="material-icons">close</i>
                                        </button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane" id="messages">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <td>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="optionsCheckboxes" checked>
                                            </label>
                                        </div>
                                    </td>
                                    <td>Flooded: One year later, assessing what was lost and what was found when a ravaging rain swept through metro Detroit
                                    </td>
                                    <td class="td-actions text-right">
                                        <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-simple btn-xs">
                                            <i class="material-icons">edit</i>
                                        </button>
                                        <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                                            <i class="material-icons">close</i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="optionsCheckboxes">
                                            </label>
                                        </div>
                                    </td>
                                    <td>Sign contract for "What are conference organizers afraid of?"</td>
                                    <td class="td-actions text-right">
                                        <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-simple btn-xs">
                                            <i class="material-icons">edit</i>
                                        </button>
                                        <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                                            <i class="material-icons">close</i>
                                        </button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane" id="settings">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <td>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="optionsCheckboxes">
                                            </label>
                                        </div>
                                    </td>
                                    <td>Lines From Great Russian Literature? Or E-mails From My Boss?</td>
                                    <td class="td-actions text-right">
                                        <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-simple btn-xs">
                                            <i class="material-icons">edit</i>
                                        </button>
                                        <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                                            <i class="material-icons">close</i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="optionsCheckboxes" checked>
                                            </label>
                                        </div>
                                    </td>
                                    <td>Flooded: One year later, assessing what was lost and what was found when a ravaging rain swept through metro Detroit
                                    </td>
                                    <td class="td-actions text-right">
                                        <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-simple btn-xs">
                                            <i class="material-icons">edit</i>
                                        </button>
                                        <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                                            <i class="material-icons">close</i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="optionsCheckboxes">
                                            </label>
                                        </div>
                                    </td>
                                    <td>Sign contract for "What are conference organizers afraid of?"</td>
                                    <td class="td-actions text-right">
                                        <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-simple btn-xs">
                                            <i class="material-icons">edit</i>
                                        </button>
                                        <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                                            <i class="material-icons">close</i>
                                        </button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-12">
            <div class="card">
                <div class="card-header" data-background-color="orange">
                    <h4 class="title">Statistik Pekerja</h4>
                    <p class="category">Pekerja Baru Dekat 15th September, 2016</p>
                </div>
                <div class="card-content table-responsive">
                    <table class="table table-hover">
                        <thead class="text-warning">
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Gaji</th>
                        <th>Negara</th>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>Dakota Rice</td>
                            <td>$36,738</td>
                            <td>Niger</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Minerva Hooper</td>
                            <td>$23,789</td>
                            <td>Curaçao</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Sage Rodriguez</td>
                            <td>$56,142</td>
                            <td>Netherlands</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Philip Chaney</td>
                            <td>$38,735</td>
                            <td>Korea, South</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
 --}}

@section('content')
<div class="card card-plain">
    <div class="card-header" data-background-color="green">
        <h4 class="title">Dashboard</h4>
        <p class="category">Jabatan Perhutanan Semenanjung Malaysia</p>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="card card-stats">
            <div class="card-header" data-background-color="orange">
                <i class="material-icons">info</i>
            </div>
            <div class="card-content">
                <h3 class="title">{{ $hiking_total }}</h3>
                <table border="0" width="100%" style="margin-top: 40px">
                    @if(auth()->user()->hasRole(['admin', 'super']))
                        <tr>
                            <td width="35%" align="left">Permohonan Baru</td>
                            <td width="10%">{{ $hiking_new }}</td>
                        </tr>
                        <tr>
                            <td width="35%" align="left">Permohonan Diluluskan</td>
                            <td width="10%">{{ $hiking_processed }}</td>
                        </tr>
                    @else
                        <tr>
                            <td width="35%" align="left">Permohonan Baru</td>
                            <td width="10%">{{ $hiking_new }}</td>
                        </tr>
                    @endif
                    
                    
                    {{-- <tr>
                        <td width="35%" align="left">Permohonan Selesai</td>
                        <td width="10%">{{ $hiking_finished }}</td>
                    </tr> --}}
                    <tr>
                        <td width="35%" align="left">Permohonan Selesai</td>
                        <td width="10%">{{ $hiking_completed }}</td>
                    </tr>
                    <tr>
                        <td width="35%" align="left">Permohonan Dibatalkan</td>
                        <td width="10%">{{ $hiking_canceled }}</td>
                    </tr>
                    
                    <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                </table>
            </div>
            <div class="card-footer">
                <div class="stats">
                    {{-- <a href="#pablo">Lihat</a> --}}
                    <h4>Aktiviti Pendakian</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-stats">
            <div class="card-header" data-background-color="green">
                <i class="material-icons">check_circle</i>
            </div>
            <div class="card-content">
                <h3 class="title">{{ $convenience_total }}</h3>
                <table border="0" width="100%" style="margin-top: 40px">
                    <tr>
                        <td width="35%" align="left">Permohonan Baru</td>
                        <td width="10%">{{ $convenience_processed }}</td>
                    </tr>
                    <tr>
                        <td width="35%" align="left">Permohonan Diluluskan</td>
                        <td width="10%">{{ $convenience_completed }}</td>
                    </tr>
                    <tr>
                        <td width="35%" align="left">Permohonan Selesai</td>
                        <td width="10%">{{ $convenience_finished }}</td>
                    </tr>
                    <tr>
                        <td width="35%" align="left">Permohonan Dibatalkan</td>
                        <td width="10%">{{ $convenience_canceled }}</td>
                    </tr>
                    @if(auth()->user()->hasRole(['admin', 'super']))
                    <tr>
                        <td width="35%" align="left"></td>
                        <td width="10%"></td>
                    </tr>
                    @endif
                </table>
                 @if(auth()->user()->hasRole(['admin', 'super']))
                    <p class="category">&nbsp;</p>
                 @endif
            </div>
            <div class="card-footer">
                <div class="stats">
                    <h4>Tempahan Kemudahan</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-stats">
            <div class="card-header" data-background-color="red">
                <i class="material-icons">pan_tool</i>
            </div>
            <div class="card-content">
                <h3 class="title">{{ $other_total }}</h3>
                <table border="0" width="100%" style="margin-top: 40px">
                    <tr>
                        <td width="35%" align="left">Permohonan Baru</td>
                        <td width="10%">{{ $other_processed }}</td>
                    </tr>
                    <tr>
                        <td width="35%" align="left">Permohonan Diluluskan</td>
                        <td width="10%">{{ $other_completed }}</td>
                    </tr>
                    <tr>
                        <td width="35%" align="left">Permohonan Selesai</td>
                        <td width="10%">{{ $other_finished }}</td>
                    </tr>
                    <tr>
                        <td width="35%" align="left">Permohonan Dibatalkan</td>
                        <td width="10%">{{ $other_canceled }}</td>
                    </tr>
                </table>
                @if(auth()->user()->hasRole(['admin', 'super']))
                    <p class="category">&nbsp;</p>
                @endif
            </div>
            <div class="card-footer">
                <div class="stats">
                    <h4>Lain-lain Aktiviti</h4>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection