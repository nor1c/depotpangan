<template id="product-card-template">
    <div class="div-class">
        <div class="product product7">
            <article>
                <div class="productdetail" style="text-align: center;">
                    <div class="thumb">
                        <div class="badges">
                        </div>
                        <img class="img-fluid product-card-image" src=""
                            alt="Modern Single Sofa">
                        <div class="product-action-vertical">

                            <a href="javascript:void(0)" class="wishlist-icon icon active swipe-to-top" data-toggle="tooltip"
                                data-placement="bottom" title="" data-original-title="Wishlist">
                                <i class="fas fa-heart"></i>
                            </a>
                            <div class="icon swipe-to-top quick-view-icon" data-toggle="modal" data-target="#quickViewModal"
                                data-tooltip="tooltip" data-placement="bottom" title=""
                                data-original-title="Quick View">
                                <i class="fas fa-eye"></i>
                            </div>
                            <a href="javascript:void(0)" class="compare-icon icon swipe-to-top" data-toggle="tooltip"
                                data-placement="bottom" title="" data-original-title="Compare"><i
                                    class="fas fa-align-right" data-fa-transform="rotate-90"></i></a>

                        </div>

                    </div>
                    {{-- <a class="btn-secondary btn btn-block display-none icon swipe-to-top product-card-link">
                        Tambah ke Keranjang
                    </a> --}}
                    <div class="content">
                        <span class="tag product-card-category">
                        </span>

                        <h5 class="title"><a href="javascript:void(0)" class="product-card-name"></a></h5>
                        <p class="para product-card-desc"></p>
                        <div class="price product-card-price">               
                        </div>
                        <a class="btn-secondary btn icon swipe-to-top product-card-link">
                            <i class="fas fa-shopping-bag"></i>
                          </a>
                    </div>
                </div>
            </article>
            <div class="d-none display-rating" ></div>
            <div class="d-none display-rating1" ></div>
            <div class="d-none add-to-card-bag" ></div>
            <div class="d-none wishlist-icon-2" ></div>
            <div class="input-group item-quantity d-none">

                <input type="text" id="" name="quantity" class="form-control qty-input" value="1">

                <span class="input-group-btn">
                    <button type="button" value="quantity21" class="quantity-plus21 btn quantity-right-plus"
                        data-type="plus" data-field="">
                        <i class="fas fa-plus"></i>
                    </button>

                    <button type="button" value="quantity21" class="quantity-minus21 btn quantity-left-minus"
                        data-type="minus" data-field="">
                        <i class="fas fa-minus"></i>
                    </button>
                </span>
            </div>

        </div>
    </div>
</template>
