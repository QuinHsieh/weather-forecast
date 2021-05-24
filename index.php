<!DOCTYPE html>
<html lang="zh-Hant-TW">

<head>
    <title>Weather forecast website</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <meta name="description" content="Use PHP and jQuery to connect weather API to make a weather forecast webpage." />
    <meta name="author" content="Quin Hsieh" />
    <meta property="og:title" content="Weather Forecast" />
    <meta property="og:description" content="PHP and jQuery weather forecast exercise" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="img/og-img.png" />
    <meta property="og:url" content="https://quinhsieh.github.io/weather-forecast" />
    <meta property="og:image:alt" content="PHP and jQuery weather forecast exercise" />
    <meta property="og:image:type" content="image/png" />

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <style>
        .heroImage {

            background-image: url("img/weather-bg.png");
            border-radius: 0;
            /*  vh表整個瀏覽器高度  */
            height: 100vh;
            margin-bottom: 0;

            background-size: cover;
        }

        .alert {

            display: none;
        }
    </style>

</head>

<body>

    <div class="jumbotron heroImage text-center">

        <div class="container">

            <h1 class="display-4 text-dark mt-5">Weather forecast</h1>

            <p class="lead text-dark">Please enter the <strong class=text-primary>city name</strong></p>
            <form>
                <!-- mx-auto 表示margin水平軸置中    -->
                <div class="form-group col-md-7 mx-auto">
                    <input id="city" type="text" name="city" class="form-control" placeholder="e.g., Taipei, Tokyo, Paris...">

                </div>

            </form>

            <button id="findMyWeather" type="submit" class="btn btn-warning btn-lg" name="submit">Search</button>

            <div class="col-8 mx-auto mt-3">

                <div id="success" class="alert alert-success">Search successful.</div>
                <div id="fail" class="alert alert-danger">Unable to find the city you are looking for, please try again!</div>
                <div id="noCity" class="alert alert-danger">Please be sure to enter the city name!</div>

            </div>
        </div>

    </div>

    <script type="text/javascript">
        $("#findMyWeather").click(function(event) {

            event.preventDefault(); // 暫停發送

            $(".alert").hide();

            if ($("#city").val() != "") {

                // 做get請求
                $.get("scraper.php?city=" + $("#city").val(), function(data) {
                    // function (data) 是一個回呼函式 server將資料以data作為參數,傳給user

                    if (data == "") {

                        $("#fail").fadeIn();

                    } else {

                        $("#success").html(data).fadeIn();
                    }
                });

            } else { // 用戶無輸入內容

                $("#noCity").fadeIn();

            }

        });
    </script>

</body>

<div id="error"></div>

</html>