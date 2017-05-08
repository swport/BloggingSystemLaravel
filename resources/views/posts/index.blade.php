@extends('main')

@section('title', 'All Posts')

@section('content')

      <div class="row">
        <div class="col-md-10">
          <h1>All Posts</h1>
        </div>
          <div class="col-md-2">
            <a href="{{ route('posts.create') }}" class="btn btn-lg btn-block btn-primary btn-h1-spacing">Create New Post</a>
          </div>
              <hr>
        </div> <!-- end of .row  -->

        <div class="row">
          <div class="col-md-12">
            <table class="table">
              <thead>
                <th>#</th>
                <th>title</th>
                <th>body</th>
                <th>created at</th>
              </thead>

              <tbody>
                @foreach ($posts as $post)
                  <tr>
                    <th>{{ $post->id }}</th>
                    <td>{{ $post->title }}</td>
                    <td>{{ substr($post->body, 0, 50) }}{{ strlen($post->body) > 50 ? "..." : "" }}</td>
                    <td>{{ date('M j, Y > h:i A', strtotime($post->created_at)) }}</td>
                    <td><a href="{{ route('posts.show', $post->id) }}" class="btn btn-default btn-sm">View</a> <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-default btn-sm">Edit</a>
                      {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE' ]) !!}
                      {{ Form::submit("Delete", ["class"=>'btn btn-danger btn-sm']) }}
                    {!! Form::close() !!}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>

            <div class='text-center'>
                {!! $posts-> links() !!}
            </div>
        </div></div>
       </div>


@endsection
