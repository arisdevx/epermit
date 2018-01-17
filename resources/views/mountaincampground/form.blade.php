@php($method = isset($campground->id) ? 'put' : 'post')
@php($route = isset($campground->id) ? route('campground.update', $campground->id) : route('campground.store'))
@php($index = route('campground.index'))

{!! Form::model($campground, ['url' => $route, 'method' => $method, 'id' => 'state-form']) !!}
<div class="form-group" v-bind:class="errors.state ? 'has-error' : ''">
    <label class="control-label">
        <span v-if="errors.name">@{{ errors.state[0] }}</span>
        <span v-else>Gunung</span>
    </label>
    <select class="form-control select2" data-placeholder="Pilih Gunung" name="mountain" id="mountain" style="width: 100%">
        @if(isset($campground->id))
            @foreach($mountains as $mountain)
                <option value="{{ $mountain->id }}"{{ ($mountain->id == $campground->mountain_id ? ' selected' : '') }}>{{ $mountain->name }}</option>
            @endforeach
        @else
            @foreach($mountains as $mountain)
                <option></option>
                <option value="{{ $mountain->id }}">{{ $mountain->name }}</option>
            @endforeach
        @endif
    </select>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group" v-bind:class="errors.name ? 'has-error' : ''">
            <label class="control-label">
                <span v-if="errors.name">@{{ errors.name[0] }}</span>
                <span v-else>Nama Tempat Perkhemahan</span><br /><br />
            </label>
            {{ Form::text('name', old('name', $campground->name), ['class' => 'form-control']) }}
            <span class="material-icons form-control-feedback">clear</span>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group" v-bind:class="errors.capacity ? 'has-error' : ''">
            <label class="control-label">
                <span v-if="errors.capacity">@{{ errors.capacity[0] }}</span>
                <span v-else>Had Daya Tampung</span><br /><br />
            </label>
            {{ Form::number('capacity', old('capacity', $campground->capacity), ['class' => 'form-control']) }}
            <span class="material-icons form-control-feedback">clear</span>
        </div>
    </div>
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
                    url: '{{ url('hiking/find-area') }}',
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