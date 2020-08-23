<x-app>
    <div class="relative mb-3">
        <a href="/currencies/create" class="btn btn-success absolute top-0 right-0 rounded-full">Add currency</a>
    </div>

    <div>
        <p class="text-white text-xl text-bold mb-3">My currencies</p>
        
        <div class="flex flex-wrap">
            @forelse ($currencies as $currency)
                <div class="card rounded-lg mr-2 mb-2" style="width: 15rem">
                    <div class="card-body flex items-center">
                        <div class="flex-wrap">
                            <p class="text-white font-bold mr-2">Symbol: {{ $currency->symbol }}</p>
                            <p class="text-white font-bold mr-2">
                                Description: {{ $currency->description }}
                            </p>
                            <p class="text-white font-bold mr-2">
                                Exchange rate: {{ $currency->rate }}
                            </p>
                            <div class="flex items-center">
                                <a href="/currencies/{{ $currency->id }}/edit" class="btn btn-success rounded-full mt-3 mr-2 mx-8">Edit</a>

                                <form
                                    method="POST" 
                                    action="/currencies/{{ $currency->id }}/delete"
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
                <p class="text-white text-xl text-bold">No currencies yet</p>
            @endforelse
        </div>
    </div>
</x-app>