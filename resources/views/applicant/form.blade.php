@php($method = isset($user->id) ? 'put' : 'post')
@php($route = isset($user->id) ? route('applicants-list.update', $user->id) : route('applicants-list.store'))
@php($index = route('applicants-list.index'))

{!! Form::model($user, ['url' => $route, 'method' => $method, 'id' => 'user-form']) !!}
<div class="row">
    <div class="col-md-6">
        <div class="form-group" v-bind:class="errors.name ? 'has-error' : ''">
            <label class="control-label">
                <span v-if="errors.name">@{{ errors.name[0] }}</span>
                <span v-else>Nama</span>
            </label>
            {{ Form::text('name', old('name', $user->name), ['class' => 'form-control']) }}
            <span class="material-icons form-control-feedback">clear</span>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group" v-bind:class="errors.email ? 'has-error' : ''">
            <label class="control-label">
                <span v-if="errors.email">@{{ errors.email[0] }}</span>
                <span v-else>E-Mel</span>
            </label>
            {!! Form::textarea('email', old('email', $user->email), ['class' => 'form-control', 'rows' => 1, 'style' => 'text-transform: lowercase']) !!}
            <span class="material-icons form-control-feedback">clear</span>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group" v-bind:class="errors.nokp ? 'has-error' : ''">
            <label class="control-label">
                <span v-if="errors.nokp">@{{ errors.nokp[0] }}</span>
                <span v-else>No. K/P / Passport</span>
            </label>
            @if($user->profile->citizen == '1')
                {{ Form::number('nokp', old('nokp', (!empty($user->profile->nokp) ? $user->profile->nokp: $user->profile->passport)), ['class' => 'form-control', 'id' => 'nokp', 'data-maxsize' => '12']) }}
            @else
                {{ Form::text('nokp', old('nokp', (!empty($user->profile->nokp) ? $user->profile->nokp: $user->profile->passport)), ['class' => 'form-control', 'id' => 'nokp']) }}
            @endif
            <span class="material-icons form-control-feedback">clear</span>
        </div>
    </div>
</div>
{!! Form::close() !!}

<script type="text/javascript" src="{{ asset('/js/modal.js') }}"></script>
<script>
    var vm = new Vue({
        el: '#user-form',
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
            $('#nokp').keypress(function (e) {
                var txt = String.fromCharCode(e.which);
                if (!txt.match(/[A-Za-z0-9&. ]/)) {
                    return false;
                }
            });
        });
    })(jQuery);
</script>