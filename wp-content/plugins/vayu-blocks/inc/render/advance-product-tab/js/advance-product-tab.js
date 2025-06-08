jQuery(document).ready(function($) {
    $('.wp-block-vayu-blocks-advance-product').each(function() {
        var $wrapper = $(this);
        var $data_attr = JSON.parse($wrapper.attr('data-attr'));
        var $tabs = $wrapper.find('.category-tabs .tab-link');
        var $pagination = $wrapper.find('.th-pagination');
        var $productContent = $wrapper.find('.th-product-block-product-content');
        var totalPages = $wrapper.find('.th-product-block-product-item-wrap').attr('total-page');
        var currentPage = 1;

        $tabs.on('click', function() {
            var cat_id = $(this).attr('cat_slug');
            $tabs.removeClass('active');
            $(this).addClass('active');
            $wrapper.find('.th-product-block-product-item-wrap').append('<div class="th-block-loader"></div>');
            $.ajax({
                url: advance_product_tab_ajax.ajax_url,
                type: 'POST',
                dataType: 'json',
                data: {
                    action: 'load_category_products',
                    category_id: cat_id,
                    attr: JSON.stringify($data_attr),
                    th_nonce: advance_product_tab_ajax.th_nonce
                },
                success: function(response) {
                    $productContent.html(response);
                    totalPages = $wrapper.find('.th-product-block-product-item-wrap').attr('total-page');;
                    $pagination.find('button.prev').attr('disabled', currentPage == 1);
                    $pagination.find('button.next').attr('disabled', currentPage == parseInt(totalPages));
                    $wrapper.find('.th-block-loader').remove();
                },
                error: function(xhr, status, error) {
                    console.log(error);
                },
            });
        });

        $wrapper.on('click', '.th-pagination button', function() {
            if ($(this).hasClass('prev')) {
                if (currentPage > 1) {
                    currentPage--;
                }
            } else if ($(this).hasClass('next')) {
                if (currentPage < totalPages) {
                    currentPage++;
                }
            }
            loadProducts(currentPage);
        });

        function loadProducts(page) {
            $wrapper.find('.th-product-block-product-item-wrap').append('<div class="th-block-loader"></div>');
            $.ajax({
                url: advance_product_tab_ajax.ajax_url,
                type: 'POST',
                dataType: 'json',
                data: {
                    action: 'load_category_products',
                    category_id: $tabs.filter('.active').attr('cat_slug'),
                    attr: JSON.stringify($data_attr),
                    page: page,
                    th_nonce: advance_product_tab_ajax.th_nonce,
                },
                success: function(response) {
                    $productContent.html(response);
                    currentPage = page;
                     console.log(response);
                    $pagination.find('button.prev').attr('disabled', currentPage == 1);
                    $pagination.find('button.next').attr('disabled', currentPage == parseInt(totalPages));
                    $wrapper.find('.th-block-loader').remove();
                },
                error: function(xhr, status, error) {
                    console.log(error);
                },
            });
        }

        //loadProducts(currentPage);
    });
});
