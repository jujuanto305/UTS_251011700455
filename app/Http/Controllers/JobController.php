<?php

namespace App\Http\Controllers;

use App\Models\JobVacancy;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index(Request $request)
    {
        $query = JobVacancy::query();

        if ($q = $request->input('q')) {
            $query->where(function ($w) use ($q) {
                $w->where('title', 'like', "%{$q}%")
                  ->orWhere('company', 'like', "%{$q}%")
                  ->orWhere('location', 'like', "%{$q}%");
            });
        }

        if ($type = $request->input('type')) {
            $query->where('type', $type);
        }

        $jobs  = $query->orderByDesc('posted_date')->get();
        $types = JobVacancy::select('type')->distinct()->orderBy('type')->pluck('type');

        return view('jobs.index', compact('jobs', 'types'));
    }

    public function show(JobVacancy $job)
    {
        $related = JobVacancy::where('id', '!=', $job->id)
            ->where('type', $job->type)
            ->orderByDesc('posted_date')
            ->take(3)
            ->get();

        return view('jobs.show', compact('job', 'related'));
    }
}
