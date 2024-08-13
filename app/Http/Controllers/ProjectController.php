<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    public function view()
    {
        $data = DB::table('users')->get();
        return view('Project.addProject', compact('data'));
        // return $data;
    }
    public function index()
    {
        $project = Project::paginate(5);
        return view('Project.viewProject', compact('project'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $data=DB::User()->all();
        $data = DB::table('users')->get();
        // $data = User::all();
        return view('Project.addProject', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'client' => 'required',
            'status' => 'required',
            'description' => 'required',
            'contact' => 'required',
            'startdate' => 'required',
            'enddate' => 'required',
            'employee' => 'required|array',
        ]);
        $project = new Project();
        $project->emp_id = $request->emp_id;
        $project->name = $request->name;
        $project->client = $request->client;
        $project->status = $request->status;
        $project->description = $request->description;
        $project->contact = $request->contact;
        $project->startdate = $request->startdate;
        $project->enddate = $request->enddate;
        $project->employee=json_encode($request->employee);
        $project->save();

        return redirect()->route('project.index')->with('success', 'Data Store Successfully..');
    }
    // public function edit(string $id)
    // {
    //     $project = Project::find($id);
    //     $user = DB::table('users')->get();

    //     return $project;


    //     // return view('Project.edit', compact('project', 'user'));
    // }
    public function edit(string $id)
{
    $project = Project::find($id);
    $user = DB::table('users')->get();

    if ($project) {
        $project->employee = json_decode($project->employee, true); 
    }

    // return $project;
    return view('Project.edit', compact('project', 'user'));
}


public function update(Request $request, string $id)
{
    // Validate the incoming request data
    $data = $request->validate([
        'name' => 'required',
        'client' => 'required',
        'status' => 'required',
        'description' => 'required',
        'contact' => 'required',
        'startdate' => 'required',
        'enddate' => 'required',
        'employee' => 'required|array', // Ensure employee is an array
    ]);

    // Find the project by ID
    $project = Project::findOrFail($id);

    // Update the project with validated data
    $project->update([
        'name' => $request->name,
        'client' => $request->client,
        'status' => $request->status,
        'description' => $request->description,
        'contact' => $request->contact,
        'startdate' => $request->startdate,
        'enddate' => $request->enddate,
        'employee' => json_encode($request->employee), // Correct field name and JSON encode
    ]);

    // Redirect to the project index with a success message
    return redirect()->route('project.index')->with('success', 'Data updated successfully.');
}

    // public function update(Request $request, string $id)
    // {

    //     $data = $request->validate([
    //         'name' => 'required',
    //         'client' => 'required',
    //         'description' => 'required',
    //         'contact' => 'required',
    //         'startdate' => 'required',
    //         'enddate' => 'required',
    //         'employee' => 'required|array',
    //     ]);

    //     $cred = Project::find($id)->update($data);
    //     // $project = Project::findOrFail($id);
    //     $cred = DB::table('projects')->update([
    //         'name' => $request->name,
    //         'client' => $request->client,
    //         'status' => $request->status,
    //         'description' => $request->description,
    //         'contact' => $request->contact,
    //         'startdate' => $request->startdate,
    //         'enddate' => $request->enddate,
    //         'employee' => json_encode($request->members),
    //     ]);
    //     return redirect()->route('project.index')->with('success', 'Data Update Successfully..');
    // }
    public function destroy(string $id)
    {
        //
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $data = [];

        if ($query !== "") {
            $data = Project::where('name', 'LIKE', "%{$query}%")
                ->orWhere('client', 'LIKE', "%{$query}%")
                ->orWhere('members', 'LIKE', "%{$query}%")
                ->get();
        } else {
            $data = Project::all();
        }

        return view('Project.table', compact('data'));
    }
}
