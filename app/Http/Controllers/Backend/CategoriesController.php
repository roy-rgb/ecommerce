<?php


namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Category;
use Image;
use File;

class CategoriesController extends Controller
{
        public function index(){

            $categories = Category::orderBy('id','desc')->get();
            return view('backend.pages.categories.index',compact('categories'));

        }

        public function create(){

            $main_categories = Category::orderBy('name','desc')->where('parent_id',Null)->get();
            return view('backend.pages.categories.create',compact('main_categories'));

        }

        public function store(Request $request){

         $this->validate($request,[

            'name'  => 'required',
            'image' =>  'nullable|image',
          ],
          [
              'name.required' => 'please provide a category name',
              'image.image'  => 'please provide a valid image',
          ]
        );

            $category = new Category();
            $category->name = $request->name;
            $category->description = $request->description;
            $category->parent_id = $request->parent_id;

            //insert image

            if($request->image){

                // foreach($request->image as $image){
    
                    
                        //insert that image
                        $image = $request->file('image');
                        $img = time() . '.' . $image->getClientOriginalExtension();
                        $location = public_path('images/categories/' .$img);
                        Image::make($image)->save($location);
                        $category->image = $img;
            }

            $category->save();
      
            session()->flash('success','A new Ctegory has been added successfully!!');
            return redirect()->route('admin.categories');
                  }




                  public function edit($id){

                    $main_categories = Category::orderBy('name','desc')->where('parent_id',Null)->get();
                      $category= Category::find($id);

                      if(!is_null($category)){
                          return view('backend.pages.categories.edit',compact('category','main_categories'));
                      }else{
                          return redirect()->route('admin.categories');
                      }

                  }


                  public function update(Request $request, $id){

                    $this->validate($request,[
           
                       'name'  => 'required',
                       'image' =>  'nullable|image',
                     ],
                     [
                         'name.required' => 'please provide a category name',
                         'image.image'  => 'please provide a valid image',
                     ]
                   );
           
                       $category =  Category::find($id);
                       $category->name = $request->name;
                       $category->description = $request->description;
                       $category->parent_id = $request->parent_id;
           
                       //insert image
           
                       if($request->image){
           
                           // foreach($request->image as $image){
               
                               if(File::exists('images/categories/' .$category->image)){
                                   File::delete('images/categories/' .$category->image);
                               }
                                   //insert that image
                                   $image = $request->file('image');
                                   $img = time() . '.' . $image->getClientOriginalExtension();
                                   $location = public_path('images/categories/' .$img);
                                   Image::make($image)->save($location);
                                   $category->image = $img;
                       }
           
                       $category->save();
                 
                       session()->flash('success',' Ctegory has updated successfully!!');
                       return redirect()->route('admin.categories');
                             }


}
