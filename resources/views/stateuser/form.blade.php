@php($method = isset($state->id) ? 'put' : 'post')
@php($route = isset($state->id) ? route('state-user.update', $state->id) : route('state-user.store'))
@php($index = route('state-user.index'))

{!! Form::model($state, ['url' => $route, 'method' => $method, 'id' => 'area-form']) !!}
<div class="row">
    <div class="col-md-12">
        <div class="form-group" v-bind:class="errors.name ? 'has-error' : ''">
            <label class="control-label">
                <span v-if="errors.name">@{{ errors.name[0] }}</span>
                <span v-else>Nama Negeri</span>
            </label>
            {{ Form::text('name', old('name', $state->name), ['class' => 'form-control']) }}
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