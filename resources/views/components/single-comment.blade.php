@props(['comment'])
<x-card-wrapper>
    <div class="d-flex">
        <div>
            <img
                src="{{$comment->commenter->avatar}}"
                width="50"
                height="50"
                class="rounded-circle"
                alt=""
            >
        </div>
        <div class="ms-3">
            <h6>{{$comment->commenter->name}}</h6>
            <p class="text-secondary">{{$comment->created_at->format('F j, Y, g:i a')}}</p>
        </div>
    </div>
    <p class="mt-1">
        {{$comment->body}}
    </p>
</x-card-wrapper>