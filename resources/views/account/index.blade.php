<x-app>
    <div class="relative mb-3">
        <a href="/accounts/create" class="btn btn-success absolute top-0 right-0 rounded-full">Add account</a>
    </div>

    <div>
        <p class="text-white text-xl text-bold mb-3">My accounts</p>
        
        <div class="col-lg-12">
            @forelse ($accounts as $account)
                <div class="card rounded-lg mr-2 mb-2">
                    <div class="card-body flex items-center">
                        <div class="flex-wrap">
                            <h3 class="text-white font-bold">Account:</h3>
                            <p class="text-white  mr-2 mb-4">{{ $account->name }}</p>
                            <h3 class="text-white font-bold">Account Description:</h3>
                            <p class="text-white  mr-2 mb-4">{{ $account->description }}</p>
                            <p class="text-white font-bold mr-2 mb-4">
                                Current balance: {{ $account->getCurrency() }}{{ $account->initial_balance }}
                            </p>
                            <img 
                                src="/uploads/icons/{{$account->icon}}" 
                                alt="account_icon" 
                                class="absolute"
                                style="left: 60rem;bottom: 80px;"
                                width="110"
                                height="110"
                            >
                            <div class="flex items-center">
                                <a href="/accounts/{{ $account->id }}/edit" class="btn btn-success rounded-full mt-3 mr-2">Edit</a>

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