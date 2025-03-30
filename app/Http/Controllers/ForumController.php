<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\Models\Topic;
use App\Http\Requests\ForumRequest;

class ForumController extends Controller
{
    public function index() {
        return view('forum', ['topics' => Topic::with('user')->get()]);
    }

    public function forumTopic($id) {
        return view('forumTopic', ['topic' => Topic::where('id', $id)->first()]);
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
}
