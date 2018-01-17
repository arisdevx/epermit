@php($method = isset($stateforestry->id) ? 'put' : 'post')
@php($route = isset($stateforestry->id) ? route('state-forestry-department.update', $stateforestry->id) : route('state-forestry-department.store'))
@php($index = route('state-forestry-department.index'))

{!! Form::model($stateforestry, ['url' => $route, 'method' => $method, 'id' => 'state-form']) !!}
<div class="row">
    <div class="col-md-6">
        <div class="form-group" v-bind:class="errors.state ? 'has-error' : ''">
            <label class="control-label">
                <span v-if="errors.name">@{{ errors.state[0] }}</span>
                <span v-else>Negeri</span>
            </label>
            <select class="form-control" name="state" id="state">
                @if(isset($stateforestry->id))
                    @foreach($states as $state)
                        <option value="{{ $state->id }}"{{ ($state->id == $stateforestry->state_id ? ' selected' : '') }}>{{ $state->name }}</option>
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
        <div class="form-group" v-bind:class="errors.name ? 'has-error' : ''">
            <label class="control-label">
                <span v-if="errors.name">@{{ errors.name[0] }}</span>
                <span v-else>Nama Jabatan Perhutanan Negeri</span>
            </label>
            {{ Form::text('name', old('name', $stateforestry->name), ['class' => 'form-control']) }}
            <span class="material-icons form-control-feedback">clear</span>
        </div>
    </div>
</div>
<div class="form-group" v-bind:class="errors.update ? 'has-error' : ''">
    <label class="" for="update">
        <input type="checkbox" id="update" name="update" value="1"{!! (isset($stateforestry->id) && $stateforestry->update == 'Y' ? ' checked' : '') !!}> Kemaskini
    </label>
    <span class="material-icons form-control-feedback">clear</span>
</div>
<div class="form-group" style="margin-top: 0 !important" v-bind:class="errors.delete ? 'has-error' : ''">
    <label class="" for="delete">
        <input type="checkbox" id="delete" name="delete" value="1"{!! (isset($stateforestry->id) && $stateforestry->delete == 'Y' ? ' checked' : '') !!}> Hapus
    </label>
    <span class="material-icons form-control-feedback">clear</span>
</div>

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
                    url: '{{ url('others-activity/find-area') }}',
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