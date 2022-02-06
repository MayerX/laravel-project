<section class="text-gray-600 body-font">
    <div class="container mx-auto flex px-20 py-8 flex-row  items-center">
        <div class="w-1/3 mb-10">
            <img class="object-cover object-center rounded" alt="hero" src="{{ $imageSrc }}">
        </div>
        <div class="w-2/3 pl-20 flex flex-col text-left">
            <h1 class="title-font text-2xl mb-4 font-medium text-gray-900">
                {{ $title }}
            </h1>
            <p class="mb-4 leading-relaxed whitespace-normal text-left text-sm">
                {{ $message }}
            </p>
        </div>
    </div>
</section>
