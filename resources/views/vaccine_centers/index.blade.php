@extends('layouts.app-layout')

@section('content')
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <caption class="p-5 text-lg font-semibold text-center rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800">
            All Vaccine Centers

        </caption>

        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Address
                </th>
                <th scope="col" class="px-6 py-3">
                    Daily Limit
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($vaccine_centers as $vaccine_center)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">

<th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
    <a href="{{route('vaccine_centers.show', $vaccine_center->id)}}">{{$vaccine_center->center_name}}</a>
</th>
<td class="px-6 py-4">
{{$vaccine_center->address}}
</td>
<td class="px-6 py-4">
{{$vaccine_center->daily_limit}}
</td>
</tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
