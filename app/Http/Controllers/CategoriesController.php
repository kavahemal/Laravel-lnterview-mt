<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categories::orderBy('name')->orderBy('id', 'DESC')->get();
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $all_categories = Categories::where('status', 1)->orderBy('name')->get();
        return view('categories.add_edit', compact('all_categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), ['name' => 'required'])->validate();

        $add = Categories::create($request->all());
        if ($add) {
            return redirect(route('categories.index'))->with('success', 'Category successfully created');
        } else {
            return redirect(route('categories.index'))->with('error', 'Category not created');
        }
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
        $edit = Categories::findOrFail($id);
        $all_categories = Categories::where('id', '!=', $id)->orderBy('name')->get();
        return view('categories.add_edit', compact('edit', 'all_categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Validator::make($request->all(), ['name' => 'required'])->validate();
        
        $category = Categories::findOrFail($id);
        $category->update($request->all());
        $update = $category->save();
        if($update) {
            return redirect(route('categories.index'))->with('success', 'Category successfully updated');
        }
        else {
            return redirect(route('categories.index'))->with('error', 'Category not updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Categories::destroy($id);
        return redirect(route('categories.index'))->with('error', 'Category successfully deleted');
    }
}
