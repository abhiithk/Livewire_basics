<div>
  <script src="https://cdn.tailwindcss.com/?plugins=forms"></script>
  <body class="bg-slate-200">
    @if($showForm == true)
    @if(session()->has('success'))
    <div class="relative px-4 py-3 text-green-700 bg-green-200 border border-green-400 rounded" role="alert">
      <strong class="font-bold">{{$head}}</strong> <br>
      <span class="block sm:inline">{{$msg}}</span>
      <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
      </span>
    </div>
    @endif
    <form class="space-y-8 divide-y divide-gray-200" enctype="multipart/form-data" wire:submit.prevent='submit'>
      <div class="space-y-8 divide-y divide-gray-200">

        <div>
          <div class="pt-8 pl-3 pr-10">
            <div class="sm:flex sm:items-center">
              <div class="sm:flex-auto">
                <h1 class="text-xl font-semibold text-gray-900">Personal Information</h1>
                <p class="mt-2 text-sm text-gray-700">Enter your Personal Details</p>
              </div>
              <div> <input type="hidden" wire:model='hiddenId' value="{{$hiddenId}}"> </div>
              <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                <button type="button" wire:click='addList'
                  class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-orange-600 border border-transparent rounded-md shadow-sm hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2 sm:w-auto">List</button>
              </div>
            </div>
            <div class="grid grid-cols-1 mt-6 gap-y-6 gap-x-4 sm:grid-cols-6">

              <div class="sm:col-span-3">
                <label for="first-name" class="block text-sm font-medium text-gray-700">First name</label>
                <div class="mt-1">

                  <input type="text" name="first-name" id="first-name" autocomplete="given-name" wire:model='fname'
                    class="block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                  @error('fname')
                  <span class="text-red-700">{{$message}}</span>
                  @enderror
                </div>
              </div>

              <div class="sm:col-span-3">
                <label for="last-name" class="block text-sm font-medium text-gray-700">Last name</label>
                <div class="mt-1">
                  <input type="text" name="last-name" id="last-name" autocomplete="family-name" wire:model='lname'
                    class="block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                </div>
              </div>

              <div class="sm:col-span-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email address</label>
                <div class="mt-1">
                  <input id="email" name="email" type="text" autocomplete="email" wire:model='email'
                    class="block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                  @error('email')
                  <span class="text-red-700">{{$errors->first('email')}}</span>
                  @enderror
                </div>
              </div>

              <div class="sm:col-span-6">
                <label for="street-address" class="block text-sm font-medium text-gray-700">Address</label>
                <div class="mt-1">
                  <input type="text" name="street-address" id="street-address" autocomplete="street-address"
                    wire:model='address'
                    class="block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                </div>
              </div>

              <div class="sm:col-span-2">
                <label for="postal-code" class="block text-sm font-medium text-gray-700">ZIP / Postal code</label>
                <div class="mt-1">
                  <input type="text" name="postal-code" id="postal-code" autocomplete="postal-code" wire:model='zip'
                    class="block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                </div>
              </div>
              <div>
                <label for="image" class="block text-sm font-medium text-gray-700">Upload Image</label>
                <div class="mt-1"> </div>
                {{-- @if ($photo)
                Photo Preview:
                <img src="{{ $photo->temporaryUrl() }}">
            @endif --}}
         
                <input type="file" id="imgUpload1" name = "photo">
                 {{-- @error('photo') <span class="error">{{ $message }}</span> @enderror --}}
            </div>
          </div>
        </div>
        <div class="pt-5 pr-10">
          <div class="flex justify-end">
            <button type="reset"
              class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2">Cancel</button>
            <button type="button" wire:click="submit"
              class="inline-flex justify-center px-4 py-2 ml-3 text-sm font-medium text-white bg-green-600 border border-transparent rounded-md shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">Save</button>
          </div>
        </div>
      </div>
    </form>
    @endif
    @if ($showList == true)
    <div class="px-4 pt-10 sm:px-6 lg:px-8">
      @if(session()->has('update'))
      <div class="relative px-4 py-3 text-green-700 bg-green-200 border border-green-400 rounded" role="alert">
        <strong class="font-bold">{{$head}}</strong> <br>
        <span class="block sm:inline">{{$msg}}</span>
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
        </span>
      </div>
      @elseif(session()->has('delete'))
      <div class="relative px-4 py-3 text-green-700 bg-green-200 border border-green-400 rounded" role="alert">
        <strong class="font-bold">{{$head}}</strong> <br>
        <span class="block sm:inline">{{$msg}}</span>
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
        </span>
      </div>
      @endif
      <div class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
          <h1 class="text-xl font-semibold text-gray-900">Users</h1>
          <p class="mt-2 text-sm text-gray-700">A list of all the users and their details</p>
        </div>
        <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
          <button type="button" wire:click='addUser'
            class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-red-600 border border-transparent rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 sm:w-auto">Add
            user</button>
        </div>
      </div> <br>
      <div class="sm:flex sm:items-center">
        <div class="mb-3 xl:w-96">
          <div class="flex-row mt-4 space-x-2 sm:mt-0 sm:ml-16 sm:flex-none lg:flex">
            <input type="text" wire:model='sText' class="form-control relative flex-auto min-w-0 block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" placeholder="Search" aria-label="Search" aria-describedby="button-addon3">
           <button wire:click='search' 
           class="inline-block px-6 py-2 text-xs font-medium leading-tight text-blue-600 uppercase transition duration-150 ease-in-out border-2 border-blue-600 rounded btn hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0" type="button" id="button-addon3">Search</button>
           <button type="reset" wire:click=searchClear
           class="inline-block px-6 py-2 text-xs font-medium leading-tight text-blue-600 uppercase transition duration-150 ease-in-out border-2 border-blue-600 rounded btn hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0" type="button" id="button-addon4">Reset</button>
          </div>
        </div>
      </div>
      <div class="flex flex-col mt-8">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
            <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
             
              <table class="min-w-full divide-y divide-gray-300">
                <thead class="bg-gray-50">
                  <tr>
                    <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Name
                    </th>
                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Email</th>
                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Address</th>
                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Zip</th>
                    <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                      <span class="sr-only">Edit</span>
                    </th>
                  </tr>
                </thead>
                <tbody class="bg-white">
                  @foreach ($allData as $ad )
                  <tr>
                    <td class="py-4 pl-4 pr-3 text-sm font-medium text-gray-900 whitespace-nowrap sm:pl-6">
                      {{$ad->fname}}
                    </td>
                    <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">{{$ad->email}}</td>
                    <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">{{$ad->address}}</td>
                    <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">{{$ad->zip}}</td>
                    <td class="relative py-4 pl-3 pr-4 text-sm font-medium text-right whitespace-nowrap sm:pr-6">
                      <a href="javascript:void(0)" wire:click='editForm({{$ad->id}})'
                        class="text-indigo-600 hover:text-indigo-900">Edit<span class="sr-only"></span></a> |
                      <a href="javascript:void(0)" wire:click='deleteForm({{$ad->id}})'
                        class="text-red-600 hover:text-red-900">Delete<span class="sr-only"></span></a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              {{ $allData->links() }}

            </div>
          </div>
        </div>
      </div>
    </div>
    @endif


  </body>
</div>