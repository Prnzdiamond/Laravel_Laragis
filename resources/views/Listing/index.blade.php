
    <x-layout >
        @include('partials.__hero')
        @include('partials.__search')
    @if (count($listings) != 0) 
     <div
              class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4"
          >

    @foreach ($listings as $item)
         <x-card-tile  :item=$item/>
    @endforeach
    @else
      <h1 class="text-center">NO Listing Available Yet</h1>
     </div>
    @endif

    <p>{{$listings->links('vendor.pagination.simple-tailwind')}}</p>

    </x-layout>
