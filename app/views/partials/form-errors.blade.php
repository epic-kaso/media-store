@if($errors->count() > 0)
<div class="alert alert-danger">
<ul>
@foreach($errors->all() as $error)
    <li><p>{{ print_r($error,true) }}</p></li>
@endforeach
</ul>
</div>
@endif()