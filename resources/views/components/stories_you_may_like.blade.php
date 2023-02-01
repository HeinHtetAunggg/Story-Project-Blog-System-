@props(['randomStories'])
<section class="blogs_you_may_like">
    <div class="container">
      <h3 class="text-center my-4 fw-bold">Stories You May Like</h3>
      <div class="row text-center">
          @foreach ($randomStories as $story)
          <div class="col-md-4 mb-4">
              <x-story-card :story="$story"/>
            </div>
          @endforeach   
      </div>
    </div>
  </section>