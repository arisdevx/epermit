@extends('layouts.panel')

@section('content')
<div class="row">
    <div class="col-md-12">
        @include('flash::message')
    </div>

    <div class="col-md-12">
        <div class="card card-nav-tabs">
            <div class="card-header" data-background-color="green">
                <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                        <span class="nav-tabs-title">Profil Saya</span>
                        <ul class="nav nav-tabs" data-tabs="tabs">
                            {{-- <li class="active">
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
                            </li> --}}
                        </ul>
                    </div>
                </div>
            </div>

            <div class="card-content">
                {{ Form::open(['url' => url('profile/update-data')]) }}
                {{-- {{ Form::model($user, ['route' => 'profile.store']) }} --}}
                <div class="tab-content">
                    <div class="tab-pane active" id="credential">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                    <label class="control-label">{{ $errors->first('name') ?: 'Nama' }}</label>
                                    {{ Form::text('name', old('name', $user->name), ['class' => 'form-control']) }}
                                    <span class="material-icons form-control-feedback">clear</span>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                    <label class="control-label">{{ $errors->first('email') ?: 'E-Mel' }}</label>
                                    {{ Form::text('email', old('email', $user->email), ['class' => 'form-control']) }}
                                    <span class="material-icons form-control-feedback">clear</span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                                    <label class="control-label">{{ $errors->first('password') ?: 'Kata Laluan baru' }}</label>
                                    {{ Form::password('password', ['class' => 'form-control']) }}
                                    <span class="material-icons form-control-feedback">clear</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('confirm_password') ? 'has-error' : '' }}">
                                    <label class="control-label">Sahkan Kata Laluan</label>
                                    {{ Form::password('confirm_password', ['class' => 'form-control']) }}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">No K/P</label>
                                    {{ Form::text('nokp', old('nokp', $user->profile->nokp), ['class' => 'form-control']) }}
                                    <span class="material-icons form-control-feedback">clear</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Alamat</label>
                                    <textarea name="addressuser" class="form-control" cols="5">{{ $user->profile->address_1 }}</textarea>
                                </div>
                            </div>
                            
                        </div>

                    </div>

                    <div class="tab-pane" id="profile">
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
                    </div>
                </div>

                <button type="submit" class="btn btn-primary pull-right">Update</button>
                <div class="clearfix"></div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@endsection
