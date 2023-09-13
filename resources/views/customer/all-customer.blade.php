@extends('layouts.esandhai-slate')
@section('content')
    <style>
        #myTable {
            display: none;
            /* Hide the table initially */
        }
    </style>
    <!-- Customers title -->
    <div class="customers-title mt-4 flex justify-between">
        <!-- to split into two divisions -->
        <div>
            <!-- to text below the customers title -->
            <div class="customers-left flex">
                <svg xmlns="http://www.w3.org/2000/svg" class="fill-[rgba(27,137,67,255)] m-[2px] pr-2 h-7" height="1em"
                    viewBox="0 0 640 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                    <path
                        d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192h42.7c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0H21.3C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7h42.7C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3H405.3zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352H378.7C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7H154.7c-14.7 0-26.7-11.9-26.7-26.7z" />
                </svg>
                <h2 class="text-[rgba(27,137,67,255)] font-bold text-xl">Customers</h2>
            </div>
            <!-- text below the customers title -->
            <div>
                <h4 class="flex text-green-600 font-semibold">Home <p class="text-[#b3d2be] font-normal ml-2"> /
                        Customers
                    </p>
                </h4>
            </div>
        </div>
        <!-- for the customers title right side top -->
        <div class="customers-right relative">
            <strong class="text-gray-800 h-[16px] pl-3">
                <!-- <div class="w-3 h-3 absolute mx-2 top-[7px] align-middle bg-red-600 rounded-circle"></div> -->
                <h1 class="flex items-center">[<div class="blinking-round ml-1 bg-red-500 w-3 h-3 rounded-full">
                    </div>
                    <p class="pl-1 pr-1 text-xs" id="live-time">
                    </p>]
                </h1>

                <script>
                    function updateLiveTime() {
                        const liveTimeElement = document.getElementById('live-time');
                        const currentTime = new Date(); // Creating a new Date object with the current date and time

                        // Formatting the current time as a string in the desired format(d, M, Y h: i)
                        const formattedTime =
                            `${currentTime.toLocaleString('default', { day:'numeric', weekday: 'short', month: 'short', year: 'numeric', hour: '2-digit', minute: '2-digit', second: '2-digit' })}`;

                        liveTimeElement.textContent = formattedTime;
                        // liveTimeElement.textContent = currentTime.toLocaleTimeString();
                    }
                    // Call the function to update the live time when needed
                    updateLiveTime();
                    setInterval(updateLiveTime, 1000);
                </script>
            </strong>

        </div>
    </div>
    <!-- customers table -->
    <div class="w-full px-3 py-1 mt-3 bg-white shadow-lg">
        <p class="font-semibold mt-2 text-[16px] text-green-600">Customers List</p>
        <!-- for csv, excel, filter formats -->
        <div class="flex justify-between mt-4 mb-2 pb-1">
            <div class="flex absolute top-[125px] customers-table px-1 border-[.5px] mt-4 border-blue-600 rounded">
                <!-- <div class="flex"> -->
                <a href="{{ route('export.csv') }}"
                    class="flex text-blue-600 z-10 p-[2px] pr-2 text-sm border-r-[.5px] border-blue-600"><svg
                        xmlns="http://www.w3.org/2000/svg" class="fill-blue-600 ml-1 mr-1 mt-[.5px]" height="1em"
                        viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <path
                            d="M64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V160H256c-17.7 0-32-14.3-32-32V0H64zM256 0V128H384L256 0zM112 256H272c8.8 0 16 7.2 16 16s-7.2 16-16 16H112c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64H272c8.8 0 16 7.2 16 16s-7.2 16-16 16H112c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64H272c8.8 0 16 7.2 16 16s-7.2 16-16 16H112c-8.8 0-16-7.2-16-16s7.2-16 16-16z" />
                    </svg>CSV</a>
                <a href="{{ route('export.excel') }}"
                    class="flex text-blue-600 z-10 p-[2px] pr-2 text-sm border-r-[.5px] border-blue-600"><svg
                        xmlns="http://www.w3.org/2000/svg" class="fill-blue-600 ml-1 mr-1 mt-[.5px]" height="1em"
                        viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <path
                            d="M48 448V64c0-8.8 7.2-16 16-16H224v80c0 17.7 14.3 32 32 32h80V448c0 8.8-7.2 16-16 16H64c-8.8 0-16-7.2-16-16zM64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V154.5c0-17-6.7-33.3-18.7-45.3L274.7 18.7C262.7 6.7 246.5 0 229.5 0H64zm90.9 233.3c-8.1-10.5-23.2-12.3-33.7-4.2s-12.3 23.2-4.2 33.7L161.6 320l-44.5 57.3c-8.1 10.5-6.3 25.5 4.2 33.7s25.5 6.3 33.7-4.2L192 359.1l37.1 47.6c8.1 10.5 23.2 12.3 33.7 4.2s12.3-23.2 4.2-33.7L222.4 320l44.5-57.3c8.1-10.5 6.3-25.5-4.2-33.7s-25.5-6.3-33.7 4.2L192 280.9l-37.1-47.6z" />
                    </svg>Excel</a>
                <a href="{{ route('export.pdf') }}" class="flex text-blue-600 z-10 p-[2px] text-sm"><svg
                        xmlns="http://www.w3.org/2000/svg" class="fill-blue-600 ml-1 mr-1 mt-[.5px]" height="1em"
                        viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <path
                            d="M3.9 54.9C10.5 40.9 24.5 32 40 32H472c15.5 0 29.5 8.9 36.1 22.9s4.6 30.5-5.2 42.5L320 320.9V448c0 12.1-6.8 23.2-17.7 28.6s-23.8 4.3-33.5-3l-64-48c-8.1-6-12.8-15.5-12.8-25.6V320.9L9 97.3C-.7 85.4-2.8 68.8 3.9 54.9z" />
                    </svg>Advanced Filter (0)</a>
                <!-- </div> -->
            </div>
        </div>
        <!-- table start -->
        <div class="pb-2">
            <table
                class="display relative text-xs min-w-full table-auto mt-8 stripe hover border cell-border mb-8 text-ellipsis"
                id="myTable">
                <thead class="bg-slate-100 border">
                    <tr class="border">
                        <th rowspan="2" class="border">Customer Name</th>
                        <th rowspan="2" class="border">Status</th>
                        <th rowspan="2" class="border">Lat Lng</th>
                        <th colspan="2" class="border">Total</th>
                        <th colspan="3" class="border">Date</th>
                        <th rowspan="2" class="border">Score</th>
                        <th rowspan="2" class="border">Category</th>
                        <th rowspan="2" class="border">Action</th>
                    <tr class="border">
                        <th class="border">Orders</th>
                        <th class="border">Amount</th>
                        <th class="border">Onboarded</th>
                        <th class="border">First Ordered</th>
                        <th class="border">Last Ordered</th>
                    </tr>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customers as $customer)
                        <tr class="bg-slate-50 cell-border">
                            <td class="font-semibold">
                                {{ $customer->customername }}</td>
                            <td class="font-semibold">
                                <svg xmlns="http://www.w3.org/2000/svg" height="1.0em" class="fill-red-400"
                                    viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                    <path
                                        d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
                                </svg>
                            </td>
                            <td class="font-semibold">
                                <svg xmlns="http://www.w3.org/2000/svg" height="1.0em" class="pl-6 fill-green-700"
                                    viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                    <path
                                        d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z" />
                                </svg>
                            </td>
                            <td class="font-semibold">
                                {{ $customer->orders }}
                            </td>
                            <td class="font-semibold">
                                &#8377 {{ $customer->amount }}</td>
                            <td class="font-semibold">
                                {{ \Carbon\Carbon::parse($customer->onboarded)->format('D, jS M, Y') }}</td>
                            <td class="font-semibold">
                                {{ \Carbon\Carbon::parse($customer->firstordered)->format('D, jS M, Y') }}</td>
                            </td>
                            <td class="font-semibold">
                                {{ \Carbon\Carbon::parse($customer->lastordered)->format('D, jS M, Y') }}</td>
                            </td>
                            <td class="font-semibold">
                                {{ $customer->score }}</td>
                            <td class="font-semibold">
                                <div class="flex items-center"><svg xmlns="http://www.w3.org/2000/svg" height="1.0em"
                                        class="fill-blue-300 pr-3"
                                        viewBox="0 0 640 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                        <path
                                            d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3zM504 312V248H440c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V136c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H552v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z" />
                                    </svg>
                                    <p class="text-xs text-gray-900 font-semibold">New Onboard</p>
                                </div>
                            </td>
                            <td class="font-semibold">
                                <div class="flex justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="1.0em" class="fill-blue-600 px-1"
                                        viewBox="0 0 460 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                        <path
                                            d="M220.6 130.3l-67.2 28.2V43.2L98.7 233.5l54.7-24.2v130.3l67.2-209.3zm-83.2-96.7l-1.3 4.7-15.2 52.9C80.6 106.7 52 145.8 52 191.5c0 52.3 34.3 95.9 83.4 105.5v53.6C57.5 340.1 0 272.4 0 191.6c0-80.5 59.8-147.2 137.4-158zm311.4 447.2c-11.2 11.2-23.1 12.3-28.6 10.5-5.4-1.8-27.1-19.9-60.4-44.4-33.3-24.6-33.6-35.7-43-56.7-9.4-20.9-30.4-42.6-57.5-52.4l-9.7-14.7c-24.7 16.9-53 26.9-81.3 28.7l2.1-6.6 15.9-49.5c46.5-11.9 80.9-54 80.9-104.2 0-54.5-38.4-102.1-96-107.1V32.3C254.4 37.4 320 106.8 320 191.6c0 33.6-11.2 64.7-29 90.4l14.6 9.6c9.8 27.1 31.5 48 52.4 57.4s32.2 9.7 56.8 43c24.6 33.2 42.7 54.9 44.5 60.3s.7 17.3-10.5 28.5zm-9.9-17.9c0-4.4-3.6-8-8-8s-8 3.6-8 8 3.6 8 8 8 8-3.6 8-8z" />
                                    </svg><svg xmlns="http://www.w3.org/2000/svg" height="1.0em"
                                        class="fill-blue-600 px-1"
                                        viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                        <path
                                            d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z" />
                                    </svg><svg xmlns="http://www.w3.org/2000/svg" height="1.0em"
                                        class="fill-blue-600 px-1"
                                        viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                        <path
                                            d="M347.1 24.6c7.7-18.6 28-28.5 47.4-23.2l88 24C499.9 30.2 512 46 512 64c0 247.4-200.6 448-448 448c-18 0-33.8-12.1-38.6-29.5l-24-88c-5.3-19.4 4.6-39.7 23.2-47.4l96-40c16.3-6.8 35.2-2.1 46.3 11.6L207.3 368c70.4-33.3 127.4-90.3 160.7-160.7L318.7 167c-13.7-11.2-18.4-30-11.6-46.3l40-96z" />
                                    </svg>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <script>
                    $(document).ready(function() {
                        $('#myTable').DataTable({
                            language: {
                                search: 'Search Customer :',
                                info: '_START_ to _END_ of _TOTAL_ Customer',
                            },
                            pageLength: 5,
                            paging: true,
                            dom: '<"toolbar">frtip',
                        });
                        $('.dataTables_filter input').css('margin-bottom', '10px');
                        $('.dataTables_filter input').css('margin-left', '8px');
                        $('.dataTables_filter input').css('height', '28px');

                        $('#myTable').css('display', 'table');
                    });
                    document.querySelector('div.toolbar').innerHTML = '';

                    Highcharts.chart('demo-output', {
                        chart: {
                            type: 'bar' // Change to the desired chart type
                        },
                        title: {
                            text: 'Sample Chart'
                        },
                        xAxis: {
                            categories: ['Category 1', 'Category 2', 'Category 3']
                        },
                        yAxis: {
                            title: {
                                text: 'Value'
                            }
                        },
                        series: [{
                            name: 'Data Series',
                            data: [10, 20, 30] // Replace with your data
                        }]
                    });
                </script>
            </table>
            <br>

            <!-- for pagination start -->
            <!-- for pagination end -->
        </div>
        <hr>
        <!-- table end -->

        <!-- start for three small tables -->
        <div class="no-filters mt-4">
            <div class="flex justify-between py-1 h-10 no-filter-head">
                <div class="flex no-filter-left h-full align-middle">
                    <svg xmlns="http://www.w3.org/2000/svg" class="mt-1 mr-1 fill-gray-500" height="1em"
                        viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <path
                            d="M3.9 22.9C10.5 8.9 24.5 0 40 0H472c15.5 0 29.5 8.9 36.1 22.9s4.6 30.5-5.2 42.5L396.4 195.6C316.2 212.1 256 283 256 368c0 27.4 6.3 53.4 17.5 76.5c-1.6-.8-3.2-1.8-4.7-2.9l-64-48c-8.1-6-12.8-15.5-12.8-25.6V288.9L9 65.3C-.7 53.4-2.8 36.8 3.9 22.9zM432 224a144 144 0 1 1 0 288 144 144 0 1 1 0-288zm59.3 107.3c6.2-6.2 6.2-16.4 0-22.6s-16.4-6.2-22.6 0L432 345.4l-36.7-36.7c-6.2-6.2-16.4-6.2-22.6 0s-6.2 16.4 0 22.6L409.4 368l-36.7 36.7c-6.2 6.2-6.2 16.4 0 22.6s16.4 6.2 22.6 0L432 390.6l36.7 36.7c6.2 6.2 16.4 6.2 22.6 0s6.2-16.4 0-22.6L454.6 368l36.7-36.7z" />
                    </svg>
                    <p class="text-gray-600">No Filters</p>
                </div>
                <div class="no-filter-right">
                    <p class="border border-gray-200 text-slate-500 px-1">Clear All</p>
                </div>
            </div>
            <div class="flex justify-between mt-4 three-tables">
                <!-- first table start -->
                <div class="table-1 h-56  mr-1 pt-1 text-sm w-1/3">
                    <div class="flex justify-between rounded">
                        <div class="table-head relative rounded">
                            <input type="text" class="w-[220px] px-1 bg-[rgba(246,255,249,255)] border rounded"
                                placeholder="Branch">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="absolute left-[200px] h-[16px] w-4 fill-gray-500 bottom-1"
                                viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                <path
                                    d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z" />
                            </svg>
                        </div>
                        <!-- icons -->
                        <div class="flex table-1-content bg-[rgba(246,255,249,255)] justify-between w-20 rounded">
                            <div
                                class="icon-1 border flex justify-center items-center w-full h-full fill-gray-500 text-gray-500">
                                <svg xmlns="http://www.w3.org/2000/svg" height="1em"
                                    viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                    <path
                                        d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
                                </svg>
                            </div>
                            <div
                                class="icon-2 flex items-baseline justify-center text-sm w-full h-full fill-gray-500 text-gray-500 border">
                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" class="flex"
                                    viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                    <path
                                        d="M254 52.8C249.3 40.3 237.3 32 224 32s-25.3 8.3-30 20.8L57.8 416H32c-17.7 0-32 14.3-32 32s14.3 32 32 32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32h-1.8l18-48H303.8l18 48H320c-17.7 0-32 14.3-32 32s14.3 32 32 32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H390.2L254 52.8zM279.8 304H168.2L224 155.1 279.8 304z" />
                                </svg>
                                <p class="text-[12px] font-semibold">A</p>
                            </div>
                            <div
                                class="icon-3 flex justify-center items-center w-full h-full font-bold text-gray-500 border">
                                #<svg xmlns="http://www.w3.org/2000/svg" height="1em" class="w-[5px] h-full"
                                    viewBox="0 0 320 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                    <path
                                        d="M182.6 9.4c-12.5-12.5-32.8-12.5-45.3 0l-96 96c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L128 109.3V402.7L86.6 361.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l96 96c12.5 12.5 32.8 12.5 45.3 0l96-96c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 402.7V109.3l41.4 41.4c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3l-96-96z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <!-- another table -->
                    <div class="border h-auto bg-[rgba(246,255,249,255)]  my-1 py-1 px-1">
                        <div class="py-1 flex justify-between px-1">Pattukottai DC <div
                                class="bg-gray-500 w-auto text-center px-3 text-white rounded-full">1</div>
                        </div>
                        <div class="py-1 flex justify-between px-1">Perambalur DC <div
                                class="bg-gray-500 w-auto text-center px-3 text-white rounded-full">1035</div>
                        </div>
                        <div class="py-1 flex justify-between px-1">Pudukkottai DC <div
                                class="bg-gray-500 w-auto text-center px-3 text-white rounded-full">76</div>
                        </div>
                        <div class="py-1 flex justify-between px-1">Thanjavur DC <div
                                class="bg-gray-500 w-auto text-center px-3 text-white rounded-full">130</div>
                        </div>
                        <div class="py-1 flex justify-between px-1">Thiruthuraipoondi DC<div
                                class="bg-gray-500 w-auto text-center px-3 text-white rounded-full">158</div>
                        </div>
                        <div class="py-1 flex justify-between px-1">Thiruvaiyaru DC <div
                                class="bg-gray-500 w-auto text-center px-3 text-white rounded-full">23</div>
                        </div>
                    </div>
                </div>
                <!-- end for table 1 -->
                <!-- start of table 2 -->
                <div class="table-1 h-56  mr-1 pt-1 text-sm w-1/3">
                    <div class="flex justify-between rounded">
                        <div class="table-head relative rounded">
                            <input type="text" class="w-[220px] px-1 bg-[rgba(246,255,249,255)] border rounded"
                                placeholder="Sales Executive">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="absolute left-[200px] h-[16px] w-4 fill-gray-500 bottom-1"
                                viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                <path
                                    d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z" />
                            </svg>
                        </div>
                        <!-- icons -->
                        <div class="flex table-1-content bg-[rgba(246,255,249,255)] justify-between w-20 rounded">
                            <div
                                class="icon-1 flex justify-center items-center border w-full h-full fill-gray-500 text-gray-500">
                                <svg xmlns="http://www.w3.org/2000/svg" height="1em"
                                    viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                    <path
                                        d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
                                </svg>
                            </div>
                            <div
                                class="icon-2 flex items-baseline justify-center w-full h-full fill-gray-500 text-gray-500 border">
                                <svg xmlns="http://www.w3.org/2000/svg" height="1em"
                                    viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                    <path
                                        d="M254 52.8C249.3 40.3 237.3 32 224 32s-25.3 8.3-30 20.8L57.8 416H32c-17.7 0-32 14.3-32 32s14.3 32 32 32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32h-1.8l18-48H303.8l18 48H320c-17.7 0-32 14.3-32 32s14.3 32 32 32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H390.2L254 52.8zM279.8 304H168.2L224 155.1 279.8 304z" />
                                </svg>
                                <p class="text-[12px] font-semibold">A</p>
                            </div>
                            <div class="icon-3 flex justify-center w-full h-full font-bold text-gray-500 border">
                                #<svg xmlns="http://www.w3.org/2000/svg" height="1em" class="w-[5px] h-full"
                                    viewBox="0 0 320 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                    <path
                                        d="M182.6 9.4c-12.5-12.5-32.8-12.5-45.3 0l-96 96c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L128 109.3V402.7L86.6 361.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l96 96c12.5 12.5 32.8 12.5 45.3 0l96-96c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 402.7V109.3l41.4 41.4c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3l-96-96z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <!-- another table -->
                    <div class="border h-auto bg-[rgba(246,255,249,255)]  my-1 py-1 px-1">
                        <div class="py-1 flex justify-between px-1">Adi<div
                                class="bg-gray-500 w-auto text-center px-3 text-white rounded-full">1</div>
                        </div>
                        <div class="py-1 flex justify-between px-1">admin<div
                                class="bg-gray-500 w-auto text-center px-3 text-white rounded-full">8</div>
                        </div>
                        <div class="py-1 flex justify-between px-1">Ashok<div
                                class="bg-gray-500 w-auto text-center px-3 text-white rounded-full">13</div>
                        </div>
                        <div class="py-1 flex justify-between px-1">Chinnasamy<div
                                class="bg-gray-500 w-auto text-center px-3 text-white rounded-full">280</div>
                        </div>
                        <div class="py-1 flex justify-between px-1">Dinesh<div
                                class="bg-gray-500 w-auto text-center px-3 text-white rounded-full">98</div>
                        </div>
                        <div class="py-1 flex justify-between px-1">Gowtham<div
                                class="bg-gray-500 w-auto text-center px-3 text-white rounded-full">263</div>
                        </div>
                    </div>
                </div>
                <!-- end of table 2 -->
                <!-- start of table 3 -->
                <div class="table-1 h-56  mr-1 pt-1 text-sm w-1/3">
                    <div class="flex justify-between rounded">
                        <div class="table-head relative rounded">
                            <input type="text" class="w-[220px] px-1 bg-[rgba(246,255,249,255)] border rounded"
                                placeholder="Category">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="absolute left-[200px] h-[16px] w-4 fill-gray-500 bottom-1"
                                viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                <path
                                    d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z" />
                            </svg>
                        </div>
                        <!-- icons -->
                        <div class="flex table-1-content bg-[rgba(246,255,249,255)] justify-between w-20 rounded">
                            <div
                                class="icon-1 flex justify-center items-center border w-full h-full fill-gray-500 text-gray-500">
                                <svg xmlns="http://www.w3.org/2000/svg" height="1em"
                                    viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                    <path
                                        d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
                                </svg>
                            </div>
                            <div
                                class="icon-2 flex items-baseline justify-center w-full h-full fill-gray-500 text-gray-500 border">
                                <svg xmlns="http://www.w3.org/2000/svg" height="1em"
                                    viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                    <path
                                        d="M254 52.8C249.3 40.3 237.3 32 224 32s-25.3 8.3-30 20.8L57.8 416H32c-17.7 0-32 14.3-32 32s14.3 32 32 32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32h-1.8l18-48H303.8l18 48H320c-17.7 0-32 14.3-32 32s14.3 32 32 32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H390.2L254 52.8zM279.8 304H168.2L224 155.1 279.8 304z" />
                                </svg>
                                <p class="text-[12px] font-semibold">A</p>
                            </div>
                            <div class="icon-3 flex justify-center w-full h-full font-bold text-gray-500 border">
                                #<svg xmlns="http://www.w3.org/2000/svg" height="1em" class="w-[5px] h-full"
                                    viewBox="0 0 320 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                    <path
                                        d="M182.6 9.4c-12.5-12.5-32.8-12.5-45.3 0l-96 96c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L128 109.3V402.7L86.6 361.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l96 96c12.5 12.5 32.8 12.5 45.3 0l96-96c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 402.7V109.3l41.4 41.4c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3l-96-96z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <!-- another table -->
                    <div class="border h-auto bg-[rgba(246,255,249,255)]  my-1 py-1 px-1">
                        <div class="py-1 flex justify-between px-1">
                            <div class="flex items-center"><svg xmlns="http://www.w3.org/2000/svg" height="1em"
                                    class="fill-blue-500 pr-2"
                                    viewBox="0 0 640 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                    <path
                                        d="M224 0a128 128 0 1 1 0 256A128 128 0 1 1 224 0zM178.3 304h91.4c20.6 0 40.4 3.5 58.8 9.9C323 331 320 349.1 320 368c0 59.5 29.5 112.1 74.8 144H29.7C13.3 512 0 498.7 0 482.3C0 383.8 79.8 304 178.3 304zM352 368a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-80c-8.8 0-16 7.2-16 16v64c0 8.8 7.2 16 16 16h48c8.8 0 16-7.2 16-16s-7.2-16-16-16H512V304c0-8.8-7.2-16-16-16z" />
                                </svg>Active Last Week</div>
                            <div class="bg-gray-500 w-auto text-center px-3 text-white rounded-full">74</div>
                        </div>
                        <div class="py-1 flex justify-between px-1">
                            <div class="flex items-center"><svg xmlns="http://www.w3.org/2000/svg"
                                    class="fill-red-400 pr-2" height="1em"
                                    viewBox="0 0 640 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                    <path
                                        d="M38.8 5.1C28.4-3.1 13.3-1.2 5.1 9.2S-1.2 34.7 9.2 42.9l592 464c10.4 8.2 25.5 6.3 33.7-4.1s6.3-25.5-4.1-33.7L353.3 251.6C407.9 237 448 187.2 448 128C448 57.3 390.7 0 320 0C250.2 0 193.5 55.8 192 125.2L38.8 5.1zM264.3 304.3C170.5 309.4 96 387.2 96 482.3c0 16.4 13.3 29.7 29.7 29.7H514.3c3.9 0 7.6-.7 11-2.1l-261-205.6z" />
                                </svg>Dropped Out</div>
                            <div class="bg-gray-500 w-auto text-center px-3 text-white rounded-full">871</div>
                        </div>
                        <div class="py-1 flex justify-between px-1">
                            <div class="flex items-center"><svg xmlns="http://www.w3.org/2000/svg" height="1em"
                                    class="fill-green-600 pr-2"
                                    viewBox="0 0 640 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                    <path
                                        d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3zM625 177L497 305c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L591 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z" />
                                </svg>Engaged</div>
                            <div class="bg-gray-500 w-auto text-center px-3 text-white rounded-full">267</div>
                        </div>
                        <div class="py-1 flex justify-between px-1">
                            <div class="flex items-center"><svg xmlns="http://www.w3.org/2000/svg" height="1em"
                                    class="fill-blue-300 pr-2"
                                    viewBox="0 0 640 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                    <path
                                        d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3zM504 312V248H440c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V136c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H552v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z" />
                                </svg>New Onboard</div>
                            <div class="bg-gray-500 w-auto text-center px-3 text-white rounded-full">56</div>
                        </div>
                        <div class="py-1 flex justify-between px-1">
                            <div class="flex items-center"><svg xmlns="http://www.w3.org/2000/svg" height="1em"
                                    class="fill-orange-400 pr-3"
                                    viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                    <path
                                        d="M224 256A128 128 0 1 1 224 0a128 128 0 1 1 0 256zM209.1 359.2l-18.6-31c-6.4-10.7 1.3-24.2 13.7-24.2H224h19.7c12.4 0 20.1 13.6 13.7 24.2l-18.6 31 33.4 123.9 36-146.9c2-8.1 9.8-13.4 17.9-11.3c70.1 17.6 121.9 81 121.9 156.4c0 17-13.8 30.7-30.7 30.7H285.5c-2.1 0-4-.4-5.8-1.1l.3 1.1H168l.3-1.1c-1.8 .7-3.8 1.1-5.8 1.1H30.7C13.8 512 0 498.2 0 481.3c0-75.5 51.9-138.9 121.9-156.4c8.1-2 15.9 3.3 17.9 11.3l36 146.9 33.4-123.9z" />
                                </svg>Potential Dropout</div>
                            <div class="bg-gray-500 w-auto text-center px-3 text-white rounded-full">102</div>
                        </div>
                        <div class="py-1 flex justify-between items-center px-1">
                            <div class="flex items-center"><svg xmlns="http://www.w3.org/2000/svg" height="1em"
                                    class="fill-gray-400 pr-2"
                                    viewBox="0 0 640 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                    <path
                                        d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3zM472 200H616c13.3 0 24 10.7 24 24s-10.7 24-24 24H472c-13.3 0-24-10.7-24-24s10.7-24 24-24z" />
                                </svg>Potential Prospect</div>
                            <div class="bg-gray-500 w-auto text-center px-3 text-white rounded-full">74</div>
                        </div>
                    </div>
                </div>
                <!-- end of table 3 -->
            </div>
        </div>
        <!-- end for three tables -->
        <!-- start of map -->
        <div class="border border-[#b3d2be] h-[452px] w-full mt-1 mb-1 rounded">
            <div class="w-full h-full">
                <iframe class="w-full"
                    src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d4012924.123838464!2d78.28976490000001!3d10.821166349999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1693730467134!5m2!1sen!2sin"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="flex justify-end text-green-700">
                <div
                    class="flex items-center border border-[#b3d2be] text-green-600 font-semibold text-sm px-1 py-1 hover:bg-green-700 hover:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" class="fill-green-700 px-1 hover:fill-white"
                        viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <path
                            d="M408 120c0 54.6-73.1 151.9-105.2 192c-7.7 9.6-22 9.6-29.6 0C241.1 271.9 168 174.6 168 120C168 53.7 221.7 0 288 0s120 53.7 120 120zm8 80.4c3.5-6.9 6.7-13.8 9.6-20.6c.5-1.2 1-2.5 1.5-3.7l116-46.4C558.9 123.4 576 135 576 152V422.8c0 9.8-6 18.6-15.1 22.3L416 503V200.4zM137.6 138.3c2.4 14.1 7.2 28.3 12.8 41.5c2.9 6.8 6.1 13.7 9.6 20.6V451.8L32.9 502.7C17.1 509 0 497.4 0 480.4V209.6c0-9.8 6-18.6 15.1-22.3l122.6-49zM327.8 332c13.9-17.4 35.7-45.7 56.2-77V504.3L192 449.4V255c20.5 31.3 42.3 59.6 56.2 77c20.5 25.6 59.1 25.6 79.6 0zM288 152a40 40 0 1 0 0-80 40 40 0 1 0 0 80z" />
                    </svg><a href="">Monochrome</a>
                </div>
                <div
                    class="flex items-center border border-[#b3d2be] text-green-600 font-semibold text-sm px-1 py-1 hover:bg-[#198754] hover:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" class="fill-green-700 px-1 hover:fill-white"
                        viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <path
                            d="M408 120c0 54.6-73.1 151.9-105.2 192c-7.7 9.6-22 9.6-29.6 0C241.1 271.9 168 174.6 168 120C168 53.7 221.7 0 288 0s120 53.7 120 120zm8 80.4c3.5-6.9 6.7-13.8 9.6-20.6c.5-1.2 1-2.5 1.5-3.7l116-46.4C558.9 123.4 576 135 576 152V422.8c0 9.8-6 18.6-15.1 22.3L416 503V200.4zM137.6 138.3c2.4 14.1 7.2 28.3 12.8 41.5c2.9 6.8 6.1 13.7 9.6 20.6V451.8L32.9 502.7C17.1 509 0 497.4 0 480.4V209.6c0-9.8 6-18.6 15.1-22.3l122.6-49zM327.8 332c13.9-17.4 35.7-45.7 56.2-77V504.3L192 449.4V255c20.5 31.3 42.3 59.6 56.2 77c20.5 25.6 59.1 25.6 79.6 0zM288 152a40 40 0 1 0 0-80 40 40 0 1 0 0 80z" />
                    </svg><a href="">Navigation</a>
                </div>
                <div
                    class="flex items-center border border-[#b3d2be] text-green-600 font-semibold text-sm px-1 py-1 hover:bg-[#198754] hover:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" class="fill-green-700 px-1 hover:fill-white"
                        viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <path
                            d="M408 120c0 54.6-73.1 151.9-105.2 192c-7.7 9.6-22 9.6-29.6 0C241.1 271.9 168 174.6 168 120C168 53.7 221.7 0 288 0s120 53.7 120 120zm8 80.4c3.5-6.9 6.7-13.8 9.6-20.6c.5-1.2 1-2.5 1.5-3.7l116-46.4C558.9 123.4 576 135 576 152V422.8c0 9.8-6 18.6-15.1 22.3L416 503V200.4zM137.6 138.3c2.4 14.1 7.2 28.3 12.8 41.5c2.9 6.8 6.1 13.7 9.6 20.6V451.8L32.9 502.7C17.1 509 0 497.4 0 480.4V209.6c0-9.8 6-18.6 15.1-22.3l122.6-49zM327.8 332c13.9-17.4 35.7-45.7 56.2-77V504.3L192 449.4V255c20.5 31.3 42.3 59.6 56.2 77c20.5 25.6 59.1 25.6 79.6 0zM288 152a40 40 0 1 0 0-80 40 40 0 1 0 0 80z" />
                    </svg><a href="">Streets</a>
                </div>
                <div
                    class="flex items-center border border-[#b3d2be] text-green-600 font-semibold text-sm px-1 py-1 hover:bg-[#198754] hover:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" class="fill-green-700 px-1 hover:fill-white"
                        viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <path
                            d="M408 120c0 54.6-73.1 151.9-105.2 192c-7.7 9.6-22 9.6-29.6 0C241.1 271.9 168 174.6 168 120C168 53.7 221.7 0 288 0s120 53.7 120 120zm8 80.4c3.5-6.9 6.7-13.8 9.6-20.6c.5-1.2 1-2.5 1.5-3.7l116-46.4C558.9 123.4 576 135 576 152V422.8c0 9.8-6 18.6-15.1 22.3L416 503V200.4zM137.6 138.3c2.4 14.1 7.2 28.3 12.8 41.5c2.9 6.8 6.1 13.7 9.6 20.6V451.8L32.9 502.7C17.1 509 0 497.4 0 480.4V209.6c0-9.8 6-18.6 15.1-22.3l122.6-49zM327.8 332c13.9-17.4 35.7-45.7 56.2-77V504.3L192 449.4V255c20.5 31.3 42.3 59.6 56.2 77c20.5 25.6 59.1 25.6 79.6 0zM288 152a40 40 0 1 0 0-80 40 40 0 1 0 0 80z" />
                    </svg><a href="">Satellite Streets</a>
                </div>
            </div>
        </div>
        <!-- end of map -->
        <!-- start of legend -->
        <div class="px-2 mt-10 py-2 h-auto w-full">
            <p class="text-green-700 font-semibold mb-6">Legend</p>
            <div class="flex justify-between h-auto w-full">
                <!-- new onboard start -->
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em"
                        class="pr-1 fill-blue-300 border-r-2 border-gray-300"
                        viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <path
                            d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em"
                        class="pl-1 pr-1 fill-blue-300 border-r-2 border-gray-300"
                        viewBox="0 0 640 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <path
                            d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3zM504 312V248H440c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V136c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H552v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z" />
                    </svg>
                    <p class="text-gray-600 pl-1">New Onboard</p>
                </div>
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" class="fill-gray-500"
                        viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <path
                            d="M201.4 137.4c12.5-12.5 32.8-12.5 45.3 0l160 160c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L224 205.3 86.6 342.6c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3l160-160z" />
                    </svg>
                </div>
            </div>
            <hr class="fill-gray-400 my-2">
            <!-- new onboard end -->
            <!-- potential prospect start -->
            <div class="flex justify-between h-auto w-full">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em"
                        class="pr-1 fill-gray-400 border-r-2 border-gray-300"
                        viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <path
                            d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em"
                        class="pr-1 pl-1 fill-gray-400 border-r-2 border-gray-300"
                        viewBox="0 0 640 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <path
                            d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3zM472 200H616c13.3 0 24 10.7 24 24s-10.7 24-24 24H472c-13.3 0-24-10.7-24-24s10.7-24 24-24z" />
                    </svg>
                    <p class="text-gray-600 pl-1">Potential prospect</p>
                </div>
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" class="fill-gray-500"
                        viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <path
                            d="M201.4 137.4c12.5-12.5 32.8-12.5 45.3 0l160 160c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L224 205.3 86.6 342.6c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3l160-160z" />
                    </svg>
                </div>
            </div>
            <hr class="fill-gray-400 my-2">
            <!-- potential prospect end -->
            <!-- prospect start -->
            <div class="flex justify-between h-auto w-full">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em"
                        class="pr-1 fill-gray-400 border-r-2 border-gray-300"
                        viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <path
                            d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em"
                        class="pr-1 pl-1 fill-gray-400 border-r-2 border-gray-300"
                        viewBox="0 0 640 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <path
                            d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3zM471 143c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z" />
                    </svg>
                    <p class="text-gray-600 pl-1">Prospect</p>
                </div>
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" class="fill-gray-500"
                        viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <path
                            d="M201.4 137.4c12.5-12.5 32.8-12.5 45.3 0l160 160c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L224 205.3 86.6 342.6c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3l160-160z" />
                    </svg>
                </div>
            </div>
            <hr class="fill-gray-400 my-2">
            <!-- prospect end -->
            <!-- engaged start -->
            <div class="flex justify-between h-auto w-full">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em"
                        class="pr-1 fill-green-600 border-r-2 border-gray-300"
                        viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <path
                            d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em"
                        class="pr-1 pl-1 fill-green-600 border-r-2 border-gray-300"
                        viewBox="0 0 640 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <path
                            d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3zM625 177L497 305c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L591 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z" />
                    </svg>
                    <p class="text-gray-600 pl-1">Engaged</p>
                </div>
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" class="fill-gray-500"
                        viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <path
                            d="M201.4 137.4c12.5-12.5 32.8-12.5 45.3 0l160 160c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L224 205.3 86.6 342.6c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3l160-160z" />
                    </svg>
                </div>
            </div>
            <hr class="fill-gray-400 my-2">
            <!-- engaged end -->
            <!-- Active last week start -->
            <div class="flex justify-between h-auto w-full">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em"
                        class="pr-1 fill-blue-500 border-r-2 border-gray-300"
                        viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <path
                            d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em"
                        class="pr-1 pl-1 fill-blue-500 border-r-2 border-gray-300"
                        viewBox="0 0 640 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <path
                            d="M224 0a128 128 0 1 1 0 256A128 128 0 1 1 224 0zM178.3 304h91.4c20.6 0 40.4 3.5 58.8 9.9C323 331 320 349.1 320 368c0 59.5 29.5 112.1 74.8 144H29.7C13.3 512 0 498.7 0 482.3C0 383.8 79.8 304 178.3 304zM352 368a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-80c-8.8 0-16 7.2-16 16v64c0 8.8 7.2 16 16 16h48c8.8 0 16-7.2 16-16s-7.2-16-16-16H512V304c0-8.8-7.2-16-16-16z" />
                    </svg>
                    <p class="text-gray-600 pl-1">Active Last Week</p>
                </div>
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" class="fill-gray-500"
                        viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <path
                            d="M201.4 137.4c12.5-12.5 32.8-12.5 45.3 0l160 160c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L224 205.3 86.6 342.6c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3l160-160z" />
                    </svg>
                </div>
            </div>
            <hr class="fill-gray-400 my-2">
            <!-- Active last week end -->
            <!-- potential dropout start -->
            <div class="flex justify-between h-auto w-full">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em"
                        class="pr-1 fill-orange-400 border-r-2 border-gray-300"
                        viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <path
                            d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em"
                        class="pr-2 pl-1 fill-orange-400 border-r-2 border-gray-300"
                        viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <path
                            d="M96 128V70.2c0-13.3 8.3-25.3 20.8-30l96-36c7.2-2.7 15.2-2.7 22.5 0l96 36c12.5 4.7 20.8 16.6 20.8 30V128h-.3c.2 2.6 .3 5.3 .3 8v40c0 70.7-57.3 128-128 128s-128-57.3-128-128V136c0-2.7 .1-5.4 .3-8H96zm48 48c0 44.2 35.8 80 80 80s80-35.8 80-80V160H144v16zM111.9 327.7c10.5-3.4 21.8 .4 29.4 8.5l71 75.5c6.3 6.7 17 6.7 23.3 0l71-75.5c7.6-8.1 18.9-11.9 29.4-8.5C401 348.6 448 409.4 448 481.3c0 17-13.8 30.7-30.7 30.7H30.7C13.8 512 0 498.2 0 481.3c0-71.9 47-132.7 111.9-153.6zM208 48V64H192c-4.4 0-8 3.6-8 8V88c0 4.4 3.6 8 8 8h16v16c0 4.4 3.6 8 8 8h16c4.4 0 8-3.6 8-8V96h16c4.4 0 8-3.6 8-8V72c0-4.4-3.6-8-8-8H240V48c0-4.4-3.6-8-8-8H216c-4.4 0-8 3.6-8 8z" />
                    </svg>
                    <p class="text-gray-600 pl-1">Potential Dropout</p>
                </div>
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" class="fill-gray-500"
                        viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <path
                            d="M201.4 137.4c12.5-12.5 32.8-12.5 45.3 0l160 160c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L224 205.3 86.6 342.6c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3l160-160z" />
                    </svg>
                </div>
            </div>
            <hr class="fill-gray-400 my-2">
            <!-- potential dropout end -->
            <!-- dropped out start -->
            <div class="flex justify-between mb-3 h-auto w-full">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em"
                        class="pr-1 fill-red-400 border-r-2 border-gray-300"
                        viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <path
                            d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em"
                        class="pr-1 pl-1 fill-red-400 border-r-2 border-gray-300"
                        viewBox="0 0 640 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <path
                            d="M38.8 5.1C28.4-3.1 13.3-1.2 5.1 9.2S-1.2 34.7 9.2 42.9l592 464c10.4 8.2 25.5 6.3 33.7-4.1s6.3-25.5-4.1-33.7L353.3 251.6C407.9 237 448 187.2 448 128C448 57.3 390.7 0 320 0C250.2 0 193.5 55.8 192 125.2L38.8 5.1zM264.3 304.3C170.5 309.4 96 387.2 96 482.3c0 16.4 13.3 29.7 29.7 29.7H514.3c3.9 0 7.6-.7 11-2.1l-261-205.6z" />
                    </svg>
                    <p class="text-gray-600 pl-1">Droped Out</p>
                </div>
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" class="fill-gray-500"
                        viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <path
                            d="M201.4 137.4c12.5-12.5 32.8-12.5 45.3 0l160 160c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L224 205.3 86.6 342.6c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3l160-160z" />
                    </svg>
                </div>
            </div>
            <!-- dropped out end -->

        </div>
        <!-- end of legend -->
    <hr class="fill-gray-400 mt-12">
    <!-- footer start -->
    <div class="flex justify-center items-center h-10 w-full">
        <small class="flex justify-center items-center font-semibold text-green-700">&#169 2023 e-sandhai. <p
                class="font-bold pl-2" id="footer-time">
            </p></small>
        <script>
            function footerTime() {
                const footertime = document.getElementById('footer-time');
                const current = new Date();
                footertime.textContent = current;
            }
            footerTime();
            setInterval(footerTime, 1000);
        </script>
    </div>

    <!-- footer end -->
@endsection
