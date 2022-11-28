<!DOCTYPE html>
{{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">--}}
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Equipment Losses in War</title>
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/gh/lipis/flag-icons@6.6.6/css/flag-icons.min.css"
    />
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')

</head>
<body class="">
<div>{{ $equipment->side_country }}</div>
<div>{{ $equipment->name }}</div>
<div>{{ $equipment->category->name }}</div>
<div>@foreach($equipment->tags as $tag) {{ $tag->name }} @endforeach</div>
<div>{{ $equipment->source_url }}</div>
<div>{{ $equipment->geolocation }}</div>
</body>
