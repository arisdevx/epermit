@php($method = isset($applicant->id) ? 'put' : 'post')
@php($route = isset($applicant->id) ? route('applicant-status.update', $applicant->id) : route('applicant-status.store'))
@php($index = url('applicant-status'))

{!! Form::model($applicant, ['url' => $route, 'method' => $method, 'id' => 'area-form']) !!}
<div class="row">
    <div class="col-md-12">
        <div class="form-group" v-bind:class="errors.receipt ? 'has-error' : ''">
            <label class="control-label">
                <span v-if="errors.receipt">@{{ errors.receipt[0] }}</span>
                <span v-else>No Resit</span>
            </label>
            {{ Form::textarea('receipt', old('receipt', $applicant->receipt), ['class' => 'form-control', 'rows' => '5']) }}
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
                        console.log(response);
                        // window.location.href = '{!! $index !!}';
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