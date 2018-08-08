<lastproducts-component
    :user = "{{ Auth::check() ? Auth::user()->load(['favoriteProductAds']) : 'null' }}"
    :auth_user = "{{ json_encode(Auth::check())}}">
</lastproducts-component>