<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Http\Traits\ImageTrait;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    use ImageTrait;

    public function store(PostRequest $request)
    {
        // Create post if validation is ok
        $post = Post::create([
            'category_id' => $request->input('category_id'),
            'name' => $request->input('name'),
            'slug' => $request->input('slug'),
            'description' => $request->input('description'),
            'text' => $request->input('text'),
            'status' => $request->input('status'),
        ]);

        // Create images and store
        if ($request->hasFile('images')) {
            $this->saveImages($request->file('images'), $post);
        }

        return response()->json([
            'message' => 'Post created successfully',
            'post' => $post,
        ], 201);
    }

    public function update(PostRequest $request, $id)
    {
        $post = Post::findOrFail($id);
        $data = $request->validated();
        $post->fill($data)->save();

        if ($request->hasFile('images')) {
            $this->saveImages($request->file('images'), $post);
        }

        return response()->json([
            'message' => 'Post updated successfully',
            'post' => $post,
        ], 200);
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        // Delete images associated with the post from storage
        foreach ($post->images as $image) {
            Storage::disk('public')->delete($image->path);
            $image->delete();
        }

        return response()->json([
            'message' => 'Post removed successfully'
        ], 204);
    }
}
