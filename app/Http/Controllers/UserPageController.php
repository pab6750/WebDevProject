<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserPage;

class UserPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $userPages = UserPage::all();

      return view('user_pages.index', ['user_pages' => $usersPages]);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $userPage = UserPage::findOrFail($id);

      return view('user_page.show', ['user_page' => $userPage]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($user_page_id)
    {
      return view('user_page.edit', ['user_page_id' => $user_page_id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($user_page_id, Request $request)
    {
      $user_page = UserPage::findOrFail($user_page_id);

      $validatedData = $request->validate([
        'username' => 'required|max:256',
        'profile_pic' => 'required'
      ]);

      $user_page->user->name = $validatedData['username'];

      $user_page->save();

      $user_page->user->image()->delete();
      $user_page->user->image()->create(['filename' => $validatedData['profile_pic']]);

      session()->flash('message', 'User edited successfully');

      return $this->show($user_page_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($user_page_id)
    {
        //
    }
}
