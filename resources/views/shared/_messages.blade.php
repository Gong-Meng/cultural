@if (session('status'))
	<script type="text/javascript">
		alert("{{ session('status') }}");
	</script>
@endif