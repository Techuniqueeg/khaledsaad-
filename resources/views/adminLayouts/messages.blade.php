@if(Session('success'))
<div class="alert alert-success">
	<p>{{ Session('success') }}</p>
</div>
@endif
@if(Session('danger'))
<div class="alert alert-danger">
	<p>{{ Session('danger') }}</p>
</div>
@endif

