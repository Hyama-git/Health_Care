<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Records</title>
        <!-- Fonts -->
    </head>
    <x-app-layout>
    <x-slot name="header">
        　健康管理
    </x-slot>
    <body>
        <h1>My Page</h1>
        {{ Auth::user()->name }}
        <div class='recods'>
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
            <a href='/records/create'>create</a>
            @foreach ($records as $record)
                <div class='records'>
                    <h2 class='breakfast'>{{ $record->breakfast }}</h2>
                    <h2 class='lunch'>{{ $record->lunch }}</h2>
                    <h2 class='dinner'>{{ $record->dinner }}</h2>
                </div>
            <form action="/records/{{ $record->id }}" id="form_{{ $record->id }}" method="post">
                @csrf
                @method('DELETE')
                <button type="button" onclick="deleteRecord({{ $record->id }})">delete</button> 
            </form>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $records->links() }}
        </div>
        <script>
    function deleteRecord(id) {
        'use strict'

        if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
            document.getElementById(`form_${id}`).submit();
        }
    }
</script>
    </body>
    </x-app-layout>
</html>