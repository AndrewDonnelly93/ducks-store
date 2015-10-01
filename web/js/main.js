$(function() {
    var pgurl = window.location.href.replace(window.location.protocol+"//"+window.location.hostname,'');
    if ($(".categories").length) {
        $(".categories li a").each(function () {
            if ($(this).attr("href") == pgurl)
                $(this).addClass("current");
        });
    }
    if ($(".delete").length) {
        $('.delete').on('click', function () {
            return confirm('Вы уверены?');
        });
    }
    if ($(".product").length) {
        $(".product").each(function() {
            if (($(this).find("td.deleted-product")).length === 0) {
                var price = $(this).find("td:nth-child(2)").data('price');
                var amount = $(this).find("td:nth-child(3)").data('amount');
                var data = price * amount;
                $(this).find("td:nth-child(2)").html(data);
            }
        });
    }
});
