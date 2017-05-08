@extends('main')

@section('title', "$tag->name Tag")

@section('content')

		<div class="row">
			<div class="col-md-8">
				<h1><i>{{ $tag->name }}</i> <small>Tag</small><br/>
		<small>{{ $tag->posts()->count() }} post(s) are using this tag</small></h1>		
		
			</div>
			
		<div class="col-md-2">
			<a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-primary pull-right btn-block" style="margin-top:30px;">Edit</a>
		</div>
	<div class="col-md-2">
		{{ Form::open(['route'=>['tags.destroy', $tag->id], 'method'=>'DELETE']) }}
			{{ Form::submit('Delete Tag', ['class'=>'btn btn-danger btn-block ', "style"=>'margin-top:30px']) }}
		{{ Form::close() }}
	</div>

</div>	

	<div class="row">
		<div class="col-md-12">
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Blog Title</th>
						<th>Tags</th>
						<th></th>
					</tr>
				</thead>

				<tbody>
				@foreach($tag->posts as $post)
					<tr>
						<th>{{ $post->id }}</th>
						<td>{{ $post->title }}</td>	
						<td>@foreach($post->tags as $tag)

								<span class="label label-default">{{ $tag->name }}</span>

							@endforeach
						</td>
						<td><a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary btn-xs">View</a></td>

					</tr>
				@endforeach						
				</tbody>
			</table>
		</div>
	</div>

@stop