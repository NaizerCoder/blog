@php
    $user_current = auth()->user();
@endphp

<div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="info text-white">
        {{$user_current->name}}
    </div>
</div>
