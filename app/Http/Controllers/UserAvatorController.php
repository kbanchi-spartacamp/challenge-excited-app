<?php

namespace App\Http\Controllers;

use App\Models\AvatorCategory;
use App\Models\AvatorImage;
use App\Models\UserAvator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserAvatorController extends Controller
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

        $messages = [
            'no_avator' => '',
        ];
        $userAvator = UserAvator::where('user_id', Auth::user()->id)->with('avator_category')->first();
        if (empty($userAvator)) {
            $messages['no_avator'] = 'まずは、アバターを設定してください。';
        }
        $avatorCategories = AvatorCategory::all();
        $avatorImages = AvatorImage::where('level', -1)->get();
        $avatorImage = "";
        if (!empty($userAvator)) {
            $avatorImage = AvatorImage::where('avator_category_id', $userAvator->avator_category_id)
                ->where('level', '>=', $userAvator->level)
                ->orderBy('level', 'asc')
                ->first();
        }
        return view('user_avators.create', compact('avatorCategories', 'userAvator', 'avatorImages', 'avatorImage'))
            ->with($messages);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userAvator = new UserAvator();
        $userAvator->user_id = $request->user()->id;
        $userAvator->avator_category_id = $request->avatorCategory_id;
        $userAvator->level = 0;

        DB::beginTransaction();
        try {
            // 登録
            $userAvator->save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()
                ->withErrors('アバター情報登録処理でエラーが発生しました');
        }

        return redirect()
            ->route('challenges.create')
            ->with('notice', 'アバター情報を登録しました');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserAvator  $userAvator
     * @return \Illuminate\Http\Response
     */
    public function show(UserAvator $userAvator)
    {
        $avatorcategories = AvatorCategory::all();
        return view('user_avators.create', compact('avatorcategories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserAvator  $userAvator
     * @return \Illuminate\Http\Response
     */
    public function edit(UserAvator $userAvator)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserAvator  $userAvator
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserAvator $userAvator)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserAvator  $userAvator
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserAvator $userAvator)
    {
        //
    }
}
