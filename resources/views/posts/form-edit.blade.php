    @section('header-script')
      {{-- dropzone single file upload --}}
      {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css"> --}}
      <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>
      <link rel="stylesheet" href="{{url('dropzone/dropzone.css')}}">
      {{-- <script src="{{asset('dropzone/dropzone.js')}}"></script> --}}
      <script type="text/javascript">
            /**
            * Dropzone file input for preview image
            */
            var oldFile = '{{$post->image}}';
            var oldFileSize = '{{$size}}';
            var myDropzone = Dropzone.options.dropzone =
             {
                maxFilesize: 12,
                maxFiles: 1,
                renameFile: function(file) {
                    var dt = new Date();
                    var time = dt.getTime();
                   return time+file.name;
                },
                acceptedFiles: ".jpeg,.jpg,.png,.gif",
                addRemoveLinks: true,
                dictRemoveFile: 'Remove',
                timeout: 50000,
                init: function () {

                  var myDropzone = this;
                  var mockFile = { name: oldFile, size: 8789 };
                  myDropzone.emit("addedfile", mockFile);
                  myDropzone.options.thumbnail.call(myDropzone, mockFile, '/uploads/' + oldFile);
                  myDropzone.emit("complete", mockFile);

                },
                removedfile: function(file)
                {
                    var name = file.name;
                    /*if (!name) {
                      name = file.name;
                    }*/
                    $.ajax({
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        type: 'POST',
                        url: '{{ url("image/delete") }}',
                        data: {filename: name},
                        success: function (data){
                            console.log("File has been successfully removed!!");
                        },
                        error: function(e) {
                            console.log(e);
                        }});
                        var fileRef;
                        return (fileRef = file.previewElement) != null ?
                        fileRef.parentNode.removeChild(file.previewElement) : void 0;
                },

                success: function(file, response)
                {
                  console.log(response);
                  document.getElementById('hidden-image').value = response.success;
                },
                error: function(file, response)
                {
                  alert(response);
                  this.removeFile(file);
                }
              };
      </script>
    @endsection
<div class="grids widget-shadow">
    <div class="row">
        <div class="col-md-12">
            {!! Form::label('title', 'Title', ['class' => 'control-label']) !!}
            {!! Form::text('title', null, ('required' == 'required') ? ['class' => 'form-control title', 'required' => 'required'] : ['class' => 'form-control title']) !!}
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            {!! Form::label('slug', 'Slug', ['class' => 'control-label']) !!}
            {!! Form::text('slug', null, ('required' == 'required') ? ['class' => 'form-control slug', 'required' => 'required'] : ['class' => 'form-control slug']) !!}
        </div>
    </div>
  {{-- {{ Form::hidden('image', null, array('id' => 'hidden-image')) }} --}}

    <div class="row">
        <div class="col-md-12">
            {!! Form::label('body', 'Body', ['class' => 'control-label']) !!}
            {!! Form::textarea('body', null, ('' == 'required') ? ['class' => 'form-control tinymce-editor', 'required' => 'required'] : ['class' => 'form-control tinymce-editor']) !!}
        </div>
    </div>

    {{-- <div class="row">
        <div class="col-md-12">
            {!! Form::label('preview', 'Preview Text', ['class' => 'control-label']) !!}
            {!! Form::textarea('preview', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}

        </div>
    </div> --}}
    
  {!! Form::hidden('type', null) !!}

    <div class="row">
        <div class="col-md-12">
            {!! Form::label('image', 'Image(360*239)', ['class' => 'control-label']) !!}
            {!! Form::file('image',null,('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
            <img src="{{asset($post->image)}}"  alt="Claim'n Win" style="width: 80px; height: 80px; padding: 5px; background-color:black; margin-top: 5px;" />
            {{ Form::hidden('old_image', $post->image) }}
        </div>
    </div>
  <br/>

    <div class="row">
        <div class="col-md-12">
            {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary form-margin']) !!}
        </div>
    </div>
</div>





    @section('footer-script')
      {{-- Tinymce with file upload option --}}
      <script type="text/javascript">
        {{-- creating dynamic slug --}}
          $(document).ready(function(){
            $('.title').focusout(function(){
                var title = $('.title').val();
                title = title.replace(/[ ]+/g, "-");
                title = title.replace(/[^a-zA-Z0-9_-]+/g, "");
                title = title.toLowerCase();
                if ($('.slug').val()=="") {
                    $('.slug').val(title);
                }
            });
          });// end of jQuery


        </script>
    @endsection
