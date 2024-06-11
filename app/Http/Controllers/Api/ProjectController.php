<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index() {
        $projects = Project::paginate(3);

        return response()->json([  
        'success' => true,
        'results' => $projects
        ]);       
    }

    public function show($slug) {
        $project = Project::where('slug', '=', $slug)->first();
        
        if($project) {
            $data = [
                'success' => true,
                'project' => $project
            ];
        } else {
            $data = [
                'success' => false,
                'error' => 'No project found with this slug'
            ];
        }

        return response()->json($data);
    }
}
