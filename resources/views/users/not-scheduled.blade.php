@extends('layouts.app-layout')

@section('content')
<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
    <caption class="p-5 text-lg font-semibold text-center rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800">
            Not Scheduled Users
        </caption>
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Email
                </th>
                <th scope="col" class="px-6 py-3">
                    NID
                </th>
                <th scope="col" class="px-6 py-3">
                    Phone Number
                </th>
                <th scope="col" class="px-6 py-3">
                    Vaccine Center
                </th>
                <th scope="col" class="px-6 py-3">
                    Status
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">

<th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
    {{$user->name}}
</th>
<td class="px-6 py-4">
{{$user->email}}
</td>
<td class="px-6 py-4">
{{$user->nid}}
</td>
<td class="px-6 py-4">
{{$user->phone_number}}
</td>
<td class="px-6 py-4">
<a href="{{route('vaccine_centers.show', $user->vaccine_center->id)}}">{{$user->vaccine_center->center_name}}</a>
</td>
<td class="px-6 py-4">
{{$user->status}}
</td>
</tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
