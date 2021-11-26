<?php

namespace App\Http\Controllers;

use App\Models\AvatorImage;
use App\Models\Challenge;
use App\Models\Good;
use App\Models\UserAvator;
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
        // $goodCount = Good::where('user_id', $request->user()->id)->get();
        // $challenges = Challenge::where('user_id', $request->user()->id)
        //     ->where('close_flg', 1)->get();
        // dd($goodCount);

        $keyword = $request->keyword;

        $query = Challenge::query();
        $query->where('user_id', '<>', Auth::user()->id);
        if (!empty($keyword)) {
            $query->where('title', 'like', '%' . $keyword . '%');
            $query->orWhere('description', 'like', '%' . $keyword . '%');
        }
        $challenges = $query->latest()->paginate(10);
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
        $userAvator = UserAvator::where('user_id', Auth::user()->id)->with('avator_category')->first();
        $avatorImage = "";
        if (!empty($userAvator)) {
            $avatorImage = AvatorImage::where('avator_category_id', $userAvator->avator_category_id)
                ->where('level', '>=', $userAvator->level)
                ->orderBy('level', 'asc')
                ->first();
        }
        return view('challenges.create', compact('userAvator', 'avatorImage'));
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
        $challenge = Challenge::with('user')->find($challenge->id);
        $good = Good::where('user_id', Auth::user()->id)
            ->where('challenge_id', $challenge->id)->first();
        $userAvator = UserAvator::where('user_id', $challenge->user->id)->with('avator_category')->first();
        $avatorImage = "";
        if (!empty($userAvator)) {
            $avatorImage = AvatorImage::where('avator_category_id', $userAvator->avator_category_id)
                ->where('level', '>=', $userAvator->level)
                ->orderBy('level', 'asc')
                ->first();
        }
        return view('challenges.show', compact('challenge', 'good', 'avatorImage'));
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
        $messages = [
            'no_challenge' => '',
        ];
        $challenges = Challenge::where('user_id', Auth::user()->id)->latest()->get();
        if ($challenges->count() == 0) {
            $messages['no_challenge'] = 'まだ挑戦がありません。';
        }
        return view('challenges.history', compact('challenges'))
            ->with($messages);;
    }
}
