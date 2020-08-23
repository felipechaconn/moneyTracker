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
                            <h3 class="text-white font-bold">Current Balance:</h3>
                            <p class="text-white  mr-2 mb-4">2000</p>
                            <p class="text-white font-bold mr-2 mb-4">
                                Current balance: {{ $account->getCurrency() }}{{ $account->current_balance }}
                            </p>
                        <img src="/uploads/icons/{{$account->icon}}" alt="" style="width: 100px;position: relative;left: 60rem;bottom: 140px;">
                            <div class="flex items-center">
                                <a href="/accounts/{{ $account->currency_id }}/edit" class="btn btn-success rounded-full mt-3 mr-2 mx-8">Edit</a>

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