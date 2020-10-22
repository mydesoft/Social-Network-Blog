<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Notifications\SentReplyNotification;
use App\User;
use App\Query;
use Auth;
use App\Reply;

class QueriesController extends Controller
{
    public function querymessages()
	{
		$queries = Query::orderBy('created_at', 'desc')->get();

		return view('admin.querymessages', compact('queries'));
	}

	public function replyquery($id)
	{
		$user = User::find($id);

		$queries = User::find($id)->queries;

		return view('admin.replyquery', compact('user', 'queries'));
	}


	public function sendreply(Request $request, $id)
	{
		$request->validate(['content' => 'required']);

		$user = User::find($id);

		$reply = new Reply;
		$reply->content = $request->content;
		$reply->From = Auth::user()->id;
		$reply->To = $user->id;
		$reply->save();

		$user->notify(new SentReplyNotification($reply));

		Auth::user()->notifications()->where('type','App\Notifications\ContactAdminNotification')
                ->where('data->id', $user->id)->delete();

		return back()->with('success', 'Reply Sent');
	}

	public function deletequery($id)
	{
		$query = Query::find($id);

		$query->delete();

		return redirect()->route('querymessages')->with('success', 'Query has been deleted!');
	}
}
