<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Exception;

class PostsController extends Controller
{

    /**
     * Display a listing of the posts.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $posts = Post::paginate(25);

        return view('posts.index', compact('posts'));
    }

    public function trash()
    {
        $posts = Post::onlyTrashed()->get();

        return view('posts.trash', compact('posts'));
    }

    /**
     * Show the form for creating a new post.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {


        return view('posts.create');
    }

    /**
     * Store a new post in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {


        $data = $this->getData($request);

        Post::create($data);

        return redirect()->route('posts.post.index')
            ->with('success_message', 'Post was successfully added.');

    }

    /**
     * Display the specified post.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);

        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified post.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);


        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified post in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {


        $data = $this->getData($request);

        $post = Post::findOrFail($id);
        $post->update($data);

        return redirect()->route('posts.post.index')
            ->with('success_message', 'Post was successfully updated.');

    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('posts.post.index')
            ->with('success_message', 'Post was successfully deleted.');

    }public function restore($id)
    {
        $post = Post::withTrashed()->findOrFail($id);
        $post->restore();
        return redirect()->route('posts.post.index')
            ->with('success_message', 'Post was successfully deleted.');

    }




    /**
     * Get the request's data from the request.
     *
     * @param Illuminate\Http\Request\Request $request
     * @return array
     */
    protected function getData(Request $request)
    {
        $rules = [
            'title' => 'string|min:1|max:255|nullable',
            'description' => 'string|min:1|max:1000|nullable',
        ];

        $data = $request->validate($rules);


        return $data;
    }

}
