
  <x-layout>
    <!-- hero section -->
    @if(session('success'))
    <div class="alert alert-success text-center">{{session('success')}}</div>
    @endif
   <x-hero/>
    <!-- blogs section -->
   <x-stories-section :stories="$stories"/>
    <!-- subscribe new stoires -->   
    <!-- footer -->  
    </x-layout>

 

