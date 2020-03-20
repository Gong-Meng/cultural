<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Cate;
use App\Http\Requests\NewsRequest;
use App\Handlers\ImageUploadHandler;
use Auth;


class NewsController extends Controller
{

    public function __construct(){

        $this->middleware("auth");

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(News $new)
    {
        $news = $new->withOrder("updated_at")->with(["user","cate"])->paginate(8);
        //
        return view("news.index",compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(News $new)
    {
        $cates = Cate::all();

        //
        return view("news.create_and_edit",compact('new','cates'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsRequest $request, News $new, ImageUploadHandler $upload)
    {
        $data = $request->all();

        //上传文件
        if($request->hasfile("pic")){

            $result = $upload->save($request->file('pic'),"news");

            if($result){
                $data["pic"] = $result["path"];
            }
        }else{
            //给一张默认图片
            $data["pic"] = 'https://cdn.learnku.com/uploads/images/201710/14/1/s5ehp11z6s.png';
        }

        $new->fill($data);

        $new->user_id = Auth::id();

        $new->save();

        return redirect()->route("new.index")->with("status","添加成功");
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
    public function edit(News $new)
    {
        $cates = Cate::all();

        //
        return view("news.create_and_edit",compact('new','cates'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(News $new, NewsRequest $request, ImageUploadHandler $upload)
    {
        $this->authorize("update",$new);
        
        $data = $request->all();

        if($request->hasfile("pic")){

            $result = $upload->save($request->file("pic"),"news");

            if($result){

                $data["pic"] = $result["path"];

                $upload->delImg($new->pic);
            }
        }   

        $new->fill($data);

        $new->user_id = Auth::id();

        $new->save();

        return redirect()->route("new.index")->with("status","编辑成功");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $new, ImageUploadHandler $upload)
    {

        $this->authorize("destroy",$new);

        //删除图片
        $result = $upload->delImg($new->pic);

        if($result){

            $new->delete();

            return redirect()->route("new.index")->with("status","删除成功");
        }

        return redirect()->route("new.index")->with("status","删除失败");
    }
}
