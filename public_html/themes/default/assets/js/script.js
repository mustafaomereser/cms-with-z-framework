$(() => {
    $('.menu').addClass('d-flex').css('gap', '15px');
    $('.menu-item-link').addClass('nav-link');
    $('.menu-item-link.have-sub-menu').each((index, item) => {
        let uniq = Math.random().toString().split('.').pop() + "-dropdown";
        item = $(item);

        item.parent().addClass('dropdown');
        item.addClass('dropdown-toggle').attr('id', uniq).attr('data-bs-toggle', "dropdown");

        item.next().addClass('dropdown-menu').attr('aria-labelledby', uniq);

        if (item.next().find('sub-menu02').length) item.next().attr('no-close', 'true');

        item.next().find('.dropdown-menu').addClass('dropdown-item');
    });

    $('.sub-menu').find('.dropdown').addClass('drop-down02');
    $('.sub-menu').find('.dropdown-menu').addClass('sub-menu02');

    $(".dropdown-menu").on('click', function (e) {
        let me = $(this);
        e.stopPropagation();

        if (!me.attr('no-close')) $(`#${$(this).attr('aria-labelledby')}`).click();
    });
});


$('.sub-menu-item .have-sub-menu').on('click', function (e) {
    $(this).parent().parent().addClass('show');
});

(($bs) => {
    const CLASS_NAME = 'has-child-dropdown-show';
    $bs.Dropdown.prototype.toggle = function (_orginal) {
        return function () {
            document.querySelectorAll('.' + CLASS_NAME).forEach(function (e) {
                e.classList.remove(CLASS_NAME);
            });
            try {
                let dd = this._element.closest('.dropdown').parentNode.closest('.dropdown');
                for (; dd && dd !== document; dd = dd.parentNode.closest('.dropdown')) dd.classList.add(CLASS_NAME);
            } catch (err) { }
            return _orginal.call(this);
        }
    }($bs.Dropdown.prototype.toggle);
})(bootstrap);