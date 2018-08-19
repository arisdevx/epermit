@extends('account.layouts.backend.panel')

@section('content')
	@include('flash::message')

	@if(session()->has('status'))
		@if(session()->get('status') == 'success-processed')
			<div class="alert alert-success">Pemohonan anda telah dihantar</div>
		@endif
	@endif

	<div class="card card-nav-tabs">
		<div class="card-header" data-background-color="green">
			<h4 class="title">Status Permohonan</h4>
			<p class="category"><i>Status of Application</i></p>
		</div>

		<div class="card-content">
			<table class="table table-bordered">
				<thead>
					<tr class="active">
						<th style="width: 1%">No.</th>
						<th style="text-align: center; width: 35%">Maklumat Permohonan <br /><i>Information of Application</i></th>
						<th style="text-align: center; width: 40%">Keterangan <br><i>Details</i></th>
						{{-- <th style="text-align: center; width: 20%">Kemudahan</th> --}}
						<th style="text-align: center; width: 10%">Jumlah<br /> Perlu<br /> Dibayar <br><i>Total Must Be Pay</i></th>
						<th style="text-align: center">Status <br><i>Status</i></th>
						<th style="text-align: center; width: 10%">Tindakan <br><i>Action</i></th>
					</tr>
				</thead>
				<tbody>
					@php($index = (($statuses->currentPage() - 1) * $statuses->perpage()) + 1)

					@if(!$statuses->isEmpty())
						@foreach($statuses as $status)
							<tr>
								<td width="1%" align="top" style="vertical-align: top">
									{{ $index++ }}
								</td>
								<td align="top" style="vertical-align: top">

									No Permohonan: <strong>{{ (!empty($status->number) ? $status->number : '') }}</strong><br />
									Tarikh Permohonan: <strong>{{ (!empty($status->created_at) ? date('d/m/Y', strtotime($status->created_at)) : '-') }}</strong><br />
									Jenis Permohonan: <strong>
									@if($status->type == 'hiking')	
										Aktiviti Pendakian
									@elseif($status->type == 'convenience')
										Tempahan Kemudahan
									@elseif($status->type == 'other')
										Lain-lain Aktiviti
									@endif</strong>
									<br />
									@if($status->type != 'convenience')
										Tarikh Mula: <strong>
										@if($status->type == 'hiking')
											{{ date('d/m/Y', strtotime($status->hikingInformation->starting_date)) }}
										@elseif($status->type == 'convenience')
											{{-- {{ date('d/m/Y', strtotime($status->applicantConvenience->starting_date)) }} --}}
										@elseif($status->type == 'other')
											@if(!empty($status->applicantOtherActivity->applicant_other_activity_detail->starting_date))
												{{ date('d/m/Y', strtotime($status->applicantOtherActivity->applicant_other_activity_detail->starting_date)) }}
											@else
												-
											@endif
											
										@endif</strong>
										<br />
										Tarikh Akhir: <strong>
										@if($status->type == 'hiking')
											{{ date('d/m/Y', strtotime($status->hikingInformation->ending_date)) }}
										@elseif($status->type == 'convenience')
											{{-- {{ date('d/m/Y', strtotime($status->applicantConvenience->ending_date)) }} --}}
										@elseif($status->type == 'other')
											@if(!empty($status->applicantOtherActivity->applicant_other_activity_detail->starting_date))
												{{ date('d/m/Y', strtotime($status->applicantOtherActivity->applicant_other_activity_detail->ending_date)) }}
											@else
												-
											@endif
											
										@endif</strong>
										<br />
									@endif
									
									@if($status->type == 'other')
										Negeri: <strong>{{ (!empty($status->applicantOtherActivity->state->name) ? $status->applicantOtherActivity->state->name : '-') }}</strong><br />
										Daerah: <strong>{{ (!empty($status->applicantOtherActivity->area->name) ? $status->applicantOtherActivity->area->name : '-') }}</strong><br />
										@if($status->applicantOtherActivity->type == 'hsk')
											Tempat: <strong>{{ (!empty($status->applicantOtherActivity->permanent_forest->name) ? $status->applicantOtherActivity->permanent_forest->name : '') }}</strong>
										@else
											Tempat: <strong>{{ (!empty($status->applicantOtherActivity->eco_park->name) ? $status->applicantOtherActivity->eco_park->name : '') }}</strong>
										@endif

									@elseif($status->type == 'hiking')
										Negeri: <strong>{{ (!empty($status->hikingLocation->state->name) ? $status->hikingLocation->state->name : '-') }}</strong><br />
										Daerah: <strong>{{ (!empty($status->hikingLocation->area->name) ? $status->hikingLocation->area->name : '-') }}</strong><br />
										Tempat: <strong>{{ (!empty($status->hikingInformation->mountain->name) ? $status->hikingInformation->mountain->name : '-') }}</strong>
									@elseif($status->type == 'convenience')
										Negeri: <strong>{{ (!empty($status->applicantConvenience->state->name) ? $status->applicantConvenience->state->name : '-') }}</strong><br />
										Daerah: <strong>{{ (!empty($status->applicantConvenience->area->name) ? $status->applicantConvenience->area->name : '-') }}</strong><br />
										Tempat: <strong>{{ (!empty($status->applicantConvenience->eco_park->name) ? $status->applicantConvenience->eco_park->name : '-') }}</strong>
									@endif
								</td>
								<td align="top" style="vertical-align: top">
									@if($status->type == 'hiking')
										@if($status->hikingParticipant->isEmpty())
											<p class="text-center">Tiada Maklumat / No Information</p>
										@else
											Jumlah Peserta / Participant Total: {{ $status->hikingInformation->participants_total }}<br /><br />
											<table class="table table-bordered" width="100%" cellspacing="10px" cellpadding="0"> 
												<thead>
													<tr>
														<th width="1%">#</th>
														<th>Nama peserta / <i>Participant Name</i></th>
													</tr>
												</thead>
												<tbody>
												@php($hikers = 1)
												
												@foreach($status->hikingParticipant as $participant)
													<tr>
														<td style="padding: 5px !important; width: 1%">{{ $hikers++ }}</td>
														<td style="padding: 5px !important"><a href="{{ url('account/member-aktiviti-pendakian/' . $status->id . '/' . $participant->id . '/edit') }}">{{ $participant->hikingBiodata->fullname }}</a> {!! (in_array($participant->id, $status->hikingGuide()->pluck('participant_id')->toArray()) ? '(Malim / <i>Guide</i>)' : '') !!}</td>
													</tr>
												@endforeach
												</tbody>
											</table>
										@endif

									@elseif($status->type == 'convenience')
										@if(!empty($status->applicantConvenience))
											<table class="table table-bordered">
												<thead>
													<tr>
														<th>#</th>
														<th>Keterangan Tempahan <br /><i>Booking Detail</i></th>
														<th>Tarikh <br><i>Date</i></th>
														<th>Jumlah <br><i>Total</i></th>
													</tr>
												</thead>
												<tbody>
												@php($num = 1)
												@foreach($status->applicant_convenience as $convenience)
													@if($convenience->convenience_category_id == '2' OR $convenience->convenience_category_id == '3')
														<tr>
															<td width="1%" valign="top" align="left">{{ $num }}.</td>
															<td width="70%" valign="top">{{ $convenience->convenience_category->name }}</td>
															<td align="center">{{ date('d/m/Y', strtotime($convenience->starting_date)) }}<br />-<br />{{ date('d/m/Y', strtotime($convenience->ending_date)) }}</td>
															<td valign="top"> {{ $convenience->participant }} Orang / <i>Person</i></td>
														</tr>
													@else
														<tr>
															<td width="1%" valign="top" align="left">{{ $num }}.</td>
															<td width="70%" valign="top">{{ $convenience->convenience_category->name }} - {{ $convenience->applicant_convenience_unit->convenience_sub_category->name }}</td>
															<td align="center">{{ date('d/m/Y', strtotime($convenience->starting_date)) }}<br />-<br />{{ date('d/m/Y', strtotime($convenience->ending_date)) }}</td>
															<td valign="top"> {{ $convenience->participant }} Unit / <i>Unit</i></td>
														</tr>
													@endif
													@php($num++)
												@endforeach
												</tbody>
											</table>
										@else
											<p class="text-center">Tiada maklumat</p>
										@endif
									@else
										<p class="text-center">N/A</p>
									@endif
								</td>
								{{-- <td style="vertical-align: top;" {{ ($status->type != 'convenience' ? ' align=center' : '') }}>
									@if($status->type == 'convenience')
										@if(!empty($status->applicantConvenience))
											@php($num = 1)
											@foreach($status->applicant_convenience as $convenience)
												@if($convenience->convenience_category_id == '2' OR $convenience->convenience_category_id == '3')
													
												@else
													{{ $num }}. {{ $convenience->participant }} Unit {{ $convenience->convenience_category->name }} - {{ $convenience->applicant_convenience_unit->convenience_sub_category->name }}<br />
												@endif
												@php($num++)
											@endforeach
										@endif
									@else
										N/A
									@endif
								</td> --}}
								<td align="right" align="top" style="vertical-align: top">
									RM {{ $status->amount }}
								</td>
								<td align="center" align="top" style="vertical-align: top">
									@if($status->status == 'new')
										Baru <br><i>New</i>
									@elseif($status->status == 'processed')
										Sedang Diproses <br><i>On Process</i>
									@elseif($status->status == 'completed')
										Perlu Dibayar <br><i>Must be Pay</i>
									@elseif($status->status == 'finished')
										Selesai <br><i>Done</i>
									@elseif($status->status == 'canceled')
										Batal <br><i>Canceled</i>
									@endif
								</td>
								<td align="top" style="vertical-align: top">
									@if($status->type == 'hiking')
										@if($status->user_id == auth()->guard('applicant')->user()->id)
											@if($status->status == 'new')
												
												@if($status->hikingInformation->participants_total <= ($status->hikingParticipant->count()-1))
													<a href="{{ url('account/member-aktiviti-pendakian/process/' . $status->id) }}" class="btn btn-success btn-sm btn-block">Hantar / <i>Send</i></a> 
												@else
													<a href="#" 
													   class="btn btn-default btn-sm btn-block"
													   data-toggle="modal"
					                                   data-target="#modal-notification"
					                                   {{-- data-action="{{ route('member-application-status.destroy', $status->id) }}" --}}
					                                   data-title="Maklumat"
					                                   data-message="Peserta program pendakian belum memenuhi kapasiti"
													   >Hantar / Send</a> 
												@endif

												<a href="javascript:void(0)"
												   class="btn btn-danger btn-sm btn-block"
				                                   data-toggle="modal"
				                                   data-target="#modal-delete"
				                                   data-action="{{ route('member-application-status.destroy', $status->id) }}"
				                                   data-title="Delete Confirmation!"
				                                   data-message="You are about to delete {{ $status->name }} record, this procedure is irreversible. Do you want to proceed?">
				                                    Batal / Cancel
				                                    <div class="ripple-container"></div>
				                                </a> 
				                                <a href="{{ route('member-aktiviti-pendakian.edit', $status->id) }}" class="btn btn-primary btn-sm btn-block">Kemaskini / <i>Edit</i></a>
											@endif
											@if($status->status == 'processed')
												<a href="javascript:void(0)"
												   class="btn btn-danger btn-sm btn-block"
				                                   data-toggle="modal"
				                                   data-target="#modal-delete"
				                                   data-action="{{ route('member-application-status.destroy', $status->id) }}"
				                                   data-title="Delete Confirmation!"
				                                   data-message="You are about to delete {{ $status->name }} record, this procedure is irreversible. Do you want to proceed?">
				                                    Batal / Cancel
				                                    <div class="ripple-container"></div>
				                                </a> 
				                                <a href="{{ route('member-aktiviti-pendakian.edit', $status->id) }}" class="btn btn-primary btn-sm btn-block">Kemaskini / <i>Edit</i></a>
											@elseif($status->status == 'canceled')
												<a href="{{ url('account/member-application-status/'. $status->id .'/hiking') }}" class="btn btn-default btn-sm btn-block"><i class="material-icons">remove_red_eye</i></a>
				                            	{{-- <button class="btn btn-danger btn-sm btn-block" disabled>Batal</button>  --}}
				                            @elseif($status->status == 'finished')
				                            	{{-- <button class="btn btn-danger btn-sm btn-block" disabled>Selesai</button> --}}
				                            	@if(!empty($status->receipt_number))
				                            		@if(file_exists(public_path('files/lulus_' . $status->number . '.pdf')))
				                            			<a href="{{ url('files/lulus_' . $status->number . '.pdf') }}" class="btn btn-success btn-sm btn-block"><i class="material-icons">print</i></a>
				                            		@else
				                            			<button class="btn btn-success btn-sm btn-block" disabled>Selesai / Done</button>
				                            		@endif
			                                        {{-- <a href="{{ url('files/lulus_' . $status->number . '.pdf') }}" class="btn btn-success btn-sm btn-block"><i class="material-icons">print</i></a> --}}
			                                    @else
			                                    	<button class="btn btn-success btn-sm btn-block" disabled>Selesai / Done</button>
			                                    @endif
				                            @elseif($status->status == 'completed')
				                            	<button class="btn btn-primary btn-sm btn-block" disabled>Kemaskini / Edit</button>
				                            @endif
			                            
										@endif
									@elseif($status->type == 'convenience')

										@if($status->status == 'processed')
											<a href="javascript:void(0)"
			                                   data-toggle="modal"
			                                    class="btn btn-danger btn-sm btn-block"
			                                   data-target="#modal-delete"
			                                   data-action="{{ route('member-application-status.destroy', $status->id) }}"
			                                   data-title="Delete Confirmation!"
			                                   data-message="You are about to delete {{ $status->name }} record, this procedure is irreversible. Do you want to proceed?">
			                                    Batal / <i>Cancel</i>
			                                    <div class="ripple-container"></div>
			                                </a> 
			                                <a href="{{ route('member-tempahan-kemudahan.edit', $status->id) }}" class="btn btn-primary btn-sm btn-block">Kemaskini / <i>Edit</i></a>
			                            @elseif($status->status == 'canceled')
			                            	<a href="{{ url('account/member-application-status/'. $status->id .'/convenience') }}" class="btn btn-default btn-sm btn-block"><i class="material-icons">remove_red_eye</i></a>
			                            	{{-- <button class="btn btn-danger btn-sm btn-block" disabled>Batal</button>  --}}
			                            @elseif($status->status == 'finished')
			                            	{{-- <button class="btn btn-danger btn-sm btn-block" disabled>Selesai</button> --}}
			                            	@if(!empty($status->receipt_number))
			                            		@if(file_exists(public_path('files/lulus_' . $status->number . '.pdf')))
			                            			<a href="{{ url('files/lulus_' . $status->number . '.pdf') }}" class="btn btn-success btn-sm btn-block"><i class="material-icons">print</i></a>
			                            		@else
			                            			<button class="btn btn-success btn-sm btn-block" disabled>Selesai / <i>Done</i></button>
			                            		@endif
		                                    @else
			                                    <button class="btn btn-success btn-sm btn-block" disabled>Selesai / <i>Done</i></button>
		                                    @endif
			                            @elseif($status->status == 'completed')
			                            	<button class="btn btn-primary btn-sm btn-block" disabled>Kemaskini / <i>Edit</i></button>
			                            @endif
		                            @elseif($status->type == 'other')
		                            	@if($status->status == 'processed')
			                            	<a href="javascript:void(0)"
			                                   data-toggle="modal"
			                                    class="btn btn-danger btn-sm btn-block"
			                                   data-target="#modal-delete"
			                                   data-action="{{ route('member-application-status.destroy', $status->id) }}"
			                                   data-title="Delete Confirmation!"
			                                   data-message="You are about to delete {{ $status->name }} record, this procedure is irreversible. Do you want to proceed?">
			                                    Batal / Cancel
			                                    <div class="ripple-container"></div>
			                                </a>
			                            @elseif($status->status == 'canceled')
			                            	<a href="{{ url('account/member-application-status/'. $status->id .'/other') }}" class="btn btn-default btn-sm btn-block"><i class="material-icons">remove_red_eye</i></a>
			                            	{{-- <button class="btn btn-danger btn-sm btn-block" disabled>Batal</button>  --}}
			                            @elseif($status->status == 'finished')
			                            	{{-- <button class="btn btn-danger btn-sm btn-block" disabled>Selesai</button> --}}
			                            	@if(!empty($status->receipt_number))
			                            		@if(file_exists(public_path('files/lulus_' . $status->number . '.pdf')))
			                            			<a href="{{ url('files/lulus_' . $status->number . '.pdf') }}" class="btn btn-success btn-sm btn-block"><i class="material-icons">print</i></a>
			                            		@else
			                            			<button class="btn btn-success btn-sm btn-block" disabled>Selesai / Done</button>
			                            		@endif
		                                        {{-- <a href="{{ url('files/lulus_' . $status->number . '.pdf') }}" class="btn btn-success btn-sm btn-block"><i class="material-icons">print</i></a> --}}
		                                    @else
			                                    <button class="btn btn-success btn-sm btn-block" disabled>Selesai / Done</button>
		                                    @endif
			                            @elseif($status->status == 'completed')
			                            	<button class="btn btn-primary btn-sm btn-block" disabled>Kemaskini / Edit</button>
			                            @endif
		                            	{!! ($status->status == 'processed' ? '<a href="'. route('member-aktiviti-lain.edit', $status->id) .'" class="btn btn-primary btn-sm btn-block">Kemaskini / <i>Edit</i></a>' : '') !!}
									@endif
								</td>
							</tr>
						@endforeach
					@else
						<tr>
							<td align="center" colspan="7">Anda tidak pernah membuat sebarang permohonan <br><i>You have never made any application</i></td>
						</tr>
					@endif
				</tbody>
			</table>
			@php /*
			<table class="table table-bordered">
				<thead>
					<tr class="active">
						<th style="width: 1%">No.</th>
						<th>No Permohonan</th>
						<th>Tarikh Permohonan</th>
						{{-- <th>Nama Pemohon</th>
						<th>No K/P or Pasport</th> --}}
						<th>Jenis Permohonan</th>
						<th>Lokasi</th>
						<th width="10%">Tarikh Aktiviti <br />Mula & Akhir</th>
						<th>Bil. Peserta/Unit</th>
						<th>Jumlah Perlu Dibayar</th>
						<th>Status</th>
						<th>Tindakan</th>
					</tr>
				</thead>
				<tbody>
					@php($index = (($statuses->currentPage() - 1) * $statuses->perpage()) + 1)

					@if(!$statuses->isEmpty())
						@foreach($statuses as $status)
							<tr>
								<td style="width: 1%">{{ $index++ }}</td>
								<td>{{ (!empty($status->number) ? $status->number : '') }}</td>
								<td>{{ (!empty($status->created_at) ? date('d/m/Y', strtotime($status->created_at)) : '-') }}</td>
								{{-- <td>{{ $status->user->name }}</td>
								<td>{{ ($status->user->profile->citizen == '1' ? $status->user->profile->nokp : $status->user->profile->passport) }}</td> --}}
								<td>
									@if($status->type == 'hiking')	
										Aktiviti Pendakian
									@elseif($status->type == 'convenience')
										Tempahan Kemudahan
									@elseif($status->type == 'other')
										Lain-lain Aktiviti
									@endif
								</td>
								<td>
									@if($status->type == 'other')
										Negeri: {{ (!empty($status->applicantOtherActivity->state->name) ? $status->applicantOtherActivity->state->name : '-') }}<br />
										Daerah: {{ (!empty($status->applicantOtherActivity->area->name) ? $status->applicantOtherActivity->area->name : '-') }}<br />
										@if($status->applicantOtherActivity->type == 'hsk')
											TER/HTN/HSK: {{ (!empty($status->applicantOtherActivity->permanent_forest->name) ? $status->applicantOtherActivity->permanent_forest->name : '') }}
										@else
											TER/HTN/HSK: {{ (!empty($status->applicantOtherActivity->eco_park->name) ? $status->applicantOtherActivity->eco_park->name : '') }}
										@endif

									@elseif($status->type == 'hiking')
										Negeri: {{ (!empty($status->hikingLocation->state->name) ? $status->hikingLocation->state->name : '-') }}<br />
										Daerah: {{ (!empty($status->hikingLocation->area->name) ? $status->hikingLocation->area->name : '-') }}<br />
										TER/HTN/HSK: {{ (!empty($status->hikingInformation->mountain->name) ? $status->hikingInformation->mountain->name : '-') }}
									@elseif($status->type == 'convenience')
										Negeri: {{ (!empty($status->applicantConvenience->state->name) ? $status->applicantConvenience->state->name : '-') }}<br />
										Daerah: {{ (!empty($status->applicantConvenience->area->name) ? $status->applicantConvenience->area->name : '-') }}<br />
										TER/HTN/HSK: {{ (!empty($status->applicantConvenience->eco_park->name) ? $status->applicantConvenience->eco_park->name : '-') }}
									@endif
								</td>
								<td>
									@if($status->type == 'hiking')
										{{ date('d/m/Y', strtotime($status->hikingInformation->starting_date)) }} - {{ date('d/m/Y', strtotime($status->hikingInformation->ending_date)) }}
									@elseif($status->type == 'convenience')
										{{ date('d/m/Y', strtotime($status->applicantConvenience->starting_date)) }} - {{ date('d/m/Y', strtotime($status->applicantConvenience->ending_date)) }}
									@elseif($status->type == 'other')
										@if(!empty($status->applicantOtherActivity->applicant_other_activity_detail->starting_date))
											{{ date('d/m/Y', strtotime($status->applicantOtherActivity->applicant_other_activity_detail->starting_date)) }} - {{ date('d/m/Y', strtotime($status->applicantOtherActivity->applicant_other_activity_detail->ending_date)) }}
										@else
											-
										@endif
										
									@endif

									{{ $status->id }}
								</td>
								
								<td>

									@if($status->type == 'hiking')
										@if($status->hikingParticipant->isEmpty())
											Tiada Maklumat
										@else
											
											@php($hikers = 1)
											
											@foreach($status->hikingParticipant as $participant)
												{{ $hikers++ }}. 
												<a href="{{ url('account/member-aktiviti-pendakian/' . $status->id . '/' . $participant->id . '/edit') }}">{{ $participant->hikingBiodata->fullname }}</a>
												<br />
											@endforeach
											
										@endif
									@else
										@if(!empty($status->hikingInformation->participants_total))
											{{ $status->hikingInformation->participants_total }} Orang
										@elseif(!empty($status->applicantOtherActivity->applicant_other_activity_detail->participant))
											{{ $status->applicantOtherActivity->applicant_other_activity_detail->participant }} Orang
										@elseif(!empty($status->applicantConvenience))
											@if($status->applicantConvenience->convenience_category_id == '2' OR $status->applicantConvenience->convenience_category_id == '3')
												{{ $status->applicantConvenience->participant }} Orang
											@else
												{{ $status->applicantConvenience->participant }} Unit
											@endif
											{{-- {{ dd($status->applicantConvenience) }} --}}
											{{-- @php($participant = 0)
											@foreach($status->applicantConvenience as $convenience)
												@php($participant += $convenience->participant)
											@endforeach

											{{ $participant }} Orang --}}
										@endif
									@endif
								</td>
								<td>RM {{ $status->amount }}</td>
								<td>
									@if($status->status == 'new')
										Baru
									@elseif($status->status == 'processed')
										Sedang Diproses
									@elseif($status->status == 'completed')
										Perlu Dibayar
									@elseif($status->status == 'finished')
										Selesai
									@elseif($status->status == 'canceled')
										Batal
									@endif
								</td>
								<td>
									@if($status->type == 'hiking')
										@if($status->user_id == auth()->guard('applicant')->user()->id)
											@if($status->status == 'new')
												
												@if($status->hikingInformation->participants_total == $status->hikingParticipant->count())
													<a href="{{ url('account/member-aktiviti-pendakian/process/' . $status->id) }}" class="btn btn-success btn-sm btn-block">Hantar</a> 
												@else
													<a href="#" 
													   class="btn btn-default btn-sm btn-block"
													   data-toggle="modal"
					                                   data-target="#modal-notification"
					                                   {{-- data-action="{{ route('member-application-status.destroy', $status->id) }}" --}}
					                                   data-title="Maklumat"
					                                   data-message="Peserta program pendakian belum memenuhi kapasiti"
													   >Hantar</a> 
												@endif

												<a href="javascript:void(0)"
												   class="btn btn-danger btn-sm btn-block"
				                                   data-toggle="modal"
				                                   data-target="#modal-delete"
				                                   data-action="{{ route('member-application-status.destroy', $status->id) }}"
				                                   data-title="Delete Confirmation!"
				                                   data-message="You are about to delete {{ $status->name }} record, this procedure is irreversible. Do you want to proceed?">
				                                    Batal
				                                    <div class="ripple-container"></div>
				                                </a> 
				                                <a href="{{ route('member-aktiviti-pendakian.edit', $status->id) }}" class="btn btn-primary btn-sm btn-block">Kemaskini</a>
											@endif
											@if($status->status == 'processed')
												<a href="javascript:void(0)"
												   class="btn btn-danger btn-sm btn-block"
				                                   data-toggle="modal"
				                                   data-target="#modal-delete"
				                                   data-action="{{ route('member-application-status.destroy', $status->id) }}"
				                                   data-title="Delete Confirmation!"
				                                   data-message="You are about to delete {{ $status->name }} record, this procedure is irreversible. Do you want to proceed?">
				                                    Batal
				                                    <div class="ripple-container"></div>
				                                </a> 
				                                <a href="{{ route('member-aktiviti-pendakian.edit', $status->id) }}" class="btn btn-primary btn-sm btn-block">Kemaskini</a>
											@elseif($status->status == 'canceled')
												<a href="{{ url('account/member-application-status/'. $status->id .'/hiking') }}" class="btn btn-default btn-sm btn-block"><i class="material-icons">remove_red_eye</i></a>
				                            	{{-- <button class="btn btn-danger btn-sm btn-block" disabled>Batal</button>  --}}
				                            @elseif($status->status == 'finished')
				                            	{{-- <button class="btn btn-danger btn-sm btn-block" disabled>Selesai</button> --}}
				                            	@if(!empty($status->receipt_number))
				                            		@if(file_exists(public_path('files/lulus_' . $status->number . '.pdf')))
				                            			<a href="{{ url('files/lulus_' . $status->number . '.pdf') }}" class="btn btn-success btn-sm btn-block"><i class="material-icons">print</i></a>
				                            		@else
				                            			<button class="btn btn-success btn-sm btn-block" disabled>Selesai</button>
				                            		@endif
			                                        {{-- <a href="{{ url('files/lulus_' . $status->number . '.pdf') }}" class="btn btn-success btn-sm btn-block"><i class="material-icons">print</i></a> --}}
			                                    @else
			                                    	<button class="btn btn-success btn-sm btn-block" disabled>Selesai</button>
			                                    @endif
				                            @elseif($status->status == 'completed')
				                            	<button class="btn btn-primary btn-sm btn-block" disabled>Kemaskini</button>
				                            @endif
			                            
										@endif
									@elseif($status->type == 'convenience')

										@if($status->status == 'processed')
											<a href="javascript:void(0)"
			                                   data-toggle="modal"
			                                    class="btn btn-danger btn-sm btn-block"
			                                   data-target="#modal-delete"
			                                   data-action="{{ route('member-application-status.destroy', $status->id) }}"
			                                   data-title="Delete Confirmation!"
			                                   data-message="You are about to delete {{ $status->name }} record, this procedure is irreversible. Do you want to proceed?">
			                                    Batal
			                                    <div class="ripple-container"></div>
			                                </a> 
			                                <a href="{{ route('member-tempahan-kemudahan.edit', $status->id) }}" class="btn btn-primary btn-sm btn-block">Kemaskini</a>
			                            @elseif($status->status == 'canceled')
			                            	<a href="{{ url('account/member-application-status/'. $status->id .'/convenience') }}" class="btn btn-default btn-sm btn-block"><i class="material-icons">remove_red_eye</i></a>
			                            	{{-- <button class="btn btn-danger btn-sm btn-block" disabled>Batal</button>  --}}
			                            @elseif($status->status == 'finished')
			                            	{{-- <button class="btn btn-danger btn-sm btn-block" disabled>Selesai</button> --}}
			                            	@if(!empty($status->receipt_number))
			                            		@if(file_exists(public_path('files/lulus_' . $status->number . '.pdf')))
			                            			<a href="{{ url('files/lulus_' . $status->number . '.pdf') }}" class="btn btn-success btn-sm btn-block"><i class="material-icons">print</i></a>
			                            		@else
			                            			<button class="btn btn-success btn-sm btn-block" disabled>Selesai</button>
			                            		@endif
		                                    @else
			                                    <button class="btn btn-success btn-sm btn-block" disabled>Selesai</button>
		                                    @endif
			                            @elseif($status->status == 'completed')
			                            	<button class="btn btn-primary btn-sm btn-block" disabled>Kemaskini</button>
			                            @endif
		                            @elseif($status->type == 'other')
		                            	@if($status->status == 'processed')
			                            	<a href="javascript:void(0)"
			                                   data-toggle="modal"
			                                    class="btn btn-danger btn-sm btn-block"
			                                   data-target="#modal-delete"
			                                   data-action="{{ route('member-application-status.destroy', $status->id) }}"
			                                   data-title="Delete Confirmation!"
			                                   data-message="You are about to delete {{ $status->name }} record, this procedure is irreversible. Do you want to proceed?">
			                                    Batal
			                                    <div class="ripple-container"></div>
			                                </a>
			                            @elseif($status->status == 'canceled')
			                            	<a href="{{ url('account/member-application-status/'. $status->id .'/other') }}" class="btn btn-default btn-sm btn-block"><i class="material-icons">remove_red_eye</i></a>
			                            	{{-- <button class="btn btn-danger btn-sm btn-block" disabled>Batal</button>  --}}
			                            @elseif($status->status == 'finished')
			                            	{{-- <button class="btn btn-danger btn-sm btn-block" disabled>Selesai</button> --}}
			                            	@if(!empty($status->receipt_number))
			                            		@if(file_exists(public_path('files/lulus_' . $status->number . '.pdf')))
			                            			<a href="{{ url('files/lulus_' . $status->number . '.pdf') }}" class="btn btn-success btn-sm btn-block"><i class="material-icons">print</i></a>
			                            		@else
			                            			<button class="btn btn-success btn-sm btn-block" disabled>Selesai</button>
			                            		@endif
		                                        {{-- <a href="{{ url('files/lulus_' . $status->number . '.pdf') }}" class="btn btn-success btn-sm btn-block"><i class="material-icons">print</i></a> --}}
		                                    @else
			                                    <button class="btn btn-success btn-sm btn-block" disabled>Selesai</button>
		                                    @endif
			                            @elseif($status->status == 'completed')
			                            	<button class="btn btn-primary btn-sm btn-block" disabled>Kemaskini</button>
			                            @endif
		                            	{!! ($status->status == 'processed' ? '<a href="'. route('member-aktiviti-lain.edit', $status->id) .'" class="btn btn-primary btn-sm btn-block">Kemaskini</a>' : '') !!}
									@endif
								</td>
							</tr>
						@endforeach
					@else
						<tr>
							<td colspan="10" align="center">Anda Tidak Pernah Membuat Sebarang Permohonan</td>
						</tr>
					@endif
					
				</tbody>
			</table>
			*/ @endphp

			{{ $statuses->links() }}
			<div class="pull-right" style="margin-top: 20px;">
				Showing {{($statuses->currentpage()-1)*$statuses->perpage()+1}} to {{$statuses->currentpage()*$statuses->perpage()}} of  {{$statuses->total()}} entries
			</div>
		</div>
	</div>
@endsection

{{-- @section('scripts')
	@include('account.partials.script.applicationcancel')
@endsection --}}


@section('modal')
    @include('partials.modal_delete')
    @include('partials.modal_form')
    @include('partials.modal_notification')
@endsection