<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use DB;
use DataTables;
use Session;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        if(auth()->guard('admin')->check())
        {
            return view('admin.manage_blog.blog'); 
        } 
        else 
        {
            return redirect('admin/login');
        }
    }

    public function blogList (Request $request){
        if ($request->ajax()) 
        {
            return Datatables::of($blog = DB::table('tbl_blog')->orderBy('id','DESC'))
                ->addColumn('action', function($row) {
                    $btn = '<a href="editBlog/'. $row->id .'" class="btn btn-primary">Edit</a>';
                    $btn = $btn . '<button class="btn btn-danger" id="delete" data-id="'.$row->id.'" data-toggle="modal" data-target="#modal-default">Delete</button>';
                    $btn = $btn . '<a href="viewBlog/'. $row->id .'" class="btn btn-success" id="view" data-id="'.$row->id.'">View</a>';
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
                ->editColumn('image', function($row) {
                    $url= asset('uploads/blogimage/'.$row->image);
                    $img = '<img src="'.$url.'" alt="Blog Image" height="100px" width="100px" style="border:1px solid grey;"/>';
                    return $img;
                })
                ->rawColumns(['status'=>'status','action' => 'action','image'=>'image'])
                ->make(true);
        }
    }
    public function addBlog(){
        return view('admin.manage_blog.add_blog');
    }

    public function addBlogData(Request $req){
        $blog = new Blog;
        $blog->title = $req->title;
        $blog->description = $req->description;
        $filename = time().'.'. $req->file('image')->getClientOriginalExtension();
        $req->image->move(public_path('uploads/blogimage'), $filename);
        $blog->image=$filename;
        $blog->status = "Active";
        $blog->save();
        return redirect('admin/blog')->with('message','Blog Added Successfully');
    }

    public function getblogId(Request $req){
        $getId = $req->id;
        return response()->json(['getId'=>$getId]);
    }

    public function deleteBlog(Request $req){
        $blog = Blog::where('id','=',$req->id)->first();
        $blog->delete();
        return redirect('admin/blog')->with('message','Blog Deleted Successfully');
    }

    public function editBlog($id){
        $blog = Blog::find($id);
        return view('admin/manage_blog/edit_blog',compact('blog'));
    }

    public function updateBlog(Request $req){
        $blog = Blog::where('id','=',$req->id)->first();
        $blog->title = $req->title;
        $blog->description = $req->description;
        if($req->image != ''){        
            $path = 'uploads/blogimage/';
  
            //code for remove old file
            if($blog->image != ''  && $blog->image != null){
                 $file_old = $path.$blog->image;
                 unlink($file_old);
            }
  
            //upload new file
            $file = $req->image;
            $filename = $file->getClientOriginalName();
            $file->move($path, $filename);
  
            //for update in table
            $blog->update(['image' => $filename]);
        }
        $blog->status = $req->status;
        $blog->save();
        return redirect('admin/blog')->with('message','Blog Updated Successfully');
    }

    public function viewBlog($id){
        $blog = Blog::find($id);
        return view('admin/manage_blog/view_blog',compact('blog')); 
    }

    public function changeBlogStatus(Request $request)
    {
        $blog = Blog::find($request->id);
        $blog->status = $request->status;
        $blog->save();
       return response()->json(['status_success'=>'Blog Status change successfully.']);
    }
}
