<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
<div class="mx-auto">
    <div class="container py-2 pl-6">
        <div class="">
            <a href="{{ route('reportNewPage') }}"
               class="bg-indigo-600 px-4 py-2 rounded-md text-white font-semibold tracking-wide cursor-pointer">Report New</a>
        </div>
    </div>
    <div class="flex flex-row bg-white p-4">
        <div class="px-4 py-4">
            <div class="">
                <form class="flex flex-col" action="" method="GET">
                    <div class="py-2">
                        <label class="font-semibold" for="name">Name:</label><br>
                        <input class="rounded bg-gray-100" type="search" id="name" name="name"
                               value="{{ request()->name }}" placeholder=" Enter name.."><br>
                    </div>
                    <div class="py-2">
                        <label class="font-semibold" for="side_country">Side Country:</label><br>
                        <select class="rounded bg-gray-100 px-2" id="side_country" name="side_country">
                            <option @if (request()->side_country == '')
                                        {{ 'selected' }}
                                    @endif value="">All
                            </option>
                            <option @if (request()->side_country == 10)
                                        {{ 'selected' }}
                                    @endif value="10">Ukraine
                            </option>
                            <option @if (request()->side_country == 20)
                                        {{ 'selected' }}
                                    @endif value="20">Russia
                            </option>
                        </select>
                    </div>
                    <div class="py-2">
                        <label class="font-semibold" for="category">Category:</label><br>
                        <select class="rounded bg-gray-100 px-2 overflow-x-scroll" id="category" name="category_id">
                            <option @if (request()->category_id == '')
                                        {{ 'selected' }}
                                    @endif value="">All
                            </option>
                            @foreach($categories as $category)
                                <option @if (request()->category_id == $category->id)
                                            {{ 'selected' }}
                                        @endif value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="py-2">
                        <label class="font-semibold" for="date_from">Date From:</label><br>
                        <input @if (request()->date_from !== '') value="{{ request()->date_from }}"
                               @endif class="rounded bg-gray-100" type="date" id="date_from" name="date_from">
                    </div>
                    <div class="py-2">
                        <label class="font-semibold" for="date_to">Date To:</label><br>
                        <input @if (request()->date_to !== '') value="{{ request()->date_to }}"
                               @endif class="rounded bg-gray-100" type="date" id="date_to" name="date_to">
                    </div>

                    <label class="font-semibold" for="tags">Tags:</label>
                    <div id="tags">
                        <div class="flex flex-row">
                            <input type="checkbox" name="tags[]" value="destroyed" id="destroyed"/>
                            <label class="pl-2" for="destroyed">Destroyed</label>
                        </div>
                        <div class="flex flex-row">
                            <input type="checkbox" name="tags[]" value="damaged" id="damaged"/>
                            <label class="pl-2" for="damaged">Damaged</label>
                        </div>
                        <div class="flex flex-row">
                            <input type="checkbox" name="tags[]" value="abandoned" id="abandoned"/>
                            <label class="pl-2" for="abandoned">Abandoned</label>
                        </div>
                        <div class="flex flex-row">
                            <input type="checkbox" name="tags[]" value="captured" id="captured"/>
                            <label class="pl-2" for="captured">Captured</label>
                        </div>
                    </div>
                    <div class="py-2">
                        <input
                            class="bg-indigo-600 px-2 mr-6 py-2 rounded-md text-white font-semibold tracking-wide cursor-pointer"
                            type="submit" value="Apply">
                        <input
                            class="bg-indigo-600 px-2 py-2 rounded-md text-white font-semibold tracking-wide cursor-pointer"
                            type="reset">
                    </div>
                </form>
            </div>
        </div>

        <div class="flex-auto">
            <div>
                <div class="px-4 py-4 overflow-x-auto">
                    <div class="inline-block min-w-full drop-shadow-md rounded overflow-hidden">
                        <table class="min-w-full leading-normal border-1">
                            <thead
                                class="border-b-2 border-gray-200 bg-gray-100 text-left text-m font-semibold text-gray-600 uppercase tracking-wider">
                            <tr>
                                <th class="px-5 py-3">
                                    Side
                                </th>
                                <th
                                    class="px-5 py-3">
                                    Name
                                </th>
                                <th
                                    class="px-5 py-3">
                                    Category
                                </th>
                                <th
                                    class="px-5 py-3">
                                    Tags
                                </th>
                                <th
                                    class="px-5 py-3">
                                    Date
                                </th>
                                <th
                                    class="px-5 py-3">
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($equipment as $eq)
                                <tr class="border-b border-gray-200 bg-white text-m">
                                    <td class="px-5 py-5">
                                        <div class="flex">
                                            <div class="flex-shrink-0">
                                                @if($eq->side_country == 10)
                                                    <span class="fi fi-ua"></span>
                                                @endif

                                                @if($eq->side_country == 20)
                                                    <span class="fi fi-ru"></span>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-5 py-5">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            {{ $eq->name }}
                                        </p>
                                    </td>
                                    <td class="px-5 py-5">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            {{ $eq->category->name }}
                                        </p>
                                    </td>
                                    <td class="px-5 py-5">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            @foreach($eq->tags as $tag)
                                                {{ $tag->name }}
                                            @endforeach
                                        </p>
                                    </td>
                                    <td class="px-5 py-5">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            {{ $eq->date }}
                                        </p>
                                    </td>
                                    <td class="px-5 py-5">
                                        <a class="text-blue-900 whitespace-no-wrap"
                                           href="{{ route('singleEquipmentPage', [$eq->id]) }}">View</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="px-3 py-3 bg-white flex flex-col items-center">
                            <div class="">
                                {{ $equipment->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
