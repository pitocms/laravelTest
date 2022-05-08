@component('mail::message')
Title: {{ $post->title }}
Description: {{ $post->description }}

Thanks,
<br />
{{ config('app.name') }}
@endcomponent
