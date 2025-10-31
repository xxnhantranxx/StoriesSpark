jQuery(document).ready(function ($) {
    let searchTimeout;
    $('.search-field').on('keyup', function () {
        clearTimeout(searchTimeout);

        let query = $(this).val().trim();
        
        if (query.length < 2) { // Chỉ tìm khi có ít nhất 2 ký tự
            $('#area-live-search').removeClass("active");
            return;
        }

        searchTimeout = setTimeout(function () {
            $.ajax({
                url: ajax_object.ajax_url,
                method: "POST",
                data: {
                    action: 'live_search_products',
                    query: query,
                    nonce: ajax_object.nonce
                },
                beforeSend: function() {
                    $('#area-live-search').addClass("active");
                    $('#area-live-search').html('<p>Đang tìm kiếm...</p>');
                },
                success: function (response) {
                    if (response.success) {
                        let foundCounts = response.data.found;
                        let listProducts = response.data.products;
                        $("#area-live-search").html(renderProducts(listProducts, foundCounts, query));
                    } else {
                        $('#area-live-search').html('<p>Có lỗi xảy ra khi tìm kiếm.</p>');
                    }
                },
                error: function () {
                    $('#area-live-search').html('<p>Lỗi khi tìm kiếm sản phẩm.</p>');
                }
            });
        }, 300); // Delay 300ms tránh gọi API liên tục
    });

    // Hiển thị kết quả khi focus vào input
    $('.search-field').on('focus', function () {
        if ($('#area-live-search').html().trim() !== '' && $(this).val().trim().length >= 2) {
            $('#area-live-search').addClass("active");
        }
    });
    
    // Ẩn kết quả khi click ra ngoài
    $(document).on('click', function (e) {
        if (!$(e.target).closest('.search-field, #area-live-search').length) {
            $('#area-live-search').removeClass('active');
        }
    });

    // Render danh sách sản phẩm
    function renderProducts(products, foundCounts, query) {
        let home_url = ajax_object.home_url;
        if (!products || products.length === 0) {
            return `<p>Không tìm thấy sản phẩm nào.</p>`;
        }
        return `
            <ul class="results-list-search">
                <li class="_9myg item-label">Sản phẩm</li>
                ${products.map(renderProductItem).join('')}
                <li class="button-rmSearch"><a href="${home_url}/?s=${query}" class="button _8yya">Xem tất cả</a></li>
            </ul>
        `;
    }

    // Render một sản phẩm
    function renderProductItem(product) {
        return `
            <li class="product-item">
                <a href="${product.permalink}">
                    <div class="box-image">
                        <img src="${product.thumbnail}" alt="${product.title}">
                    </div>
                    <div class="box-text">
                        <h3 class="title-product">${product.title}</h3>
                        <div class="price_product">${product.price_html}</div>
                    </div>
                </a>
            </li>
        `;
    }
});