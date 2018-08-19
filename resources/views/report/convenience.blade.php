<table border="1" cellpadding="5" cellspacing="0" style="margin-bottom: 10px; width: 30%">
    <tr>
        <th colspan="2">Pemohon</th>
    </tr>
    <tr>
        <td>Nama</td>
        <td>{{ $applicant->user->name }}</td>
    </tr>
    <tr>
        <td>ID/IC/Passport No.</td>
        <td>{{ $applicant->user->username }}</td>
    </tr>
</table>
<table width="100%" border="1" cellspacing="0" cellpadding="3">
    <thead>
        <tr>
            <th>No</th>
            <th>Maklumat Permohonan</th>
            <th>Tarikh Mula</th>
            <th>Tarikh Akhir</th>
            <th>Bil Hari</th>
            <th>Kemudahan</th>
        </tr>
    </thead>
    <tbody>
        @if(!$applicant->applicant_convenience->isEmpty())
            @php($no = 1)
            @foreach($applicant->applicant_convenience as $convenience)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>
                        Negeri: <strong>{{ (!empty($convenience->state->name) ? $convenience->state->name : '-') }}</strong><br />
                        Daerah: <strong>{{ (!empty($convenience->area->name) ? $convenience->area->name : '-') }}</strong><br />
                        TER/HTN:    <strong>@if($convenience->eco_park_type == 'ter')
                                        Taman Eko-Rimba (TER)
                                    @elseif($convenience->eco_park_type == 'htn')
                                        Hutan Taman Negeri (HTN)
                                    @elseif($convenience->eco_park_type == 'hsk')
                                        Hutan Simpan Kekal (HSK)
                                    @endif
                                    </strong>
                                    <br />
                        Nama TER/HTN: <strong>{{ (!empty($convenience->eco_park->name) ? $convenience->eco_park->name : '-') }}</strong><br />
                    </td>
                    <td>{{ date('d/m/Y', strtotime($convenience->starting_date)) }}</td>
                    <td>{{ date('d/m/Y', strtotime($convenience->ending_date)) }}</td>
                    <td>{{ (!empty($convenience->days_total) ? $convenience->days_total : '-') }} Hari</td>
                    <td>
                        @if($convenience->convenience_category_id == '2' OR $convenience->convenience_category_id == '3')
                            {{ (!empty($convenience->participant) ? $convenience->participant : '-') }} Orang 
                            @if($applicant->applicantConvenience->nationality == '0')
                                Bukan Warganegara
                            @else
                                Warganegara
                            @endif
                        @else
                            {{ (!empty($convenience->participant) ? $convenience->participant : '-') }} Unit {{ (!empty($convenience->convenience->convenience_category->name) ? $convenience->convenience->convenience_category->name : '-') }} - {{ (!empty($convenience->convenience->convenience_sub_category->name) ? $convenience->convenience->convenience_sub_category->name : '-') }}
                        @endif
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>
            