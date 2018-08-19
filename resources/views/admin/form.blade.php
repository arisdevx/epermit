@php($method = isset($admin->id) ? 'put' : 'post')
@php($route = isset($admin->id) ? route('admin.update', $admin->id) : route('admin.store'))
@php($index = route('admin.index'))

{!! Form::model($admin, ['url' => $route, 'method' => $method, 'id' => 'admin-form']) !!}
<div class="row">
    <div class="col-md-4">
        Nama Penuh 
    </div>
    <div class="col-md-8">
        <div class="form-group" v-bind:class="errors.name ? 'has-error' : ''">
            {{ Form::text('name', old('name', $admin->name), ['class' => 'form-control']) }}
            <span class="material-icons form-control-feedback">clear</span>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        ID Pengguna
    </div>
    <div class="col-md-8">
        <div class="form-group" v-bind:class="errors.username ? 'has-error' : ''">
            {{ Form::text('username', old('username', $admin->username), ['class' => 'form-control']) }}
            <span class="material-icons form-control-feedback">clear</span>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        Email
    </div>
    <div class="col-md-8">
        <div class="form-group" v-bind:class="errors.email ? 'has-error' : ''">
            {{ Form::text('email', old('email', $admin->email), ['class' => 'form-control']) }}
            <span class="material-icons form-control-feedback">clear</span>
            <span v-bind:style="errors.email ? 'display: block; margin-bottom: 7px;' : 'display: none;'">@{{ errors.email }}</span>
        </div>
    </div>
</div>
{{-- <div class="row">
    <div class="col-md-4">
        Kata Laluan
    </div>
    <div class="col-md-8">
        <div class="form-group" v-bind:class="errors.password ? 'has-error' : ''">
            <input type="password" name="password" class="form-control">
            <span class="material-icons form-control-feedback">clear</span>
        </div>
    </div>
</div> --}}

<div class="row">
    <div class="col-md-4">
        Level
    </div>
    <div class="col-md-8">
        {{-- {!! Form::select('role', $roles, old('role', $role), ['class' => 'form-control select2', 'data-placeholder' => 'Pilih Level']) !!} --}}
        <select class="form-control select2" data-placeholder="Pilih Level" name="role" id="role" style="width: 100%">
            @if(!isset($admin->id))
                <option></option>
                @foreach($roles as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
            @else
                @foreach($roles as $key => $value)
                    <option value="{{ $key }}"{{ ($key == $role ? ' selected' : '') }}>{{ $value }}</option>
                @endforeach
            @endif
        </select>
    </div>
</div>
<div class="row" style="margin-top: 10px">
    <div class="col-md-4">
        Negeri
    </div>
    <div class="col-md-8">
        {{-- {!! Form::select('role', $roles, old('role', $role), ['class' => 'form-control select2', 'data-placeholder' => 'Pilih Level']) !!} --}}
        <select class="form-control select2" id="state" name="state" data-placeholder="Pilih Negeri" style="width: 100%"{{ (($role == 8 || $role == 7) ? '' : ' disabled') }}>
            @if(!$admin->hasRole(['super', 'admin']))
                @if(!isset($admin->id))
                    <option></option>
                    @foreach($states as $state)
                        <option value="{{ $state->id }}">{{ $state->name }}</option>
                    @endforeach
                @else
                    @foreach($states as $state)
                        <option></option>
                        <option value="{{ $state->id }}"{{ ($state->id == $location->state_id ? ' selected' : '') }}>{{ $state->name }}</option>
                    @endforeach
                @endif
            @endif
        </select>
    </div>
</div>
<div class="row" style="margin-top: 10px">
    <div class="col-md-4">
        Daerah Perhutanan
    </div>
    <div class="col-md-8">
        {{-- {!! Form::select('role', $roles, old('role', $role), ['class' => 'form-control select2', 'data-placeholder' => 'Pilih Level']) !!} --}}
        <select class="form-control select2" id="area" name="area" data-placeholder="Pilih Daerah" style="width: 100%"{{ ($role == 8 ? '' : ' disabled') }}>
            @if(!$admin->hasRole(['super', 'admin']))
                @if(!isset($admin->id))
                    <option></option>
                @else
                    <option></option>
                    @foreach($areas as $area)
                        <option value="{{ $area->id }}"{{ ($area->id == $location->area_id ? ' selected' : '') }}>{{ $area->name }}</option>
                    @endforeach
                @endif
            @endif
        </select>
    </div>
</div>
{{-- <div class="row">
    <div class="col-md-6">
        <div class="form-group" v-bind:class="errors.name ? 'has-error' : ''">
            <label class="control-label">
                <span v-if="errors.name">@{{ errors.name[0] }}</span>
                <span v-else>Nama</span>
            </label>
            {{ Form::text('name', old('name', $admin->name), ['class' => 'form-control']) }}
            <span class="material-icons form-control-feedback">clear</span>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group" v-bind:class="errors.email ? 'has-error' : ''">
            <label class="control-label">
                <span v-if="errors.email">@{{ errors.email[0] }}</span>
                <span v-else>E-Mel</span>
            </label>
            {!! Form::textarea('email', old('email', $admin->email), ['class' => 'form-control', 'rows' => 1]) !!}
            <span class="material-icons form-control-feedback">clear</span>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group" v-bind:class="errors.role ? 'has-error' : ''">
            <label class="control-label">
                <span v-if="errors.role">@{{ errors.role[0] }}</span>
                <span v-else>Peranan</span>
            </label>
            {!! Form::select('role', $roles, old('role', $role), ['class' => 'form-control', 'placeholder' => '']) !!}
            <span class="material-icons form-control-feedback">clear</span>
        </div>
    </div>
</div> --}}
{!! Form::close() !!}

<script type="text/javascript" src="{{ asset('/js/modal.js') }}"></script>
<script>
    var vm = new Vue({
        el: '#admin-form',
        data: {
            errors: []
        },
        methods: {
            submit: function(e) {
                axios({
                    method: '{!! $method !!}',
                    url: '{!! $route !!}',
                    data: $(e.currentTarget).serialize()
                })
                .then(function (response) {
                    if(response.data.errors) {
                        this.errors = response.data.errors;
                    } else {
                        window.location.href = '{!! $index !!}';
                    }
                }.bind(this));
            }
        }
    });
    (function($){
        'use strict';

        $(document).ready(function(){
            $('.select2').select2();

            $('body').on('change', '#role', function(){
                var id = $(this).val();

                if(id == 7)
                {
                    $('#state').select2('enable');
                    $('#area').prop('disabled', true);
                    $('#area').val('').trigger('change');
                }
                else if(id == 8)
                {
                    $('#state').select2('enable');
                    $('#area').select2('enable');
                }
                else if(id !== 7 || id !== 8)
                {
                    $('#state').prop('disabled', true);
                    $('#area').prop('disabled', true);
                    $('#state').val('').trigger('change');
                    $('#area').val('').trigger('change');
                }
            });

            $('body').on('change', '#state', function(){
                $.ajax({
                    type: 'POST',
                    url: '{{ url('admin/find-area') }}',
                    data: {
                        state_id: $(this).val(),
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data)
                    {
                        $('#area').select2('destroy').empty().select2({data: data});
                    }
                })
            });
        });
    })(jQuery);
</script>