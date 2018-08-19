@extends('layouts.panel')

@section('content')
<div class="row">
    <div class="col-md-12">
        @include('flash::message')
    </div>

    <div class="col-md-12">
        <div class="card card-nav-tabs">
            <div class="card-header" data-background-color="green">
                <h4 class="title"><strong>Profil Saya</strong></h4>
                <p class="category"><strong><i>My Profile</i></strong></p>
                {{-- <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                        <span class="nav-tabs-title">Profil Saya</span>
                        <ul class="nav nav-tabs" data-tabs="tabs">
                            <li class="active">
                                <a href="#credential" data-toggle="tab">
                                <i class="material-icons">fingerprint</i>
                                Kelayakan
                                <div class="ripple-container"></div></a>
                            </li>
                            <li class="">
                                <a href="#profile" data-toggle="tab">
                                <i class="material-icons">person</i>
                                Profil
                                <div class="ripple-container"></div></a>
                            </li>
                        </ul>
                    </div>
                </div> --}}
            </div>

            <div class="card-content">
                {{ Form::open(['url' => url('profile/update-data')]) }}
                {{-- {{ Form::model($user, ['route' => 'profile.store']) }} --}}
                <div class="tab-content">
                    <div class="tab-pane active" id="credential">
                        <h6><strong>Tukar Katalaluan / <i>Change Password</i></strong></h6>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                                    <label class="control-label">{{ $errors->first('password') ?: 'Kata Laluan baru' }}</label>
                                    {{ Form::password('password', ['class' => 'form-control', 'autocomplete' => 'off']) }}
                                    <span class="material-icons form-control-feedback">clear</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('confirm_password') ? 'has-error' : '' }}">
                                    <label class="control-label">Sahkan Kata Laluan</label>
                                    {{ Form::password('confirm_password', ['class' => 'form-control', 'autocomplete' => 'off']) }}
                                </div>
                            </div>
                        </div>
                        <h6><strong>Maklumat Peribadi / <i>Personal Information</i></strong></h6>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                    <label class="control-label">{{ $errors->first('name') ?: 'Nama' }}</label>
                                    {{ Form::text('name', old('name', $user->name), ['class' => 'form-control']) }}
                                    <span class="material-icons form-control-feedback">clear</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">No Kad Pengenal</label>
                                    {{ Form::number('nokp', old('nokp', $user->profile->nokp), ['class' => 'form-control']) }}
                                    <span class="material-icons form-control-feedback">clear</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                    <label class="control-label">{{ $errors->first('email') ?: 'E-Mel' }}</label>
                                    {{ Form::text('email', old('email', $user->email), ['class' => 'form-control', 'style' => 'text-transform: capitalize !important']) }}
                                    <span class="material-icons form-control-feedback">clear</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">
                            @if(auth()->user()->hasRole(['jabatan_perhutanan_negeri', 'pegawai_hutan_daerah']))
                                Alamat Pejabat
                            @else
                                Alamat
                            @endif
                        </label>
                        <input type="text" name="addressuser" class="form-control" value="{{ $user->profile->address_1 }}">
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label class="control-label">Bandar</label>
                            <input type="text" name="city" class="form-control" value="{{ $user->profile->city }}">
                        </div>
                        <div class="col-md-3">
                            <label class="control-label">Poskod</label>
                            <input type="number" name="postcode" class="form-control" value="{{ $user->profile->postcode }}">
                        </div>
                        <div class="col-md-3">
                            <label class="control-label">Negeri</label>
                            <select class="form-control select2" name="state" style="widows: 100%" data-placeholder="Negeri">
                                <option></option>
                                @foreach($states as $state)
                                    <option value="{{ $state->id }}"{{ ($state->id == $user->profile->state ? ' selected' : '') }}>{{ $state->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="control-label">Negara</label>
                            <select class="form-control select2" name="country" style="widows: 100%" data-placeholder="Negara">
                                <option></option>
                                @foreach($countries as $country)
                                    <option value="{{ $country->id }}"{{ ($country->id == $user->profile->country ? ' selected' : '') }}>{{ $country->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                   {{--  <div class="tab-pane" id="profile">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group {{ $errors->has('address_1') ? 'has-error' : '' }}">
                                    <label class="control-label">{{ $errors->first('address_1') ?: 'Address 1' }}</label>
                                    {{ Form::text('address_1', old('address_1', $profile->address_1), ['class' => 'form-control']) }}
                                    <span class="material-icons form-control-feedback">clear</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group {{ $errors->has('address_2') ? 'has-error' : '' }}">
                                    <label class="control-label">{{ $errors->first('address_2') ?: 'Address 2' }}</label>
                                    {{ Form::text('address_2', old('address_2', $profile->address_2), ['class' => 'form-control']) }}
                                    <span class="material-icons form-control-feedback">clear</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('postcode') ? 'has-error' : '' }}">
                                    <label class="control-label">{{ $errors->first('postcode') ?: 'Postcode' }}</label>
                                    {{ Form::text('postcode', old('postcode', $profile->postcode), ['class' => 'form-control']) }}
                                    <span class="material-icons form-control-feedback">clear</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('city') ? 'has-error' : '' }}">
                                    <label class="control-label">{{ $errors->first('city') ?: 'City' }}</label>
                                    {{ Form::text('city', old('city', $profile->city), ['class' => 'form-control']) }}
                                    <span class="material-icons form-control-feedback">clear</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('state') ? 'has-error' : '' }}">
                                    <label class="control-label">{{ $errors->first('state') ?: 'State' }}</label>
                                    {{ Form::text('state', old('state', $profile->state), ['class' => 'form-control']) }}
                                    <span class="material-icons form-control-feedback">clear</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('country') ? 'has-error' : '' }}">
                                    <label class="control-label">{{ $errors->first('country') ?: 'Country' }}</label>
                                    {{ Form::text('country', old('country', $profile->country), ['class' => 'form-control']) }}
                                    <span class="material-icons form-control-feedback">clear</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                                    <label class="control-label">{{ $errors->first('phone') ?: 'Phone' }}</label>
                                    {{ Form::text('phone', old('phone', $profile->phone), ['class' => 'form-control']) }}
                                    <span class="material-icons form-control-feedback">clear</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group {{ $errors->has('mobile') ? 'has-error' : '' }}">
                                    <label class="control-label">{{ $errors->first('mobile') ?: 'Mobile' }}</label>
                                    {{ Form::text('mobile', old('mobile', $profile->mobile), ['class' => 'form-control']) }}
                                    <span class="material-icons form-control-feedback">clear</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group {{ $errors->has('office') ? 'has-error' : '' }}">
                                    <label class="control-label">{{ $errors->first('office') ?: 'Office' }}</label>
                                    {{ Form::text('office', old('office', $profile->office), ['class' => 'form-control']) }}
                                    <span class="material-icons form-control-feedback">clear</span>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>

                <button type="submit" class="btn btn-primary pull-right">Update</button>
                <div class="clearfix"></div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@endsection
