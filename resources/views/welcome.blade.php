<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Intelligent Audit</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <link href="/css/app.css" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>

    </head>
    <body>
        <div id="app">
            <div class="flex-center position-ref full-height">
                @if (Route::has('login'))
                    <div class="top-right links">
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    </div>
                @endif

                <div class="content" >
                    <div class="title m-b-md">
                        Intelligent Audit
                    </div>

                    <div class="links m-b-md">
                        <a href="https://github.com/ebarthelemy/intelligent-audit">GitHub</a>
                    </div>

                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a data-toggle="tab" href="#report1">Report 1</a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#report2">Report 2</a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#report3">Report 3</a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div id="report1" class="tab-pane fade in active">
                            <report num="1"></report>
                        </div>
                        <div id="report2" class="tab-pane fade">
                            <report num="2"></report>
                        </div>
                        <div id="report3" class="tab-pane fade">
                            <report num="3"></report>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="/js/app.js"></script>
    </body>
</html>
