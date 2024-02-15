
@include('layouts.header')
@include('layouts.nav')

<form class="p-6 bg-[#333] max-w-screen-md mx-auto mt-28 mb-10 rounded-3xl" action="{{route('projects.update', $project)}}" method="POST">
    @csrf
    @method('PUT')
    <h2 class="text-3xl font-extrabold mb-5 text-center dark:text-white">Edit a Project:</h2>
    <div>
        <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title:</label>
        {{-- <input type="number" name="partner_id" value="1"class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Title"> --}}
        <input type="text" name="title" value="{{$project->title}}" id="title" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Title">
        @error('title')
            <span class="text-red-400">{{$message}}</span>
        @enderror
    </div>
    <div>
        <label for="description" class="block mb-2 mt-5 text-sm font-medium text-gray-900 dark:text-white">Description:</label>
        <textarea id="description" name="description" rows="4" class="block p-2.5 w-full h-48 text-sm bg-gray-700 text-white rounded-lg border border-gray-600" placeholder="Write your thoughts here...">
            {{$project->description}}
        </textarea>
        @error('description')
            <span class="text-red-400">{{$message}}</span>
        @enderror
    </div>
    <button type="submit" name="edit_project" class="text-white block mx-auto bg-blue-700 focus:outline-none hover:bg-blue-800 focus:ring-4 font-medium rounded-full text-sm py-2.5 px-10 mt-5">Edit</button>
</form>
