@extends('main')

@section('title', 'Edit')

@section('stylesheets')

  {!! Html::style('css/select2.min.css') !!}

@endsection

@section("content")

<p class="lead">Samuel Wadhwa's Blog</p>

{!!  Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT'])  !!}
  <div class = "col-md-8">
    {{ Form::label('title', "Title::") }}
    {{ Form::text('title', null, ["class" => 'form-control input-lg']) }}
    <br/>
    {{ Form::label('slug', "Slug::") }}
    {{ Form::text('slug', null, ["class" => 'form-control input-lg']) }}
    <br/>
    
          {{ Form::label('tags', 'Tags:') }}
          <select class="form-control select2-multi" name="tags[]" multiple="multiple">
          @foreach($tags as $tag)
            <option value='{{ $tag->id }}'>{{ $tag->name }}</option>
          @endforeach  
          </select>
    <br/>

    {{ Form::label('category_id', "Category:") }}
    {{ Form::select('category_id', $categories, null, ['class'=>'form-control']) }}

    {{ Form::label('body', "Content::", ["class" => 'form-spacing-top']) }}
    {{ Form::textarea('body', null, ["class" => 'form-control']) }}
  </div>
  <div class = "col-md-8">
    <div class="well">
      <!--Definition list-->
      <dl class="dl-horizontal">
        <dt>Created at:<dt>
        <dd>{{ date('M j, Y > h:i A',strtotime($post->created_at)) }}<dd>
      </dl>
      <dl class="dl-horizontal">
        <dt>Last Updated:<dt>
        <dd>{{ date('M j, Y > h:i A',strtotime($post->updated_at)) }}<dd>
          <hr>
      </dl>
      <div class="row">
        <div class="col-sm-6">
          {!! Html::linkRoute('posts.show', 'Cancel', array($post->id), array('class' => 'btn btn-danger btn-block')) !!}
        </div>
        <div class="col-sm-6">
          {{ Form::submit('Save Changes', ["class" => 'btn btn-success btn-block']) }}
          </div>
      </div>
    </div>
    {!! Form::close() !!}
  </div>
  
@stop

    @section('scripts')

      {!! Html::script('js/select2.min.js') !!}

      <script type="text/javascript">
        $('.select2-multi').select2();
        $('.select2-multi').select2().val({!! json_encode($post->tags()->getRelatedIds()) !!}).trigger('change');
      </script>
    @endsection