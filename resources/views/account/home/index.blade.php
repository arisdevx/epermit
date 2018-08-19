@extends('account.layouts.backend.panel')

@section('content')
    
    <div class="card card-plain">
        <div class="card-header" data-background-color="green">
            <h4 class="title">Kategori Permohonan</h4>
            <p class="category">Application Category</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6">
            <a href="{{ url('account/member-aktiviti-pendakian') }}">
                <div class="card card-stats" style="height: 280px">
                    <div class="card-header" data-background-color="orange">
                        <img src="{{ url('img/icons/hiking.png') }}">
                        {{-- <i class="material-icons">assignment</i> --}}
                    </div>
                    <div class="card-content">
                        <p class="category"><strong>Aktiviti</strong></p>
                        <h3 class="title">Pendakian</h3>
                        <small>Hiking Activity</small>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            Permohonan permit bagi menjalankan aktiviti pendakian di dalam hutan simpanan kekal (HSK)
                           <br><i>Application for a permit to carry out climbing activities in permanent forest</i>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        
        <div class="col-lg-4 col-md-6 col-sm-6">
            <a href="{{ url('account/member-aktiviti-lain') }}">
                <div class="card card-stats" style="height: 280px">
                    <div class="card-header" data-background-color="red">
                        <img src="{{ url('img/icons/other.png') }}">
                        {{-- <i class="material-icons">info_outline</i> --}}
                    </div>
                    <div class="card-content">
                        <p class="category"><strong>Lain-lain</strong></p>
                        <h3 class="title">Aktiviti</h3>
                        <small>Others Activity</small>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            Lain-lain Aktiviti bagi menjalankan lain-lain aktiviti di Taman Eko Rimba (TER), Hutan Taman Negeri (HTN), dan Hutan Simpan Kekal (HSK)
                           <br><i>Other activities for other activities at Eco-Parks, State Forest, and Permanent Forest Reserves</i>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
            <a href="{{ url('account/member-tempahan-kemudahan') }}">
                <div class="card card-stats" style="height: 280px">
                    <div class="card-header" data-background-color="green">
                        <img src="{{ url('img/icons/booking.png') }}">
                        {{-- <i class="material-icons">store</i> --}}
                    </div>
                    <div class="card-content">
                        <p class="category"><strong>Tempahan Kemudahan</strong></p>
                        <h3 class="title">TER/HTN</h3>
                        <small>Convenience Activity</small>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                             Tempahan kemudahan di Taman Eko Rimba (TER) dan Hutan Taman Negeri (HTN) di Malaysia
                           <br><i>Facilities booking at Eco-Park (TER) and State Park Forest (HTN) in Malaysia</i>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>

    {{-- <div class="row">
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
    </div> --}}
@endsection
