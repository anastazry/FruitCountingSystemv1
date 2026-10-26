@extends('layouts.app')

@section('content')
@php($calendarToday = now('Asia/Singapore'))


      <!-- Card -->
      <div class="flex flex-col">
        <div class="-m-1.5 overflow-x-auto">

          <div class="p-1.5 w-full min-w-0">
            <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden dark:bg-neutral-800 dark:border-neutral-700">
                          <!-- Calendar -->
<div class="p-3 space-y-0.5 items-center"  >
  <!-- Months -->
  <div class="flex items-center justify-between gap-2 pb-3"  >
    <!-- Prev Button -->
    <div class="col-span-1">
      <button id="prev-month" type="button" class="size-11 flex justify-center items-center text-gray-800 hover:bg-gray-100 rounded-full" aria-label="Previous">
        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
      </button>
    </div>
    <!-- End Prev Button -->

    <!-- Month / Year -->
    <div class="min-w-0 flex flex-wrap justify-center items-center gap-1" >
      <div class="relative">
        <select class="rounded border-gray-300 text-gray-800" id="month-select" aria-label="Month">
    @for($month = 0; $month < 12; $month++)
        <option value="{{ $month }}" @selected($month === $calendarToday->month - 1)>{{ $calendarToday->copy()->startOfYear()->addMonths($month)->format('F') }}</option>
    @endfor
</select>
      </div>

      <span class="text-gray-800 dark:text-neutral-200">/</span>

      <div class="relative">
        <select class="rounded border-gray-300 text-gray-800" id="year-select" aria-label="Year">
    @for($year = $calendarToday->year - 5; $year <= $calendarToday->year + 5; $year++)
        <option value="{{ $year }}" @selected($year === $calendarToday->year)>{{ $year }}</option>
    @endfor
</select>
      </div>
    </div>
    <!-- End Month / Year -->

    <!-- Next Button -->
    <div class="col-span-1 flex justify-end">
      <button id="next-month" type="button" class="size-11 flex justify-center items-center text-gray-800 hover:bg-gray-100 rounded-full" aria-label="Next">
        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
      </button>
    </div>
    <!-- End Next Button -->
  </div>
  <!-- Months -->

  <!-- Weeks -->
  <div class="grid grid-cols-7 text-center text-sm text-gray-500 dark:text-neutral-500">
    <span class="m-px w-10 block text-center text-sm text-gray-500 dark:text-neutral-500">
      Su
    </span>
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

  </div>
  <!-- Weeks -->

<div id="calendar-days" data-today="{{ $calendarToday->format('Y-m-d') }}" class="grid grid-cols-7">
    @for($blank = 0; $blank < $calendarToday->copy()->startOfMonth()->dayOfWeek; $blank++)
        <div></div>
    @endfor
    @for($day = 1; $day <= $calendarToday->daysInMonth; $day++)
        <div><button type="button" class="m-px size-10 rounded-full hover:bg-orange-100 {{ $day === $calendarToday->day ? 'bg-orange-500 text-white' : '' }}" @if($day === $calendarToday->day) aria-current="date" @endif>{{ $day }}</button></div>
    @endfor
</div>
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
                <table class="mobile-records min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
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
                    @forelse($assignments as $assignment)
                      <tr>
                        <td data-label="" class="size-px whitespace-nowrap">
                          <div class="ps-4 py-3">
                            <label for="hs-at-with-checkboxes-1" class="flex">
                              <span class="sr-only">Checkbox</span>
                            </label>
                          </div>
                        </td>
                        <td data-label="No." class="size-px whitespace-nowrap">
                          <div class="ps-6 lg:ps-3 xl:ps-0 pe-6 py-3">
                            <div class="flex items-center gap-x-3">
                              <div class="grow">
                                <span class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">{{$i++}}</span>
                              </div>
                            </div>
                          </div>
                        </td>
                        <td data-label="Peringkat" class="size-px whitespace-nowrap">
                          <div class="ps-6 lg:ps-3 xl:ps-0 pe-6 py-3">
                            <div class="flex items-center gap-x-3">
                              <div class="grow">
                                <span class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">{{ $assignment->peringkat }}</span>
                              </div>
                            </div>
                          </div>
                        </td>
                        <td data-label="Blok" class="h-px w-56 whitespace-nowrap px-4 py-3">
                          <span class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">{{$assignment->blok}}</span>
                        </td>
                        <td data-label="No Lot" class="h-px w-56 whitespace-nowrap px-4 py-3">
                          <span class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">{{$assignment->n_lot}}</span>
                        </td>
                        <td data-label="No Pentas Tuai" class="h-px w-56 whitespace-nowrap px-4 py-3">
                          <span class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">{{$assignment->n_p_tuai}}</span>
                        </td>
                        <td data-label="Status Pengiraan" class="size-px whitespace-nowrap px-4 py-3">
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
                        <td data-label="Status Penghantaran" class="size-px whitespace-nowrap px-4 py-3">
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
                        <td data-label="Aksi" class="h-px w-px whitespace-nowrap text-center">
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
                    @empty
<tr><td colspan="9" class="p-6 text-center text-gray-500">Tiada tugasan. Tambah tugasan untuk bermula.</td></tr>
@endforelse
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



      </div>
@endsection
