@extends ('layout')

@section ('content')
    <div id="wrapper">
        <div id="page" class="container">

            @forelse ($articles as $article)
                <div id="content">
                    <div class="title">
                        <h2><a href="{{ route('articles.show', $article->id) }}">
                                {{$article->title}}
                            </a></h2>
                        <p><img src="/images/banner.jpg" alt="" class="image image-full"/></p>
                        {{$article->body}}
                    </div>
                    {!! $article->excerpt !!}
                </div>
            @empty
                <p>No relevant articles yet.</p>
            @endforelse
        </div>
    </div>
@endsection
