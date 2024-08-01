<x-layouts>
    <x-slot:heading>
        Posts
    </x-slot:heading>
    
    <div class="space-y-4">
        @foreach ($posts as $post)
            <a href="/posts/{{ $post['id'] }}" class="block px-4 py-4 border border-gray-200 rounded-lg">
                {{-- <div class="font-bold text-blue-500 text-sm">{{ $post->user->first_name }} {{ $post->user->first_name }}</div> --}}
                <div class="font-bold text-blue-500 text-sm"><strong>{{ $post['title'] }}:</strong></div>
                <div>
                    {{ $post['body']}}.
                </div>
            </a>
        @endforeach
    </div>

    <div class="py-4">
        {{ $posts->links() }}
    </div>

</x-layouts>