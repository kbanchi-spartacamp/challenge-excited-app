<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Good;
use Illuminate\Support\Facades\DB;

class GoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $id)
    {
        $challenge_id = $id;
        $user_id = $request->user_id;

        $query = Good::query();
        $query->where('challenge_id', $challenge_id);
        if (!empty($user_id)) {
            $query->where('user_id', $user_id);
        }
        $goods = $query->get();

        return $goods;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $good = new Good();
        $good->user_id = $request->user_id;
        $good->challenge_id = $request->challenge_id;

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

        return $good;
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

        $good = Good::find($id);

        DB::beginTransaction();
        try {
            $good->delete();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()
                ->withErrors('いいね取り消しでエラーが発生しました');
        }

        return $good;
    }
}
