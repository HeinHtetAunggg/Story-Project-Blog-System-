<x-layout>

    <!-- singloe blog section -->
    <div class="container">
      <div class="row">
        <div class="col-md-6 mx-auto text-center">
          <img
            src='{{asset("storage/$story->thumbnail")}}'
            class="card-img-top"
            alt="..."
          />
          <h3 class="my-3">{{$story->title}}</h3>
          <div>
            <div>Author -<a href="/users/{{$story->author->username}}">{{$story->author->name}}</a></div>
            <a href="/categories/{{$story->category->slug}}">
            <div class="badge bg-primary">{{$story->category->name}}</div>
            </a>
            <div class="text-secondary">{{$story->created_at->diffForHumans()}}</div>
            <form action="/stories/{{$story->slug}}/subscription" method="POST">
              @csrf
              @auth
              @if (auth()->user()->isSubscribed($story))
              <button class="btn btn-danger my-2">Unsubscribe</button>              
              @else
              <button class="btn btn-warning my-2">Subscribe</button>
              @endif
              @endauth
          </form>

          </div>
          <p class="lh-md mt-3">
            {!!$story->body!!}
          </p>
        </div>
      </div>
    </div>
    @auth
    <x-comment-form :story="$story"/>
    @else
    <p class="text-center">Please <a href="/login">login</a> to participate this comment section</p>
    @endauth

    <!-- subscribe new blogs -->
    @if(count($story->comments))
    <x-comments :comments="$story->comments()->latest()->paginate(3)"/>
    @endif
    <x-stories_you_may_like :randomStories="$randomStories"/>
    <!-- footer -->
</x-layout>


