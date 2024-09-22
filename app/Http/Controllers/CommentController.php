<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class CommentController extends Controller
{
    //
    public function create(Request $request, $postId) {
        $request->validate([
            "body" => "required"
        ]);

        $comment = new Comment();
        $comment->body = $request->body;
        $comment->post_id = $postId;
        $comment->user_id = FacadesAuth::id();
        $comment->approved = false;
        $comment->save();

        return  back()->with("success", "Comment submitted waiting for the approval");
    }

    public function approve($id){
        $comment = Comment::findOrFail($id);
        $comment->approved = true;
        $comment->save();
        return redirect("/")->with("success", "Comment approved");
    }

    public function destroy($id) {
        $comment = Comment::findOrFail($id);
        $comment->delete();
        return back()->with('success', 'Comment deleted.');

    }

}
