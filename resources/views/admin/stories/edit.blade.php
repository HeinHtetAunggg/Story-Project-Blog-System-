<x-admin-layout>
    <h3 class="my-3 text-center text-primary">Story Edit Form</h3>
 
        <x-card-wrapper>
            <form action="/admin/stories/{{$story->slug}}/update" method="POST" enctype="multipart/form-data">
                @csrf
                @method('patch')
    <x-form.input name="title" value="{{$story->title}}"/>
    <x-form.input name="slug" value="{{$story->slug}}"/>
    <x-form.input name="intro" value="{{$story->intro}}"/>

    <x-form.textarea name="body" value="{{$story->body}}"/>

    <x-form.input name="thumbnail" type="file"/>
    <img src='/storage/{{$story->thumbnail}}'  witdth="200px" height="100px" alt=""/>

    <x-form.input-wrapper>
    <x-form.label name="category"/>
    <select name="category_id" id="category" class="form-control">    
        @foreach ($categories as $category)
        <option {{$category->id==old('category_id',$story->category->id)? 'selected':''}} value="{{$category->id}}">{{$category->name}}</option>            
        @endforeach
    </select>
    <x-error name="category_id"/>
    </x-form.input-wrapper>

    <div class="mt-3">
    <button type="submit" class="btn btn-primary">Submit</button>
  
</form>
        </x-card-wrapper>
    </div>
</x-admin-layout>