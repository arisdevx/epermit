@php($method = isset($mountain->id) ? 'put' : 'post')
@php($route = isset($mountain->id) ? route('hiking.update', $mountain->id) : route('hiking.store'))
@php($index = route('hiking.index'))

{!! Form::model($mountain, ['url' => $route, 'method' => $method, 'id' => 'state-form']) !!}
<div class="row">
    <div class="col-md-6">
        <div class="form-group" v-bind:class="errors.state ? 'has-error' : ''">
            <label class="control-label">
                <span v-if="errors.name">@{{ errors.state[0] }}</span>
                <span v-else>Negeri</span>
            </label>
            <select class="form-control select2" data-placeholder="Pilih Negeri" name="state" id="state" style="width: 100%">
                @if(isset($mountain->id))
                    @foreach($states as $state)
                        <option value="{{ $state->id }}"{{ ($state->id == $mountain->state_id ? ' selected' : '') }}>{{ $state->name }}</option>
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
                @if(isset($mountain->id))
                    @foreach($areas as $area)
                        <option value="{{ $area->id }}"{{ ($area->id == $mountain->area_id ? ' selected' : '') }}>{{ $area->name }}</option>
                    @endforeach
                @else
                    <option></option>
                @endif
            </select>
        </div>
    </div>
</div>
<div class="form-group" v-bind:class="errors.permanentforest ? 'has-error' : ''">
    <label class="control-label">
        <span v-if="errors.permanentforest">@{{ errors.permanentforest[0] }}</span>
        <span v-else>Hutan Simpan Kekal</span>
    </label>
    <select class="form-control select2" data-placeholder="Pilih HSK" name="permanentforest" id="permanentforest" style="width: 100%">
        @if(isset($mountain->id))
            @foreach($forests as $forest)
                <option value="{{ $forest->id }}"{{ ($forest->id == $mountain->permanent_forest_id ? ' selected' : '') }}>{{ $forest->name }}</option>
            @endforeach
        @endif
    </select>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group" v-bind:class="errors.name ? 'has-error' : ''">
            <label class="control-label">
                <span v-if="errors.name">@{{ errors.name[0] }}</span>
                <span v-else>Nama Gunung</span>
            </label>
            {{ Form::text('name', old('name', $mountain->name), ['class' => 'form-control']) }}
            <span class="material-icons form-control-feedback">clear</span>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group" v-bind:class="errors.price ? 'has-error' : ''">
            <label class="control-label">
                <span v-if="errors.price">@{{ errors.price[0] }}</span>
                <span v-else>Caj Pemprosesan</span>
            </label>
            {{ Form::text('price', old('price', $mountain->price), ['class' => 'form-control']) }}
            <span class="material-icons form-control-feedback">clear</span>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group" v-bind:class="errors.other_price ? 'has-error' : ''">
            <label class="control-label">
                <span v-if="errors.other_price">@{{ errors.other_price[0] }}</span>
                <span v-else>Tukar Caj Permit</span>
            </label>
            {{ Form::text('other_price', old('other_price', (!empty($mountain->permanent_forest->price) ? $mountain->permanent_forest->price : '0')), ['class' => 'form-control', 'readonly' => 'readonly', 'id' => 'other_price']) }}
            <span class="material-icons form-control-feedback">clear</span>
        </div>
    </div>
    
</div>
<div class="row">
    <div class="col-md-3">
        <div class="form-group" v-bind:class="errors.campground ? 'has-error' : ''">
            <label class="control-label">
                <span v-if="errors.campground">@{{ errors.campground[0] }}</span>
                <span v-else>Tapak Perkhemahan</span>
            </label>
            @if(isset($mountain->id))
                <label style="display: block; margin-top: 10px;">
                    <input type="radio" name="campground" value="Y"{{ $mountain->campground == 'Y' ? ' checked' : '' }}> Ada
                </label>
                <label>
                    <input type="radio" name="campground" value="N"{{ $mountain->campground == 'N' ? ' checked' : '' }}> Tiada
                </label>
            @else
                <label style="display: block; margin-top: 10px;">
                    <input type="radio" name="campground" value="Y" checked> Ada
                </label>
                <label>
                    <input type="radio" name="campground" value="N"> Tiada
                </label>
            @endif
            <span class="material-icons form-control-feedback">clear</span>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group" v-bind:class="errors.capacity ? 'has-error' : ''">
            <label class="control-label">
                <span v-if="errors.capacity">@{{ errors.capacity[0] }}</span>
                <span v-else>Had Daya Tampung Perkhemahan</span>
            </label>
            {{ Form::text('capacity', old('capacity', $mountain->capacity), ['class' => 'form-control']) }}
            <span class="material-icons form-control-feedback">clear</span>
        </div>
    </div>
    <div class="col-md-5">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group" v-bind:class="errors.travel_day ? 'has-error' : ''">
                    <label class="control-label">
                        <span v-if="errors.travel_day">@{{ errors.travel_day[0] }}</span>
                        <span v-else>Hari</span><br /><br />
                    </label>
                    {{ Form::number('travel_day', old('travel_day', $mountain->travel_day), ['class' => 'form-control']) }}
                    <span class="material-icons form-control-feedback">clear</span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group" v-bind:class="errors.travel_night ? 'has-error' : ''">
                    <label class="control-label">
                        <span v-if="errors.travel_night">@{{ errors.travel_night[0] }}</span>
                        <span v-else>Malam</span><br /><br />
                    </label>
                    {{ Form::number('travel_night', old('travel_night', $mountain->travel_night), ['class' => 'form-control']) }}
                    <span class="material-icons form-control-feedback">clear</span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-9">
        <div class="form-group" v-bind:class="errors.location ? 'has-error' : ''" style="margin-bottom: 20px">
            <label class="control-label">
                <span v-if="errors.location">@{{ errors.location[0] }}</span>
                <span v-else>Lokasi</span>
            </label>
            <textarea class="form-control" name="location">{{ old('location', $mountain->location) }}</textarea>
            <span class="material-icons form-control-feedback">clear</span>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group" v-bind:class="errors.name ? 'has-error' : ''">
            <label class="control-label" style="display: block; margin-top: 25px;">
                <input type="radio" name="active" value="1"{{ (isset($mountain->id) && $mountain->active == '1' ? ' checked' : '') }}> Enable</label>
                
            </label>
            <label class="control-label" style="margin-top: 0;">
                <input type="radio" name="active" value="0"{{ (isset($mountain->id) && $mountain->active == '0' ? ' checked' : '') }}> Disable</label>
                
            </label>
        </div>
    </div>
