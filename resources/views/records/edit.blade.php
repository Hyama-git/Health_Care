<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Record</title>
        
    </head>
     <x-app-layout>
    <x-slot name="header">
        　健康管理
    </x-slot>
        <body>
        <h1>記録</h1>
        {{ Auth::user()->name }}
        <form action="/records" method="POST">
            @csrf
            <div class="food">
                <h2>朝食</h2>
                    <input type="text" name="record[breakfast]" placeholder="食べたもの"/>
            </div>
            <div class="price">
                <h2>金額</h2>
                    <input type="text" name="record[breakfast]" placeholder="金額"/>
            </div>
            <div class="calorie">
                <h2>カロリー</h2>
                    <input type="text" name="record[breakfast]" placeholder="カロリー"/>
            </div>
            <div class="food">
                <h2>昼食</h2>
                    <input type="text" name="record[lunch]" placeholder="食べたもの"/>
            </div>
            <div class="price">
                <h2>金額</h2>
                    <input type="text" name="record[lunch]" placeholder="金額"/>
            </div>
            <div class="calorie">
                <h2>カロリー</h2>
                    <input type="text" name="record[lunch]" placeholder="カロリー"/>
            </div>
            <div class="food">
                <h2>夕食</h2>
                    <input type="text" name="record[dinner]" placeholder="食べたもの"/>
            </div>
            <div class="price">
                <h2>金額</h2>
                    <input type="text" name="record[dinner]" placeholder="金額"/>
            </div>
            <div class="calorie">
                <h2>カロリー</h2>
                    <input type="text" name="record[dinner]" placeholder="カロリー"/>
            </div>
        <input type="submit" value="保存"/>
        </form>
            <div class="footer">
                <a href="/">戻る</a>
        </div>
    </body>
    </x-app-layout>
</html>