@php($method = isset($regionalforestry->id) ? 'put' : 'post')
@php($route = isset($regionalforestry->id) ? route('regional-forest-officials.update', $regionalforestry->id) : route('regional-forest-officials.store'))
@php($index = route('regional-forest-officials.index'))

{!! Form::model($regionalforestry, ['url' => $route, 'method' => $method, 'id' => 'state-form']) !!}
<div class="form-group" v-bind:class="errors.name ? 'has-error' : ''">
    <label class="control-label">
        <span v-if="errors.name">@{{ errors.name[0] }}</span>
        <span v-else>Nama Pejabat Hutan Daerah</span>
    </label>
    {{ Form::text('name', old('name', $regionalforestry->name), ['class' => 'form-control']) }}
    <span class="material-icons form-control-feedback">clear</span>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group" v-bind:class="errors.state ? 'has-error' : ''">
            <label class="control-label">
                <span v-if="errors.name">@{{ errors.state[0] }}</span>
                <span v-else>Negeri</span>
            </label>
            <select class="form-control" name="state" id="state">
                @if(isset($regionalforestry->id))
                    @foreach($states as $state)
                        <option value="{{ $state->id }}"{{ ($state->id == $regionalforestry->state_id ? ' selected' : '') }}>{{ $state->name }}</option>
                    @endforeach
                @else
                    @foreach($states as $state)
                        <option></option>
                        <option value="{{ $state->id }}">{{ $state->name }}</option>
                    @endforeach
                @endif
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group" v-bind:class="errors.area ? 'has-error' : ''">
            <label class="control-label">
                <span v-if="errors.name">@{{ errors.area[0] }}</span>
                <span v-else>Daerah</span>
            </label>
            <select class="form-control" name="area" id="area">
                @if(isset($regionalforestry->id))
                    @foreach($areas as $area)
                        <option value="{{ $area->id }}"{{ ($area->id == $regionalforestry->area_id ? ' selected' : '') }}>{{ $area->name }}</option>
                    @endforeach
                @else
                    <option></option>
                @endif
            </select>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group" v-bind:class="errors.address ? 'has-error' : ''">
            <label class="control-label">
                <span v-if="errors.address">@{{ errors.address[0] }}</span>
                <span v-else>Alamat</span>
            </label>
            {{ Form::textarea('address', old('address', $regionalforestry->address), ['class' => 'form-control', 'rows' => 8]) }}
            <span class="material-icons form-control-feedback">clear</span>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group" v-bind:class="errors.phone ? 'has-error' : ''">
            <label class="control-label">
                <span v-if="errors.phone">@{{ errors.phone[0] }}</span>
                <span v-else>Telefon</span>
            </label>
            {{ Form::number('phone', old('phone', $regionalforestry->phone), ['class' => 'form-control']) }}
            <span class="material-icons form-control-feedback">clear</span>
        </div>
        <div class="form-group" v-bind:class="errors.fax ? 'has-error' : ''">
            <label class="control-label" style="margin-top: 5px">
                <span v-if="errors.fax">@{{ errors.fax[0] }}</span>
                <span v-else>Faks</span>
            </label>
            {{ Form::number('fax', old('fax', $regionalforestry->fax), ['class' => 'form-control']) }}
            <span class="material-icons form-control-feedback">clear</span>
        </div>
        <div class="form-group" v-bind:class="errors.email ? 'has-error' : ''">
            <label class="control-label" style="margin-top: 8px">
                <span v-if="errors.email">@{{ errors.email[0] }}</span>
                <span v-else>Email</span>
            </label>
            {{ Form::text('email', old('email', $regionalforestry->email), ['class' => 'form-control']) }}
            <span class="material-icons form-control-feedback">clear</span>
        </div>
    </div>
</div>
{{-- <div class="form-group" v-bind:class="errors.update ? 'has-error' : ''">
    <label class="" for="update">
        <input type="checkbox" id="update" name="update" value="1"{!! (isset($regionalforestry->id) && $regionalforestry->update == 'Y' ? ' checked' : '') !!}> Kemaskini
    </label>
    <span class="material-icons form-control-feedback">clear</span>
</div>
<div class="form-group" style="margin-top: 0 !important" v-bind:class="errors.delete ? 'has-error' : ''">
    <label class="" for="delete">
        <input type="checkbox" id="delete" name="delete" value="1"{!! (isset($regionalforestry->id) && $regionalforestry->delete == 'Y' ? ' checked' : '') !!}> Hapus
    </label>
    <span class="material-icons form-control-feedback">clear</span>
</div> --}}

{!! Form::close() !!}

<script type="text/javascript" src="{{ asset('/js/modal.js') }}"></script>
<script>
    var vm = new Vue({
        el: '#state-form',
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
            $('#state').on('change', function(){
                $.ajax({
                    type: 'POST',
                    url: '{{ url('regional-forest-officials/find-area') }}',
                    data: {
                        id: $(this).val(),
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data)
                    {
                        $('#area').html(data);
                    }
                });
            });
        });

    })(jQuery);
</script>