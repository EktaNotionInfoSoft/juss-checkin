<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\SiteSetting;
use App\Models\EmailTemplate;
use DB;
use DataTables;
use Session;


class EmailTemplateController extends Controller
{
    public function index(Request $request)
    {
        if(auth()->guard('admin')->check())
        {
            return view('admin.manage_email_template.email_template'); 
        } 
        else 
        {
            return redirect('admin/login');
        }
    }

    public function addEmailTemplate(){
        return view('admin.manage_email_template.add_email_template');
    }
    public function ckeditor_upload(){
        if(isset($_FILES['upload']['name'])){
            $file = $_FILES['upload']['name'];
            $file_name = $_FILES['upload']['name'];
            $file_name_array = explode(".",$file_name);
            $extension = end($file_name_array);
            $new_image_name = rand(). '.' . $extension;
            $allowed_extension = array('jpg','gif','png','jpeg','jfif');
            
            if(in_array($extension, $allowed_extension)){
                move_uploaded_file($file, '../uploads/ckEditorImage/'. $file_name);
                $function_number = $_GET['CKEditorFuncNum'];
                $url = url('/uploads/ckEditorImage/'.$file_name);
                $message = 'Image Upload Successfully';
                echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($function_number,'$url','$message');</script>";
            }
        }
    }
    public function addEmailTemplateData(Request $req){
        $email_temp = new EmailTemplate;
        $email_temp->email_template_name = $req->email_template_name;
        $email_temp->subject = $req->subject;
        $email_temp->action = $req->action;
        $email_temp->email_content = $req->email_content;
        $email_temp->status = "Active";
        $email_temp->save();
        return redirect('admin/email_template')->with('message','Email Template added Successfully');
    }

    public function blogList (Request $request){
        if ($request->ajax()) 
        {
            return Datatables::of($blog = DB::table('tbl_cms')->orderBy('id','DESC'))
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
                ->rawColumns(['status'=>'status','action' => 'action','image'=>'image'])
                ->make(true);
        }
    }

    public function changeStatus(Request $request)
    {
        $email = EmailTemplate::find($request->id);
        $email->status = $request->status;
        $email->save();
       return response()->json(['status_success'=>'Status change successfully.']);
    }
    public function getId(Request $req){
        $getId = $req->id;
        return response()->json(['getId'=>$getId]);
    }

    public function deleteEmailTemp(Request $req){
        $email_temp = EmailTemplate::where('id','=',$req->id)->first();
        $email_temp->delete();
        return redirect('admin/email_template')->with('message','Email Template Deleted Successfully');
    }

    public function editMailTemp($id){
        $email_temp = EmailTemplate::find($id);
        return view('admin/manage_email_template/edit_email_template',compact('email_temp'));
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
