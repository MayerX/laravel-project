@for($index = 0; $index < 6;$index ++)
    <p>{{ $categories[$index]->name }}: </p>
    @foreach($articlesList[$index] as $article)
        <p>{{ $article->title }}-{{ $article->postid }}</p>
    @endforeach
    <br>
@endfor

<x-articles
    :title="$categories[1]"
    :list="$articlesList[1]">
</x-articles>
