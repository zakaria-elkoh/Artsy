
@include('layouts.header')
@include('layouts.nav')

<form class="p-6 bg-[#333] max-w-screen-md mx-auto mt-28 mb-10 rounded-3xl" action="{{route('projects.store')}}" method="POST">
    @csrf
    <h2 class="text-3xl font-extrabold mb-5 text-center dark:text-white">Greate a Project:</h2>
    <div>
        <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title:</label>
        <input type="hidden" name="partner_id" value="{{ auth()->id() }}">
        <input type="text" name="title" value="{{old('title')}}" id="title" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Title">
        @error('title')
            <span class="text-red-400">{{$message}}</span>
        @enderror
    </div>
    <div>
        <label for="partner_id" class="block mb-2 mt-5 text-sm font-medium text-gray-900 dark:text-white">Partner:</label>
        <select id="partner_id" name="partner_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
          @foreach ($usersWithPartnerRole as $partner)
            <option value="{{ $partner->id }}">{{ $partner->name }}</option>
          @endforeach
        </select>
    </div>
    <div>
        <label for="artist_id" class="block mb-2 mt-5 text-sm font-medium text-gray-900 dark:text-white">Artist:</label>
        <select multiple id="artist_id" name="artist_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
          @foreach ($usersWithArtistRole as $artist)
            <option value="{{ $artist->id }}">{{ $artist->name }}</option>
          @endforeach
          {{-- <select multiple id="countries_multiple" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option value="US">United States</option>
          </select> --}}
        </select>
    </div>
    <div>
        <label for="description" class="block mb-2 mt-5 text-sm font-medium text-gray-900 dark:text-white">Description:</label>
        <textarea id="description" name="description" rows="4" class="block p-2.5 w-full h-48 text-sm bg-gray-700 text-white rounded-lg border border-gray-600" placeholder="Write your thoughts here...">
            {{old('description')}}
        </textarea>
        @error('description')
            <span class="text-red-400">{{$message}}</span>
        @enderror
    </div>
    {{-- <div>
        <label for="publication_year" class="block mb-2 text-sm mt-5 font-medium text-gray-900 dark:text-white">Publication year:</label>
        <input type="date" name="publication_year" value="{{old('publication_year')}}" id="time" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Published year">
        @error('publication_year')
            <span class="text-red-400">{{$message}}</span>
        @enderror
    </div> --}}
    {{-- <div>
        <label for="author" class="block mb-2 text-sm mt-5 font-medium text-gray-900 dark:text-white">Author:</label>
        <input type="text" name="author" value="{{old('author')}}" id="author" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Author">
        @error('author')
            <span class="text-red-400">{{$message}}</span>
        @enderror
    </div> --}}
    {{-- <div>
        <label for="total_copies" class="block mb-2 text-sm mt-5 font-medium text-gray-900 dark:text-white">Total Copies:</label>
        <input type="number" name="total_copies" value="{{old('total_copies')}}" id="total_copies" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Total Copies">
        @error('total_copies')
            <span class="text-red-400">{{$message}}</span>
        @enderror
    </div> --}}
    {{-- <div>
        <label for="available_copies" class="block mb-2 text-sm mt-5 font-medium text-gray-900 dark:text-white">Available Copies:</label>
        <input type="number" name="available_copies" value="{{old('available_copies')}}" id="available_copies" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Available Copies">
        @error('available_copies')
            <span class="text-red-400">{{$message}}</span>
        @enderror
    </div> --}}
    <button type="submit" name="create_book" class="text-white block mx-auto bg-blue-700 focus:outline-none hover:bg-blue-800 focus:ring-4 font-medium rounded-full text-sm py-2.5 px-10 mt-5">Create a project</button>
</form>
