<x-layouts>
    <x-slot:heading>
        Post
    </x-slot:heading>

    <div class="container mx-auto p-4">
        {{-- Display the Post --}}
        <div class="bg-white rounded-lg shadow-md p-6 mb-6">
            <div class="flex items-center">
                {{-- <img src="{{ $post->user->profile_image }}" alt="Profile Image" class="w-10 h-10 rounded-full mr-4"> --}}
                <img src="{{ asset('images/userIcon.png') }}" alt="Profile Image" class="w-10 h-10 rounded-full mr-4">
                <div>
                    {{-- <h2 class="text-lg font-semibold">{{ $post->user['first_name'] }} {{ $post->user['last_name'] }}</h2> --}}
                    <p class="text-sm text-gray-500">{{ $post->created_at->diffForHumans() }}</p>
                </div>
            </div>
            <div class="mt-4">
                <p class="text-gray-700">{{ $post['title'] }}</p>
                <p class="text-gray-700">{{ $post['description'] }}</p>
            </div>
            <div class="mt-4 flex space-x-4">
                <button class="text-blue-500 hover:underline">Like</button>
                <button class="text-blue-500 hover:underline">Comment</button>
                <button class="text-blue-500 hover:underline">Share</button>
            </div>
        </div>
    
        {{-- Display Comments Section --}}
        <div class="bg-white rounded-lg shadow-md p-6">
            <h3 class="text-lg font-semibold mb-4">Comments</h3>
    
            {{-- Comment Form --}}
            {{-- <form action="{{ route('comments.store', $post->id) }}" method="POST"> --}}
            <form action="#" method="POST">
                @csrf
                <textarea name="comment" class="w-full border rounded-lg p-2 mb-4" placeholder="Write a comment..."></textarea>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Post Comment</button>
            </form>
    
            {{-- Loop through Comments --}}
            @foreach($post->comments as $comment)
            <div class="mt-4 border-t pt-4">
                <div class="flex items-center">
                    {{-- <img src="{{ $comment->user->profile_image }}" alt="Profile Image" class="w-8 h-8 rounded-full mr-4"> --}}
                    <img src="{{ asset('images/userIcon.png') }}" alt="Profile Image" class="w-8 h-8 rounded-full mr-4">
                    <div>
                        {{-- <h4 class="text-md font-semibold">{{ $comment->user->name }}</h4> --}}
                        <h4 class="text-md font-semibold">Name</h4>
                        <p class="text-sm text-gray-500">{{ $comment->created_at->diffForHumans() }}</p>
                    </div>
                </div>
                <p class="text-gray-700 mt-2">{{ $comment->content }}</p>
            </div>
            @endforeach
        </div>
    </div>
    
    {{-- <div class="space-y-4 block px-4 py-4 border border-gray-200 rounded-lg">
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
    </div> --}}
</x-layouts>