@extends('layouts.app')

@section('content')


      <!-- Card -->
      <div class="flex flex-col">
        <div class="-m-1.5 overflow-x-auto">
          
          <div class="p-1.5 min-w-full inline-block align-middle">
            <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden dark:bg-neutral-800 dark:border-neutral-700">
                          <!-- Calendar -->
<div class="p-3 space-y-0.5 items-center"  >
  <!-- Months -->
  <div class="grid grid-cols-5 items-center gap-x-3 mx-1.5 pb-3"  >
    <!-- Prev Button -->
    <div class="col-span-1">
      <button id="prev-month" type="button" class="size-8 flex justify-center items-center text-gray-800 hover:bg-gray-100 rounded-full" aria-label="Previous">
        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
      </button>
    </div>
    <!-- End Prev Button -->

    <!-- Month / Year -->
    <div class="col-span-3 flex justify-center items-center gap-x-1" >
      <div class="relative">
        <select data-hs-select='{
            "placeholder": "Select month",
            "toggleTag": "<button type=\"button\" aria-expanded=\"false\"></button>",
            "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative flex text-nowrap w-full cursor-pointer text-start font-medium text-gray-800 hover:text-blue-600 focus:outline-none focus:text-blue-600 before:absolute before:inset-0 before:z-[1] dark:text-neutral-200 dark:hover:text-blue-500 dark:focus:text-blue-500",
            "dropdownClasses": "mt-2 z-50 w-32 max-h-72 p-1 space-y-0.5 bg-white border border-gray-200 rounded-lg shadow-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500 dark:bg-neutral-900 dark:border-neutral-700",
            "optionClasses": "p-2 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:text-neutral-200 dark:focus:bg-neutral-800",
            "optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"hidden hs-selected:block\"><svg class=\"shrink-0 size-3.5 text-gray-800 dark:text-neutral-200\" xmlns=\"http:.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"/></svg></span></div>"
          }' class="hidden" id="month-select">
          <option value="0">January</option>
          <option value="1">February</option>
          <option value="2">March</option>
          <option value="3" selected>April</option>
          <option value="4">May</option>
          <option value="5">June</option>
          <option value="6" >July</option>
          <option value="7">August</option>
          <option value="8" >September</option>
          <option value="9">October</option>
          <option value="10">November</option>
          <option value="11">December</option>
        </select>
      </div>

      <span class="text-gray-800 dark:text-neutral-200">/</span>

      <div class="relative">
        <select data-hs-select='{
            "placeholder": "Select year",
            "toggleTag": "<button type=\"button\" aria-expanded=\"false\"></button>",
            "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative flex text-nowrap w-full cursor-pointer text-start font-medium text-gray-800 hover:text-blue-600 focus:outline-none focus:text-blue-600 before:absolute before:inset-0 before:z-[1] dark:text-neutral-200 dark:hover:text-blue-500 dark:focus:text-blue-500",
            "dropdownClasses": "mt-2 z-50 w-20 max-h-72 p-1 space-y-0.5 bg-white border border-gray-200 rounded-lg shadow-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500 dark:bg-neutral-900 dark:border-neutral-700",
            "optionClasses": "p-2 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:text-neutral-200 dark:focus:bg-neutral-800",
            "optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"hidden hs-selected:block\"><svg class=\"shrink-0 size-3.5 text-gray-800 dark:text-neutral-200\" xmlns=\"http:.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"/></svg></span></div>"
          }' class="hidden" id="year-select">
          <option>2023</option>
          <option>2024</option>
          <option selected>2025</option>
        </select>
      </div>
    </div>
    <!-- End Month / Year -->

    <!-- Next Button -->
    <div class="col-span-1 flex justify-end">
      <button id="next-month" type="button" class="size-8 flex justify-center items-center text-gray-800 hover:bg-gray-100 rounded-full" aria-label="Next">
        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
      </button>
    </div>
    <!-- End Next Button -->
  </div>
  <!-- Months -->

  <!-- Weeks -->
  <div class="grid grid-cols-7 text-center text-sm text-gray-500 dark:text-neutral-500" style="margin-left: 7%">
    <span class="m-px w-10 block text-center text-sm text-gray-500 dark:text-neutral-500" >
      Mo
    </span>
    <span class="m-px w-10 block text-center text-sm text-gray-500 dark:text-neutral-500">
      Tu
    </span>
    <span class="m-px w-10 block text-center text-sm text-gray-500 dark:text-neutral-500">
      We
    </span>
    <span class="m-px w-10 block text-center text-sm text-gray-500 dark:text-neutral-500">
      Th
    </span>
    <span class="m-px w-10 block text-center text-sm text-gray-500 dark:text-neutral-500">
      Fr
    </span>
    <span class="m-px w-10 block text-center text-sm text-gray-500 dark:text-neutral-500">
      Sa
    </span>
    <span class="m-px w-10 block text-center text-sm text-gray-500 dark:text-neutral-500">
      Su
    </span>
  </div>
  <!-- Weeks -->

  <!-- Days -->
  <div class="grid grid-cols-7" style="margin-left: 7%">
    <div>
      <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200" disabled>
        26
      </button>
    </div>
    <div>
      <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200" disabled>
        27
      </button>
    </div>
    <div>
      <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200" disabled>
        28
      </button>
    </div>
    <div>
      <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200" disabled>
        29
      </button>
    </div>
    <div>
      <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200" disabled>
        30
      </button>
    </div>
    <div>
      <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200" disabled>
        31
      </button>
    </div>
    <div>
      <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">
        1
      </button>
    </div>

  </div>
  <!-- Days -->

  <!-- Days -->
  <div class="grid grid-cols-7" style="margin-left: 7%">
    <div>
      <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">
        2
      </button>
    </div>
    <div>
      <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">
        3
      </button>
    </div>
    <div>
      <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">
        4
      </button>
    </div>
    <div >
      <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">
        5
      </button>
    </div>
    <div >
      <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">
        6
      </button>
    </div>
    <div >
      <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">
        7
      </button>
    </div>
    <div >
      <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">
        8
      </button>
    </div>

  </div>
  <!-- Days -->

  <!-- Days -->
  <div class="grid grid-cols-7" style="margin-left: 7%">
    <div >
      <button type="button" class="bg-green-600 m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">
        9
      </button>
    </div>
    <div >
      <button type="button" class="bg-green-600 m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">
        10
      </button>
    </div>
    <div >
      <button type="button" class="bg-green-600 m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">
        11
      </button>
    </div>
    <div>
      <a href="{{ route('admin.missing-assignment-1') }}">
        <button type="button" class="bg-red-600 m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">
          12
        </button>
      </a>
    </div>
    
    <div>
      <a href="{{ route('admin.missing-assignment-2') }}">
        <button type="button" class="bg-red-600 m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">
          13
        </button>
      </a>

    </div>
    <div>
      <button type="button" class=" bg-green-600 m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">
        14
      </button>
    </div>
    <div>
      <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200 bg-green-600">
        15
      </button>
    </div>

  </div>
  <!-- Days -->

  <!-- Days -->
  <div class="grid grid-cols-7" style="margin-left: 7%">
    <div>
      <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200 bg-green-600">
        16
      </button>
    </div>
    <div>
      <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200 bg-green-600">
        17
      </button>
    </div>
    <div>
      <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200 bg-green-600">
        18
      </button>
    </div>
    <div>
      <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-white disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-white dark:text-neutral-200 bg-blue-600">
        19
      </button>
    </div>
    <div>
      <button type="button" class="bg-red-600 m-px size-10 flex justify-center items-center  border border-transparent text-sm font-medium text-grey-800 hover:border-blue-600 rounded-full dark:bg-blue-500 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-100 dark:hover:border-neutral-700">
        20
      </button>
    </div>
    <div>
      <button type="button" class="bg-red-600 m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">
        21
      </button>
    </div>
    <div>
      <button type="button" class="bg-red-600 m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">
        22
      </button>
    </div>

  </div>
  <!-- Days -->

  <!-- Days -->
  <div class="grid grid-cols-7" style="margin-left: 7%">
    <div>
      <button type="button" class="bg-red-600 m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">
        23
      </button>
    </div>
    <div>
      <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">
        24
      </button>
    </div>
    <div >
        <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">
        25
      </button>
    </div>
    <div >
      <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">
        26
      </button>
    </div>
    <div >
      <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">
        27
      </button>
    </div>
    <div >
      <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">
        28
      </button>
    </div>
    <div >
      <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">
        29
      </button>
    </div>

  </div>
  <!-- Days -->

  <!-- Days -->
  <div class="grid grid-cols-7" style="margin-left: 7%">
    <div >
      <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">
        30
      </button>
    </div>
    <div >
      <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">
        31
      </button>
    </div>
    <div >
      <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 hover:border-blue-600 hover:text-blue-600 rounded-full disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-100 dark:text-neutral-200 dark:hover:border-neutral-500 dark:focus:bg-neutral-700" disabled>
        1
      </button>
    </div>
    <div>
      <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 hover:border-blue-600 hover:text-blue-600 rounded-full disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-100 dark:text-neutral-200 dark:hover:border-neutral-500 dark:focus:bg-neutral-700" disabled>
        2
      </button>
    </div>
    <div>
      <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 hover:border-blue-600 hover:text-blue-600 rounded-full disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-100 dark:text-neutral-200 dark:hover:border-neutral-500 dark:focus:bg-neutral-700" disabled>
        3
      </button>
    </div>
    <div>
      <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 hover:border-blue-600 hover:text-blue-600 rounded-full disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-100 dark:text-neutral-200 dark:hover:border-neutral-500 dark:focus:bg-neutral-700" disabled>
        4
      </button>
    </div>
    <div>
      <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 hover:border-blue-600 hover:text-blue-600 rounded-full disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-100 dark:text-neutral-200 dark:hover:border-neutral-500 dark:focus:bg-neutral-700" disabled>
        5
      </button>
    </div>

  </div>
  <!-- Days -->
