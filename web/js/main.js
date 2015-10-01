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
});
