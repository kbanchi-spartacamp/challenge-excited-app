<?php

namespace App\Http\Controllers;

use App\Models\Challenge;
use App\Models\Good;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ChallengeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->keyword;

        $query = Challenge::query();
        $query->where('user_id', '<>', Auth::user()->id);
        if (!empty($keyword)) {
            $query->where('title', 'like', '%' . $keyword . '%');
            $query->orWhere('description', 'like', '%' . $keyword . '%');
        }
        $challenges = $query->paginate(10);
        $challenges->appends(compact('keyword'));

        return view('challenges.index', compact('challenges', 'keyword'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('challenges.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $challenge = new Challenge();
        $challenge->user_id = $request->user()->id;
        $challenge->title = $request->title;
        $challenge->description = $request->description;
        $challenge->close_flg = 0;

        DB::beginTransaction();
        try {
            // 登録
            $challenge->save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()
                ->withErrors('挑戦登録でエラーが発生しました');
        }

        return redirect()
            ->route('challenges.history')
            ->with('notice', '新しい挑戦を登録しました');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Challenge  $challenge
     * @return \Illuminate\Http\Response
     */
    public function show(Challenge $challenge)
    {
        $good = Good::where('user_id', Auth::user()->id)
            ->where('challenge_id', $challenge->id)->first();
        return view('challenges.show', compact('challenge', 'good'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Challenge  $challenge
     * @return \Illuminate\Http\Response
     */
    public function edit(Challenge $challenge)
    {
        //TODO 編集画面の操作を書きたい
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Challenge  $challenge
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Challenge $challenge)
    {
        //TODO 更新画面の操作を書きたい  編集と同じ感じ？
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Challenge  $challenge
     * @return \Illuminate\Http\Response
     */
    public function destroy(Challenge $challenge)
    {
        //TODO 削除するためのDELETE
        $challenge->delete();

        return redirect()->route('challenge.show', $challenge)
            ->with('notice', '挑戦を取り消しました');
    }

    public function history()
    {
        $challenges = Challenge::where('user_id', Auth::user()->id)->get();
        return view('challenges.history', compact('challenges'));
    }
}
