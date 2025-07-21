<?php

namespace App\Http\Controllers;

use App\Models\CronJob;
use App\Repositories\CronJobRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CronJobController extends Controller
{
    protected $cronJobRepository;

    public function __construct(CronJobRepository $cronJobRepository)
    {
        $this->cronJobRepository = $cronJobRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(CronJobRepository $cronJobRepository, Request $request)
    {
        $pageTitle = 'Cron Jobs Management';
        $pageDescription = 'Manage system cron jobs and scheduled tasks';

        if (request()->ajax()) {
            $this->cronJobRepository = $cronJobRepository;
            return $this->cronJobRepository->dataSource($request);
        }

        return view('cron-jobs.index', [
            'pageTitle' => $pageTitle,
            'pageDescription' => $pageDescription
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageTitle = 'Create Cron Job';
        return view('cron-jobs.create', compact('pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => [
                'required',
                'string',
                'min:3',
                'max:255',
                'unique:cron_jobs,name',
                'regex:/^[a-zA-Z0-9\s._-]+$/'
            ],
            'description' => [
                'required',
                'string',
                'min:5',
                'max:500'
            ],
            'schedule_time' => [
                'required',
                'date_format:H:i'
            ],
            'command' => [
                'required',
                'string',
                'min:3',
                'max:500'
            ],
            'is_active' => 'boolean'
        ], [
            'name.required' => 'Cron job name is required.',
            'name.min' => 'Cron job name must be at least 3 characters long.',
            'name.max' => 'Cron job name cannot exceed 255 characters.',
            'name.unique' => 'A cron job with this name already exists.',
            'name.regex' => 'Cron job name can only contain letters, numbers, spaces, dots, underscores, and hyphens.',
            'description.required' => 'Description is required.',
            'description.min' => 'Description must be at least 5 characters long.',
            'description.max' => 'Description cannot exceed 500 characters.',
            'schedule_time.required' => 'Schedule time is required.',
            'schedule_time.date_format' => 'Please enter a valid time format (HH:MM).',
            'command.required' => 'Command is required.',
            'command.min' => 'Command must be at least 3 characters long.',
            'command.max' => 'Command cannot exceed 500 characters.'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $cronJob = CronJob::create([
                'name' => $request->name,
                'description' => $request->description,
                'schedule_time' => $request->schedule_time,
                'command' => $request->command,
                'is_active' => $request->has('is_active'),
                'created_by' => Auth::id(),
                'updated_by' => Auth::id()
            ]);

            return redirect()->route('cron-jobs.index')
                ->with('success', 'Cron job created successfully!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Failed to create cron job. Please try again.')
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(CronJob $cronJob)
    {
        $cronJob->load(['creator', 'updater']);
        $pageTitle = 'View Cron Job';
        return view('cron-jobs.show', compact('cronJob', 'pageTitle'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CronJob $cronJob)
    {
        $pageTitle = 'Edit Cron Job';
        return view('cron-jobs.edit', compact('cronJob', 'pageTitle'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CronJob $cronJob)
    {
        $validator = Validator::make($request->all(), [
            'name' => [
                'required',
                'string',
                'min:3',
                'max:255',
                Rule::unique('cron_jobs')->ignore($cronJob->id),
                'regex:/^[a-zA-Z0-9\s._-]+$/'
            ],
            'description' => [
                'required',
                'string',
                'min:5',
                'max:500'
            ],
            'schedule_time' => [
                'required',
                'date_format:H:i'
            ],
            'command' => [
                'required',
                'string',
                'min:3',
                'max:500'
            ],
            'is_active' => 'boolean'
        ], [
            'name.required' => 'Cron job name is required.',
            'name.min' => 'Cron job name must be at least 3 characters long.',
            'name.max' => 'Cron job name cannot exceed 255 characters.',
            'name.unique' => 'A cron job with this name already exists.',
            'name.regex' => 'Cron job name can only contain letters, numbers, spaces, dots, underscores, and hyphens.',
            'description.required' => 'Description is required.',
            'description.min' => 'Description must be at least 5 characters long.',
            'description.max' => 'Description cannot exceed 500 characters.',
            'schedule_time.required' => 'Schedule time is required.',
            'schedule_time.date_format' => 'Please enter a valid time format (HH:MM).',
            'command.required' => 'Command is required.',
            'command.min' => 'Command must be at least 3 characters long.',
            'command.max' => 'Command cannot exceed 500 characters.'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $cronJob->update([
                'name' => $request->name,
                'description' => $request->description,
                'schedule_time' => $request->schedule_time,
                'command' => $request->command,
                'is_active' => $request->has('is_active'),
                'updated_by' => Auth::id()
            ]);

            return redirect()->route('cron-jobs.index')
                ->with('success', 'Cron job updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Failed to update cron job. Please try again.')
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CronJob $cronJob)
    {
        try {
            $cronJob->delete();
            return redirect()->route('cron-jobs.index')
                ->with('success', 'Cron job deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Failed to delete cron job. Please try again.');
        }
    }

    /**
     * Toggle the status of the cron job.
     */
    public function toggleStatus(CronJob $cronJob)
    {
        try {
            $cronJob->update([
                'is_active' => !$cronJob->is_active,
                'updated_by' => Auth::id()
            ]);

            $status = $cronJob->is_active ? 'activated' : 'deactivated';
            return redirect()->back()
                ->with('success', "Cron job {$status} successfully!");
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Failed to update cron job status. Please try again.');
        }
    }

    /**
     * Execute the cron job manually.
     */
    public function execute(CronJob $cronJob)
    {
        try {
            // Here you would implement the actual command execution
            // For now, we'll just update the last_run timestamp
            $cronJob->update([
                'last_run' => now(),
                'updated_by' => Auth::id()
            ]);

            return redirect()->back()
                ->with('success', 'Cron job executed successfully!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Failed to execute cron job. Please try again.');
        }
    }
}
