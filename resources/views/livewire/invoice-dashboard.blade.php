<div class="max-w-6xl mx-auto bg-white shadow-md rounded-lg p-6">

    <div class="flex xs:block justify-between items-center mb-4 flex-wrap">
        <h1 class="text-2xl font-semibold w-full sm:w-auto text-center sm:text-left mb-4 sm:mb-0">Invoices</h1>
        <div class="w-full sm:w-auto flex sm:flex-row flex-col gap-2">
            <button class="border px-3 py-1.5 text-sm rounded-md w-full sm:w-auto mb-2 sm:mb-0">
                Filter
            </button>
            <button class="border px-3 py-1.5 text-sm rounded-md w-full sm:w-auto mb-2 sm:mb-0">Export</button>
            <button class="bg-indigo-600 text-white px-4 py-1.5 text-sm rounded-md w-full sm:w-auto">
                + Create Invoice
            </button>
        </div>
    </div>


    <div class="mb-4">
        <input type="text" placeholder="Search..." class="w-full border rounded-md p-2 text-sm">
    </div>
    <div class="flex space-x-4 border-b pb-2 text-sm">
        @foreach (['all' => 'All Invoices', 'draft' => 'Draft', 'outstanding' => 'Outstanding', 'paid due' => 'Paid Due', 'paid' => 'Paid'] as $key => $label)
            <a href="#" wire:click.prevent="setTab('{{ $key }}')"
               class="pb-1 font-semibold border-b-2
                  {{ $activeTab == $key ? 'text-indigo-600 border-indigo-600' : 'text-gray-600 hover:text-indigo-600 border-transparent' }}">
                {{ $label }}
            </a>
        @endforeach
    </div>
    <div class="mt-4 overflow-x-auto">
        <table class="w-full border-collapse text-sm">
            <thead>
            <tr class="bg-gray-100 border-b">
                <th class="text-left py-2 px-4">AMOUNT</th>
                <th class="text-left py-2 px-4">INVOICE NUMBER</th>
                <th class="text-left py-2 px-4 flex">Customer
                    <svg class="ml-1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20"
                         viewBox="0 0 50 50">
                        <path
                            d="M 22.205078 2 A 1.0001 1.0001 0 0 0 21.21875 2.8378906 L 20.246094 8.7929688 C 19.076509 9.1331971 17.961243 9.5922728 16.910156 10.164062 L 11.996094 6.6542969 A 1.0001 1.0001 0 0 0 10.708984 6.7597656 L 6.8183594 10.646484 A 1.0001 1.0001 0 0 0 6.7070312 11.927734 L 10.164062 16.873047 C 9.583454 17.930271 9.1142098 19.051824 8.765625 20.232422 L 2.8359375 21.21875 A 1.0001 1.0001 0 0 0 2.0019531 22.205078 L 2.0019531 27.705078 A 1.0001 1.0001 0 0 0 2.8261719 28.691406 L 8.7597656 29.742188 C 9.1064607 30.920739 9.5727226 32.043065 10.154297 33.101562 L 6.6542969 37.998047 A 1.0001 1.0001 0 0 0 6.7597656 39.285156 L 10.648438 43.175781 A 1.0001 1.0001 0 0 0 11.927734 43.289062 L 16.882812 39.820312 C 17.936999 40.39548 19.054994 40.857928 20.228516 41.201172 L 21.21875 47.164062 A 1.0001 1.0001 0 0 0 22.205078 48 L 27.705078 48 A 1.0001 1.0001 0 0 0 28.691406 47.173828 L 29.751953 41.1875 C 30.920633 40.838997 32.033372 40.369697 33.082031 39.791016 L 38.070312 43.291016 A 1.0001 1.0001 0 0 0 39.351562 43.179688 L 43.240234 39.287109 A 1.0001 1.0001 0 0 0 43.34375 37.996094 L 39.787109 33.058594 C 40.355783 32.014958 40.813915 30.908875 41.154297 29.748047 L 47.171875 28.693359 A 1.0001 1.0001 0 0 0 47.998047 27.707031 L 47.998047 22.207031 A 1.0001 1.0001 0 0 0 47.160156 21.220703 L 41.152344 20.238281 C 40.80968 19.078827 40.350281 17.974723 39.78125 16.931641 L 43.289062 11.933594 A 1.0001 1.0001 0 0 0 43.177734 10.652344 L 39.287109 6.7636719 A 1.0001 1.0001 0 0 0 37.996094 6.6601562 L 33.072266 10.201172 C 32.023186 9.6248101 30.909713 9.1579916 29.738281 8.8125 L 28.691406 2.828125 A 1.0001 1.0001 0 0 0 27.705078 2 L 22.205078 2 z M 23.056641 4 L 26.865234 4 L 27.861328 9.6855469 A 1.0001 1.0001 0 0 0 28.603516 10.484375 C 30.066026 10.848832 31.439607 11.426549 32.693359 12.185547 A 1.0001 1.0001 0 0 0 33.794922 12.142578 L 38.474609 8.7792969 L 41.167969 11.472656 L 37.835938 16.220703 A 1.0001 1.0001 0 0 0 37.796875 17.310547 C 38.548366 18.561471 39.118333 19.926379 39.482422 21.380859 A 1.0001 1.0001 0 0 0 40.291016 22.125 L 45.998047 23.058594 L 45.998047 26.867188 L 40.279297 27.871094 A 1.0001 1.0001 0 0 0 39.482422 28.617188 C 39.122545 30.069817 38.552234 31.434687 37.800781 32.685547 A 1.0001 1.0001 0 0 0 37.845703 33.785156 L 41.224609 38.474609 L 38.53125 41.169922 L 33.791016 37.84375 A 1.0001 1.0001 0 0 0 32.697266 37.808594 C 31.44975 38.567585 30.074755 39.148028 28.617188 39.517578 A 1.0001 1.0001 0 0 0 27.876953 40.3125 L 26.867188 46 L 23.052734 46 L 22.111328 40.337891 A 1.0001 1.0001 0 0 0 21.365234 39.53125 C 19.90185 39.170557 18.522094 38.59371 17.259766 37.835938 A 1.0001 1.0001 0 0 0 16.171875 37.875 L 11.46875 41.169922 L 8.7734375 38.470703 L 12.097656 33.824219 A 1.0001 1.0001 0 0 0 12.138672 32.724609 C 11.372652 31.458855 10.793319 30.079213 10.427734 28.609375 A 1.0001 1.0001 0 0 0 9.6328125 27.867188 L 4.0019531 26.867188 L 4.0019531 23.052734 L 9.6289062 22.117188 A 1.0001 1.0001 0 0 0 10.435547 21.373047 C 10.804273 19.898143 11.383325 18.518729 12.146484 17.255859 A 1.0001 1.0001 0 0 0 12.111328 16.164062 L 8.8261719 11.46875 L 11.523438 8.7734375 L 16.185547 12.105469 A 1.0001 1.0001 0 0 0 17.28125 12.148438 C 18.536908 11.394293 19.919867 10.822081 21.384766 10.462891 A 1.0001 1.0001 0 0 0 22.132812 9.6523438 L 23.056641 4 z M 25 17 C 20.593567 17 17 20.593567 17 25 C 17 29.406433 20.593567 33 25 33 C 29.406433 33 33 29.406433 33 25 C 33 20.593567 29.406433 17 25 17 z M 25 19 C 28.325553 19 31 21.674447 31 25 C 31 28.325553 28.325553 31 25 31 C 21.674447 31 19 28.325553 19 25 C 19 21.674447 21.674447 19 25 19 z">
                        </path>
                    </svg>
                </th>
                <th class="text-left py-2 px-4">DUE</th>
                <th class="text-left py-2 px-4">CREATED</th>
                <th class="text-left py-2 px-4"></th>
            </tr>
            </thead>
            <tbody>
            @foreach ($filteredInvoices as $invoice)
                <tr class="border-b hover:bg-gray-50">
                    <td class="py-2 px-4 flex items-center justify-between space-x-2 whitespace-nowrap">
                        <span class="w-20 text-left truncate">{{ $invoice['amount'] }}</span>
                        <span class="w-10 text-center">USD</span>
                        <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30">
                            <path
                                d="M 15 3 C 12.031398 3 9.3028202 4.0834384 7.2070312 5.875 A 1.0001 1.0001 0 1 0 8.5058594 7.3945312 C 10.25407 5.9000929 12.516602 5 15 5 C 20.19656 5 24.450989 8.9379267 24.951172 14 L 22 14 L 26 20 L 30 14 L 26.949219 14 C 26.437925 7.8516588 21.277839 3 15 3 z M 4 10 L 0 16 L 3.0507812 16 C 3.562075 22.148341 8.7221607 27 15 27 C 17.968602 27 20.69718 25.916562 22.792969 24.125 A 1.0001 1.0001 0 1 0 21.494141 22.605469 C 19.74593 24.099907 17.483398 25 15 25 C 9.80344 25 5.5490109 21.062074 5.0488281 16 L 8 16 L 4 10 z"></path>
                        </svg>
                        <span class="px-2 py-1 rounded-md text-xs w-24 text-center
                        {{ $invoice['status'] == 'Paid' ? 'bg-green-200 text-green-800' :
                           ($invoice['status'] == 'Paid Due' ? 'bg-red-200 text-red-800' :
                           ($invoice['status'] == 'Outstanding' ? 'bg-yellow-200 text-yellow-800' :
                           ($invoice['status'] == 'Draft' ? 'bg-gray-200 text-gray-800' : 'bg-gray-200 text-gray-800'))) }}">
                        {{ $invoice['status'] }}
                    </span>
                    </td>

                    <td class="py-2 px-4"></span> {{$invoice['invoice_number']}}</td>
                    <td class="py-2 px-4">{{$invoice['email']}}</td>
                    <td class="py-2 px-4">—</td>
                    <td class="py-2 px-4">{{$invoice['date']}}</td>
                    <td class="py-2 px-4 relative flex items-center">
                        <button class="text-gray-500 hover:text-gray-800 flex" wire:click="toggleDropdown({{ $invoice['id'] }})">
                            <p class="text-lg font-medium text-gray-900">...</p>
                        </button>
                        <div class="absolute right-0 mt-2 w-48 bg-white border shadow-md {{ $openDropdown === $invoice['id'] ? '' : 'hidden' }}"
                             wire:click.away="$set('openDropdown', null)">
                            <a href="#" class="block px-4 py-2 text-blue-600 hover:bg-gray-100">Download PDF</a>
                            <a href="#" class="block px-4 py-2 text-blue-600 hover:bg-gray-100">Duplicate Invoice</a>
                            <a href="#" class="block px-4 py-2 text-red-600 hover:bg-gray-100">Delete Draft</a>
                            <hr>
                            <p class="block px-4 py-2 hover:bg-gray-100">Connections</p>
                            <a href="#" class="block px-4 py-2 text-blue-600 hover:bg-gray-100">View Customer →</a>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

