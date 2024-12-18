@extends('layouts.app-layout')

@section('content')
<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
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
                <th scope="col" class="px-6 py-3">
                    Schedule Date
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
<td class="px-6 py-4">
{{$user->schedule_date}}
</td>
</tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
