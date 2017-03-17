<!DOCTYPE html>
<html>
<head>
  @include('style.header')
</head>
<body>
  <div class="col-md-12">
    <div class="col-md-5 row tulisan">
      <div class="col-md-12 ppdb">
        <p id="ppdb">A+ Auto</p>
        <p id="jatim">Service dan Spare Part</p>
        <p id="info">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>
      </div>
      <div class="col-md-12 tombol">
        <button type="button" class="btn btn-default daftar">Pendaftaran</button>
        <button type="button" class="btn btn-default login">Login</button>
      </div>
    </div>
    <div class="col-md-6 logo">
      <div class="col-md-12 gambar"><img src="{{url('')}}/image/motor2.jpg"></div>
      <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4 form-login">
          <form>
            <div class="form-group">
              <label class="login-title">Login</label>
            </div>
            <div class="form-group">
              <label for="email">Email address:</label>
              <input type="email" class="form-control" id="email">
            </div>
            <div class="form-group">
              <label for="pwd">Password:</label>
              <input type="password" class="form-control" id="pwd">
            </div>
            <div class="checkbox">
              <label><input type="checkbox"> Remember me</label>
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
          </form>
        </div>
        <div class="col-md-4"></div>
      </div>
      <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4 form-daftar">
          <form>
            <div class="form-group">
              <label class="login-title">Daftar</label>
            </div>
            <div class="form-group">
              <label for="email">Email address:</label>
              <input type="email" class="form-control" id="email">
            </div>
            <div class="form-group">
              <label for="pwd">Password:</label>
              <input type="password" class="form-control" id="pwd">
            </div>
            <div class="checkbox">
              <label><input type="checkbox"> Remember me</label>
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
          </form>
        </div>
        <div class="col-md-4"></div>
      </div>
    </div>
  </div>
  @include('script.tombol-daftar-login')
</body>
</html>