@php($method = isset($ecopark->id) ? 'put' : 'post')
@php($route = isset($ecopark->id) ? route('eco-park.update', $ecopark->id) : route('eco-park.store'))
@php($index = route('eco-park.index'))

{!! Form::model($ecopark, ['url' => $route, 'method' => $method, 'id' => 'state-form']) !!}
<div class="row">
    <div class="col-md-6">
        <div class="form-group" v-bind:class="errors.state ? 'has-error' : ''">
            <label class="control-label">
                <span v-if="errors.name">@{{ errors.state[0] }}</span>
                <span v-else>Negeri</span>
            </label>
            <select class="form-control select2" data-placeholder="Pilih Negeri" name="state" id="state" style="width: 100%">
                @if(isset($ecopark->id))
                    @foreach($states as $state)
                        <option value="{{ $state->id }}"{{ ($state->id == $ecopark->state_id ? ' selected' : '') }}>{{ $state->name }}</option>
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
                @if(isset($ecopark->id))
                    @foreach($areas as $area)
                        <option value="{{ $area->id }}"{{ ($area->id == $ecopark->area_id ? ' selected' : '') }}>{{ $area->name }}</option>
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
        <div class="form-group" v-bind:class="errors.permanentforest ? 'has-error' : ''">
            <label class="control-label">
                <span v-if="errors.permanentforest">@{{ errors.permanentforest[0] }}</span>
                <span v-else>Hutan Simpan Kekal (HSK)</span>
            </label>
            <select class="form-control select2" data-placeholder="Pilih HSK" name="permanentforest" id="permanentforest" style="width: 100%">
                @if(isset($ecopark->id))
                    @foreach($forests as $forest)
                        <option value="{{ $forest->id }}"{{ ($forest->id == $ecopark->permanent_forest_id ? ' selected' : '') }}>{{ $forest->name }}</option>
                    @endforeach
                @endif
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group" v-bind:class="errors.type ? 'has-error' : ''">
            <label class="control-label">
                <span v-if="errors.type">@{{ errors.type[0] }}</span>
                <span v-else>Kategori</span>
            </label>
            <select class="form-control select2" data-placeholder="Pilih Kategori" name="type" id="type" style="width: 100%">
                <option></option>
                @if(isset($ecopark->id))
                    <option value="ter"{{ ($ecopark->type == 'ter' ? ' selected' : '') }}>Taman Eko-Rimba (TER)</option>
                    <option value="htn"{{ ($ecopark->type == 'htn' ? ' selected' : '') }}>Hutan Taman Kota (HTN)</option>
                @else
                    <option value="ter">Taman Eko-Rimba (TER)</option>
                    <option value="htn">Hutan Taman Negeri (HTN)</option>
                @endif
            </select>
        </div>
    </div>
    
    {{-- <div class="col-md-6">
        <div class="form-group" v-bind:class="errors.price ? 'has-error' : ''">
            <label class="control-label">
                <span v-if="errors.price">@{{ errors.price[0] }}</span>
                <span v-else>Harga (RM)</span>
            </label>
            {{ Form::text('price', old('price', $ecopark->price), ['class' => 'form-control']) }}
            <span class="material-icons form-control-feedback">clear</span>
        </div>
    </div> --}}
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group" v-bind:class="errors.name ? 'has-error' : ''">
            <label class="control-label">
                <span v-if="errors.name">@{{ errors.name[0] }}</span>
                <span v-else>Nama Taman Eko-Rimba</span>
            </label>
            {{ Form::text('name', old('name', $ecopark->name), ['class' => 'form-control']) }}
            <span class="material-icons form-control-feedback">clear</span>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group" v-bind:class="errors.capacity ? 'has-error' : ''">
            <label class="control-label">
                <span v-if="errors.capacity">@{{ errors.capacity[0] }}</span>
                <span v-else>Daya Tampung</span>
            </label>
            {{ Form::number('capacity', old('capacity', $ecopark->capacity), ['class' => 'form-control']) }}
            <span class="material-icons form-control-feedback">clear</span>
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group" v-bind:class="errors.name ? 'has-error' : ''">
            <label class="control-label" style="display: block; margin-top: 25px;">
                <input type="radio" name="active" value="1"{{ (isset($ecopark->id) && $ecopark->active == '1' ? ' checked' : '') }}> Enable</label>
                
            </label>
            <label class="control-label" style="margin-top: 0;">
                <input type="radio" name="active" value="0"{{ (isset($ecopark->id) && $ecopark->active == '0' ? ' checked' : '') }}> Disable</label>
                
            </label>
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
                    url: '{{ url('eco-park/find-area') }}',
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
                    url: '{{ url('eco-park/find-hsk') }}',
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
        });

    })(jQuery);
</script>