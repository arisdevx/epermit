<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Applicant;
use Illuminate\Support\Facades\Cookie;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(auth()->user()->hasRole(['admin', 'super']))
        {
            $data['hiking_total'] = Applicant::where('type', 'hiking')->where('status', '!=', 'new')->count();
            $data['hiking_new'] = Applicant::where([
                                            'type' => 'hiking',
                                            'status' => 'processed'
                                        ])->count();
            $data['hiking_processed'] = Applicant::where([
                                            'type' => 'hiking',
                                            'status' => 'completed'
                                        ])->count();
            $data['hiking_completed'] = Applicant::where([
                                            'type' => 'hiking',
                                            'status' => 'finished'
                                        ])->count();
            // $data['hiking_finished'] = Applicant::where([
            //                                 'type' => 'hiking',
            //                                 'status' => 'finished'
            //                             ])->count();
            $data['hiking_canceled'] = Applicant::where([
                                            'type' => 'hiking',
                                            'status' => 'canceled'
                                        ])->count();

            $data['convenience_total'] = Applicant::where('type', 'convenience')->count();
            $data['convenience_processed'] = Applicant::where([
                                            'type' => 'convenience',
                                            'status' => 'processed'
                                        ])->count();
            $data['convenience_completed'] = Applicant::where([
                                            'type' => 'convenience',
                                            'status' => 'completed'
                                        ])->count();
            $data['convenience_finished'] = Applicant::where([
                                            'type' => 'convenience',
                                            'status' => 'finished'
                                        ])->count();
            $data['convenience_canceled'] = Applicant::where([
                                            'type' => 'convenience',
                                            'status' => 'canceled'
                                        ])->count();
            $data['other_total'] = Applicant::where('type', 'other')->count();
            $data['other_processed'] = Applicant::where([
                                            'type' => 'other',
                                            'status' => 'processed'
                                        ])->count();
            $data['other_completed'] = Applicant::where([
                                            'type' => 'other',
                                            'status' => 'completed'
                                        ])->count();
            $data['other_finished'] = Applicant::where([
                                            'type' => 'other',
                                            'status' => 'finished'
                                        ])->count();
            $data['other_canceled'] = Applicant::where([
                                            'type' => 'other',
                                            'status' => 'canceled'
                                        ])->count();
        }
        elseif(auth()->user()->hasRole('jabatan_perhutanan_negeri'))
        {
            $data['hiking_total'] = Applicant::whereHas('hikingLocation', function($q){
                                        $q->where('state_id', auth()->user()->userLocation->state_id);
                                    })->where([
                                        ['type', '=', 'hiking'],
                                        ['status', '!=', 'new']
                                    ])->count();
            $data['hiking_processed'] = Applicant::whereHas('hikingLocation', function($q){
                                            $q->where('state_id', auth()->user()->userLocation->state_id);
                                        })->where([
                                            'type' => 'hiking',
                                            'status' => 'processed'
                                        ])->count();
            $data['hiking_completed'] = Applicant::whereHas('hikingLocation', function($q){
                                            $q->where('state_id', auth()->user()->userLocation->state_id);
                                        })->where([
                                            'type' => 'hiking',
                                            'status' => 'completed'
                                        ])->count();
            $data['hiking_finished'] =  Applicant::whereHas('hikingLocation', function($q){
                                            $q->where('state_id', auth()->user()->userLocation->state_id);
                                        })->where([
                                            'type' => 'hiking',
                                            'status' => 'finished'
                                        ])->count();
            $data['hiking_canceled'] = Applicant::whereHas('hikingLocation', function($q){
                                            $q->where('state_id', auth()->user()->userLocation->state_id);
                                        })->where([
                                            'type' => 'hiking',
                                            'status' => 'canceled'
                                        ])->count();

            $data['convenience_total'] = Applicant::whereHas('applicantConvenience', function($q){
                                            $q->where('state_id', auth()->user()->userLocation->state_id);
                                         })->where([
                                            ['type', '=', 'convenience'],
                                            ['type', '!=', 'new'],
                                         ])->count();

            $data['convenience_processed'] = Applicant::whereHas('applicantConvenience', function($q){
                                            $q->where('state_id', auth()->user()->userLocation->state_id);
                                         })->where([
                                            'type' => 'convenience',
                                            'status' => 'processed'
                                        ])->count();
            $data['convenience_completed'] = Applicant::whereHas('applicantConvenience', function($q){
                                            $q->where('state_id', auth()->user()->userLocation->state_id);
                                        })->where([
                                            'type' => 'convenience',
                                            'status' => 'completed'
                                        ])->count();
            $data['convenience_finished'] = Applicant::whereHas('applicantConvenience', function($q){
                                            $q->where('state_id', auth()->user()->userLocation->state_id);
                                        })->where([
                                            'type' => 'convenience',
                                            'status' => 'finished'
                                        ])->count();
            $data['convenience_canceled'] = Applicant::whereHas('applicantConvenience', function($q){
                                            $q->where('state_id', auth()->user()->userLocation->state_id);
                                        })->where([
                                            'type' => 'convenience',
                                            'status' => 'canceled'
                                        ])->count();

            $data['other_total']     =  Applicant::whereHas('applicantOtherActivity', function($q){
                                            $q->where('state_id', auth()->user()->userLocation->state_id);
                                       })->where('type', 'other')->count();

            $data['other_processed'] =  Applicant::whereHas('applicantOtherActivity', function($q){
                                            $q->where('state_id', auth()->user()->userLocation->state_id);
                                        })->where([
                                            'type' => 'other',
                                            'status' => 'processed'
                                        ])->count();
            $data['other_completed'] =  Applicant::whereHas('applicantOtherActivity', function($q){
                                            $q->where('state_id', auth()->user()->userLocation->state_id);
                                        })->where([
                                            'type' => 'other',
                                            'status' => 'completed'
                                        ])->count();
            $data['other_finished'] =   Applicant::where([
                                            'type' => 'other',
                                            'status' => 'finished'
                                        ])->count();
            $data['other_canceled'] =   Applicant::whereHas('applicantOtherActivity', function($q){
                                            $q->where('state_id', auth()->user()->userLocation->state_id);
                                            $q->where('area_id', auth()->user()->userLocation->area_id);
                                        })->where([
                                            'type' => 'other',
                                            'status' => 'canceled'
                                        ])->count();
        }
        elseif(auth()->user()->hasRole('pegawai_hutan_daerah'))
        {
            $data['hiking_total'] = Applicant::whereHas('hikingLocation', function($q){
                                        $q->where('state_id', auth()->user()->userLocation->state_id);
                                    })->where([
                                        ['type', '=', 'hiking'],
                                        ['status', '!=', 'new']
                                    ])->count();
            $data['hiking_processed'] = Applicant::whereHas('hikingLocation', function($q){
                                            $q->where('state_id', auth()->user()->userLocation->state_id);
                                            $q->where('area_id', auth()->user()->userLocation->area_id);
                                        })->where([
                                            'type' => 'hiking',
                                            'status' => 'processed'
                                        ])->count();
            $data['hiking_completed'] = Applicant::whereHas('hikingLocation', function($q){
                                            $q->where('state_id', auth()->user()->userLocation->state_id);
                                            $q->where('area_id', auth()->user()->userLocation->area_id);
                                        })->where([
                                            'type' => 'hiking',
                                            'status' => 'completed'
                                        ])->count();
            $data['hiking_finished'] =  Applicant::whereHas('hikingLocation', function($q){
                                            $q->where('state_id', auth()->user()->userLocation->state_id);
                                            $q->where('area_id', auth()->user()->userLocation->area_id);
                                        })->where([
                                            'type' => 'hiking',
                                            'status' => 'finished'
                                        ])->count();
            $data['hiking_canceled'] = Applicant::whereHas('hikingLocation', function($q){
                                            $q->where('state_id', auth()->user()->userLocation->state_id);
                                            $q->where('area_id', auth()->user()->userLocation->area_id);
                                        })->where([
                                            'type' => 'hiking',
                                            'status' => 'canceled'
                                        ])->count();

            $data['convenience_total'] = Applicant::whereHas('applicantConvenience', function($q){
                                            $q->where('state_id', auth()->user()->userLocation->state_id);
                                            $q->where('area_id', auth()->user()->userLocation->area_id);
                                         })->where([
                                            ['type', '=', 'convenience'],
                                            ['type', '!=', 'new'],
                                         ])->count();

            $data['convenience_processed'] = Applicant::whereHas('applicantConvenience', function($q){
                                            $q->where('state_id', auth()->user()->userLocation->state_id);
                                            $q->where('area_id', auth()->user()->userLocation->area_id);
                                         })->where([
                                            'type' => 'convenience',
                                            'status' => 'processed'
                                        ])->count();
            $data['convenience_completed'] = Applicant::whereHas('applicantConvenience', function($q){
                                            $q->where('state_id', auth()->user()->userLocation->state_id);
                                            $q->where('area_id', auth()->user()->userLocation->area_id);
                                        })->where([
                                            'type' => 'convenience',
                                            'status' => 'completed'
                                        ])->count();
            $data['convenience_finished'] = Applicant::whereHas('applicantConvenience', function($q){
                                            $q->where('state_id', auth()->user()->userLocation->state_id);
                                            $q->where('area_id', auth()->user()->userLocation->area_id);
                                        })->where([
                                            'type' => 'convenience',
                                            'status' => 'finished'
                                        ])->count();
            $data['convenience_canceled'] = Applicant::whereHas('applicantConvenience', function($q){
                                            $q->where('state_id', auth()->user()->userLocation->state_id);
                                            $q->where('area_id', auth()->user()->userLocation->area_id);
                                        })->where([
                                            'type' => 'convenience',
                                            'status' => 'canceled'
                                        ])->count();

            $data['other_total']     =  Applicant::whereHas('applicantOtherActivity', function($q){
                                            $q->where('state_id', auth()->user()->userLocation->state_id);
                                            $q->where('area_id', auth()->user()->userLocation->area_id);
                                       })->where('type', 'other')->count();

            $data['other_processed'] =  Applicant::whereHas('applicantOtherActivity', function($q){
                                            $q->where('state_id', auth()->user()->userLocation->state_id);
                                            $q->where('area_id', auth()->user()->userLocation->area_id);
                                        })->where([
                                            'type' => 'other',
                                            'status' => 'processed'
                                        ])->count();
            $data['other_completed'] =  Applicant::whereHas('applicantOtherActivity', function($q){
                                            $q->where('state_id', auth()->user()->userLocation->state_id);
                                            $q->where('area_id', auth()->user()->userLocation->area_id);
                                        })->where([
                                            'type' => 'other',
                                            'status' => 'completed'
                                        ])->count();
            $data['other_finished'] =   Applicant::where([
                                            'type' => 'other',
                                            'status' => 'finished'
                                        ])->count();
            $data['other_canceled'] =   Applicant::whereHas('applicantOtherActivity', function($q){
                                            $q->where('state_id', auth()->user()->userLocation->state_id);
                                            $q->where('area_id', auth()->user()->userLocation->area_id);
                                        })->where([
                                            'type' => 'other',
                                            'status' => 'canceled'
                                        ])->count();
        }

        return view('home.index', $data);
    }
}
