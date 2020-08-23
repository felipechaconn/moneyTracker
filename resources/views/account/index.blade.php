<x-app>
    <div class="relative mb-3">
        <a href="/accounts/create" class="btn btn-success absolute top-0 right-0 rounded-full">Add account</a>
    </div>

    <div>
        <p class="text-white text-xl text-bold mb-3">My accounts</p>
        
        <div class="flex flex-wrap">
            @forelse ($accounts as $account)
                <div class="card rounded-lg mr-2 mb-2" style="width: 15rem">
                    <div class="card-body flex items-center">
                        <div class="flex-wrap">
                            <p class="text-white font-bold mr-2">Account: {{ $account->name }}</p>
                            <p class="text-white font-bold mr-2">
                                Current balance: {{ $account->getCurrency()->symbol }}{{ $account->current_balance }}
                            </p>
                            <div class="flex items-center">
                                <a href="/accounts/{{ $account->id }}/edit" class="btn btn-success rounded-full mt-3 mr-2 mx-8">Edit</a>

                                <form
                                    method="POST" 
                                    action="/accounts/{{ $account->id }}/delete"
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
                <p class="text-white text-xl text-bold">No accounts yet</p>
            @endforelse
        </div>
    </div>
</x-app>