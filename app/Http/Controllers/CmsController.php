<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cms;
use DB;
use DataTables;

class CmsController extends Controller
{
    public function index(Request $request)
    {
        if(auth()->guard('admin')->check())
        {
            return view('admin.manage_cms.cms'); 
        } 
        else 
        {
            return redirect('admin/login');
        }
    }

    public function cmsList (Request $request){
        if ($request->ajax()) 
        {
            return Datatables::of($EmailTemplate = DB::table('tbl_cms')->orderBy('id','DESC'))
                ->addColumn('action', function($row) {
                    $btn = '<a href="editCms/'. $row->id .'" class="btn btn-primary">Edit</a>';
                    $btn = $btn . '<button class="btn btn-danger" id="delete" data-id="'.$row->id.'" data-toggle="modal" data-target="#modal-default">Delete</button>';
                    $btn = $btn . '<a href="viewCms/'. $row->id .'" class="btn btn-success" id="view" data-id="'.$row->id.'">View</a>';
                    return $btn;
                })
                ->editColumn('status', function($row) {
                    $btn = '<label class="switch">';
                    $btn .= '<input type="checkbox" id="'.$row->id.'" class="switch switchClass" ';
                    if ($row->status == "Active") {
                        $btn .= "checked";
                    }
                    $btn .= '><span class="slider"></span></label>';
                    return $btn;
                })
                ->rawColumns(['status'=>'status','action' => 'action'])
                ->make(true);
        }
    }
    public function changeCmsStatus(Request $request)
    {
        $cms = Cms::find($request->id);
        $cms->status = $request->status;
        $cms->save();
       return response()->json(['status_success'=>'Status change successfully.']);
    }

    public function addCms(){
        return view('admin.manage_cms.add_cms');
    }

    public function addCmsData(Request $req){
        $cms = new Cms;
        $cms->name = $req->name;
        $cms->title = $req->title;
        $cms->description = $req->description;
        $cms->status = "Active";
        $cms->save();
        return redirect('admin/cms')->with('message','CMS Pages Added Successfully');
    }

    public function editCms($id){
        $cms = Cms::find($id);
        return view('admin/manage_cms/edit_cms',compact('cms'));
    }

    public function updateCms(Request $req){
        $cms = Cms::where('id','=',$req->id)->first();
        $cms->name = $req->name;
        $cms->title = $req->title;
        $cms->description = $req->description;
        $cms->status = $req->status;
        $cms->save();
        return redirect('admin/cms')->with('message','CMS Page Updated Successfully');
    }

    public function getcmsId(Request $req){
        $getId = $req->id;
        return response()->json(['getId'=>$getId]);
    }

    public function deleteCms(Request $req){
        $cms = Cms::where('id','=',$req->id)->first();
        $cms->delete();
        return redirect('admin/cms')->with('message','CMS Page Deleted Successfully');
    }
    public function viewCms($id){
        $cms = Cms::find($id);
        return view('admin/manage_cms/view_cms',compact('cms')); 
    }
}
