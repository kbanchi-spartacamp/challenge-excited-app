<?php

namespace App\Http\Controllers;

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
        return view('user_avators.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserAvator  $userAvator
     * @return \Illuminate\Http\Response
     */
    public function show(UserAvator $userAvator)
    {
        //
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
