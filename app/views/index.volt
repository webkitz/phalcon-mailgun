<!DOCTYPE html>
<html>
    <head>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Project MailGun</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        {{ assets.outputCss() }}
    </head>
    <body>
        {{ content() }}
        <!--scripts !-->
        {{ javascript_include("js/jquery-1.9.1.min.js") }}
        {{ assets.outputJs() }}
    </body>
</html>
