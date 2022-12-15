<div class="navbar-item">
    <form role="search" method="get" class="search-form field has-addons" action="<?php echo home_url( '/' ); ?>">

        <div class="control">
            <input class="input" type="search" placeholder="Search" value="<?php echo get_search_query() ?>" name="s" aria-label="Search">

        </div>
        <div class="control">
            <button class="button" type="submit">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="width: 24px;height: 24px">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
            </svg>
            </button>
        </div>
    </form>
</div>