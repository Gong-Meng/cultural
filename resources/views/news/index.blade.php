@extends("layouts.app")

@section("title","资讯列表")

@section("content")
	<div class="sidebar-wrap">
        @include("layouts._nav")
    </div>
    <!--/sidebar-->
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="index.html">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">资讯管理</span></div>
        </div>
        <div class="search-wrap">
            <div class="search-content">
                <form action="#" method="post">
                    <table class="search-tab">
                        <tr>
                            <th width="120">选择分类:</th>
                            <td>
                                <select name="search-sort" id="">
                                    <option value="">全部</option>
                                    <option value="19">精品界面</option><option value="20">推荐界面</option>
                                </select>
                            </td>
                            <th width="70">关键字:</th>
                            <td><input class="common-text" placeholder="关键字" name="keywords" value="" id="" type="text"></td>
                            <td><input class="btn btn-primary btn2" name="sub" value="查询" type="submit"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <div class="result-wrap">
            <form name="myform" id="myform" method="post">
                <div class="result-title">
                    <div class="result-list">
                        <a href="{{ route('new.create') }}"><i class="icon-font"></i>新增资讯</a>
                        <a id="batchDel" href="javascript:void(0)"><i class="icon-font"></i>批量删除</a>
                        <a id="updateOrd" href="javascript:void(0)"><i class="icon-font"></i>更新排序</a>
                    </div>
                </div>
                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <tr>
                            <th class="tc" width="5%"><input class="allChoose" name="" type="checkbox"></th>
                            <th>排序</th>
                            <th>ID</th>
                            <th>标题</th>
                            <th>图片</th>
                            <th>分类</th>
                            <th>用户</th>
                            <th>更新时间</th>
                            <th>操作</th>
                        </tr>
						@foreach($news as $new)
                        <tr>
                            <td class="tc"><input name="id[]" value="59" type="checkbox"></td>
                            <td>
                                <input name="ids[]" value="59" type="hidden">
                                <input class="common-input sort-input" name="ord[]" value="0" type="text">
                            </td>
                            <td>{{$new -> id}}</td>
                            <td title="发哥经典"><a target="_blank" href="#" title="发哥经典">{{$new -> title}}</a> …
                            </td>
                            <td><img alt="图片问题" style="width: 100px;height: 100px;" src="{{ $new -> pic }}"/></td>
                            <td>{{ $new->cate->cate_name }}</td>
                            <td>{{ $new->user->name }}</td>
                            <td>{{ $new->updated_at }}</td>
                            <td>
                                <a class="link-update" href="{{ route('new.edit',['new'=>$new->id]) }}">修改</a>
                                <a class="link-del" onclick="del(this)" csrf='{{ csrf_field() }}'  url="{{ route('new.destroy',['new'=>$new->id]) }}" href="#">删除</a>
                            </td>
                        </tr>
						@endforeach
                    </table>
                    <div class="list-page"> 
						{{ $news -> links("shared._page",['pages' => $news]) }}
                    </div>
                </div>
            </form>
        </div>
    </div>
    
    <!--删除暂存表单-->
    <div id="delete_new">
    </div>
                
    <script type="text/javascript">
        
        function del( obj ){

            var url = $(obj).attr('url');

            var csrf = $(obj).attr('csrf');

            var form = "<form id='dele' action='"+url+"' method='post'>"+csrf+"<input type='hidden' name='_method' value='delete'></form>";

            $("#delete_new").html(form);

            $("#dele").submit();
            
        }
    

    </script>
@stop