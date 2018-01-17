@php($method = isset($category->id) ? 'put' : 'post')
@php($route = isset($category->id) ? route('convenience-category.update', $category->id) : route('convenience-category.store'))
@php($index = route('convenience-category.index'))

{!! Form::model($category, ['url' => $route, 'method' => $method, 'id' => 'convenience-category-form']) !!}
<div class="form-group" v-bind:class="errors.name ? 'has-error' : ''">
    <label class="control-label">
        <span v-if="errors.name">@{{ errors.name[0] }}</span>
        <span v-else>Jenis Kemudahan</span>
    </label>
    {{ Form::text('name', old('name', $category->name), ['class' => 'form-control']) }}
    <span class="material-icons form-control-feedback">clear</span>
</div>
{!! Form::close() !!}

<script type="text/javascript" src="{{ asset('/js/modal.js') }}"></script>
<script>
    var vm = new Vue({
        el: '#convenience-category-form',
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
                    url: '{{ url('convenience/find-area') }}',
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

            $('#area').on('change', function(){
                $.ajax({
                    type: 'POST',
                    url: '{{ url('convenience/find-ecopark') }}',
                    data: {
                        state_id: $('#state').val(),
                        area_id: $(this).val(),
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data)
                    {
                        $('#ecopark').select2('destroy').empty().select2({data: data});
                    }
                });
            });
        });

    })(jQuery);
</script>