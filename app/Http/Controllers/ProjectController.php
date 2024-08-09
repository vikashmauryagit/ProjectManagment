<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    public function view()
    {
        return view('Project.addProject');
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
        return view('Project.addProject');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'client' => 'required',
            // 'status' => 'required',
            'description' => 'required',
            'contact' => 'required',
            'startdate' => 'required',
            'enddate' => 'required',
            'members' => 'required|array',
        ]);

        $project = new Project();
        $project->name = $request->name;
        $project->client = $request->client;
        // $project->status = $request->status;
        $project->description = $request->description;
        $project->contact = $request->contact;
        $project->startdate = $request->startdate;
        $project->enddate = $request->enddate;
        $project->members = json_encode($request->members);
        $project->save();

        return redirect()->route('project.index')->with('success', 'Data Store Successfully..');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $project = Project::find($id);

        return view('Project.edit', compact('project'));
    }
    // public function update(Request $request, string $id)
    // {
    //     $data = $request->validate([
    //         'name' => 'required',
    //         'client' => 'required',
    //         'status' => 'required',
    //         'description' => 'required',
    //         'contact' => 'required',
    //         'startdate' => 'required',
    //         'enddate' => 'required',
    //         'members' => 'required',

    //     ]);

    //     $project = Project::find($id);
    //     $project->update([
    //         "name" => $request->name,
    //         "client" => $request->client,
    //         "status" => $request->status,
    //         "description" => $request->description,
    //         'contact' => $request->contact,
    //         'startdate' => $request->startdate,
    //         'enddate' => $request->enddate,
    //         'members' => JSON+($request->members)
    //     ]);

    //     // $project = Project::findOrFail($id);
    //     // $members = isset($data['members']) ? (is_string($data['members'][0]) ? array_map('json_decode', $data['members']) : $data['members']) : $project->members;

    //     // $project->update([
    //     //     'name' => $data['name'],
    //     //     'client' => $data['client'],
    //     //     'status' => $data['status'],
    //     //     'description' => $data['description'],
    //     //     'contact' => $data['contact'],
    //     //     'startdate' => $data['startdate'],
    //     //     'enddate' => $data['enddate'],
    //     //     'members' => 
    //     //     // 'members' => json_encode(['$members']),
    //     //     'members' => isset($data['members']) ? json_encode($data['members']) : $project->members,
    //     // ]);

    //     return redirect()->route('project.index')->with('success', 'Data Updated Successfully.');
    // }

    public function update(Request $request, string $id)
    {

        $data = $request->validate([
            'name' => 'required',
            'client' => 'required',
            'status' => 'required',
            'description' => 'required',
            'contact' => 'required',
            'startdate' => 'required',
            'enddate' => 'required',
            'members' => 'required|array',
        ]);

        $cred = Project::find($id)->update($data);
        $project = Project::findOrFail($id);
        $cred = DB::table('projects')->update([
            'name' => $request->name,
            'client' => $request->client,
            'status' => $request->status,
            'description' => $request->description,
            'contact' => $request->contact,
            'startdate' => $request->startdate,
            'enddate' => $request->enddate,
            'members' => json_encode($request->members),
        ]);
        return redirect()->route('project.index')->with('success', 'Data Update Successfully..');
    }
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
