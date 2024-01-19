<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Record</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1 class="breakfast">
            {{ $record->breakfast }}
        </h1>
        <div class="content">
            <div class="content__record">
                <h3>price</h3>
                <p>{{ $record->price }}</p>
                <h3>calorie</h3>
                <p>{{ $record->calorie}}</p>
            </div>
            <div class="edit"><a href="/records/{{ $record->id }}/edit">edit</a></div>
        </div>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>