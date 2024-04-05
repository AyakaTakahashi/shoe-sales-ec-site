<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        return view('users.index', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $user = Auth::user();
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'postal_code' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ]);

        $user = Auth::user();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->postal_code = $request->input('postal_code');
        $user->address = $request->input('address');
        $user->phone = $request->input('phone');
        $user->save();

        return to_route('users.index')->with('success', '会員情報が正常に更新されました。');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function showPasswordUpdate(Request $request, User $user)
    {
        $user = Auth::user();
        return view('users.updatePassword', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function updatePassword(Request $request, User $user)
    {
        $user = Auth::user();

        $validatedData = $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|confirmed|min:8',
            'new_password_confirmation' => 'required',
        ], [
            'current_password.required' => '現在のパスワードを入力してください。',
            'new_password.required' => '新しいパスワードを入力してください。',
            'new_password.confirmed' => '新しいパスワードと新しいパスワード（確認用）が一致しません。',
            'new_password.min' => '新しいパスワードは最低8文字必要です。',
            'new_password_confirmation.required' => '新しいパスワード（確認用）を入力してください。',
        ]);

        // 現在のパスワードが正しいか検証
        if (!Hash::check($request->input('current_password'), $user->password)) {
            // パスワードが一致しない場合、エラーを返す
            return back()->withErrors(['current_password' => '現在のパスワードが正しくありません。']);
        }

        // 新しいパスワードをハッシュ化して更新
        $user->password = Hash::make($request->input('new_password'));
        $user->save();

        // 更新後、ユーザーページへリダイレクト
        return to_route('users.index')->with('success', 'パスワードが正常に更新されました。');
    }
}
