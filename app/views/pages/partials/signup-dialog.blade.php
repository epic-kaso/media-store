<div id="signup-dialog" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="loginDialog" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
        <div class="modal-header">
            <h2 class="modal-title">SignUp</h2>
        </div>
        <div class="modal-body">
            @include('users.partials.signup-form',['post_url'=>$post_url])
        </div>
    </div>
  </div>
</div>