const $ = jQuery;

$(document).ready(function ($) {
    let filters = handleFilters();

    // getPosts('get_posts', filters);
});

function getPosts(action, filters) {
    let data = {
        action: 'get_posts',
        filters: filters
    };

    $.ajax({
        url: ajax_object.ajax_url,
        type: 'POST',
        data: data,
        success: function (response) {
            console.log(response);
        },
        error: function (error) {
            console.log(error);
        }
    });
}

function handleFilters() {
    let filters = [];
    let $filtersContainer = $('#archive-filters');

    if ($filtersContainer.length) {
        $filtersContainer.find('input[type="checkbox"]').on('change', function () {

            let filter = $(this).val();
            let checked = $(this).prop('checked');

            if (checked) {
                filters.push(filter);
            } else {
                filters = filters.filter(item => item !== filter);
            }
        });

        $filtersContainer.find('select').on('change', function () {
            let filter = $(this).val();

            if (filter) {
                filters.push(filter);
            } else {
                filters = filters.filter(item => item !== filter);
            }
        });

        $filtersContainer.find('input[type="search"]').on('keyup', debounce(function () {
            let filter = $(this).val();

            if (filter) {
                filters.push(filter);
            } else {
                filters = filters.filter(item => item !== filter);
            }
        }));
    }

    return filters;
}

function debounce(func, delay = 500) {
    let timeoutId;

    return function(...args) {
        clearTimeout(timeoutId);

        timeoutId = setTimeout(() => {
            func.apply(this, args);
        }, delay);
    };
}