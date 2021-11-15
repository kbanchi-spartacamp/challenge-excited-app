<?php

namespace App\Http\Controllers;

use App\Models\AvatorCategory;
use App\Models\UserAvator;
use Illuminate\Http\Request;

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
        $avatorcategories = AvatorCategory::all();
        return view('user_avators.create',compact('avatorcategories'));


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $useravator = new UserAvator();
        $useravator->user_id = $request->user()->id;
        $useravator->avator_category_id = $request->avatorcategory_id;
        $useravator->level = 0;


        try {
            // 登録
            $useravator->save();
        } catch (\Exception $e) {
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
