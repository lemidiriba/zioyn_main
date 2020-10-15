<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$title}}</title>
    {!!\WebDevEtc\BlogEtc\Helpers::rssHtmlTag()!!}
</head>

<body>
    <h1>Welcome to our site</h1>
    @yield("content")
</body>

</html>