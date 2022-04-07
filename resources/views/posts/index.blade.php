<x-layout>

{{--    <h1>Main page</h1><br>
    @foreach($posts as $post)
        <article>
            <h1>
                <a class="limegreen" href="/posts/{{$post->slug}}">
                    {{ $post->title }}
                </a>
            </h1>

            <div>
                {{ $post->excerpt }}
            </div>
        </article>
    @endforeach
</x-layout>--}}

<div class="row" style="margin-top: 5rem;">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Laravel 8 CRUD Example from scratch - laravelcode.com</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('posts.create') }}"> Create New Post</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<table class="table table-bordered">
    <tr>
        <th>Title</th>
        <th>Excerpt</th>
        <th>Categories</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($posts as $post)
        <tr>
            <td>{{ $post->title }}</td>
            <td>{{ \Str::limit($post->excerpt, 100) }}</td>
            <td>
                @if($post->category)

                    {{ $post->category->name }}
                @else
                    No category
                @endif
            </td>

            <td>
                <form action="{{ route('posts.destroy',$post) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('posts.show',$post) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('posts.edit',$post) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>
</x-layout>
