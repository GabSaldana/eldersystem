<!--Si estas loggeado como usuario-->
@if(Auth::guard('web')->check())
  <p class="text-succes">
    Estas loggeado como <strong>usuario</strong>
  </p>
@else
<p class="text-danger">
  Estas desloggeado como <strong>usuario</strong>
</p>
@endif


<!--Si estas loggeado como administrador-->
@if(Auth::guard('admin')->check())
  <p class="text-succes">
    Estas loggeado como <strong>administrador</strong>
  </p>
@else
<p class="text-danger">
  Estas desloggeado como <strong>administrador</strong>
</p>
@endif
