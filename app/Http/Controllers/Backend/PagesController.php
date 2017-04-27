<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Http\Requests;
use Log;

class PagesController extends Controller
{

  protected $pages;

  public function __construct(Page $pages){
    $this->pages = $pages;

    parent::__construct();
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $pages = $this->pages->all();
        return view('backend.pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\StorePageRequest $request)
    {
      Log::info($request->only('title', 'uri', 'name', 'content'));
        $this->pages->create($request->only('title', 'uri', 'name', 'content'));

        return redirect(route('backend.pages.index'))->with('status', 'Page has been created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $page = $this->pages->findOrFail($id);
        return view('backend.pages.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\UpdatePageRequest $request, $id)
    {
      $page = $this->pages->findOrFail($id);

      $page->fill($request->only('title', 'uri', 'name', 'content'))->save();

      return redirect(route('backend.pages.edit', $page->id))->with('status', 'Page has been updated!');
    }

    public function confirm($id)
    {
      $page = $this->pages->findOrFail($id);

      return view('backend.pages.confirm', compact('page'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = $this->pages->findOrFail($id);

        $page->delete();

        return redirect(route('backend.pages.index'))->with('status', 'The page has been deleted.');
    }
}
