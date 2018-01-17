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
			<p class="category">Senarai permohonan program</p>
		</div>

		<div class="card-content">
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
										{{ date('d/m/Y', strtotime($status->applicantOtherActivity->applicant_other_activity_detail->starting_date)) }} - {{ date('d/m/Y', strtotime($status->applicantOtherActivity->applicant_other_activity_detail->ending_date)) }}
									@endif
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
												<a href="{{ url('account/member-aktiviti-pendakian/process/' . $status->id) }}" class="btn btn-success btn-sm btn-block">Hantar</a> 
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

			{{ $statuses->links() }}
		</div>
	</div>
@endsection

{{-- @section('scripts')
	@include('account.partials.script.applicationcancel')
@endsection --}}


@section('modal')
    @include('partials.modal_delete')
    @include('partials.modal_form')
@endsection