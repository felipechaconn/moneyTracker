<x-app>
    <form
        class="col-lg-6 ml-48"
        method="POST" 
        action="/currencies"    
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
            for="symbol"
        >
            Symbol
        </label>

        <input class="border border-white p-2 w-full"
            type="text" 
            name="symbol" 
            id="symbol"
            required
        >

        @error('symbol')
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
        <label class="block mb-2 uppercase font-bold text-xs text-white" 
            for="rate"
        >
            Rate
        </label>

        <input class="border border-white p-2 w-full"
            type="text" 
            name="rate" 
            id="rate"
            required
        >

        @error('rate')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-6">
        <button type="submit"
                class="bg-green-400 text-white rounded-full py-2 px-4 hover:bg-green-500 mr-4"
        >
            Submit
        </button>

        <a href="/currencies" class="hover:underline text-white">Cancel</a>
    </div>

    </form>
</x-app>