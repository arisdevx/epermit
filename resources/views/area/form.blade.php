@php($method = isset($area->id) ? 'put' : 'post')
@php($route = isset($area->id) ? route('area.update', $area->id) : route('area.store'))
@php($index = route('area.index'))

{!! Form::model($area, ['url' => $route, 'method' => $method, 'id' => 'area-form']) !!}
<div class="row">
    <div class="col-md-6">
        <div class="form-group" v-bind:class="errors.state ? 'has-error' : ''">
            <label class="control-label">
                <span v-if="errors.name">@{{ errors.state[0] }}</span>
                <span v-else>Negeri</span>
            </label>
            <select class="form-control select2" data-placeholder="Pilih Negeri" name="state" style="width: 100%">
                @foreach($states as $state)
                    <option value="{{ $state->id }}"{{ ($state->id == $area->state_id ? ' selected' : '') }}>{{ $state->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group" v-bind:class="errors.name ? 'has-error' : ''">
            <label class="control-label">
                <span v-if="errors.name">@{{ errors.name[0] }}</span>
                <span v-else>Nama Daerah</span>
            </label>
            {{ Form::text('name', old('name', $area->name), ['class' => 'form-control']) }}
            <span class="material-icons form-control-feedback">clear</span>
        </div>
    </div>
</div>

{!! Form::close() !!}

<script type="text/javascript" src="{{ asset('/js/modal.js') }}"></script>
<script>
    var vm = new Vue({
        el: '#area-form',
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
        });
    })(jQuery);
</script>