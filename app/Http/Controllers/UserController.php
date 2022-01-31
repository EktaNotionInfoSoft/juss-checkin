<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;
use DataTables;

class UserController extends Controller
{
    public function index()
    {
        if(auth()->guard('admin')->check())
        {   
            return view('admin.manage_user.user'); 
        } 
        else 
        {
            return redirect('admin/login');
        }
    }

    public function userList(Request $request)
    {
        if ($request->ajax()) 
        {
            return Datatables::of($User = DB::table('tbl_users')->where("status","a"))
            ->addColumn('action', function($row) {
                $btn = '<a href="editUser/'. $row->id .'" class="btn btn-primary">Edit</a>';
                $btn = $btn . '<button class="btn btn-danger" id="delete" data-id="'.$row->id.'" data-toggle="modal" data-target="#modal-default">Delete</button>';
                $btn = $btn . '<a href="viewUser/'. $row->id .'" class="btn btn-success" id="view" data-id="'.$row->id.'">View</a>';
                return $btn;
            })
            ->editColumn('status', function($row) {
                $btn = '<label class="switch">';
                $btn .= '<input type="checkbox" id="'.$row->id.'" class="switch switchClass" ';
                if ($row->status == "a") {
                    $btn .= "checked";
                }
                $btn .= '><span class="slider"></span></label>';
                return $btn;
            })
            ->rawColumns(['status'=>'status','action' => 'action','image'=>'image'])
            ->make(true);
        }

    }

    public function editUser($id){
        $user = User::find($id);
        return view('admin/manage_user/edit_user',compact('user'));
    }

    public function updateMailTemp(Request $req){
        $edit_tmp = EmailTemplate::where('id','=',$req->id)->first();
        $edit_tmp->email_template_name = $req->email_template_name;
        $edit_tmp->subject = $req->subject;
        $edit_tmp->action = $req->action;
        $edit_tmp->email_content = $req->email_content;
        $edit_tmp->status = $req->status;
        $edit_tmp->save();
        return redirect('admin/email_template')->with('message','Email Template Updated Successfully');
    }
}
