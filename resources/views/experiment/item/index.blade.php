<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Item
        </h2>
    </x-slot>

    <div class="mx-24 mt-16 p-4 bg-white border-slate-400 border rounded-lg shadow-lg">
        <form action="{{ route('item.index') }}" method="GET">
            <div class="relative">
                <label for="Search" class="sr-only"> Search </label>

                <input type="text" id="search" name="search" placeholder="Search for..." value="{{ request('search') ?? '' }}"
                    class="w-full rounded-md border-gray-200 py-2.5 pe-10 shadow-sm sm:text-sm" />

                <span class="absolute inset-y-0 end-0 grid w-10 place-content-center">
                    <button type="button" class="text-gray-600 hover:text-gray-700">
                        <span class="sr-only">Search</span>

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="h-4 w-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                        </svg>
                    </button>
                </span>
            </div>

            <div class="flex py-4">
                <div>
                    <label for="limit" class="block text-sm font-medium text-gray-900">
                        Limit
                    </label>

                    <select name="limit" id="limit"
                        class="mt-1.5 w-full rounded-lg border-gray-300 text-gray-700 sm:text-sm">
                        <option value="">Please select</option>
                        <option @selected(request('limit') == 10) value="10">10</option>
                        <option @selected(request('limit') == 20) value="20">20</option>
                        <option @selected(request('limit') == 50) value="50">50</option>
                        <option @selected(request('limit') == 100) value="100">100</option>
                    </select>
                </div>
            </div>

            <div class="flex justify-end">
                <button
                    class="inline-block rounded border border-indigo-600 bg-indigo-600 px-12 py-3 text-sm font-medium text-white hover:bg-transparent hover:text-indigo-600 focus:outline-none focus:ring active:text-indigo-500">
                    Filter
                </button>
            </div>
        </form>
    </div>
    <div class="mx-24 mt-4 p-4 bg-white border-slate-400 border rounded-lg shadow-lg">
        <table class="table-auto w-full">
            <thead>
                <tr>
                    <th></th>
                    <th class="px-4 py-2">Name</th>
                    <th class="px-4 py-2">Price</th>
                    <th class="px-4 py-2">Stock</th>
                    <th class="px-4 py-2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($list as $item)
                    <tr class="hover:bg-slate-200">
                        <td class="border-r border-l px-4 py-2 text-center">
                            {{ $loop->iteration + $list->perPage() * ($list->currentPage() - 1) }}
                        </td>
                        <td class="border-r border-l px-4 py-2">{{ $item->name }}</td>
                        <td class="border-r border-l px-4 py-2">{{ $item->price }}</td>
                        <td class="border-r border-l px-4 py-2">{{ $item->stock }}</td>
                        <td class="border-r border-l px-4 py-2">
                            {{-- <a href="{{ route('experiment.item.edit', $item->id) }}"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                            <a href="{{ route('experiment.item.delete', $item->id) }}"
                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</a> --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="py-8">
            {{ $list->links() }}
        </div>
    </div>
</x-app-layout>
