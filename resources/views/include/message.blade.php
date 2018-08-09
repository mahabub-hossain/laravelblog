<?php
if(count($errors)>0){
foreach ($errors->all() as $error){?>
<p class="alert alert-danger">{{$error}}</p>
<?php }

}

?>


@if(Session()->has('message'))
<p class="alert alert-success">{{Session('message')}}</p>
  @endif
@if(Session()->has('alert'))
    <p class="alert alert-danger">{{Session('alert')}}</p>
@endif


