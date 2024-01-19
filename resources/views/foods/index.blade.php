<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Foods</title>
        <!-- Fonts -->
    </head>
    <x-app-layout>
    <x-slot name="header">
        　健康管理
    </x-slot>
    <body>
        <h1>Home</h1>
        {{ Auth::user()->name }}
        <div class='foods'>
        <form>
            <div class='search'>
                <input type="search"
                    id="mySearch"
                    name="q"
                    size="30" />
                    <button>検索</button>
                    <span class="validity"></span>
            </div>
        </form>
            <a href='/foods/create'>create</a>
            @foreach ($foods as $food)
                <div class='foods'>
                    <h2 class='foods'>{{ $food->title }}</h2>
                    <p class='foods'>{{ $food->recipe }}</p>
                    <p class='foods'>{{ $food->comment }}</p>
                    <p class='foods'>{{ $food->price }}</p>
                    <p class='foods'>{{ $food->calorie }}</p>
                </div>
            <form action="/foods/{{ $food->id }}" id="form_{{ $food->id }}" method="post">
                @csrf
                @method('DELETE')
                <button type="button" onclick="deleteFood({{ $food->id }})">delete</button> 
            </form>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $foods->links() }}
        </div>
        <script>
    function deleteFood(id) {
        'use strict'

        if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
            document.getElementById(`form_${id}`).submit();
        }
    }
</script>
    </body>
    </x-app-layout>
</html>