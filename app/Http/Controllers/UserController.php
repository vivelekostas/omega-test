<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $users = User::paginate(15);

        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $is_user_create_page = true;

        $user = new User();
        $departments = DB::table('departments')->pluck('title', 'id');
        $positions = DB::table('positions')->pluck('title', 'id');

        return view('user.create', compact('user', 'departments', 'positions', 'is_user_create_page'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserRequest $request
     * @return RedirectResponse
     */
    public function store(UserRequest $request)
    {
        $user = User::create($request->all());

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('avatars', 'public');
            $user->image = $path;
            $user->save();
        }

        $user->departments()->attach($request->input('department_id'));

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return Application|Factory|View
     */
    public function show(User $user)
    {
        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return Application|Factory|View
     */
    public function edit(User $user)
    {
        $is_user_create_page = false;

        $departments = DB::table('departments')->pluck('title', 'id');
        $positions = DB::table('positions')->pluck('title', 'id');

        return view('user.edit', compact('user', 'departments', 'positions', 'is_user_create_page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserRequest $request
     * @param User $user
     * @return RedirectResponse
     */
    public function update(UserRequest $request, User $user)
    {
        //todo валидация или форм реквест
        //todo сервис?

        if ($request->hasFile('image')) {
            if ($user->image) { // удаляет старое фото из хранилища, если есть
                Storage::delete('public/' . $user->image);
            }

            $path = $request->file('image')->store('avatars', 'public');
            $user->image = $path;
        }

        $user->departments()->detach();
        $user->fill($request->all());
        $user->save();
        $user->departments()->attach($request->input('department_id'));

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return RedirectResponse
     */
    public function destroy(User $user)
    {
        $user->departments()->detach();
        $user->delete();

        return redirect()->route('users.index');
    }
}
