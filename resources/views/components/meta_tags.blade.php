@if($meta)
    <title>{{$meta->title}} - {{config('app.name')}}</title>
    <meta name='description' itemprop='description' content='{{$meta->description}}' />
    <meta name='keywords' content='{{$meta->keywords}}' />
    <meta property='article:published_time' content='{{$meta->created_at or ''}}' />
    <meta property='article:section' content='event' />

    <meta property="og:description" content="{{$meta->description}}" />
    <meta property="og:title" content="{{$meta->title}}" />
    <meta property="og:url" content="{{url()->current()}}" />
    <meta property="og:type" content="article" />
    <meta property="og:locale" content="en-us" />
    <meta property="og:locale:alternate" content="en-us" />
    <meta property="og:site_name" content="{{config('app.name')}}" />
        @forelse($meta->images as $image)
            <meta property="og:image" content="{{$image->url}}" />
            @empty
        @endforelse
    <meta property="og:image:url" content="{{$meta->image or ''}}" />
    <meta property="og:image:size" content="300" />

    <meta name="twitter:card" content="summary" />
    <meta name="twitter:title" content="{{$meta->title}}" />
    <meta name="twitter:site" content="@BrnBhaskar" />
@endif
