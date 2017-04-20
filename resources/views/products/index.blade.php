@extends('layouts.app')

@section('content')
    <div class="columns">
        <div class="column">
            <h1 class="title">Products</h1>
        </div>
        <div class="column has-text-right">
            Sort by:
            <a href="?order=name" class="tag is-primary">
                Name
                @if(request()->get('order') == 'name')
                    <span class="icon is-small">
                        <i class="fa fa-check"></i>
                    </span>
                @endif
            </a>
            <a href="?order=price" class="tag is-primary">
                Price
                @if(request()->get('order') == 'price')
                    <span class="icon is-small">
                        <i class="fa fa-check"></i>
                    </span>
                @endif
            </a>
        </div>
    </div>

    @foreach($products->chunk(4) as $chunkOfProducts)
        <div class="columns">
            @foreach($chunkOfProducts as $product)
                <div class="column">
                    @include('products.partials.product')
                </div>
            @endforeach
        </div>
    @endforeach

    {{ $products->links('layouts.partials.pagination') }}
@endsection