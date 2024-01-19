<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>AddRecipe</title>
        
    </head>
     <x-app-layout>
    <x-slot name="header">
        　健康管理
    </x-slot>
        <body>
        <h1>記録</h1>
        {{ Auth::user()->name }}
        <form action="/foods" method="POST">
            @csrf
            <div class="food">
                <h2>料理名</h2>
                    <input type="text" name="food[title]" placeholder="食べたもの"/>
            </div>
            <div class="food">
                <h2>レシピ手順</h2>
                    <input type="text" name="food[recipe]" placeholder="手順"/>
            </div>
            <div class="food">
                <h2>カテゴリー名</h2>
                    <select name="food[category_id]" >
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
            </div>
            <div class="food">
                <h2>コメント</h2>
                    <input type="text" name="food[comment]" placeholder="食べたもの"/>
            </div>
            <div class="price">
                <h2>金額</h2>
                    <input type="text" name="food[price]" placeholder="金額"/>
            </div>
            <div class="calorie">
                <h2>カロリー</h2>
                <input type="text" name="food[calorie]" placeholder="カロリー"/>
            </div>
            <h2>公開する</h2>
            <input type="hidden" name="food[is_published]"value=0 />
            <input type="checkbox" name="food[is_published]"value=1 />
        <input type="submit" value="store"/>
        </form>
            <div class="footer">
                <a href="/">戻る</a>
        </div>
    </body>
    </x-app-layout>
</html>