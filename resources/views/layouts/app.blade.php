
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>My Broken Phone</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="/static/css/styles.css">
    <link rel="stylesheet" href="/static/css/styles-responsive.css">
    <link rel="stylesheet" href="/static/css/megadrop.css">
  </head>
  <body>

    @include('partials.header-nav')

    <div id="content">
      @include('partials.form-error')
      @yield('content')
    </div>

    @include('partials.footer')

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="/static/js/signup.js"></script>
    <script src="/static/js/steps.js"></script>
    <script src="/static/js/megadrop.js"></script>
  </body>
</html>
