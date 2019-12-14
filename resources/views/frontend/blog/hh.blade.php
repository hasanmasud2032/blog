@php
$x=1
@endphp
@for($i=1;$i<=7;$i++)
   @if($x==1)
     @php($x++)
     <p>Firest {{$i}}</p>
     @elseif($x==2)
     @php($x++)
     <p>Second {{$i}}</p>
     @else
     @php($x=1)
     <p>Third {{$i}}</p>
   @endif
   @if($i==1)
   <p>Once {{$i}}</p>
   @endif
@endfor
