<x-app>
    <div class="relative mb-3">
        <a href="/categories/create" class="btn btn-success absolute top-0 right-0 rounded-full">Add category</a>
    </div>

    <div>
        <p class="text-white text-xl text-bold mb-3">My categories</p>
        
        <div class="flex flex-wrap">
            @forelse ($categories as $category)
                <div class="card rounded-lg mr-2 mb-2" style="width: 15rem">
                    <div class="card-body flex items-center">
                        <div class="flex-wrap">
                            <p class="text-white font-bold mr-2">
                                Category: {{ $category->name }}
                            </p>
                            <p class="text-white font-bold mr-2">
                                Type: {{ $category->type }}
                            </p>
                            <p class="text-white font-bold mr-2">
                                Description: {{ $category->description }}
                            </p>
                            <div class="flex items-center">
                                <a href="/categories/{{ $category->id }}/edit" class="btn btn-success rounded-full mt-3 mr-2 mx-8">Edit</a>

                                <form
                                    method="POST" 
                                    action="/categories/{{ $category->id }}/delete"
                                >
                                @csrf
                                @method('DELETE')
                                    <button type="submit" class="btn btn-danger rounded-full mt-3">Delete</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-white text-xl text-bold">No categories yet</p>
            @endforelse
        </div>
    </div>
</x-app>