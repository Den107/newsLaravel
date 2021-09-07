<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsStoreRequest;
use App\Http\Requests\NewsUpdateRequest;
use App\Models\Category;
use App\Models\News;
use App\Services\UploadedService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $newsList = News::select(News::$allowedFields)->get();

        return view('admin.news.index', [
            'newsList' => $newsList
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.news.create', [
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsStoreRequest $request)
    {


        $news = News::create($request->validated());
        if ($$news) {
            return redirect()->route('admin.news.index')->with('success', __('messages.admin.news.create.success'));
        }
        return back()->with('error', __('messages.admin.news.create.error'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        $categories = Category::all();
        return view('admin.news.edit', [
            'news' => $news,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NewsUpdateRequest $request, News $news)
    {
        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $uploadedService = app(UploadedService::class);
            $validated['image'] = $uploadedService->fileUpload(
                $request->file('image')
            );
        }


        $news = $news->fill($validated)->save();
        if ($$news) {
            return redirect()->route('admin.news.index')->with('success', __('messages.admin.news.update.success'));
        }
        return back()->with('error', __('messages.admin.news.update.error'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, News $news)
    {
        if ($request->ajax()) {
            try {
                $news->delete();
                return response()->json('ok');
            } catch (\Throwable $th) {
                Log::error($th->getMessage());
                return response()->json('error', 400);
            }
        }
    }
}
