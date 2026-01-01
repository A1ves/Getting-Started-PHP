<?php

namespace App\Http\Controllers;

use App\Http\Requests\HabitRequest;
use App\Models\Habit;
use App\Models\HabitLog;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class HabitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        if(!Auth::user()) {
            return view('home');
        }
        $habits = Auth::user()->habits()
            ->with('habitLogs')
            ->get();
        return view('dashboard', compact('habits'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('habits.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(HabitRequest $request)
    {
        $validated = $request->validated();
        Auth::user()->habits()->create($validated);
        return redirect()
            ->route('habits.index')
            ->with('success', 'Habito cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Habit $habit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Habit $habit)
    {
        return view('habits.edit', compact('habit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(HabitRequest $request, Habit $habit)
    {
        if(auth()->id() !== $habit->user_id) {
            return redirect()
                ->route('habits.index')
                ->with('error', 'Você não tem permissão para editar este hábito.');
        }

        $habit->update($request->all());

        return redirect()
            ->route('habits.index')
            ->with('success', 'Hábito atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Habit $habit)
    {
        if(auth()->id() !== $habit->user_id) {
            return redirect()
                ->route('habits.index')
                ->with('error', 'Você não tem permissão para excluir este hábito.');
        }

        $habit->delete();
        return redirect()
            ->route('habits.index')
            ->with('success', 'Hábito excluído com sucesso!');
    }

    public function settings()
    {
        $habits = Auth::user()->habits;
        return view ('habits.settings', compact('habits'));
    }

    public function toggle(Habit $habit)
    {
        if(auth()->id() !== $habit->user_id) {
            return redirect()
                ->route('habits.index')
                ->with('error', 'Você não tem permissão para alterar este hábito.');
        }

        $today = Carbon::today()->toDateString();
        $log = HabitLog::query()
            ->where('habit_id', $habit->id)
            ->where('completed_at', $today)
            ->first();

        if($log){
            $log->delete();
            return redirect()
                ->route('habits.index')
                ->with('success', 'Hábito desmarcado para hoje!');
        } else {
            HabitLog::create([
                'user_id' => Auth::user()->id,
                'habit_id' => $habit->id,
                'completed_at' => $today,
            ]);
            return redirect()
                ->route('habits.index')
                ->with('success', 'Hábito marcado para hoje!');
        }

//        if($log){
//            $log->delete();
//            $message = 'Hábito desmarcado!';
//        } else {
//            HabitLog::create([
//                'user_id' => Auth::user()->id,
//                'habit_id' => $habit->id,
//                'completed_at' => $today,
//            ]);
//            $message = 'Hábito concluído!';
//        }
//        return redirect()
//            ->route('habits.index')
//            ->with('success', $message);
    }
}
