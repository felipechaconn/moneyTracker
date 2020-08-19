<x-master>
    <section class="mt-5 px-40">
        <main class="container-fluid mx-auto px-16">
            <div class="lg:flex lg:justify-center">

                @if (auth()->check())
                    <div class="lg:w-50 mt-5">
                        @include('_sidebar-menu')
                    </div>
                @endif

                <div class="lg:flex-1 lg:mx-10 lg:mb-10 mt-5">
                    {{ $slot }}
                </div>
            </div>
        </main>
    </section>
</x-master>