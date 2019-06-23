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