<div>
    <script src="https://cdn.tailwindcss.com/?plugins=forms"></script>

    <body class="bg-red-200">
        @if ($showForm==true)
        <div class="hidden sm:block" aria-hidden="true">
            <div class="py-5">
                <div class="border-t border-gray-200"></div>
            </div>
        </div>
        <div class="pl-3 pr-3 mt-10 sm:mt-0">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Book Info</h3>
                        <p class="mt-1 text-sm text-gray-600">Enter the details of the books.</p>
                        <div> <input type="hidden" wire:model='hiddenId' value="{{$hiddenId}}"> </div>
                    </div>
                </div>

                <div class="mt-5 md:col-span-2 md:mt-0">
                    <form wire:submit.prevent='submit'>
                        <div class="overflow-hidden shadow sm:rounded-md">
                            <div class="px-4 py-5 bg-white sm:p-6">
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="book-name" class="block text-sm font-medium text-gray-700">Book
                                            name</label>
                                        <input type="text" name="book-name" id="book-name" autocomplete="given-name"
                                            wire:model='name'
                                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="isbn" class="block text-sm font-medium text-gray-700">ISBN</label>
                                        <input type="text" name="isbn" id="isbn" autocomplete="isbn" wire:model='isbn'
                                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                    </div>

                                    <div class="col-span-6 sm:col-span-4">
                                        <label for="author"
                                            class="block text-sm font-medium text-gray-700">Author</label>
                                        <input type="text" name="author" id="author" autocomplete="author"
                                            wire:model='author'
                                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="language" class="block text-sm font-medium text-gray-700">Languages
                                            Available</label>
                                        <select id="language" name="language" autocomplete="language" wire:model='lang'
                                            multiple
                                            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                            @foreach ($languages as $lan )
                                            <option value={{$lan['id']}}>{{$lan['name']}}</option>
                                            @endforeach

                                        </select>
                                    </div>

                                </div>
                            </div>
                            <div class="px-4 py-3 text-right bg-gray-50 sm:px-6">
                                <button type="button" wire:click='viewList'
                                    class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-orange-600 border border-transparent rounded-md shadow-sm hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2">List</button>
                                <button type="button" wire:click="submit"
                                    class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-green-600 border border-transparent rounded-md shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endif

        @if ($viewList == true)
        <div class="px-4 pt-6 sm:px-6 lg:px-8">
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <h1 class="text-xl font-semibold text-gray-900">Books</h1>
                    <p class="mt-2 text-sm text-gray-700">A list of all the books in the library.</p>
                </div>
                <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                    <button type="button" wire:click='addBook'
                        class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-red-600 border border-transparent rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 sm:w-auto">Add
                        Books
                    </button>
                </div>
            </div>
            <div class="flex flex-col pl-10 pr-10 mt-8">
                <div class="-mx-4 -my-2 sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle">
                        <div class="shadow-sm ring-1 ring-black ring-opacity-5">
                            <table class="min-w-full border-separate" style="border-spacing: 0">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col"
                                            class="sticky top-0 z-10 border-b border-gray-300 bg-gray-50 bg-opacity-75 py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 backdrop-blur backdrop-filter sm:pl-6 lg:pl-8">
                                            Name</th>
                                        <th scope="col"
                                            class="sticky top-0 z-10 hidden border-b border-gray-300 bg-gray-50 bg-opacity-75 px-3 py-3.5 text-left text-sm font-semibold text-gray-900 backdrop-blur backdrop-filter sm:table-cell">
                                            ISBN</th>
                                        <th scope="col"
                                            class="sticky top-0 z-10 hidden border-b border-gray-300 bg-gray-50 bg-opacity-75 px-3 py-3.5 text-left text-sm font-semibold text-gray-900 backdrop-blur backdrop-filter lg:table-cell">
                                            Author</th>
                                        <th scope="col"
                                            class="sticky top-0 z-10 border-b border-gray-300 bg-gray-50 bg-opacity-75 px-3 py-3.5 text-left text-sm font-semibold text-gray-900 backdrop-blur backdrop-filter">
                                            Languages</th>
                                        <th scope="col"
                                            class="sticky top-0 z-10 border-b border-gray-300 bg-gray-50 bg-opacity-75 py-3.5 pr-4 pl-3 backdrop-blur backdrop-filter sm:pr-6 lg:pr-8">
                                            <span class="sr-only">Edit</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white">
                                    @foreach ($sql as $data)
                                    <tr>
                                        <td
                                            class="py-4 pl-4 pr-3 text-sm font-medium text-gray-900 border-b border-gray-200 whitespace-nowrap sm:pl-6 lg:pl-8">
                                            {{$data->name}}</td>
                                        <td
                                            class="hidden px-3 py-4 text-sm text-gray-500 border-b border-gray-200 whitespace-nowrap sm:table-cell">
                                            {{$data->isbn}}</td>
                                        <td
                                            class="hidden px-3 py-4 text-sm text-gray-500 border-b border-gray-200 whitespace-nowrap lg:table-cell">
                                            {{$data->author}}</td>
                                        <td
                                            class="px-3 py-4 text-sm text-gray-500 border-b border-gray-200 whitespace-nowrap">
                                            @php
                                            $exp=explode(',',$data->language);
                                            @endphp
                                            @foreach ($exp as $value )
                                            {{$languages[$value]['name'].','}}

                                            @endforeach
                                        </td>
                                        <td
                                            class="relative py-4 pl-3 pr-4 text-sm font-medium text-right border-b border-gray-200 whitespace-nowrap sm:pr-6 lg:pr-8">
                                            <a href="javascript:void(0)" wire:click='editBook({{$data->id}})'
                                                class="text-indigo-600 hover:text-indigo-900">Edit</a> |
                                            <a href="javascript:void(0)" wire:click='deleteBook({{$data->id}})'
                                                class="text-red-600 hover:text-red-900">Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @endif



    </body>
</div>