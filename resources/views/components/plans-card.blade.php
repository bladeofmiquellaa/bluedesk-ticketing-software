@props(['plan'])
<x-card>
  <div class="flex">
    <img class="hidden w-48 mr-6 md:block"
      src="{{$plan->logo ? asset('images/' . $plan->logo) : asset('/images/no-image.png')}}" alt="" />
    <div>
      <h3 class="text-2xl">
        <a href="/listings/{{$plan->id}}">{{$plan->title}}</a>
      </h3>
{{--      <div class="text-xl font-bold mb-4">{{$listing->company}}</div>--}}
{{--      <x-listing-tags :tagsCsv="$listing->tags" />--}}
      <div class="text-lg mt-4">
          {{$plan->description}}
{{--        <i class="fa-solid fa-location-dot"></i> {{$listing->location}}--}}
      </div>

    </div>

  </div>
    <button type="submit" class="h-10 w-20 text-white rounded-lg bg-black hover:bg-blue-600">
        Buy
    </button>
</x-card>
