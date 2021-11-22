<?php

namespace App\Http\Controllers;

use App\Models\Challenge;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Good;
use App\Models\UserAvator;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Challenge $challenge)
    {
        $comment = new Comment();
        $comment->user_id = $request->user()->id;
        $comment->challenge_id = $challenge->id;
        $comment->comment = $request->comment;

        if ($request->user()->id == $challenge->user->id) {
            $challenge->close_flg = 1;
        }

        DB::beginTransaction();
        try {
            // 登録
            $comment->save();
            if ($request->user()->id == $challenge->user->id) {
                $challenge->close_flg = 1;
                $challenge->save();
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()
                ->withErrors('コメント登録でエラーが発生しました');
        }

        $query = Good::query();
        $param = [
            'user_id' => $challenge->user_id
        ];
        $query->whereHas('challenge', function ($q) use ($param) {
            $q->where('user_id', $param['user_id']);
        });
        $goodCount = $query->get()->count();
        $challengesCount = Challenge::where('user_id', $challenge->user_id)
            ->where('close_flg', 1)->get()->count();
        $level = (int)floor(($goodCount + $challengesCount) / 10);
        $userAvator = UserAvator::where('user_id', $challenge->user_id)->first();
        $userAvator->level = $level;
        $userAvator->save();

        return redirect()
            ->route('challenges.show', $challenge)
            ->with('notice', '新しいコメントを登録しました');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
