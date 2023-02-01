@props(['stories'])
<section class="container text-center" id="stories">
    <h1 class="display-5 fw-bold mb-4">Stories</h1>
    <div class="">
       <x-category-dropdown/>
          </div>
      {{-- <select name="" id="" class="p-1 rounded-pill mx-3">
        <option value="">Filter by Tag</option>
      </select> --}}
    </div>
    <form action="/" method="GET" class="my-3">
      <div class="input-group mb-3">
        @if(request('category'))
        <input 
            type="hidden"
            name="category"
            value="{{request('category')}}"
          />
        @endif
        @if(request('author'))
          <input 
             type="hidden"
             name="author"
             value="{{request('author')}}"
        />
        @endif
        <input
          type="text"
          autocomplete="false"
          class="form-control"
          placeholder="Search Stories..."
          name="search"
          value="{{request('search')}}"
        />
        <button
          class="input-group-text bg-primary text-light"
          id="basic-addon2"
          type="submit"
        >
          Search
        </button>
      </div>
    </form>
    <div class="row">
    
        @forelse ($stories as $story)
        <div class="col-md-4 mb-4">
            <x-story-card :story="$story"/>
          </div>
        @empty
          <p class='text-center'>No Stories Found</p>
        @endforelse 
        {{$stories->links()}}
    </div>
  </section>