@props(['story'])
<div class="card">
    <img
      src='{{asset("storage/$story->thumbnail")}}'
      class="card-img-top"
      alt="..."
    />
    <div class="card-body">
      <h3 class="card-title">{{$story->title}}</h3>
      <p class="fs-6 text-secondary"><a href="/?author={{$story->author->username}}">
        {{$story->author->name}}</a>
        <span> - {{$story->created_at->diffForHumans()}}</span>
      </p>
      <div class="tags my-3">
        <a href="/?category={{$story->category->slug}}">
        <span class="badge bg-primary">{{$story->category->name}}</span>
    </a>
      </div>
      <p class="card-text">
        {{$story->intro}}
      </p>
      <a href="/stories/{{$story->slug}}" class="btn btn-primary">Read More</a>
    </div>
  </div>