<header id="wt-header" class="wt-header wt-haslayout wt-headervtwo">

    <div class="wt-navigationarea">

        <div class="container-fluid">

            @if (file_exists(resource_path('views/extend/includes/menu.blade.php'))) 

                @include('extend.includes.menu', ['page_order' => $page_order])

            @else 

                @include('includes.menu', ['page_order' => $page_order])

            @endif

        </div>

    </div>

</header>