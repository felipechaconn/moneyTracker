<x-master>
    <section class="px-8 mt-5">
        <main class="container mx-auto">
            <div class="lg:flex lg:justify-center">

                @if (auth()->check())
                    <div class="lg:w-50 mt-5">
                        @include('_sidebar-menu')
                    </div>
                @endif

                <div class="lg:flex-1 lg:mx-10 lg:mb-10 mt-5" style="max-width: 1500px">
                    {{ $slot }}
                </div>
                
            </div>
        </main>
    </section>
</x-master>