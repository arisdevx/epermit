@php($method = isset($activity->id) ? 'put' : 'post')
@php($route = isset($activity->id) ? route('others-activity.update', $activity->id) : route('others-activity.store'))
@php($index = route('others-activity.index'))

{!! Form::model($activity, ['url' => $route, 'method' => $method, 'id' => 'state-form']) !!}
<div class="row">
    <div class="col-md-6">
        <div class="form-group" v-bind:class="errors.state ? 'has-error' : ''">
            <label class="control-label">
                <span v-if="errors.name">@{{ errors.state[0] }}</span>
                <span v-else>Negeri</span>
            </label>
            <select class="form-control select2" data-placeholder="Pilih Negeri" name="state" id="state" style="width: 100%">
                @if(isset($activity->id))
                    @foreach($states as $state)
                        <option value="{{ $state->id }}"{{ ($state->id == $activity->state_id ? ' selected' : '') }}>{{ $state->name }}</option>
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
            <select class="form-control select2" data-placeholder="Pilih Daerah" name="area" id="area" style="width: 100%">
                @if(isset($activity->id))
                    @foreach($areas as $area)
                        <option value="{{ $area->id }}"{{ ($area->id == $activity->area_id ? ' selected' : '') }}>{{ $area->name }}</option>
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
        <div class="form-group" v-bind:class="errors.price ? 'has-error' : ''">
            <label class="control-label">
                <span v-if="errors.price">@{{ errors.price[0] }}</span>
                <span v-else>Harga (RM)</span>
            </label>
            {{ Form::text('price', old('price', $activity->price), ['class' => 'form-control']) }}
            <span class="material-icons form-control-feedback">clear</span>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group" v-bind:class="errors.capacity ? 'has-error' : ''">
            <label class="control-label">
                <span v-if="errors.capacity">@{{ errors.capacity[0] }}</span>
                <span v-else>Had Daya Tampung</span>
            </label>
            {{ Form::number('capacity', old('capacity', $activity->capacity), ['class' => 'form-control']) }}
            <span class="material-icons form-control-feedback">clear</span>
        </div>
    </div>
</div>
<div class="form-group" v-bind:class="errors.name ? 'has-error' : ''">
    <label class="control-label">
        <span v-if="errors.name">@{{ errors.name[0] }}</span>
        <span v-else>Nama Aktiviti</span>
    </label>
    {{ Form::text('name', old('name', $activity->name), ['class' => 'form-control']) }}
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
            $('.select2').select2();
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
                        $('#area').select2('destroy').empty().select2({data: data});
                    }
                });
            });
        });

    })(jQuery);
</script>