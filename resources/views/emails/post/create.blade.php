@component('mail::message')
# New post added

A new post has been added to this discussion.

@component('mail::button', ['url' => 'http://127.0.0.1:8000/posts'])
See the new post
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
