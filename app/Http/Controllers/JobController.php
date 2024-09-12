<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class JobController extends Controller
{
    public function index() {
         // $jobs = Job::with('employer')->latest()->cursorPaginate(3);
        $jobs = Job::with('employer')->latest()->simplePaginate(10);
        // $jobs = Job::with('employer')->get();
        // $jobs = Job::all();
        return view('jobs.index', [
            "jobs" => $jobs,
        ]);
    }
    public function create() {
        return view('jobs.create');
    }
    public function show(Job $job) {
         // $job = Job::find($id);
        return view("jobs.show", ["job" => $job]);
    }
    public function store() {
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required'],
        ]);
    
        Job::create([
            'title' => request('title'),
            'salary' => request('salary'),
            'employer_id' => 1
        ]);
    
        return redirect('/jobs');
    }
    public function edit(Job $job) {
    //    if (Auth::user()->can('edit-job', $job)) {
    //         dd('failure');
    //    };

    //    if (Auth::user()->cannot('edit-job', $job)) {
    //         dd('failure');
    //     };


        Gate::authorize('edit-job', $job);

        return view("jobs.edit", ["job" => $job]);
    }
    public function update(Job $job) {
        // Validate
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required'],
        ]);

        // Authorize (implemented)
        Gate::authorize('edit-job', $job);
        // Update the job
        // $job = Job::findOrFail($id);
        
        // $job->title = request('title');
        // $job->salary = request('salary');
        // $job->save();
        
        // and persist
        $job->update([
            'title' => request('title'),
            'salary' => request('salary'),
        ]);
    
        // redirect to the job page
        return redirect('/jobs/' . $job->id);
        // return view("jobs.show", ["job" => $job]);
    }
    public function destroy(Job $job) {
        // authorize (On hold)
        Gate::authorize('edit-job', $job);
        
        // delete the job
        // Job::findOrFail($id)->delete();
        
        // $job = Job::findOrFail($id);
        $job->delete();

        // redirect 
        return redirect('/jobs');
    }
}
