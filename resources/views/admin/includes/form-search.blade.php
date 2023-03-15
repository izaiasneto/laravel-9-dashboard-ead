<form action="{{ route($routerName, $params ?? '') }}" method="get">
    <div class="mb-3 xl:w-96">
        <div class="relative mb-4 flex w-full flex-wrap items-stretch">
            <input type="search" name="filter" placeholder="Pesquisar" aria-label="Search" aria-describedby="button-addon2" value="{{ request('filter') }}" class="form-control relative flex-auto min-w-0 block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
        </div>
    </div>
</form>
