<div class="flex justify-center">
    @if($paginator->onFirstPage())
        <div
            class="flex items-center justify-center px-4 py-2 mx-1 text-gray-500 capitalize bg-white rounded-md cursor-not-allowed">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                      d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                      clip-rule="evenodd"/>
            </svg>
        </div>
    @else
        <a href="{{ $paginator->previousPageUrl() }}"
           class="flex items-center justify-center px-4 py-2 mx-1 text-gray-700 capitalize bg-white rounded-md cursor-pointer hover:bg-blue-500 hover:text-white">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                      d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                      clip-rule="evenodd"/>
            </svg>
        </a>
    @endif

    @if($paginator->currentPage() <= 3)
        @if($paginator->lastPage() > 5)
            @for($index = 1; $index<=5; $index++)
                <a href="{{ $paginator->url($index) }}"
                   class="hidden px-4 py-2 mx-1 text-gray-700 transition-colors duration-200 transform bg-white rounded-md sm:inline hover:bg-blue-500 hover:text-white">
                    {{ $index }}
                </a>
            @endfor
        @else
            @for($index = 1; $index<=$paginator->lastPage(); $index++)
                <a href="{{ $paginator->url($index) }}"
                   class="hidden px-4 py-2 mx-1 text-gray-700 transition-colors duration-200 transform bg-white rounded-md sm:inline hover:bg-blue-500 hover:text-white">
                    {{ $index }}
                </a>
            @endfor
        @endif
    @else
        @if($paginator->currentPage()+2 < $paginator->lastPage())
            @for($index = $paginator->currentPage()-2; $index<=$paginator->currentPage()+2; $index++)
                <a href="{{ $paginator->url($index) }}"
                   class="hidden px-4 py-2 mx-1 text-gray-700 transition-colors duration-200 transform bg-white rounded-md sm:inline hover:bg-blue-500 hover:text-white">
                    {{ $index }}
                </a>
            @endfor
        @else
            @for($index = $paginator->currentPage()-2; $index<=$paginator->lastPage(); $index++)
                <a href="{{ $paginator->url($index) }}"
                   class="hidden px-4 py-2 mx-1 text-gray-700 transition-colors duration-200 transform bg-white rounded-md sm:inline hover:bg-blue-500 hover:text-white">
                    {{ $index }}
                </a>
            @endfor
        @endif
    @endif

    @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}"
           class="flex items-center justify-center px-4 py-2 mx-1 text-gray-700 transition-colors duration-200 transform bg-white rounded-md hover:bg-blue-500 hover:text-white cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                      d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                      clip-rule="evenodd"/>
            </svg>
        </a>
    @else
        <div
            class="flex items-center justify-center px-4 py-2 mx-1 text-gray-500 transition-colors duration-200 transform bg-white rounded-md cursor-not-allowed">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                      d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                      clip-rule="evenodd"/>
            </svg>
        </div>
    @endif

</div>

