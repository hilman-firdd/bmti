@if(auth()->user()->role_id == 1)
  @include('admin.dashboard.admin')
@elseif(auth()->user()->role_id == 2)
  @include('admin.dashboard.eksekutif')
@elseif(auth()->user()->role_id == 3)
  @include('admin.dashboard.penyelenggara')
@elseif(auth()->user()->role_id == 4)
  @include('admin.dashboard.evaluator')
@else
  @include('admin.dashboard.peserta')
@endif