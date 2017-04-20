<div class="card">
    <header class="card-header">
        <p class="card-header-title">
            {{ str_limit($product->title, 25) }}
        </p>
    </header>
    <div class="card-image">
        <figure class="image is-4by3">
            <img src="{{ $product->image }}" alt="Image">
        </figure>
    </div>
    <div class="card-content">
        <div class="media">
            <div class="media-content">
                <p class="title is-4 has-text-centered">{{ $product->price }}</p>
            </div>
        </div>
        <div class="content">
            <form method="POST" action="{{ route('wishlist.store') }}">
                {!! csrf_field() !!}

                <input type="hidden" name="product_id" value="{{ $product->id }}">

                @if($product->wishListedBy->contains(auth()->user()))
                    <button class="button is-danger is-fullwidth">Remove from Wishlist</button>
                @else
                    <button class="button is-primary is-fullwidth">Add to Wishlist</button>
                @endif
            </form>
        </div>
    </div>
</div>