<?php

use Illuminate\Support\Facades\Auth;

function permission_check($permission) {
  return Auth::user()->hasPermissionTo($permission);
}
