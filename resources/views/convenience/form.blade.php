@php($method = isset($convenience->id) ? 'put' : 'post')
@php($route = isset($convenience->id) ? route('convenience.update', $convenience->id) : route('convenience.store'))
@php($index = route('convenience.index'))

{!! Form::model($convenience, ['url' => $route, 'method' => $method, 'id' => 'state-form']) !!}
<div class="row">
    <div class="col-md-6">
        <div class="form-group" v-bind:class="errors.state ? 'has-error' : ''">
            <label class="control-label">
                <span v-if="errors.name">@{{ errors.state[0] }}</span>
                <span v-else>Negeri</span>
            </label>
            <select class="form-control select2" data-placeholder="Pilih Negeri" name="state" id="state" style="width: 100%">
                @if(isset($convenience->id))
                    @foreach($states as $state)
                        <option value="{{ $state->id }}"{{ ($state->id == $convenience->state_id ? ' selected' : '') }}>{{ $state->name }}</option>
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
        {{-- <div class="form-group" v-bind:class="errors.ecopark ? 'has-error' : ''">
            <label class="control-label">
                <span v-if="errors.name">@{{ errors.area[0] }}</span>
                <span v-else>Taman Eco-Rimba</span>
            </label>
            <select class="form-control select2" data-placeholder="Pilih Eko-Rimba" name="ecopark" id="ecopark" style="width: 100%">
                @if(isset($convenience->id))
                    @foreach($ecoparks as $ecopark)
                        <option value="{{ $ecopark->id }}"{{ ($ecopark->id == $convenience->eco_park_id ? ' selected' : '') }}>{{ $ecopark->name }}</option>
                    @endforeach
                @else
                   <option></option>
                @endif
            </select>
        </div> --}}
        <div class="form-group" v-bind:class="errors.area ? 'has-error' : ''">
            <label class="control-label">
                <span v-if="errors.name">@{{ errors.area[0] }}</span>
                <span v-else>Daerah</span>
            </label>
            <select class="form-control select2" data-placeholder="Pilih Daerah" name="area" id="area" style="width: 100%">
                @if(isset($convenience->id))
                    @foreach($areas as $area)
                        <option value="{{ $area->id }}"{{ ($area->id == $convenience->area_id ? ' selected' : '') }}>{{ $area->name }}</option>
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
        <div class="form-group" v-bind:class="errors.category ? 'has-error' : ''">
            <label class="control-label">
                <span v-if="errors.category">@{{ errors.category[0] }}</span>
                <span v-else>Jenis TER/HTN</span>
            </label>
            <select class="form-control select2" data-placeholder="Pilih Kategori" name="category" id="category" style="width: 100%">
                <option></option>
                @if(isset($convenience->id))
                    <option value="ter"{{ ($convenience->type == 'ter' ? ' selected' : '') }}>Taman Eko-Rimba (TER)</option>
                    <option value="htn"{{ ($convenience->type == 'htn' ? ' selected' : '') }}>Hutan Taman Negeri (HTN)</option>
                @else
                    <option value="ter">Taman Eko-Rimba (TER)</option>
                    <option value="htn">Hutan Taman Negeri (HTN)</option>
                @endif
            </select>
        </div>
    </div> 
    <div class="col-md-6">
        <div class="form-group" v-bind:class="errors.ecopark ? 'has-error' : ''">
            <label class="control-label">
                <span v-if="errors.ecopark">@{{ errors.ecopark[0] }}</span>
                <span v-else>Nama TER/HTN</span>
            </label>
            <select class="form-control select2" data-placeholder="Pilih Eko-Rimba" name="ecopark" id="ecopark" style="width: 100%">
                @if(isset($convenience->id))
                    @foreach($ecoparks as $ecopark)
                        <option value="{{ $ecopark->id }}"{{ ($ecopark->id == $convenience->eco_park_id ? ' selected' : '') }}>{{ $ecopark->name }}</option>
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
        <div class="form-group" v-bind:class="errors.conveniencecategory ? 'has-error' : ''">
            <label class="control-label">
                <span v-if="errors.name">@{{ errors.area[0] }}</span>
                <span v-else>Jenis Kemudahan</span>
            </label>
            <select class="form-control select2" data-placeholder="Pilih Jenis Kemudahan" name="conveniencecategory" id="conveniencecategory" style="width: 100%">
                @if(isset($convenience->id))
                    @foreach($conveniencecategories as $conveniencecategory)
                        <option value="{{ $conveniencecategory->id }}"{{ ($conveniencecategory->id == $convenience->convenience_category_id ? ' selected' : '') }}>{{ $conveniencecategory->name }}</option>
                    @endforeach
                @else
                   <option></option>
                   @foreach($conveniencecategories as $conveniencecategory)
                        <option value="{{ $conveniencecategory->id }}">{{ $conveniencecategory->name }}</option>
                    @endforeach
                @endif
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group" v-bind:class="errors.convenience_subcategory ? 'has-error' : ''">
            <label class="control-label">
                <span v-if="errors.convenience_subcategory">@{{ errors.convenience_subcategory[0] }}</span>
                <span v-else>Kategori Kemudahan</span>
            </label>
            @if(isset($convenience->id))
                @if($convenience->convenience_category_id == '2' OR $convenience->convenience_category_id == '3')
                    <input type="text" name="convenience_subcategory" class="form-control" id="convenience_subcategory" disabled>
                @else
                    <input type="text" name="convenience_subcategory" class="form-control" id="convenience_subcategory" value="{{ $convenience->convenience_sub_category->name }}">
                @endif
            @else
                <input type="text" name="convenience_subcategory" class="form-control" id="convenience_subcategory" disabled>
            @endif
            <span class="material-icons form-control-feedback">clear</span>
        </div>
        {{-- <div class="form-group" v-bind:class="errors.conveniencesubcategory ? 'has-error' : ''">
            <label class="control-label">
                <span v-if="errors.conveniencesubcategory">@{{ errors.conveniencesubcategory[0] }}</span>
                <span v-else>Kategori Jenis Kemudahan</span>
            </label>
            <select class="form-control select2" data-placeholder="Pilih Kategori Jenis Kemudahan" name="conveniencesubcategory" id="conveniencesubcategory" style="width: 100%"{{ (isset($convenience->id) && $convenience->convenience_sub_category_id == 0 ? ' disabled' : '') }}>
                @if(isset($convenience->id))
                    @foreach($conveniencesubcategories as $subcategory)
                        <option value="{{ $subcategory->id }}"{{ ($convenience->convenience_sub_category_id == $subcategory->id ? ' selected' : '') }}>{{ $subcategory->name }}</option>
                    @endforeach
                @endif
            </select>
        </div> --}}
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group" v-bind:class="errors.capacity ? 'has-error' : ''">
            <label class="control-label">
                <span v-if="errors.capacity">@{{ errors.capacity[0] }}</span>
                <span v-else>Had Daya Tampung</span>
            </label>
            {{ Form::number('capacity', old('capacity', $convenience->capacity), ['class' => 'form-control']) }}
            <span class="material-icons form-control-feedback">clear</span>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group" v-bind:class="errors.price ? 'has-error' : ''">
            <label class="control-label">
                <span v-if="errors.price">@{{ errors.price[0] }}</span>
                <span v-else>Harga</span>
            </label>
            {{ Form::number('price', old('price', $convenience->price), ['class' => 'form-control']) }}
            <span class="material-icons form-control-feedback">clear</span>
        </div>
        {{-- <div class="form-group" v-bind:class="errors.conveniencecategory ? 'has-error' : ''">
            <label class="control-label">
                <span v-if="errors.name">@{{ errors.area[0] }}</span>
                <span v-else>Jenis Kapasiti</span>
            </label>
            <select class="form-control select2" data-placeholder="Pilih Jenis Kapasiti" name="capacitycategory" id="capacitycategory" style="width: 100%">
                @if(isset($convenience->id))
                    @foreach($capacitycategories as $capacitycategory)
                        <option value="{{ $capacitycategory->id }}"{{ ($capacitycategory->id == $convenience->capacity_category_id ? ' selected' : '') }}>{{ $capacitycategory->name }}</option>
                    @endforeach
                @else
                   <option></option>
                   @foreach($capacitycategories as $capacitycategory)
                        <option value="{{ $capacitycategory->id }}">{{ $capacitycategory->name }}</option>
                    @endforeach
                @endif
            </select>
        </div> --}}
    </div>
