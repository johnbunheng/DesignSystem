<?php

namespace App\Http\Controllers;

use App\Models\Design;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DesignController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Design::with('designer')->orderBy('date', 'desc');

        if (! Auth::user()->isAdmin()) {
            $query->where('designer_id', Auth::id());
        }

        if ($request->filled('designer_id') && Auth::user()->isAdmin()) {
            $query->where('designer_id', $request->designer_id);
        }

        $designs = $query->get();
        $designers = Auth::user()->isAdmin() ? User::where('role', 'designer')->get() : collect();

        return view('designs.index', compact('designs', 'designers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('designs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'description' => 'required|string',
            'type' => 'required|in:poster,video',
            'order_by' => 'required|string',
            'quantity' => 'required|integer|min:1',
            'more' => 'nullable|string',
        ]);

        Design::create(array_merge($request->only(['date', 'description', 'type', 'order_by', 'quantity', 'more']), [
            'designer_id' => Auth::id(),
        ]));

        return redirect()->route('designs.index')->with('success', 'Design created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Design $design)
    {
        return view('designs.show', compact('design'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Design $design)
    {
        return view('designs.edit', compact('design'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Design $design)
    {
        $request->validate([
            'date' => 'required|date',
            'description' => 'required|string',
            'type' => 'required|in:poster,video',
            'order_by' => 'required|string',
            'quantity' => 'required|integer|min:1',
            'more' => 'nullable|string',
        ]);

        $design->update($request->only(['date', 'description', 'type', 'order_by', 'quantity', 'more']));

        return redirect()->route('designs.index')->with('success', 'Design updated successfully.');
    }

    /**
     * Display the daily report for designers.
     */
    public function report()
    {
        abort_if(! Auth::user()->isAdmin(), 403);

        $today = now()->toDateString();
        $reportData = User::where('role', 'designer')
            ->get()
            ->map(function ($user) use ($today) {
                $count = $user->designs()->whereDate('date', $today)->count();
                $lastReport = $user->designs()->whereDate('date', $today)->latest('updated_at')->value('date');

                return [
                    'id' => $user->id,
                    'name' => $user->name,
                    'count' => $count,
                    'last_report' => $lastReport,
                ];
            });

        return view('designs.report', compact('reportData'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Design $design)
    {
        $design->delete();

        return redirect()->route('designs.index')->with('success', 'Design deleted successfully.');
    }
}
