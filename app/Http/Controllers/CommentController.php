<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Http\Resources\CommentResource;
use App\Models\Comment;
use App\Models\Task;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(Task $task)
    {
        return CommentResource::collection(
            $task->comments()->paginate(10)
        );
    }

    public function store(StoreCommentRequest $request, Task $task)
    {
        $comment = $task->comments()->create($request->validated());

        return new CommentResource($comment);
    }

    public function show(Comment $comment)
    {
        return new CommentResource($comment);
    }

    public function update(Request $request, Comment $comment)
    {
        $comment->update(
            $request->only(['content', 'user_id'])
        );

        return new CommentResource($comment);
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();

        return response()->json([
            'message' => 'Comment deleted'
        ]);
    }
}