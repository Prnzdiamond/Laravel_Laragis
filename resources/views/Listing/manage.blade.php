<x-layout>

    @if (count($listing) !== 0)
    @foreach ($listing as $item)

     <div class="max-w-lg mx-auto bg-white shadow-md rounded-lg p-6 m-6">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="text-lg font-semibold text-gray-800">{{$item->list_title}}</h2>
                <p class="text-sm text-gray-600">{{$item->company}}</p>
            </div>
            <div class="flex space-x-2">
                <a  href="/listing/{{$item->id}}/edit">
                <button class="flex items-center px-3 py-1 bg-blue-500 text-white text-sm font-semibold rounded-md hover:bg-blue-600">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    Edit
                </button></a>
               <a  href="/listing/{{$item->id}}/delete">
             <button class="flex items-center px-3 py-1 bg-red-500 text-white text-sm font-semibold rounded-md hover:bg-red-600">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                    Delete
                </button></a>
            </div>
        </div>
     </div>
      @endforeach
     @else
     <div class="max-w-lg mx-auto bg-white shadow-md rounded-lg p-6"><h3>You have Not Posted Any Jobs</h3>
     </div>
    @endif

</x-layout>
