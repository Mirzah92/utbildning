<x-layout>

    <h1>Categories Page</h1><br>
    <div class="pull-right">
        <a class="btn btn-success" href="{{ route('categories.create') }}"> Create New Category</a>
    </div>
    @foreach($categories as $category)
        <article>
            <br><h2>{{ $category->name }}</h2>
            <h1>

                <form action="{{ route('categories.destroy',$category) }}" method="POST">
                <a class="btn btn-info" href="{{ route('categories.show',$category) }}">Show</a>
                <a class="btn btn-primary" href="{{ route('categories.edit',$category) }}">Edit</a>
                @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>


            </h1>



        </article>
    @endforeach
</x-layout>
{{--<a class="limegreen" href="{{ route('categories.show',$category) }}">--}}
