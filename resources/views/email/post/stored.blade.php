@component('mail::message')
Title: {{ $post->title }}
<br />
Description: {{ $post->description }}

Thanks,
<br />
{{ config('app.name') }}
@endcomponent
