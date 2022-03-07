<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminPostCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $postCategories = Category::orderBy('id','desc')->get();

        return view('administration.post-categories.index', compact('postCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('administration.post-categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation messages
        $validationMessages = [
            'requred' => ':attribute must be specified!',
            'numeric' => ':attribute must be numeric'
        ];

        // Validation rules
        $validationRules = [
            'name' => 'required|max:255'
        ];

        // Validation
        $validator = Validator::make($request->all(), $validationRules, $validationMessages);

        if ($validator->fails()) {
            // $validator->errors()->add('postCategories', 'Categories cannot be null'); // u slucaju da ocu specificnu gresku da bude sa posebnom porukom

            return redirect('administration/post-categories/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        //

        $postCategory = new Category($request->all());
        $postCategory->save();
        return redirect('/administration/post-categories');
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
        $postCategory = Category::find($id);
        return view('administration.post-categories.edit', compact('postCategory'));
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
        // Validation messages
        $validationMessages = [
            'requred' => ':attribute must be specified!',
            'numeric' => ':attribute must be numeric'
        ];

        // Validation rules
        $validationRules = [
            'name' => 'required|max:255'
        ];

        // Validation
        $validator = Validator::make($request->all(), $validationRules, $validationMessages);

        if ($validator->fails()) {
            // $validator->errors()->add('postCategory', 'Categories cannot be null'); // u slucaju da ocu specificnu gresku da bude sa posebnom porukom

            return redirect('administration/post-categories/'. $id .'/edit')
                        ->withErrors($validator)
                        ->withInput();
        }

        //

        $postCategory = Category::find($id);
        $postCategory->name = $request->input('name');
        $postCategory->description = $request->input('description');
        $postCategory->save();
        return redirect('/administration/post-categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $postCategory = Category::find($id);
        $postCategory->delete(); // da soft deletuje posts, a za potpuni delete koristi se forcedelete()
        return redirect('/administration/post-categories');
    }
}
