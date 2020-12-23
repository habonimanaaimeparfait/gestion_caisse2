<!DOCTYPE html>
<html lang="en">

  
<!-- header -->
@include('inc.head')
  


<body>
  
    
    <!-- navbar -->
@include('inc.navbar')
   
<!-- sidebar -->
@include('inc.sidebar')
   
@yield('content')
   
    <!--footer start-->
 @include('inc.footer')

<!-- script -->
@include('inc.script')
</body>

</html>
