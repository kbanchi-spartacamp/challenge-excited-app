<?php

namespace App\Http\Controllers;

use App\Models\Challenge;
use App\Models\Good;
use App\Models\UserAvator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GoodController extends Controller
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
        $good = new Good();
        $good->user_id = $request->user()->id;
        $good->challenge_id = $challenge->id;

        DB::beginTransaction();
        try {
            // 登録
            $good->save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()
                ->withErrors('いいね登録でエラーが発生しました');
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
            ->with('notice', 'いいねを登録しました');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Good  $good
     * @return \Illuminate\Http\Response
     */
    public function show(Good $good)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Good  $good
     * @return \Illuminate\Http\Response
     */
    public function edit(Good $good)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Good  $good
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Good $good)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Good  $good
     * @return \Illuminate\Http\Response
     */
    public function destroy(Challenge $challenge, Good $good)
    {
        DB::beginTransaction();
        try {
            $good->delete();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()
                ->withErrors('いいね取り消しでエラーが発生しました');
        }

        return redirect()
            ->route('challenges.show', $challenge)
            ->with('notice', 'いいねを取り消しました');
    }
}
