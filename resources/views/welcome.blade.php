<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="css/main.css" rel="stylesheet" type="text/css">
        <link rel="manifest" href="manifest.json">
        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    </head>
    <body>
      <!--[if lt IE 8]>
          <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
      <![endif]-->

      <style>
        .gamma, .beta {
          font-size: 30px;
          color: #000;
          display: block;
          width: auto;
          margin: 0 auto;
        }
        .alpha { background: yellow; color: #000; }
        .beta { background: rgba(255,255,0, .3); font-size: 10px; }
        .gamma { background: rgba(255, 0, 255, .3); font-size: 10px; }
        .gamabeta {
          position: absolute;
          bottom: 5%;
          transform: translate(-50% -50%);
          z-index: 123456;
        }

      </style>

      <div class="wrapper">

        <div class="gamabeta">
          <div class="alpha"></div>
          <div class="beta"></div>
          <div class="gamma"></div>
        </div>

        <div class="wrapper--outer">
          <div class="wrapper--inner">
            <div class="card--wrapper">
              <div class="card">
                <div class="card--percent">100%</div>
                <div class="card--percent">100%</div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
      <script src="assets/js/vendor/jquery-1.12.0.min.js"></script>
      <!-- <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.12.0.min.js"><\/script>')</script> -->
      <script src="assets/js/plugins.js"></script>
      {{-- <script src="assets/js/main.js"></script> --}}

      <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
      <script>
          (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
          function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
          e=o.createElement(i);r=o.getElementsByTagName(i)[0];
          e.src='https://www.google-analytics.com/analytics.js';
          r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
          ga('create','UA-XXXXX-X','auto');ga('send','pageview');
      </script>

      <script>
      // web parallax
      $(document).mousemove(function(e) {
        var posX = e.pageX / $(this).width() * 100 - 50;
        var posY = e.pageY / $(this).height() * 100 - 50;
        var tiltAmount = .9;
        $('.wrapper--inner').css({
          'transform': 'translate(-50%, -50%) perspective(500px) rotateY('+ tiltAmount * posX+'deg ) rotateX( '+ tiltAmount * posY * -1+'deg )',
        })
      });

      // mobile parallax
      if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
        var origX, origY;
        var tiltAmount_mb = .8;

        function origOrientation(event) {
          origX = event.gamma;
          origY = event.beta;
          window.removeEventListener('deviceorientation', origOrientation);
        }
        window.addEventListener('deviceorientation', origOrientation);

        function handleOrientation(event) {
          var gamma = event.gamma;
          var beta = event.beta;
          var x = origX - gamma;
          var y = origY - beta;

          if (gamma > 89 && gamma < -89 ) { gamma =  89};
          // if (event.gamma < -89) { gamma = -89};
          if (beta > 89 && beta < -89 ) { beta =  89};
          // if (event.beta < -89) { beta = -89};

          $('.beta').html("origX: " + origX + " gamma: " + gamma + " x: " + x);
          $('.gamma').html("origY: " + origY + " beta: " + beta + " y: " + y);

          $('.card').css({ // v-- scale (.5) is for testing only. please remove upon deployment
            'transform': 'perspective(400px) rotateY( '+ (y * tiltAmount_mb) * -1 +'deg ) rotateX( '+ x * tiltAmount_mb +'deg)'
          });
        }
          window.addEventListener('deviceorientation', handleOrientation);
      }

      </script>

    </body>
</html>
