@extends("layouts.app")

@section("title","日志列表")

@section("content")
	<div class="sidebar-wrap">
        @include("layouts._nav")
    </div>
    <!--/sidebar-->
    <div class="main-wrap">
        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="index.html">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">用户管理</span></div>
        </div>
        <div class="search-wrap">
            <!-- <div class="search-content">
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
            </div> -->
        </div>
        <div class="result-wrap">
            <form name="myform" id="myform" method="post">
                <div class="result-title">
                    <!-- <div class="result-list">
                        <a href="#"><i class="icon-font"></i>新增资讯</a>
                        <a id="batchDel" href="javascript:void(0)"><i class="icon-font"></i>批量删除</a>
                        <a id="updateOrd" href="javascript:void(0)"><i class="icon-font"></i>更新排序</a>
                    </div> -->
                </div>
                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <tr>
                            <th class="tc" width="5%"><input class="allChoose" name="" type="checkbox"></th>
                            <th>用户id</th>
                            <th>访问地址</th>
                            <th>访问方法</th>
                            <th>用户名</th>
                            <th>参数</th>
                            <th>ip</th>
                            <th>用户代理</th>
                            <th>操作记录</th>
                            <th>访问时间</th>
                        </tr>
                        @foreach($logs as $val)
                        <tr>
                            <td class="tc"><input name="id[]" value="59" type="checkbox"></td>
                            <td>{{ $val["admin_id"] }}</td>
                            <td>{{ $val["url"] }}</td>
                            <td>{{ $val["method"] }}</td>
                            <td>{{ $val["admin_name"] }}</td>
                            <td>{{ $val["params"] }}</td>
                            <td>{{ $val["ip"] }}</td>
                            <td>{{ $val["user_agent"] }}</td>
                            <td>{{ $val["content"] }}</td>
                            <td>{{ $val["created_at"] }}</td>
                        </tr>
                        @endforeach
                    </table>
                    <div class="list-page"> 
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop