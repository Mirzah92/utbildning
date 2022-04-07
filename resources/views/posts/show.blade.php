<x-layout>
    <article>
        <x-h1>{{ $post->title }}</x-h1>

        <div>
            {{ $post->description }}
        </div>
    </article>

    <br><a class=" btn btn-primary" href="/posts">Go back</a>
</x-layout>
