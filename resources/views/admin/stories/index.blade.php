<x-admin-layout>
    @if(session('success'))
    <div class="alert alert-success text-center">{{session('success')}}</div>
    @endif
<h3 class="text-center mt-3">Story</h3>
<x-card-wrapper>
<table class="table">
    <thead>
      <tr>
        <th scope="col">Title</th>
        <th scope="col">Intro</th>
        <th scope="col" colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($stories as $story)
          <tr>
                 <td><a href="stories/{{$story->slug}}" target="__blank">{{$story->title}}</a></td>
                 <td>{{$story->intro}}</td>
                 <td><a href="/admin/stories/{{$story->slug}}/edit" class="btn btn-warning">Edit</a></td>
                 <td>
                    <form action="/admin/stories/{{$story->slug}}/delete" method="POST">
                        @csrf
                        @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</b>
                  </form>
                </td>

          </tr>
      @endforeach
    </tbody>
  </table>
  {{$stories->links()}}
</x-card-wrapper>
</x-admin-layout>