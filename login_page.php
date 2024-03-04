<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="login_page.css" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <title href="signup_page.html">Login</title>
  </head>
  <body>
    <div class="wrapper">
      <div class="container main">
        <div class="row">
          <div class="col-md-6 side-image">
            <!-------------      image     ------------->

            <img src="images/white.png" alt="" />
          </div>

          <div class="col-md-6 right">
            <div class="input-box">
              <header>LOGIN</header>
              <form action="server.php" method="post">
              <div class="input-field">
                <input
                  type="text"
                  class="input"
                  id="email"
                  name="email"
                  required=""
                  autocomplete="off"
                />
                <label for="email">Email</label>
              </div>
              <div class="input-field">
                <input type="password" class="input" id="pass" name="password" required="" />
                <label for="password">Password</label>
              </div>
              <div class="input-field">
                <input
                  type="submit"
                  class="submit"
                  value="login"
                  name="login_user"
                />
            </form>
                <script>
                  function home() {
                    window.location.href = "home.html";
                  }
                </script>
              </div>
              <div class="signin">
                <span
                  >Create an account?
                  <a href="signup_page.html">Sign up in here</a></span
                >
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
