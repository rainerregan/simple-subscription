@component('mail::message')
# A New Blog Post is Posted

Hi, {{ $subscriber->email }}. Thanks for subscribing. There is a new blog post posted on your subscription list.

@component('mail::panel')
    ## {{$post->title}}
    {{$post->content}}
@endcomponent

{{-- @component('mail::button', ['url' => route('posts.show', [''])])
See post
@endcomponent --}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
