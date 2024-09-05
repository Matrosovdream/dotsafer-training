(function ($) {
    "use strict";

    function makeHtml(items) {
        let html = `<div id="payoutDetailsModal">
            <h3 class="section-title after-line font-20 text-dark-blue mb-3">${payoutDetailsLang}</h3>
            <div class="row justify-content-center">
                <div class="w-75 js-modal-body">`;

        for (const item of items) {
            html += `<div class="d-flex align-items-center justify-content-between text-gray mt-2">
                            <span class="font-weight-bold">${item.name}</span>
                            <span>${item.value}</span>
                        </div>`;
        }


        html += `</div>
            </div>
            <div class="mt-3 d-flex align-items-center justify-content-end">
                <button type="button" class="btn btn-sm btn-danger close-swl">${closeLang}</button>
            </div>
        </div>`;

        return html;
    }

    $('body').on('click', '.js-show-details', function () {
        const $this = $(this);
        const $items = $this.closest('tr').find('.js-bank-details');

        let data = [];

        for (const item of $items) {
            const $item = $(item);

            data.push({
                name: $item.attr('data-name'),
                value: $item.val(),
            })
        }

        Swal.fire({
            html: makeHtml(data),
            showCancelButton: false,
            showConfirmButton: false,
            customClass: {
                content: 'p-0 text-left',
            },
            width: '40rem',
        });
    });

})(jQuery);
