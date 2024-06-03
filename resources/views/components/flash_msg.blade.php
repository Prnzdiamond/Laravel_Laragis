@if(session()->has('message'))
  <div class="bg-red">
        {{session('message')}}
  </div>
@endif