<?php

namespace App\Http\Controllers;

use App\Http\Requests\PositionRequest;
use App\Models\Position;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

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
     * @param PositionRequest $request
     * @return RedirectResponse
     */
    public function store(PositionRequest $request): RedirectResponse
    {
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
     * @param PositionRequest $request
     * @param Position $position
     * @return RedirectResponse
     */
    public function update(PositionRequest $request, Position $position): RedirectResponse
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
    public function destroy(Position $position): RedirectResponse
    {
        $position->delete();

        return redirect()->route('positions.index');
    }
}