</div>
{{-- <table class="table table-bordered" style="margin-top: 15px;">
    <thead>
        <tr class="active">
            <th>Jenis Harga</th>
            <th>Harga</th>
        </tr>
    </thead>
    <tbody>
        @if(isset($convenience->id))
            @foreach($prices as $price)
                <tr>
                    <td>{{ $price->price_category->name }}</td>
                    <td><input type="text" name="price[{{ $price->price_category->id }}]" class="form-control" value="{{ $price->price }}"></td>
                </tr>
            @endforeach
        @else
            @foreach($prices as $price)
                <tr>
                    <td>{{ $price->name }}</td>
                    <td><input type="text" name="price[{{ $price->id }}]" class="form-control" value="0"></td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table> --}}
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

            // $('#state').on('change', function(){
            //     $.ajax({
            //         type: 'POST',
            //         url: '{{ url('convenience/find-ecopark') }}',
            //         data: {
            //             state_id: $('#state').val(),
            //             // area_id: $(this).val(),
            //             _token: '{{ csrf_token() }}'
            //         },
            //         success: function(data)
            //         {
            //             $('#ecopark').select2('destroy').empty().select2({data: data});
            //         }
            //     });
            // });

            $('#category').on('change', function(){
                $.ajax({
                    type: 'POST',
                    url: '{{ url('convenience/find-ecopark') }}',
                    data: {
                        state_id: $('#state').val(),
                        area_id: $('#area').val(),
                        category: $(this).val(),
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data)
                    {
                        $('#ecopark').select2('destroy').empty().select2({data: data});
                    }
                });
            });

            $('#conveniencecategory').on('change', function(){
                var name = $(this).val();
                 console.log(name);

                if(name == '2' || name == '3')
                {
                    $('#convenience_subcategory').val('');
                    $('#convenience_subcategory').prop('disabled', true);
                }
                else
                {   
                    $('#convenience_subcategory').val('');
                    $('#convenience_subcategory').prop('disabled', false);
                }

                // $.ajax({
                //     type: 'POST',
                //     url: '{{ url('convenience/find-convenience-sub-category') }}',
                //     data: {
                //         convenience_category_id: $(this).val(),
                //         _token: '{{ csrf_token() }}'
                //     },
                //     success: function(data)
                //     {
                //         if(data[0] == 'empty')
                //         {
                //             $('#conveniencesubcategory').val('').trigger('change');
                //             $('#conveniencesubcategory').prop('disabled', true);
                //         }
                //         else
                //         {
                //             $('#conveniencesubcategory').prop('disabled', false);
                //             $('#conveniencesubcategory').select2('destroy').empty().select2({data: data});
                //         }
                //     }
                // });
            });
        });

    })(jQuery);
</script>