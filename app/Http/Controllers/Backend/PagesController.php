<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Http\Requests;
use Log;
use LogicException;

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
      $pages = $this->pages->defaultOrder()->get();
      $templates = $this->getPageTemplates();
        return view('backend.pages.index', compact('pages', 'templates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $templates = $this->getPageTemplates();
      $orderPages = $this->pages->defaultOrder()->get();
        return view('backend.pages.create', compact('templates', 'orderPages'));
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
        $page = $this->pages->create($request->only('title', 'uri', 'name', 'content'));

        $this->updatePageOrder($page, $request);

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
      $templates = $this->getPageTemplates();
      $page = $this->pages->findOrFail($id);
      $orderPages = $this->pages->defaultOrder()->get();
        return view('backend.pages.edit', compact('page', 'templates', 'orderPages'));
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
      $response = $this->updatePageOrder($page, $request);
      if($response){
        return $response;
      }
      $page->fill($request->only('title', 'uri', 'name', 'content', 'template'))->save();

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

        foreach ($page->descendants as $child) {
          $child->saveAsRoot();
        }

        $page->delete();

        return redirect(route('backend.pages.index'))->with('status', 'The page has been deleted.');
    }

    protected function getPageTemplates(){
      $templates = config('cms.templates');

      return ['' => ''] + array_combine(array_keys($templates), array_keys($templates));
    }

    protected function updatePageOrder(Page $page, Request $request){
      if($request->has('order', 'orderPage')){
        try{
          $moved = $page->updateOrder($request->input('order'), $request->input('orderPage'));
        }
        catch(LogicException $e){
          return redirect(route('backend.pages.edit', $page->id))->withInput()->withErrors([
            'error' => $e->getMessage()
          ]);
        }
      }
    }
}
