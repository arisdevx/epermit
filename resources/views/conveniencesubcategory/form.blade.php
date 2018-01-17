@php($method = isset($subcategory->id) ? 'put' : 'post')
@php($route = isset($subcategory->id) ? route('convenience-sub-category.update', $subcategory->id) : route('convenience-sub-category.store'))
@php($index = route('convenience-sub-category.index'))

{!! Form::model($subcategory, ['url' => $route, 'method' => $method, 'id' => 'convenience-sub-category-form']) !!}
<div class="form-group" v-bind:class="errors.conveniencecategory ? 'has-error' : ''">
    <label class="control-label">
        <span v-if="errors.conveniencecategory">@{{ errors.conveniencecategory[0] }}</span>
        <span v-else>Jenis Kemudahan</span>
    </label>
    <select class="form-control select2" data-placeholder="Pilih Jenis Kemudahan" name="conveniencecategory" style="width: 100%">
        @if(isset($subcategory->id))
            @foreach($categories as $category)
                <option value="{{ $category->id }}"{{ ($category->id == $subcategory->convenience_category_id ? ' selected' : '') }}>{{ $category->name }}</option>
            @endforeach
        @else
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        @endif
    </select>
</div>
<div class="form-group" v-bind:class="errors.name ? 'has-error' : ''">
    <label class="control-label">
        <span v-if="errors.name">@{{ errors.name[0] }}</span>
        <span v-else>Sub Jenis Kemudahan</span>
    </label>
    {{ Form::text('name', old('name', $subcategory->name), ['class' => 'form-control']) }}
    <span class="material-icons form-control-feedback">clear</span>
</div>
{!! Form::close() !!}

<script type="text/javascript" src="{{ asset('/js/modal.js') }}"></script>
<script>
    var vm = new Vue({
        el: '#convenience-sub-category-form',
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