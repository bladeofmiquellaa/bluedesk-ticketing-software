<x-sclayout>
  <x-card class="p-10 max-w-lg mx-auto mt-24">
    <header class="text-center">
      <h2 class="text-2xl font-bold uppercase mb-1">Create a Ticket</h2>
      <p class="mb-4">Create a ticket, our support will solve your problem in the shortest possible time </p>
    </header>

    <form method="POST" action="/ticket/store/{{$token_body}}" enctype="multipart/form-data">
      @csrf

      <div class="mb-6">
        <label for="title" class="inline-block text-lg mb-2">Subject</label>
        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="subject"
          placeholder="Example: The purchase receipt was not emailed to me" value="{{old('subject')}}" />

        @error('subject')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>


      <div class="mb-6">
        <label for="email" class="inline-block text-lg mb-2">
          Contact Email
        </label>
        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="email" value="{{old('email')}}" />

        @error('email')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>


      <div class="mb-6">
        <label for="description" class="inline-block text-lg mb-2">
          Job Description
        </label>
        <textarea class="border border-gray-200 rounded p-2 w-full" name="description" rows="10"
          placeholder="Include description, requirements, etc">{{old('description')}}</textarea>

        @error('description')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
          Create Ticket
        </button>

        <a href="localhost:8000/tickets/{{$token_body}}" class="text-black ml-4"> Back </a>
      </div>
    </form>
  </x-card>
</x-sclayout>