</div>
<div class="form-group" style="margin-top: 20px !important;">
    <div class="card">
        <div class="card-header" data-background-color="red">
            <h4 class="title pull-left">Tapak Perkhemahan</h4>
            <a type="button" id="addCampground" class="pull-right cursor-pointer">
                <i class="fa fa-2x fa-plus-circle"></i>
            </a>
            <span class="clearfix"></span>
        </div>
        <div class="card-content">
            <table class="table table-bordered">
                <thead>
                    <tr class="active">
                        <th>Nama Tapak Perkhemahan</th>
                        <th style="width: 30%">Daya Tampung</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="tableCampground">
                    @if(isset($mountain->id))
                        @php($i = 1)
                        @foreach($campgrounds as $campground)
                            <tr id="tc-{{ $i }}" class="rowCampground">
                                <td>
                                    <input type="text" class="form-control" name="campgrounds[{{ $i }}][name]" value="{{ $campground->name }}">
                                </td>
                                <td>
                                    <input type="number" class="form-control" name="campgrounds[{{ $i }}][capacity]" value="{{ $campground->capacity }}">
                                </td>
                                <td class="td-actions text-center" align="center">
                                    <a type="button" data-id="{{ $i }}" class="deleteCampground btn btn-danger btn-xs">
                                        <i class="material-icons">clear</i>
                                        <div class="ripple-container"></div>
                                    </a>
                                </td>
                            </tr>
                            @php($i++)
                        @endforeach
                    @else
                        <tr id="tc-1" class="rowCampground">
                            <td>
                                <input type="text" class="form-control" name="campgrounds[1][name]" value="">
                            </td>
                            <td>
                                <input type="number" class="form-control" name="campgrounds[1][capacity]" value="">
                            </td>
                            <td class="td-actions text-center" align="center">
                                <a type="button" data-id="1" class="deleteCampground btn btn-danger btn-xs">
                                    <i class="material-icons">clear</i>
                                    <div class="ripple-container"></div>
                                </a>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
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

            $('#area').on('change', function(){
                $.ajax({
                    type: 'POST',
                    url: '{{ url('hiking/find-hsk') }}',
                    data: {
                        state_id: $('#state').val(),
                        area_id: $(this).val(),
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data)
                    {
                        $('#permanentforest').select2('destroy').empty().select2({data: data});
                    }
                });
            });

            $('#addCampground').on('click', function(){

                var row = ($('.rowCampground').length + 1);

                var html = '';
                html += '<tr id="tc-'+ row +'">';
                html += '    <td>';
                html += '        <input type="text" class="form-control" name="campgrounds['+ row +'][name]" value="">';
                html += '    </td>';
                html += '    <td>';
                html += '        <input type="number" class="form-control" name="campgrounds['+ row +'][capacity]" value="">';
                html += '    </td>';
                html += '    <td class="td-actions text-center" align="center">';
                html += '        <a type="button" data-id="'+ row +'" class="deleteCampground btn btn-danger btn-xs">';
                html += '            <i class="material-icons">clear</i>';
                html += '            <div class="ripple-container"></div>';
                html += '        </a>';
                html += '    </td>';
                html += '</tr>';

                $(html).appendTo('#tableCampground');
            });
        });

        $('body').on('click', '.deleteCampground', function(){
            var id = $(this).data('id');

            $('#tc-' + id).remove();
        });

        $('body').on('change', '#permanentforest', function(){
            $.ajax({
                type: 'POST',
                url: '{{ url('hiking/find-hsk-price') }}',
                data: {
                    id: $(this).val(),
                    _token: '{{ csrf_token() }}'
                },
                success: function(data)
                {
                    $('#other_price').val(data);
                }
            });
        });

    })(jQuery);
</script>