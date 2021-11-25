<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;
use App\Models\Challenge;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::all();
        return $comments;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $challengeId)
    {
        $challenge = Challenge::with('user')->find($challengeId);

        $comment = new Comment();
        $comment->user_id = $request->user_id;
        $comment->challenge_id = $request->challenge_id;
        $comment->comment = $request->comment;

        if ($request->user_id == $challenge->user->id) {
            $challenge->close_flg = 1;
        }

        DB::beginTransaction();
        try {
            // 登録
            $comment->save();
            if ($request->user_id == $challenge->user->id) {
                $challenge->close_flg = 1;
                $challenge->save();
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()
                ->withErrors('コメント登録でエラーが発生しました');
        }

        return $comment;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
