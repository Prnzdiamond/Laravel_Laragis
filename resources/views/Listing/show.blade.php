    <x-layout> 

    @include('partials.__search')

    <x-card_tile_hd >
        <div
                        class="flex flex-col items-center justify-center text-center"
                    >
                        <img
                            class="w-48 mr-6 mb-6"
                            src="{{asset('images/no-image.png')}}"
                            alt=""
                        />

                        <h3 class="text-2xl mb-2">{{$listing->list_title}}</h3>
                        <div class="text-xl font-bold mb-4">{{$listing->company}}</div>
                        <x-tags  :item=$listing />
                        <div class="text-lg my-4">
                            <i class="fa-solid fa-location-dot"></i> {{$listing->location}}
                        </div>
                        <div class="border border-gray-200 w-full mb-6"></div>
                        <div>
                            <h3 class="text-3xl font-bold mb-4">
                                Job Description
                            </h3>
                            <div class="text-lg space-y-6">
                               {{$listing->description}}
                                <a
                                    href="mailto:{{$listing->email}}"
                                    class="block bg-laravel text-white mt-6 py-2 rounded-xl hover:opacity-80"
                                    ><i class="fa-solid fa-envelope"></i>
                                    Contact Employer</a
                                >

                                <a
                                    href="{{$listing->website}}"
                                    target="_blank"
                                    class="block bg-black text-white py-2 rounded-xl hover:opacity-80"
                                    ><i class="fa-solid fa-globe"></i> Visit
                                    Website</a
                                >
                            </div>
                        </div>
                    </div>
                </x-card_tile_hd>
                <div class="flex space-x-2 pt-6">
    <!-- Edit Button -->
    <button class="flex items-center px-4 py-2 text-white bg-blue-500 hover:bg-blue-600 rounded-md">
       <a href="/listing/{{$listing->id}}/edit"> <i class="fas fa-edit mr-2"></i>
        Edit</a>
    </button>

    <!-- Delete Button -->
    <button class="flex items-center px-4 py-2 text-white bg-red-500 hover:bg-red-600 rounded-md">
        <a href="/listing/{{$listing->id}}/edit">  <i class="fas fa-trash-alt mr-2"></i>
        Delete</a>
    </button>
</div>
    </x-layout>