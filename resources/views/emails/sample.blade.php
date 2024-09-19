<!DOCTYPE html>
<html>

<body>
    @if(!empty($mailData))
<p>Hello  {{$mailData ['body']}},  </p>
<h1>{{ $mailData['title'] }}</h1>
<p>Thank you</p>
@else
@endif

    
   
  
    <!-- <p>We Will Contact Soon .</p> -->
     
    
</body>
</html>