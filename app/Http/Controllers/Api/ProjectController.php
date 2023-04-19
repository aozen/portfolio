<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectRequest;
use App\Http\Traits\ImageTrait;
use App\Models\Link;
use App\Models\Project;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    use ImageTrait;

    public function index() {
        return response()->json([
            'projects' => Project::all(),
        ]);
    }

    public function store(ProjectRequest $request)
    {
        // Create project if validation is ok
        $project = Project::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'icon' => $request->input('icon'),
            'status' => $request->input('status'),
            'order' => $request->input('order'),
            'production_date' => $request->input('production_date'),
        ]);

        // Attach tags, create if not exists
        if ($request->has('tags')) {
            $this->saveTags($request->input('tags'), $project);
        }

        // create link if not exists
        if ($request->has('links')) {
            $this->saveLinks($request->input('links'), $project);
        }

        // Create images and store
        if ($request->hasFile('images')) {
            $this->saveImages($request->file('images'), $project);
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

        // Attach tags, create if not exists
        if ($request->has('tags')) {
            $this->saveTags($request->input('tags'), $project);
        }

        // create link if not exists
        if ($request->has('links')) {
            $this->saveLinks($request->input('tags'), $project);
        }

        if ($request->hasFile('images')) {
            $this->saveImages($request->file('images'), $project);
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

    private function saveTags(array $tags, Project $project) {
        foreach ($tags as $tag) {
            $tag = Tag::firstOrCreate(['name' => $tag]);
            $project->tags()->attach($tag);
        }
    }

    private function saveLinks(array $links, Project $project) {
        foreach ($links as $link) {
            Link::firstOrCreate(['name' => $link, 'project_id' => $project->id]);
        }
    }
}
