@php($method = isset($post->id) ? 'put' : 'post')
@php($route = isset($post->id) ? route('post-information.update', $post->id) : route('post-information.store'))
@php($index = route('post-information.index'))

{!! Form::model($post, ['url' => $route, 'method' => $method, 'id' => 'state-form']) !!}
<div class="form-group" v-bind:class="errors.title ? 'has-error' : ''">
    <label class="control-label">
        <span v-if="errors.title">@{{ errors.title[0] }}</span>
        <span v-else>Tajuk</span>
    </label>
    {{ Form::text('title', old('title', $post->title), ['class' => 'form-control']) }}
    <span class="material-icons form-control-feedback">clear</span>
</div>
<div class="form-group" v-bind:class="errors.content ? 'has-error' : ''">
    <label class="control-label">
        <span v-if="errors.content">@{{ errors.content[0] }}</span>
        <span v-else>Konten</span>
    </label>
    <textarea class="texteditor" name="content">{{ $post->content }}</textarea>
    <span class="material-icons form-control-feedback">clear</span>
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
            $('.texteditor').summernote({
                height: 200,
                tabsize: 1,
                toolbar: [
                    // [groupName, [list of button]]
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']]
                ]
            });
        });

    })(jQuery);
</script>