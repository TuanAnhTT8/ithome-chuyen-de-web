<link rel="stylesheet" href="./css/loginform-style.css">
<div class="vh-100">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="./image/cate-image.jpg"
          class="img-fluid">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        <form name="form-forgotpass" method="post">
          
          {{ csrf_field() }}
          <!-- Email input -->
         
          <div class="form-outline mb-4">
            <input type="email" name="email" id="form3Example3" class="form-control form-control-lg"
              placeholder="Email" />
              
            <label class="form-label" for="form3Example3">Email</label>
          </div>
          
          <!-- Password input -->
      

          <div class="d-flex justify-content-between align-items-center">
            <!-- Checkbox -->
            

          <div class="text-center text-lg-start mt-4 pt-2">
            <button type="submit" class="btn btn-primary btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem;">Send</button>
              <p class="small fw-bold mt-2 pt-1 mb-0">Do have an account? <a href="{{asset('login')}}"
                class="link-danger">Login</a></p>
          </div>
         
        </form>
      </div>
    </div>
  </div>
</div>