@component('mail::message')
# A New Blog Post is Posted

Hi, {{ $subscriber->email }}. Thanks for subscribing. There is a new blog post posted on your subscription list.

@component('mail::panel')
    ## {{$post->title}}
    {{$post->content}}
@endcomponent

if you want to unsubscribe, [click here]({{ route('unsubscribe', ['email' => $subscriber->email]) }})

Thanks,<br>
{{ config('app.name') }}
@endcomponent
