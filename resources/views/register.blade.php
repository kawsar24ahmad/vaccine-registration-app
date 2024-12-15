@extends('layouts.app-layout')

@section('content')
<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
  <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
  @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <form class="space-y-6" action="{{route('users.store')}}" method="POST">
        @csrf
      <div>
        <label for="name" class="block text-sm leading-6 font-medium text-gray-900">Name</label>
        <div class="mt-2">
          <input id="name" name="name" type="text" autocomplete="name" aria-label="Name" required
                 class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm leading-6">
        </div>
      </div>

      <div>
        <label for="email" class="block text-sm leading-6 font-medium text-gray-900">Email Address</label>
        <div class="mt-2">
          <input id="email" name="email" type="email" autocomplete="email" aria-label="Email Address" required
                 class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm leading-6">
        </div>
      </div>

      <div>
        <label for="nid" class="block text-sm leading-6 font-medium text-gray-900">National ID</label>
        <div class="mt-2">
          <input id="nid" name="nid" type="text" autocomplete="off" aria-label="National ID" required
                 class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm leading-6">
        </div>
      </div>

      <div>
        <label for="phone_number" class="block text-sm leading-6 font-medium text-gray-900">Phone Number</label>
        <div class="mt-2">
          <input id="phone_number" name="phone_number" type="tel" autocomplete="tel" aria-label="Phone Number" required
                 class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm leading-6">
        </div>
      </div>

      <div>
  <label for="vaccine_center_id" class="block text-sm leading-6 font-medium text-gray-900">Vaccine Center</label>
  <div class="mt-2">
    <select name="vaccine_center_id" id="vaccine_center_id" required
            class="block w-full rounded-md border-0 py-1.5 text-gray-900 bg-white shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm leading-6">
      <option  selected disabled class="text-gray-500">Select a Vaccine Center</option>
      @foreach ($vaccine_centers as $vaccine_center)
        <option value="{{ $vaccine_center->id }}" class="text-gray-900">{{ $vaccine_center->center_name }}</option>
      @endforeach
    </select>
  </div>
</div>




      <div>
        <button type="submit"
                class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm leading-6 font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
         Register
        </button>
      </div>
    </form>
  </div>
</div>
@endsection
