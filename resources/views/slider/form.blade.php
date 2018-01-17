@php($method = isset($slider->id) ? 'put' : 'post')
@php($route = isset($slider->id) ? route('slider-setting.update', $slider->id) : route('slider-setting.store'))
@php($index = route('slider-setting.index'))

{!! Form::model($slider, ['url' => $route, 'method' => $method, 'id' => 'user-form', 'files' => true]) !!}
<div class="form-group" v-bind:class="errors.title ? 'has-error' : ''">
    <label class="control-label">
        <span v-if="errors.title">@{{ errors.title[0] }}</span>
        <span v-else>Tajuk</span>
    </label>
    {{ Form::text('title', old('title', $slider->title), ['class' => 'form-control']) }}
    <span class="material-icons form-control-feedback">clear</span>
</div>
<label class="control-label">
    <span v-if="errors.image">@{{ errors.image[0] }}</span>
    <span v-else>Gambar</span>
</label>
<input type="file" name="files">
<span class="material-icons form-control-feedback">clear</span>
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
                        // window.location.href = '{!! $index !!}';
                        console.log(response);
                    }
                }.bind(this));
            }
        }
    });
</script>