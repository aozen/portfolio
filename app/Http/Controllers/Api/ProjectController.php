<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectRequest;
use App\Models\Image;
use App\Models\Project;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function store(ProjectRequest $request)
    {
        $project = Project::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'status' => $request->input('status'),
            'order' => $request->input('order'),
            'production_date' => $request->input('production_date'),
        ]);
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $path = $file->store('images/project', 'public');
                $title = $file->getClientOriginalName();
                $image = new Image([
                    'model_name' => 'Project',
                    'model_id' => $project->id,
                    'path' => $path,
                    'title' => $title,
                ]);
                $image->save();
            }
        }

        return response()->json([
            'message' => 'Project created successfully',
            'project' => $project,
        ], 201);
    }

    public function update(ProjectRequest $request, $id)
    {
        $project = Project::findOrFail($id);
        $data = $request->validated();
        $project->fill($data)->save();

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $path = $file->store('images/project', 'public');
                $title = $file->getClientOriginalName();
                $image = new Image([
                    'model_name' => 'Project',
                    'model_id' => $project->id,
                    'path' => $path,
                    'title' => $title,
                ]);
                $image->save();
            }
        }

        return response()->json([
            'message' => 'Project updated successfully',
            'project' => $project,
        ], 200);
    }

    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();

        // Delete images associated with the project from storage
        foreach ($project->images as $image) {
            Storage::disk('public')->delete($image->path);
            $image->delete();
        }

        return response()->json([
            'message' => 'Project removed successfully'
        ], 204);
    }
}
