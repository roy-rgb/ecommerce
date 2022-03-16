<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Division;
use App\Models\District;



class DivisionsController extends Controller

    {
        public function index(){

            $divisions = Division::orderBy('priority','asc')->get();
            return view('backend.pages.divisions.index',compact('divisions'));

        }

        public function create(){

            return view('backend.pages.divisions.create');

        }

        public function store(Request $request){

         $this->validate($request,[

            'name'  => 'required',
            'priority' =>  'required',
          ],
          [
              'name.required' => 'please provide a division name',
              'priority.required'  => 'please provide a  division priority',
          ]
        );

            $division = new Division();
            $division->name = $request->name;
            $division->priority = $request->priority;
            $division->save();

      
            session()->flash('success','A new Division has been added successfully!!');
            return redirect()->route('admin.divisions');
                  }




                  public function edit($id){

                      $division= Division::find($id);

                      if(!is_null($division)){
                          return view('backend.pages.divisions.edit',compact('division'));
                      }else{
                          return redirect()->route('admin.divisions');
                      }

                  }


                  public function update(Request $request, $id){

                    $this->validate($request,[
           
                       'name'  => 'required',
                       'priority' =>  'required',                     ],
                     [
                         'name.required' => 'please provide a division name',
                         'priority.required'  => 'please provide a  division priority',
                         ]
                   );
           
                   $division =Division::find($id);
                   $division->name = $request->name;
                   $division->priority = $request->priority;
                   $division->save();
                  
   
                 
                       session()->flash('success',' division has updated successfully!!');
                       return redirect()->route('admin.divisions');
                             }


                 public function delete($id){

                         $division = Division::find($id);
                           if(!is_null($division)){

                            //delete ALL THE DISTRICTS under this division

                            $districts = District::where('division_id', $division->id)->get();

                            foreach ($districts as $district ) {
                                $district->delete();
                            }

                             $division->delete();
                            }
                        
                      session()->flash('success','division has deleted successfully');
                       return  redirect()->route('admin.divisions');
                        
                            }


}

