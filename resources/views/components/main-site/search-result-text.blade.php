@if(request()->has('search'))
<div class="container">
    <p class="text-center">Text results for "{{ request()->input('search') }}":</p>
</div>
@endif