<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\District;
use App\Models\Division;



class DistrictsController extends Controller
{
    public function index(){

        $districts = District::orderBy('name','asc')->get();
        return view('backend.pages.districts.index',compact('districts'));

    }

    public function create(){

        $divisions = Division::orderBy('priority','asc')->get();
        return view('backend.pages.districts.create', compact('divisions'));

    }

    public function store(Request $request){

     $this->validate($request,[

        'name'  => 'required',
        'division_id' =>  'required',
      ],
      [
          'name.required' => 'please provide a district name',
          'division_id.required'  => 'please provide a division for the district ',
      ]
    );

        $district = new District();
        $district->name = $request->name;
        $district->division_id = $request->division_id;
      

        $district->save();
  
        session()->flash('success','A new District has been added successfully!!');
        return redirect()->route('admin.districts');
              }




              public function edit($id){

                  $divisions = Division::orderBy('priority','asc')->get();
                  $district= District::find($id);

                  if(!is_null($district)){
                      return view('backend.pages.districts.edit',compact('district','divisions'));
                  }else{
                      return redirect()->route('admin.districts');
                  }

              }


              public function update(Request $request, $id){

                $this->validate($request,[
       
                   'name'  => 'required',
                   'division_id' =>  'required',
                 ],
                 [
                     'name.required' => 'please provide a district name',
                     'division_id.required'  => 'please provide a division for the district ',
                     ]
               );
       
                   $district =  district::find($id);
                   $district->name = $request->name;
                   $district->division_id = $request->division_id;
                   $district->save();
             
                   session()->flash('success',' district has updated successfully!!');
                   return redirect()->route('admin.districts');
                         }


             public function delete($id){

                     $district = District::find($id);
                       if(!is_null($district)){

                         $district->delete();
                        }
                    
                  session()->flash('success','district has deleted successfully');
                   return  redirect()->route('admin.districts');
                    
                        }


}