</div>

            </div>
            <br>
            <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden dark:bg-neutral-800 dark:border-neutral-700">
              <!-- Header -->
              <div class="px-4 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200 dark:border-neutral-700">
                <div>
                  <h2 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">
                    Senarai Tugasan 
                  </h2>
                  <p class="text-sm text-gray-600 dark:text-neutral-400">
                      Senarai Peringkat, Blok, Platform anda
                  </p>
                </div>

                <div>
                  <div class="inline-flex gap-x-2">
                    @if(Auth::check() && Auth::user()->role == "Admin")
                    <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none" href="{{ route('admin.create-qr') }}">
                      <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14" />
                        <path d="M12 5v14" />
                      </svg>
                      Tambah Tugasan
                    </a>
                    @endif
                  </div>
                </div>
              </div>

              <!-- Table -->
              <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                  <thead class="bg-gray-50 dark:bg-neutral-800">
                    <tr>
                      <th scope="col" class="ps-4 py-3 text-start">
                        <span class="sr-only">Checkbox</span>
                      </th>

                      <th scope="col" class="ps-6 lg:ps-3 xl:ps-0 pe-6 py-3 text-start">
                        <div class="flex items-center gap-x-2">
                          <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                            No.
                          </span>
                        </div>
                      </th>

                      <th scope="col" class="px-4 py-3 text-start">
                        <div class="flex items-center gap-x-2">
                          <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                            Peringkat
                          </span>
                        </div>
                      </th>

                      <th scope="col" class="px-4 py-3 text-start">
                        <div class="flex items-center gap-x-2">
                          <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                            Blok
                          </span>
                        </div>
                      </th>

                      <th scope="col" class="px-4 py-3 text-start">
                        <div class="flex items-center gap-x-2">
                          <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                            No Lot
                          </span>
                        </div>
                      </th>

                      <th scope="col" class="px-4 py-3 text-start">
                        <div class="flex items-center gap-x-2">
                          <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                            No Pentas Tuai
                          </span>
                        </div>
                      </th>

                      <th scope="col" class="px-4 py-3 text-start">
                        <div class="flex items-center gap-x-2">
                          <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                            Status Pengiraan
                          </span>
                        </div>
                      </th>

                      <th scope="col" class="px-4 py-3 text-start">
                        <div class="flex items-center gap-x-2">
                          <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                            Status Penghantaran
                          </span>
                        </div>
                      </th>

                      <th scope="col" class="px-4 py-3 text-center">Aksi</th>
                    </tr>
                  </thead>

                  <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                    @php($i=1)
                    @foreach($assignments as $assignment)
                      <tr>
                        <td class="size-px whitespace-nowrap">
                          <div class="ps-4 py-3">
                            <label for="hs-at-with-checkboxes-1" class="flex">
                              <span class="sr-only">Checkbox</span>
                            </label>
                          </div>
                        </td>
                        <td class="size-px whitespace-nowrap">
                          <div class="ps-6 lg:ps-3 xl:ps-0 pe-6 py-3">
                            <div class="flex items-center gap-x-3">
                              <div class="grow">
                                <span class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">{{$i++}}</span> 
                              </div>
                            </div>
                          </div>
                        </td>
                        <td class="size-px whitespace-nowrap">
                          <div class="ps-6 lg:ps-3 xl:ps-0 pe-6 py-3">
                            <div class="flex items-center gap-x-3">
                              <div class="grow">
                                <span class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">{{ $assignment->peringkat }}</span> 
                              </div>
                            </div>
                          </div>
                        </td>
                        <td class="h-px w-56 whitespace-nowrap px-4 py-3">
                          <span class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">{{$assignment->blok}}</span>
                        </td>
                        <td class="h-px w-56 whitespace-nowrap px-4 py-3">
                          <span class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">{{$assignment->n_lot}}</span>
                        </td>
                        <td class="h-px w-56 whitespace-nowrap px-4 py-3">
                          <span class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">{{$assignment->n_p_tuai}}</span>
                        </td>
                        <td class="size-px whitespace-nowrap px-4 py-3">
                          @if($assignment->stats == 'Selesai')
                            <span class="py-1 px-1.5 inline-flex items-center gap-x-1 text-xs font-medium bg-teal-100 text-teal-800 rounded-full dark:bg-teal-500/10 dark:text-teal-500">
                              <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                              </svg>
                              Selesai
                            </span>
                          @else
                            <span class="py-1 px-1.5 inline-flex items-center gap-x-1 text-xs font-medium bg-red-100 text-red-800 rounded-full dark:bg-red-500/10 dark:text-red-500">
                              <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6.002a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                              </svg>
                              Belum Selesai
                            </span>
                          @endif
                        </td>
                        <td class="size-px whitespace-nowrap px-4 py-3">
                          @if($assignment->delivery_status == 'Selesai')
                            <span class="py-1 px-1.5 inline-flex items-center gap-x-1 text-xs font-medium bg-teal-100 text-teal-800 rounded-full dark:bg-teal-500/10 dark:text-teal-500">
                              <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                              </svg>
                              {{-- Selesai --}}
                              {{$assignment->delivery_status}}
                            </span>
                          @elseif($assignment->delivery_status == 'Dalam Perjalanan')
                            <span class="py-1 px-1.5 inline-flex items-center gap-x-1 text-xs font-medium bg-yellow-300 text-gray-800 rounded-full dark:bg-red-500/10 dark:text-red-500">
                              <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6.002a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                              </svg>
                              Dalam Perjalanan
                            </span>
                          @else
                            <span class="py-1 px-1.5 inline-flex items-center gap-x-1 text-xs font-medium bg-red-100 text-red-800 rounded-full dark:bg-red-500/10 dark:text-red-500">
                              <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6.002a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                              </svg>
                              Belum Selesai
                            </span>
                          @endif
                        </td>
                        <td class="h-px w-px whitespace-nowrap text-center">
                          @if($assignment->stats == 'Selesai' || isset($assignment->delivery_status))
                          <a class="inline-flex items-center gap-x-1.5 text-sm font-medium text-blue-600 decoration-2 hover:underline focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-600 dark:text-blue-500 dark:focus:ring-offset-neutral-800" href="{{ route('editFruitDetails', ['assignment_id' => $assignment->id, 'fruit_id' => $assignment->fruit_id]) }}">
                            Ubah Kira
                          </a>
                          @else
                          <a class="inline-flex items-center gap-x-1.5 text-sm font-medium text-blue-600 decoration-2 hover:underline focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-600 dark:text-blue-500 dark:focus:ring-offset-neutral-800" href="{{ route('mandor-update-fruit-details', ['assignment_id' => $assignment->id]) }}">
                            Mula Kira
                          </a>
                          @endif
                          <br>
                          @if(Auth::check() && Auth::user()->role == "Admin")
                          <a class="inline-flex items-center gap-x-1.5 text-sm font-medium text-blue-600 decoration-2 hover:underline focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-600 dark:text-blue-500 dark:focus:ring-offset-neutral-800" href="{{ route('admin.create-qrcode', ['assignment_id' => $assignment->id]) }}">
                            Print QR
                          </a>
                          <br>
                            <a class="inline-flex items-center gap-x-1.5 text-sm font-medium text-blue-600 decoration-2 hover:underline focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-600 dark:text-blue-500 dark:focus:ring-offset-neutral-800" href="{{ route('admin.update-assignment', ['assignment_id' => $assignment->id]) }}">
                              Edit
                            </a>
                            <br>
                            <a class="inline-flex items-center gap-x-1.5 text-sm font-medium text-blue-600 decoration-2 hover:underline focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-600 dark:text-blue-500 dark:focus:ring-offset-neutral-800" href="{{ route('driver-confirmation', ['assignment_id' => $assignment->id]) }}">
                              Driver
                            </a>
                          @endif
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>

              <!-- Pagination -->
              {{-- <div class="px-6 py-4 border-t border-gray-200 dark:border-neutral-700">
                <div class="flex justify-center items-center">
                  {{ $assignments->links() }}
                </div>
              </div> --}}
            </div>
          </div>
        </div>
        <script>
          document.addEventListener('DOMContentLoaded', function () {
  const monthSelect = document.getElementById('month-select');
  const yearSelect = document.getElementById('year-select');
  const prevButton = document.getElementById('prev-month');
  const nextButton = document.getElementById('next-month');

  prevButton.addEventListener('click', function () {
    let currentMonth = parseInt(monthSelect.value);
    let currentYear = parseInt(yearSelect.value);

    if (currentMonth === 0) { // If it's January
      monthSelect.value = 11; // Set to December
      yearSelect.value = currentYear - 1; // Decrease year
    } else {
      monthSelect.value = currentMonth - 1; // Go to previous month
    }
    updateCalendar();
  });

  nextButton.addEventListener('click', function () {
    let currentMonth = parseInt(monthSelect.value);
    let currentYear = parseInt(yearSelect.value);

    if (currentMonth === 11) { // If it's December
      monthSelect.value = 0; // Set to January
      yearSelect.value = currentYear + 1; // Increase year
    } else {
      monthSelect.value = currentMonth + 1; // Go to next month
    }
    updateCalendar();
  });

  function updateCalendar() {
    const selectedMonth = monthSelect.options[monthSelect.selectedIndex].text;
    const selectedYear = yearSelect.value;
    console.log(`Updating calendar for: ${selectedMonth} ${selectedYear}`);
    // Call your function to update the calendar display here.
  }
});

        </script>

      
      </div>
@endsection
