<x-app>
    <form
        class="col-lg-6 ml-48"
        method="POST" 
        action="/accounts"
        enctype="multipart/form-data"
    >
    @csrf

    <h1 class="text-white tecxt-bold text-xl text-center mb-5">Add Crurrency</h1>
    <div class="mb-6">
        <label class="block mb-2 uppercase font-bold text-xs text-white" 
            for="name"
        >
            Name
        </label>

        <input class="border border-white p-2 w-full"
            type="text" 
            name="name" 
            id="name"
            required
        >

        @error('name')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-6">
        <label class="block mb-2 uppercase font-bold text-xs text-white" 
            for="description"
        >
            Description
        </label>

        <input class="border border-white p-2 w-full"
            type="text" 
            name="description" 
            id="description"
            required
        >

        @error('description')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-6">
        <label 
            for="currencies" 
            class="block mb-2 uppercase font-bold text-xs text-white"
        >
            Currency
        </label>

        <div class="select control">
            <select 
                name="currency"
                class="custom-select"    
            >
                @foreach ($currencies as $currency)
                    <option 
                        value="{{ $currency->currency_id }}"
                    >
                        {{ $currency->name }}
                    </option>
                @endforeach
            </select>

            @error('currencies')
                <p class="help is-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="mb-6">
        <label class="block mb-2 uppercase font-bold text-xs text-white" 
            for="initial_balance"
        >
            Initial balance
        </label>

        <input class="border border-white p-2 w-full"
            type="text" 
            name="initial_balance" 
            id="initial_balance"
            required
        >

        @error('initial_balance')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-6">
        <label class="block mb-2 uppercase font-bold text-xs text-white" 
            for="icon"
        >
            Icon
        </label>


        <div class="custom-file">
            <input class="border text-white border-white p-2 w-full custom-file-input"
                type="file" 
                name="icon" 
                id="icon"
                accept="image/*"
            >
            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
        </div>

        @error('icon')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-6">
        <button type="submit"
                class="bg-green-400 text-white rounded-full py-2 px-4 hover:bg-green-500 mr-4"
        >
            Submit
        </button>

        <a href="/accounts" class="hover:underline text-white">Cancel</a>
    </div>

    </form>
</x-app>