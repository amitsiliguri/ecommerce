<x-Frontend.Layouts.two-columns-left-side-bar>
    @if ($category->title != '')
        <h1 class="md:text-5xl text-2xl mt-2 md:mt-0">{{$category->title}}</h1>
    @endif
    @if ($category->banner != '')
        <img src="{{$category->banner}}" alt="{{$category->title }}" class="w-full mb-4">
    @endif
    @if ($category->description != '')
        <p> {{$category->description}} </p>
    @endif

    @php
        $url = '/category/product/list/' .  $category->id
    @endphp
    @include('frontend.pages.catalog.category.components.product-list', ['products' => $products, 'url' => $url])







    <x-slot name="sidebarMain">
        side bar main slot
        <hr>
    </x-slot>




    <x-slot name="sidebarAdditional">
        side bar additional slot
    </x-slot>





    <x-slot name="script">
        <script>
            function page() {
                return {
                    products: {!! $products !!},
                    url : '{!! $url !!}',
                    isSpecialPrice (price) {
                        if (price.offer_end != null && price.special_price > 0 && price.special_price != null) {
                            let currentDate = new Date();
                            let offerEndDtae = new Date(price.offer_end);
                            if(offerEndDtae > currentDate){
                                return '<span class="text-gray-400 line-through">'+ price.base_price +'</span> <span>'+ price.special_price +'</span>';
                            }else{
                                return '<span>'+ price.base_price +'</span>';
                            }
                        }else{
                            return '<span>'+ price.base_price +'</span>';
                        }
                    },
                    previousPagelink () {
                        if (this.products.current_page > 1) {
                            if (this.products.total >= this.products.per_page) {
                                this.pagination = this.products.current_page - 1
                                this.fetchProducts (this.url + '?page=' + this.pagination)
                            }
                        }
                    },
                    nextPagelink () {
                        if ((this.products.total / this.products.per_page) > 1 && this.products.current_page < (this.products.total / this.products.per_page) ) {
                            this.pagination = this.products.current_page + 1
                            this.fetchProducts (this.url + '?page=' + this.pagination)
                        }
                    },
                    fetchProducts (url) {
                        // this.isLoading = true;
                        const currentUrl = new URL(window.location.href);
                        let self = this
                        axios.get(url)
                        .then(function (response) {
                            // handle success
                            self.products = response.data;
                            currentUrl.searchParams.set('page', self.pagination);
                            history.pushState(null, document.title, currentUrl.toString());
                        })
                        .catch(function (error) {
                            // handle error
                            console.log(error);
                        });
                    }
                }
            }
        </script>
    </x-slot>
 </x-Frontend.Layouts.two-columns-left-side-bar>
 