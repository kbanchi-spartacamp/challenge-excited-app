<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Challenge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $query->where('user_id', '<>', $request->user_id);
        if (!empty($keyword)) {
            $query->where('title', 'like', '%' . $keyword . '%');
            $query->orWhere('description', 'like', '%' . $keyword . '%');
        }
        $challenges = $query->with('user')->get();

        return $challenges;
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
        $challenge->user_id = $request->user_id;
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

        return $challenge;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $challenge = Challenge::with('user')->find($id);
        return $challenge;
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
        $challenge = Challenge::find($id);
        $challenge->delete();
        return $challenge;
    }

    public function history(Request $request)
    {
        $challenges = Challenge::with('user')->where('user_id', $request->user_id)->get();
        return $challenges;
    }
}
