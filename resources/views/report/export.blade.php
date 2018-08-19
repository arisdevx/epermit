<table border="1" width="100%" cellspacing="0" cellpadding="0">
    <thead>
        <tr class="active">
            <th style="width: 1%">No.</th>
            <th>Tarikh Permohonan</th>
            <th>No Permohonan</th>
            <th>Nama Pemohon</th>
            <th>No K/P & Pasport</th>
            <th>Kategori Permohonan</th>
            <th>Tarikh Mula</th>
            <th>Tarikh Akhir</th>
        </tr>
    </thead>
    <tbody>
        @php($index = 1)
        @if(!$statuses->isEmpty())
        @foreach($statuses as $status)
             <tr>
                <td style="width: 1%">{{ $index }}</td>
                <td>{{ date('d/m/Y', strtotime($status->created_at)) }}</td>
                <td>{{ $status->number }}</td>
                <td>{{ $status->user->name }}</td>
                <td>
                    @if($status->user->profile->citizen == '1')
                        {{ $status->user->profile->nokp }}
                    @else
                        {{ $status->user->profile->passport }}
                    @endif
                </td>
                <td>
                    @if($status->type == 'hiking')
                        Aktiviti Pendakian
                    @elseif($status->type == 'convenience')
                        Tempahan Kemudahan
                    @elseif($status->type == 'other')
                        Lain-lain Aktiviti
                    @endif
                </td>                 
                <td style="text-align: right;">
                    @if($status->type == 'hiking')
                        {{ date('d/m/Y', strtotime($status->hikingInformation->starting_date)) }}
                    @elseif($status->type == 'convenience')
                        {{ date('d/m/Y', strtotime($status->applicantConvenience->starting_date)) }}
                    @elseif($status->type == 'other')
                        {{ date('d/m/Y', strtotime($status->applicantOtherActivity->applicant_other_activity_detail->starting_date)) }}
                    @endif
                </td>
                <td style="text-align: right;">
                    @if($status->type == 'hiking')
                        {{ date('d/m/Y', strtotime($status->hikingInformation->ending_date)) }}
                    @elseif($status->type == 'convenience')
                        {{ date('d/m/Y', strtotime($status->applicantConvenience->ending_date)) }}
                    @elseif($status->type == 'other')
                        {{ date('d/m/Y', strtotime($status->applicantOtherActivity->applicant_other_activity_detail->ending_date)) }}
                    @endif
                </td>
            </tr>
        @endforeach
        @else
        <tr>
            <td colspan="9" align="center">No records found!</td>
        </tr>
        @endif
    </tbody>
</table>