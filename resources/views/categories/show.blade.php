<x-layout>

    <h1>Single Category</h1>
    <article>
        <x-h1>{{ $category->name }}</x-h1>
    </article>

    <br><a class="btn btn-primary" href="{{ route('categories.index') }}">Go back</a>
</x-layout>
