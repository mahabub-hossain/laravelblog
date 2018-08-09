<!DOCTYPE html>
<html lang="en">

<head>
@include('admin.layouts.head')
</head>


<body class="hold-transition skin-purple sidebar-mini">

   <div class="wrapper">

    @include('admin.layouts.admin_header')
      @include('admin.layouts.admin_sidebar')

      @section('main-content')
       @show

    @include('admin.layouts.admin_footer')

    </div>

</body>

</html>