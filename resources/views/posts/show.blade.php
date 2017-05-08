@extends('main')

@section('title', 'View Post')

@section('content')


  <p class="lead">Samuel Wadhwa's Blog</p>
    <div class = "col-md-8">

        <h1>{{ $post->title }}</h1>
        <h3>{{ $post->slug }}</h3>
        <p>{{ $post->body }}</p>
        
        <hr>
        <div class='tags'>
        <h4>Tags</h4>
        @foreach ($post->tags as $tag)

          <span class="label label-default">
            {{ $tag->name }}
          </span>

        @endforeach
        </div>
  
    <br>
    </div>
    <div class = "col-md-8">
      <div class="well">
        <!--Definition list-->
        <dl class="dl-horizontal">
          <dt>Url Slug::<dt>
          <dd><a href="{{ url('blog/'.$post->slug) }}">{{ url('blog/'.$post->slug) }}</a><dd>
        </dl>

        <dl class="dl-horizontal">
          <dt>Created at:<dt>
          <dd>{{ date('M j, Y > h:i A',strtotime($post->created_at)) }}<dd>
        </dl>

        <dl class="dl-horizontal">
          <dt>Last Updated:<dt>
          <dd>{{ date('M j, Y > h:i A',strtotime($post->updated_at)) }}<dd>
          <br>
          
        </dl>

        <dl class="dl-horizontal">
          <dt>Category:<dt>
          <dd>{{ $post->category->name }}<dd>
          <br>
          
        </dl>
        
        <div class="row">
          <div class="col-sm-6">
            {!! Html::linkRoute('posts.edit', 'Edit', array($post->id), array('class' => 'btn btn-primary btn-block')) !!}
          </div>
          <div class="col-sm-6">
            {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE' ]) !!}
              {{ Form::submit("Delete", ["class"=>'btn btn-danger btn-block']) }}
            {!! Form::close() !!}
          </div>
        </div>
        <br/>
        <div class="row">
          <div class="col-sm-12">
            {{ Html::linkRoute('posts.index', '<< See All Posts', [], ['class' => 'btn btn-default btn-block btn-h1-spacing']) }}
          </div>
        </div>

      </div>
    </div>

@endsection
    @section('scripts')

      {!! Html::script('js/parsley.min.js') !!}
      {!! Html::script('js/select2.min.js') !!}

      <script type="text/javascript">
        
        $('.select2-multi').select2();

      </script>

    @endsection