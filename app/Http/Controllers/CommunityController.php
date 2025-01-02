<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Reaction;

class CommunityController extends Controller
{
    public function index()
    {
        
        $comments = Comment::whereNull('parent_id')
            ->with('replies', 'user', 'reactions') 
            ->orderBy('created_at', 'desc')
            ->get();

        return view('community.index', compact('comments'));
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'content' => 'required|string|max:500',
            'parent_id' => 'nullable|exists:comments,id', 
        ]);

       
        Comment::create([
            'user_id' => Auth::id(),  
            'parent_id' => $request->parent_id, 
            'content' => $request->content,
        ]);

        
        return redirect()->back()->with('message', 'Comment added successfully!');
    }

    public function storeReaction(Request $request)
    {
        
        $request->validate([
            'comment_id' => 'required|exists:comments,id',
            'reaction_type' => 'required|string|in:👍,❤️,😂,😡', 
        ]);

       
        $existingReaction = Reaction::where('user_id', auth()->id())
            ->where('comment_id', $request->comment_id)
            ->first();

        if ($existingReaction) {
            $existingReaction->update([
                'reaction_type' => $request->reaction_type,
            ]);
        } else {
           
            Reaction::create([
                'user_id' => auth()->id(),
                'comment_id' => $request->comment_id,
                'reaction_type' => $request->reaction_type,
            ]);
        }

        return redirect()->back()->with('message', 'Reaction added!');
    }
}
