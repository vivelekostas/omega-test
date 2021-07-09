<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $positions = Position::paginate();

        return view('position.index', compact('positions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $position = new Position();

        return view('position.create', compact('position'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        //todo валидация или формреквест

        Position::create($request->all());

        return redirect()->route('positions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Position $position
     * @return Application|Factory|View
     */
    public function show(Position $position)
    {
        return view('position.show', compact('position'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Position $position
     * @return Application|Factory|View
     */
    public function edit(Position $position)
    {
        return view('position.edit', compact('position'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Position $position
     * @return RedirectResponse
     */
    public function update(Request $request, Position $position)
    {
        //todo валидация или форм реквест

        $position->fill($request->all());
        $position->save();

        return redirect()->route('positions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Position $position
     * @return RedirectResponse
     */
    public function destroy(Position $position)
    {
        $position->delete();

        return redirect()->route('positions.index');
    }
}
