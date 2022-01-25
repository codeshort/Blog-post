<x-layout>
  @include('_post-header')
   <x-post-featured-card :post="$posts[0]"/>
   <x-post-grids :posts="$posts"/>
    
<!-- @foreach ($posts as $post)
  <a href = "post/{{$post->id}}" ><h1>{{$post->title}}</h1></a>
  <h2>Written by <a href="/authors/{{$post->author->username}}">{{$post->author->nusername}}</a></h2>
  <a href="/categories/{{$post->category->id}}">{{$post->category->name}}</a>  
    
    <article>
        {{$post->excerpt;}}
    </article>
@endforeach -->
</x-layout>