<label for="job" class="block text-xs font-semibold text-gray-600 uppercase mt-4">{{ $name }}</label>
<div class="flex relative">
    <label for="type" class="w-full">
        <select class="w-full block py-3 px-1 mt-1 text-gray-800 appearance-none border-b-2 border-gray-100 focus:text-gray-500 focus:outline-none focus:border-gray-200">
            {{ $slot }}
        </select>
    </label>
</div>
