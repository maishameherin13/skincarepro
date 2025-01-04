<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Share your thoughts and reviews with the community!') }}
        </h2>
<body class="bg-gray-100">
    <div class="max-w-4xl mx-auto mt-10 p-6 bg-white shadow-md rounded-lg">

        <div class="mt-6">
            <h3 class="text-2xl font-semibold text-gray-800">Comments</h3>

            @foreach ($comments as $comment)
    <div class="bg-gray-50 border border-gray-200 rounded-lg p-4 mt-4">
        <h5 class="text-lg font-medium text-gray-700">{{ $comment->user->name }}</h5>
        <span class="text-sm text-gray-500">{{ $comment->created_at->format('d M, Y h:i A') }}</span>
        <p class="text-gray-600 mt-2">{{ $comment->content }}</p>

        <form action="{{ route('community.storeReaction') }}" method="POST" class="mt-2">
            @csrf
            <input type="hidden" name="comment_id" value="{{ $comment->id }}">
            <div class="flex space-x-2 mt-2">
                <button type="submit" name="reaction_type" value="👍" class="text-2xl">
                    👍
                    <span class="text-sm">{{ $comment->reactions->where('reaction_type', '👍')->count() }}</span>
                </button>
                <button type="submit" name="reaction_type" value="❤️" class="text-2xl">
                    ❤️
                    <span class="text-sm">{{ $comment->reactions->where('reaction_type', '❤️')->count() }}</span>
                </button>
                <button type="submit" name="reaction_type" value="😂" class="text-2xl">
                    😂
                    <span class="text-sm">{{ $comment->reactions->where('reaction_type', '😂')->count() }}</span>
                </button>
                <button type="submit" name="reaction_type" value="😡" class="text-2xl">
                    😡
                    <span class="text-sm">{{ $comment->reactions->where('reaction_type', '😡')->count() }}</span>
                </button>
            </div>
        </form>

        
        <div class="mt-4">
            <form action="{{ route('community.store') }}" method="POST" class="space-y-2">
                @csrf
                <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                <textarea name="content" rows="2" placeholder="Reply..." 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-200 focus:outline-none" required></textarea>
                <button type="submit" 
                    class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                    Reply
                </button>
            </form>
        </div>

        
        @if ($comment->replies)
            <div class="ml-6 mt-4 border-l-2 border-gray-300 pl-4">
                @foreach ($comment->replies as $reply)
                    <div class="bg-gray-100 border border-gray-200 rounded-lg p-3 mt-2">
                        <h6 class="text-md font-medium text-gray-700">{{ $reply->user->name }}</h6>
                        <span class="text-sm text-gray-500">{{ $reply->created_at->format('d M, Y h:i A') }}</span>
                        <p class="text-gray-600 mt-1">{{ $reply->content }}</p>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endforeach

        


        </div>

        
        <div class="mt-8">
            <h3 class="text-2xl font-semibold text-gray-800">Add a Comment</h3>
            <form action="{{ route('community.store') }}" method="POST" class="mt-4">
                @csrf
                
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-medium">Your Name</label>
                    <input type="text" id="name" name="name" placeholder="Enter your name" 
                        class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-200 focus:outline-none" required>
                </div>
               
                <div class="mb-4">
                    <label for="content" class="block text-gray-700 font-medium">Your Comment</label>
                    <textarea id="content" name="content" rows="4" placeholder="Enter your comment"
                        class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-200 focus:outline-none" required></textarea>
                </div>
                
                <button type="submit" 
                    class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                    Post Comment
                </button>
            </form>
        </div>
    </div>
</body>
</x-slot>

</x-app-layout>