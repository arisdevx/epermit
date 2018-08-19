@extends('layouts.panel')

@section('content')
<div class="row">

    <div class="card card-nav-tabs">
        <div class="card-header" data-background-color="green">
            <h4 class="title">Kajian Semula Tempahan Kemudahan</h4>
            <p class="category">Kajian semula tempahan kemudahan </p>
        </div>

        <div class="card-content">
            <table class="table table-bordered" style="margin-bottom: 10px; width: 30%">
                <thead>
                    <tr class="active">
                        <th colspan="2"><strong>Pemohon</strong></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Nama</td>
                        <td>{{ $applicant->user->name }}</td>
                    </tr>
                    <tr>
                        <td>ID/IC/Passport No.</td>
                        <td>{{ $applicant->user->username }}</td>
                    </tr>
                </tbody>
            </table>
            <table class="table table-bordered" style="margin-top: 10px;">
                <thead>
                    <tr class="active">
                        <th colspan="6" style="text-align: center;"><strong>A. Maklumat Pendakian</strong></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th width="20%">Negeri</th>
                        <td>{{ $location->state->name }}</td>
                    </tr>
                    <tr>
                        <th>Daerah</th>
                        <td>{{ $location->area->name }}</td>
                    </tr>
                    <tr>
                        <th>Hutan Simpan Kekal</th>
                        <td>{{ (!empty($information->permanent_forest->name) ? $information->permanent_forest->name : '-') }}</td>
                    </tr>
                    <tr>
                        <th>Nama Gunung</th>
                        <td>{{ $information->mountain->name }}</td>
                    </tr>
                    <tr>
                        <th>Tarikh Mula</th>
                        <td>{{ date('d/m/Y', strtotime($information->starting_date)) }}</td>
                    </tr>
                    
                    <tr>
                        <th>Tarikh Tamat</th>
                        <td>{{ date('d/m/Y', strtotime($information->ending_date)) }}</td>
                    </tr>
                    
                    <tr>
                        <th>Nama Malim Gunung</th>
                        <td>{{ $information->mountain_guide }}</td>
                    </tr>
                    <tr>
                        <th>Jumlah Peserta</th>
                        <td>{{ $information->participants_total }} Orang</td>
                    </tr>
                    <tr>
                        <th>Harga</th>
                        <td>RM {{ $information->mountain->price }}</td>
                    </tr>
                    <tr>
                        <th>Caj Permit</th>
                        <td>RM {{ $information->mountain->other_price }}</td>
                    </tr>
                    <tr>
                        <th>Jumlah Bayaran</th>
                        <td>RM {{ ($information->amount) }}</td>
                    </tr>
                </tbody>
            </table>

            {{-- @if(!empty($applicant->hiking_campground))
                <table class="table table-bordered" style="margin-top: 10px">
                    <thead>
                        <tr class="active">
                            <th colspan="2">Kem Tapak Perkhemahan</th>
                            <th>Bilangan Hari</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($i = 1)
                        @php($days = config('days'))
                        @foreach($applicant->hiking_campground as $campground)
                            <tr>
                                <td width="20%">{{ $days[$i] }}</td>
                                <td>{{ $campground->mountain_campground->name }}</td>
                                <td>{{ $campground->day }}</td>
                            </tr>
                            @php($i++)
                        @endforeach
                    </tbody>
                </table>
            @endif --}}
            <table class="table table-bordered" style="margin-top: 10px;">
                <thead>
                    <tr class="active">
                        <th colspan="6" style="text-align: center;"><strong>B. Maklumat Pendaki</strong></th>
                    </tr>
                </thead>
                <tbody>
                     <tr>
                        <th width="20%">No. KP/No. Passport</th>
                        <td width="30%">{{ $biodata->ic_number }}</td>
                        <th width="20%">Nama Penuh</th>
                        <td width="30%" colspan="3">{{ $biodata->fullname }}</td>
                    </tr>
                    <tr>
                        <th width="15%">Tarikh Lahir</th>
                        <td width="15%">{{ date('d/m/Y', strtotime($biodata->birthday)) }}</td>
                        <th width="20%">Umur</th>
                        <td width="30%" colspan="1">{{ $biodata->age }}</td>
                        <th width="20%">Jantina</th>
                        <td width="30%">{{ ($biodata->gender == 'M' ? 'Lelaki' : 'Perempuan') }}</td>
                    </tr>
                    <tr>
                        <th width="20%">No. Telefon</th>
                        <td width="30%">{{ $biodata->phone }}</td>
                        <th width="20%">Alamat</th>
                        <td width="30%" colspan="3">{{ $biodata->address }}</td>
                    </tr>
                    <tr>
                        <th width="15%">Warganegara</th>
                        <td width="15%">{{ ($biodata->nationality == 1 ? 'Warganegara' : 'Bukan Warganegara') }}</td>
                        <th width="20%">Negeri</th>
                        <td width="30%" colspan="1">{{ $biodata->state->name }}</td>
                        <th width="20%">Poskod</th>
                        <td width="30%">{{ $biodata->postcode }}</td>
                    </tr>
                </tbody>
            </table>
            <table class="table table-bordered" style="margin-top: 10px;">
                <thead>
                    <tr class="active">
                        <th colspan="6" style="text-align: center;"><strong>C. Maklumat Orang Untuk Dihubungi Jika Berlaku Kecemasan</strong></th>
                    </tr>
                </thead>
                <tbody>
                     <tr>
                        <th width="20%">Nama Penuh</th>
                        <td>{{ $emergency->name }}</td>
                     </tr>
                     <tr>
                        <th>No. Telefon</th>
                        <td>{{ $emergency->phone }}</td>
                     </tr>
                     <tr>
                        <th>Alamat Tempat Tinggal</th>
                        <td>{{ $emergency->address }}</td>
                     </tr>
                      <tr>
                        <th>Sekiranya Berbeza <br />Daripada Alamat Pendaki</th>
                        <td>{{ $emergency->second_address }}</td>
                     </tr>
                     <tr>
                        <th>Negeri</th>
                        <td>{{ $emergency->state->name }}</td>
                     </tr>
                     <tr>
                        <th>Poskod</th>
                        <td>{{ $emergency->postcode }}</td>
                     </tr>
                </tbody>
            </table>
            <table class="table table-bordered" style="margin-top: 10px;">
                <thead>
                    <tr class="active">
                        <th colspan="6" style="text-align: center;"><strong>D. Maklumat Polisi Insurans</strong></th>
                    </tr>
                </thead>
                <tbody>
                     <tr>
                        <th width="20%">Nama Syarikat Insurans</th>
                        <td>{{ $insurance->name }}</td>
                     </tr>
                     <tr>
                        <th>No. Polisi Insurans</th>
                        <td>{{ $insurance->code }}</td>
                     </tr>
                </tbody>
            </table>
            <table class="table table-bordered" style="margin-top: 10px;">
                <thead>
                    <tr class="active">
                        <th colspan="5" style="text-align: center;"><strong>E. Maklumat Kesihatan Pendaki</strong></th>
                    </tr>
                </thead>
                <tbody>
                     <tr>
                        <th colspan="2">Bahagian 1 <i>Part 1</i></th>
                        <th align="center" style="text-align: center;">Status</th>
                        <th align="center" style="text-align: center;">Catatan <i>Notes</i></th>
                    </tr>
                    <tr>
                        <td width="2%" valign="top" align="center">1.</td>
                        <td width="70%">Adakah anda sedang menerima rawatan? Jika ada sila nyatakan. <i>Are you under treatment? If YES, please spesify</i></td>
                        <td align="center">{{ (getHealthy('treatment', $health->id)->status == 'Y' ? 'Ya' : 'Tidak') }}</td>
                        <td>{{ getHealthy('treatment', $health->id)->notes }}</td>
                    </tr>
                    <tr>
                        <td width="2%" valign="top" align="center">2.</td>
                        <td>Adakah anda pernah dimasukan ke hospital atas apa-apa penyakit? Jika ADA, sila nyatakan tarikh dan sebab. <i>Have you ever been hospitalized for any disease? If YES, pleas spesify the date and reason.</i></td>
                        <td align="center">{{ (getHealthy('hospital', $health->id)->status == 'Y' ? 'Ya' : 'Tidak') }}</td>
                        <td>{{ getHealthy('hospital', $health->id)->notes }}</td>
                    </tr>
                    <tr>
                        <th colspan="2">Bahagian 2 (Pernah anda mengalami situasi berikut?)<i>Part 1 (Have you experienced the following situation?)</i></th>
                        <th align="center" style="text-align: center;">Status</th>
                        <th align="center" style="text-align: center;">Catatan <i>Notes</i></th>
                    </tr>
                    <tr>
                        <td width="2%" valign="top" align="center">1.</td>
                        <td>Masalah pening, pitam atau pengsan <i>Dizziness, blacked or paralysis</i></td>
                        <td align="center">{{ (getHealthy('blacked', $health->id)->status == 'Y' ? 'Ya' : 'Tidak') }}</td>
                        <td>{{ getHealthy('blacked', $health->id)->notes }}</td>
                    </tr>
                    <tr>
                        <td width="2%" valign="top" align="center">2.</td>
                        <td>Sawan dan Kelumpuhan <i>Fits/Epilepsy or Paralysis</i></td>
                        <td align="center">{{ (getHealthy('fits', $health->id)->status == 'Y' ? 'Ya' : 'Tidak') }}</td>
                        <td>{{ getHealthy('fits', $health->id)->notes }}</td>
                    </tr>
                    <tr>
                        <td width="2%" valign="top" align="center">3.</td>
                        <td>Selalu Sakit Kepala <i>Frequent Headache/Migraine</i></td>
                        <td align="center">{{ (getHealthy('migraine', $health->id)->status == 'Y' ? 'Ya' : 'Tidak') }}</td>
                        <td>{{ getHealthy('migraine', $health->id)->notes }}</td>
                    </tr>
                    <tr>
                        <td width="2%" valign="top" align="center">4.</td>
                        <td>Kencing Manis <i>Diabetes</i></td>
                        <td align="center">{{ (getHealthy('diabetes', $health->id)->status == 'Y' ? 'Ya' : 'Tidak') }}</td>
                        <td>{{ getHealthy('diabetes', $health->id)->notes }}</td>
                    </tr>
                    <tr>
                        <td width="2%" valign="top" align="center">5.</td>
                        <td>Tekanan Darah Tinggi/Tekanan Darah Rendah <i>High/Low Blood Pressure</i></td>
                        <td align="center">{{ (getHealthy('highblood', $health->id)->status == 'Y' ? 'Ya' : 'Tidak') }}</td>
                        <td>{{ getHealthy('highblood', $health->id)->notes }}</td>
                    </tr>
                    <tr>
                        <td width="2%" valign="top" align="center">6.</td>
                        <td>Penyakit Jantung dan Saluran Darah <i>Cardiovascular Diseases</i></td>
                        <td align="center">{{ (getHealthy('cardiovascular', $health->id)->status == 'Y' ? 'Ya' : 'Tidak') }}</td>
                        <td>{{ getHealthy('cardiovascular', $health->id)->notes }}</td>
                    </tr>
                    <tr>
                        <td width="2%" valign="top" align="center">7.</td>
                        <td>Demam Berpanjangan <i>Prolonged Fever</i></td>
                        <td align="center">{{ (getHealthy('fever', $health->id)->status == 'Y' ? 'Ya' : 'Tidak') }}</td>
                        <td>{{ getHealthy('fever', $health->id)->notes }}</td>
                    </tr>
                    <tr>
                        <td width="2%" valign="top" align="center">8.</td>
                        <td>Demam Kura <i>Malaria</i></td>
                        <td align="center">{{ (getHealthy('malaria', $health->id)->status == 'Y' ? 'Ya' : 'Tidak') }}</td>
                        <td>{{ getHealthy('malaria', $health->id)->notes }}</td>
                    </tr>
                    <tr>
                        <td width="2%" valign="top" align="center">9.</td>
                        <td>Lelah <i>Asthma</i></td>
                        <td align="center">{{ (getHealthy('asthma', $health->id)->status == 'Y' ? 'Ya' : 'Tidak') }}</td>
                        <td>{{ getHealthy('asthma', $health->id)->notes }}</td>
                    </tr>
                    <tr>
                        <td width="2%" valign="top" align="center">10.</td>
                        <td>Batuk Kering/Tibi/Radang Paru-paru <i>Dry Cough/Tuberculosis/Pneumoni</i></td>
                        <td align="center">{{ (getHealthy('drycough', $health->id)->status == 'Y' ? 'Ya' : 'Tidak') }}</td>
                        <td>{{ getHealthy('drycough', $health->id)->notes }}</td>
                    </tr>
                    <tr>
                        <td width="2%" valign="top" align="center">11.</td>
                        <td>Masalah Buang Pinggang/Kencing <i>Kedney/Urinary Problems</i></td>
                        <td align="center">{{ (getHealthy('urine', $health->id)->status == 'Y' ? 'Ya' : 'Tidak') }}</td>
                        <td>{{ getHealthy('urine', $health->id)->notes }}</td>
                    </tr>
                    <tr>
                        <td width="2%" valign="top" align="center">12.</td>
                        <td>Pernah Mengalami Sebarang Pembedahan <i>Surgical Operation</i></td>
                        <td align="center">{{ (getHealthy('surgical', $health->id)->status == 'Y' ? 'Ya' : 'Tidak') }}</td>
                        <td>{{ getHealthy('surgical', $health->id)->notes }}</td>
                    </tr>
                    <tr>
                        <td width="2%" valign="top" align="center">13.</td>
                        <td>Pernah Mengalami Kecederaan Kepala/Anggota Batan Yang Teruk <i>Head/Limb Injuries</i></td>
                        <td align="center">{{ (getHealthy('limb', $health->id)->status == 'Y' ? 'Ya' : 'Tidak') }}</td>
                        <td>{{ getHealthy('limb', $health->id)->notes }}</td>
                    </tr>
                    <tr>
                        <td width="2%" valign="top" align="center">14.</td>
                        <td>Kecacatan Anggota/Deria <i>Deformities-physical/sense</i></td>
                        <td align="center">{{ (getHealthy('deformities', $health->id)->status == 'Y' ? 'Ya' : 'Tidak') }}</td>
                        <td>{{ getHealthy('deformities', $health->id)->notes }}</td>
                    </tr>
                    <tr>
                        <td width="2%" valign="top" align="center">15.</td>
                        <td>Penyakit Kurang Darah/Masalah Pendarahan <i>Anaemia & Bleeding Disorders</i></td>
                        <td align="center">{{ (getHealthy('anaemia', $health->id)->status == 'Y' ? 'Ya' : 'Tidak') }}</td>
                        <td>{{ getHealthy('anaemia', $health->id)->notes }}</td>
                    </tr>
                    <tr>
                        <td width="2%" valign="top" align="center">16.</td>
                        <td>Adakah Anda Merokok <i>Cigarette Smoking</i></td>
                        <td align="center">{{ (getHealthy('smoking', $health->id)->status == 'Y' ? 'Ya' : 'Tidak') }}</td>
                        <td>{{ getHealthy('smoking', $health->id)->notes }}</td>
                    </tr>
                    <tr>
                        <td width="2%" valign="top" align="center">17.</td>
                        <td>Lain-lain Penyakit Untuk Diberitahu <i>Other Illness</i></td>
                        <td align="center">{{ (getHealthy('other', $health->id)->status == 'Y' ? 'Ya' : 'Tidak') }}</td>
                        <td>{{ getHealthy('other', $health->id)->notes }}</td>
                    </tr>
                    <tr>
                        <th colspan="2">Untuk Wanita <i>Women Only</i></th>
                        <th align="center" style="text-align: center;">Status</th>
                        <th align="center" style="text-align: center;">Catatan <i>Notes</i></th>
                    </tr>
                    <tr>
                        <td width="2%" valign="top" align="center">18.</td>
                        <td>Mengandung <i>Pregnant</i></td>
                        <td align="center">{{ (getHealthy('pregnant', $health->id)->status == 'Y' ? 'Ya' : 'Tidak') }}</td>
                        <td>{{ getHealthy('pregnant', $health->id)->notes }}</td>
                    </tr>
                </tbody>
            </table>
            <table class="table table-bordered" style="margin-top: 10px;">
                <thead>
                    <tr class="active">
                        <th colspan="6" style="text-align: center;"><strong>F. Perakuan Kebenaran Pendaki</strong></th>
                    </tr>
                </thead>
                <tbody>
                     <tr>
                        <th width="20%">Nama</th>
                        <td>{{ $declaration->fullname }}</td>
                     </tr>
                     <tr>
                        <th>IC/Pasport No</th>
                        <td>{{ $declaration->ic_number }}</td>
                     </tr>
                     <tr>
                        <th>Tarikh</th>
                        <td>{{ date('d/m/Y', strtotime($declaration->date)) }}</td>
                     </tr>
                </tbody>
            </table>
            {{-- <table class="table table-bordered" style="margin-top: 10px;">
                <thead>
                    <tr class="active">
                        <th colspan="6" style="text-align: center;">G. Tempahan Kemudahan</th>
                    </tr>
                    <tr>
                        <th>Bil</th>
                        <th>Jenis Kemudahan</th>
                        <th>Peserta</th>
                        <th>Jumlah Hari</th>
                        <th>Harga</th>
                    </tr>
                </thead>
                <tbody>
                     @if(!$conveniences->isEmpty())
                     @else
                        <tr>
                            <td colspan="5" align="center">Tidak ada</td>
                        </tr>
                     @endif
                </tbody>
            </table> --}}
            <a href="{{ url('applicant-status') }}" class="btn btn-default">Kembali</a>
            <a href="{{ url('applicant-status/complete/' . $applicant->id) }}" class="btn btn-primary">Luluskan</a>
        </div>
    </div>
</div>
@endsection


@section('modal')
    @include('partials.modal_delete')
    @include('partials.modal_form')
@endsection