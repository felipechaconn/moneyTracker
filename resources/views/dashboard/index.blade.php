<x-app>
    <div class="flex flex-wrap px-20">

        @include('_account-balance')

        @include('_total-income')

        @include('_total-expenses')

        @include('_income-categories')

        @include('_expenses-categories')

        @include('_expenses-income')

    </div>
</x-app>