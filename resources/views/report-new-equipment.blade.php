<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Report New Equipment</title>
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/gh/lipis/flag-icons@6.6.6/css/flag-icons.min.css"
    />
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')

</head>
<body class="">
<div class="container py-4 px-4">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('storeNew') }}" method="POST">
        <div class="py-2 px-2">
            <label class="font-semibold" for="name">Name:</label><br>
            <input class="rounded bg-gray-100" type="search" id="name" name="name"
                   value="" placeholder="Enter Name.."><br>
        </div>

        <div class="py-2 px-2">
            <label class="font-semibold" for="side_country">Side Country:</label><br>
            <select class="rounded bg-gray-100 px-2" id="side_country" name="side_country">
                <option selected value="">Select
                </option>
                <option value="10">Ukraine
                </option>
                <option value="20">Russia
                </option>
            </select>
        </div>
        <div class="py-2 px-2">
            <label class="font-semibold" for="category">Category:</label><br>
            <select class="rounded bg-gray-100 px-2 overflow-x-scroll" id="category" name="category_id">
                <option selected value="">Select
                </option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="py-2 px-2">
            <label class="font-semibold" for="date">Date:</label><br>
            <input class="rounded bg-gray-100" type="date" id="date" name="date">
        </div>
        <div class="py-2 px-2">
            <label class="font-semibold" for="source_url">Source:</label><br>
            <input class="rounded bg-gray-100" type="text" id="source_url" name="source_url"
                   value="" placeholder="Enter Source Url.."><br>
        </div>
        <div class="py-2 px-2">
            <label class="font-semibold" for="tags">Tags:</label><br>
            <select name="tags[]" id="tags" multiple>
                @foreach($tags as $tag)
                    <option value="{{$tag->name}}">{{ $tag->name }}</option>
                @endforeach
            </select>
        </div>
        @csrf
        <div class="py-2 px-2">
            <input class="bg-indigo-600 px-2 mr-6 py-2 rounded-md text-white font-semibold tracking-wide cursor-pointer"
                   type="submit" value="Report">
        </div>
    </form>
</div>
</body>
</html>
