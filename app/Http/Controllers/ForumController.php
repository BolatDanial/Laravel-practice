<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\Models\Topic;
use App\Models\Comment;
use App\Http\Requests\ForumRequest;

class ForumController extends Controller
{
    public function index() {
        return view('forum', ['topics' => Topic::with('user')->get()]);
    }

    public function forumTopic($id) {
        $topic = Topic::with('user')->where('id', $id)->first();
        $comments = Comment::with('user')->where('topic_id', $id)->get();
        return view('forumTopic', ['topic' => $topic, 'comments' => $comments, 'commentCount' => count($comments)]);
    }

    public function createTopicForm() {
        return view('createTopic');
    }

    public function createTopic(ForumRequest $request) {
        if (!auth()->check()) {
            abort(403, 'Unauthorized action.');
        }

        $topic = new Topic;
        $topic->user_id = Auth::user()->id;
        $topic->topic = $request->input('topic');
        $topic->description = $request->input('description');
        $topic->content = $request->input('content');
        $topic->save();

        return redirect('/forum')->with('success', 'Topic created');
    }

    public function deleteTopic($id) {
        Topic::where('id', $id)->delete();
        return back()->with('success', 'Topic deleted');
    }

    public function updateTopic($id, ForumRequest $request) {
        $topic = Topic::where('id', $id)->first();

        $topic->topic = $request->input('topic');
        $topic->description = $request->input('description');
        $topic->content = $request->input('content');

        $topic->save();

        return redirect('profile')->with('success', 'Topic updated');
    }
}
