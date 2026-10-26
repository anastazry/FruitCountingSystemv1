<header class="sticky top-0 z-40 border-b bg-white lg:ps-[260px]">
    <nav class="flex h-16 items-center justify-between gap-3 px-4 sm:px-6" aria-label="Main navigation">
        <div class="flex min-w-0 items-center gap-3">
            <button type="button" class="mobile-menu-toggle lg:hidden" aria-label="Open navigation" aria-haspopup="dialog" aria-controls="hs-application-sidebar" aria-expanded="false" data-hs-overlay="#hs-application-sidebar">
                <svg class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M4 6h16M4 12h16M4 18h16" /></svg>
            </button>
            <a href="{{ route('dashboard') }}" class="truncate font-semibold text-gray-800">Fruit Counting</a>
        </div>
        <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
            <button id="hs-dropdown-account" type="button" class="flex min-h-11 min-w-11 items-center justify-center rounded-full bg-orange-100 font-semibold text-orange-800" aria-label="Account menu" aria-haspopup="menu" aria-expanded="false">
                {{ mb_substr(auth()->user()?->name ?? 'U', 0, 1) }}
            </button>
            <div class="hs-dropdown-menu absolute end-0 z-50 mt-2 hidden w-60 max-w-[calc(100vw-2rem)] rounded-lg border bg-white p-2 shadow-lg" role="menu" aria-labelledby="hs-dropdown-account">
                <p class="break-words px-3 py-2 text-sm text-gray-600">{{ auth()->user()?->name }}</p>
                <a class="flex min-h-11 items-center rounded px-3 text-sm hover:bg-gray-100" href="{{ route('profile.edit') }}" role="menuitem">Profile</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="min-h-11 w-full rounded px-3 text-start text-sm hover:bg-gray-100" type="submit" role="menuitem">Logout</button>
                </form>
            </div>
        </div>
    </nav>
</header>
