    @section('header-script')
      {{-- dropzone single file upload --}}
      {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css"> --}}
      {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>
      <link rel="stylesheet" href="{{url('dropzone/dropzone.css')}}">
      <script src="{{asset('dropzone/dropzone.js')}}"></script>
      <script type="text/javascript">
            /**
            * Dropzone file input for preview image
            */
            Dropzone.options.dropzone =
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
                removedfile: function(file)
                {
                    var name = file.upload.filename;
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
      </script>--}}
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
            {!! Form::textarea('body', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        </div>
    </div>


    {{-- <div class="row">
        <div class="col-md-12">
            {!! Form::label('preview', 'Preview Text', ['class' => 'control-label']) !!}
            {!! Form::textarea('preview', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        </div>
    </div> --}}

    <div class="row">
        <div class="col-md-12">
            {!! Form::label('image', 'Image(360*239)', ['class' => 'control-label']) !!}
            {!! Form::file('image',null,('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        </div>
    </div>
  {!! Form::hidden('type', $type) !!}

  <div class="row">
        <div class="col-md-12">
            {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary form-margin']) !!}
        </div>
    </div>
</div>





    @section('footer-script')
      {{-- Tinymce with file upload option --}}
      <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
      <script>
        var editor_config = {
          path_absolute : "/",
          selector: "textarea",
          plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table contextmenu directionality",
            "emoticons template paste textcolor colorpicker textpattern"
          ],
          toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
          relative_urls: false,
          file_browser_callback : function(field_name, url, type, win) {
            var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
            var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

            var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
            if (type == 'image') {
              cmsURL = cmsURL + "&type=Images";
            } else {
              cmsURL = cmsURL + "&type=Files";
            }

            tinyMCE.activeEditor.windowManager.open({
              file : cmsURL,
              title : 'Filemanager',
              width : x * 0.8,
              height : y * 0.8,
              resizable : "yes",
              close_previous : "no"
            });
          }
        };

        tinymce.init(editor_config);


                // creating dynamic slug
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
