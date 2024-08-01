<x-layouts>
    <x-slot:heading>
        Post
    </x-slot:heading>
    
    <div class="space-y-4 block px-4 py-4 border border-gray-200 rounded-lg">
        <h2 class="font-bold text-lg">{{ $post['title'] }} </h2>
        <div class="space-y-1 block px-4 py-4">
            <p><strong>Post:</strong> {{ $post['body'] }}.</p>
            <div class="space-y-1 block px-4 py-4 border border-gray-200 rounded-0">
                <h2>Comments</h2>
                <div class="space-y-1 block px-4 py-4">
                    @foreach ($comments as $comment)
                        <div class="space-y-1 block px-4 py-4 border border-gray-200 rounded-0"> 
                            {{ $comment->body }}
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-layouts>