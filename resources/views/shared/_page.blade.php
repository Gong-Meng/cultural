<style>
	.page li{float:left;}

</style>
<ul class="page">
	<li><a href="{{$pages->previousPageUrl()}}">上一页</a></li>
	<li>{{$pages->currentPage()}}/{{$pages->lastPage()}}</li>
	<li><a href="{{$pages->nextPageUrl()}}">下一页</a></li>
</ul>