@extends("layouts.app")

@section("title", isset($new->id) ? "编辑资讯" : "新增资讯" )

@section("content")
	
	<div class="sidebar-wrap">
        @include("layouts._nav")
    </div>
    <!--/sidebar-->
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="{{ route('index') }}">首页</a><span class="crumb-step">&gt;</span><a class="crumb-name" href="{{ route('new.index') }}">资讯管理</a><span class="crumb-step">&gt;</span><span>@if($new->id) 编辑资讯 @else 新增资讯 @endif</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-content">

            @if($new->id)
                <form action="{{ route('new.update',['new'=>$new->id]) }}" method="post" id="myform" name="myform" enctype="multipart/form-data">
                 @method("put")
            @else    
                <form action="{{ route('new.store') }}" method="post" id="myform" name="myform" enctype="multipart/form-data">
            @endif
                	@csrf
                	@include("shared._error")
                    <table class="insert-tab" width="100%">
                        <tbody>
                        	<tr>
	                            <th width="120"><i class="require-red">*</i>分类：</th>
	                            <td>
	                                <select name="cate_id" id="catid" class="required">
									@foreach($cates as $cate)
	                                    <option @if($new->cate_id == $cate->id) selected=""  @endif value="{{$cate->id}}">{{ $cate->cate_name }}</option>
									@endforeach
	                                </select>
	                            </td>
	                        </tr>
                            <tr>
                                <th><i class="require-red">*</i>标题：</th>
                                <td>
                                    <input class="common-text required" id="title" name="title" size="50" value="{{old('title', $new->title)}}" type="text">
                                </td>

                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>缩略图：</th>
                                <td><input name="pic" id="" type="file"><!--<input type="submit" onclick="submitForm('/jscss/admin/design/upload')" value="上传图片"/>--></td>
                            </tr>
                            <tr>
                                <th>内容：</th>
                                <td><textarea name="content" class="common-textarea" id="content" cols="30" style="width: 98%;" rows="10">{{old('content',$new->content)}}</textarea></td>
                            </tr>
                            <tr>
                                <th></th>
                                <td>
                                    <input class="btn btn-primary btn6 mr10" value="提交" type="submit">
                                    <input class="btn btn6" onclick="history.go(-1)" value="返回" type="button">
                                </td>
                            </tr>
                        </tbody></table>
                </form>
            </div>
        </div>

    </div>


@stop