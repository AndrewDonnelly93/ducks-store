function setOrderPrice() {
    var orderPrice = 0;
    $(this).parents("tbody").find("td.total-price").each(function() {
        orderPrice += parseInt($(this).text(),10);
    });
    $(this).parents(".create-order-form").find(".order-cost span").text(orderPrice);
}

$(function() {
    var pgurl = window.location.href.replace(window.location.protocol + "//" + window.location.hostname, '');
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
        $(".product").each(function () {
            if (($(this).find("td.deleted-product")).length === 0) {
                var price = $(this).find("td:nth-child(2)").data('price');
                var amount = $(this).find("td:nth-child(3)").data('amount');
                var data = price * amount;
                $(this).find("td:nth-child(2)").html(data);
            }
        });
    }

    if ($(".amount").length) {
        $(".amount").on("blur keyup keydown",function() {
            var amount = parseInt($(this).val(),10);
            if (!amount || 0 === amount.length || amount < 0 || isNaN(amount)) {
                $(this).val(1);
            } else if($(this).val().length >= 2){
                $(this).val($(this).val().substr(0, 2));
            }
        });
        $(".amount").each(function () {
            $(this).mask('YZ', {
                translation: {
                    'Y': {pattern: /[1-9]/},
                    'Z': {pattern: /[0-9]/, optional: true}
                }
            });
        });
    }

    });

    if ($(".create-order-form".length)) {
        if ($(".amount.cart").length) {
            $(".amount.cart").on("blur keyup keydown",function() {
                var price = $(this).parents("tr").find("td.single-price").text();
                var amount = $(this).val();
                if (!amount || 0 === amount.length || amount < 0 || isNaN(amount)) {
                    amount = 1;
                } else if($(this).val().length >= 2){
                    amount = $(this).val().substr(0, 2);
                }
                var totalPrice = price*amount;
                // Обновляем строку с ценой всех товаров у текущей позиции
                $(this).parents("tr").find("td.total-price").text(totalPrice);
                // Обновляем общую стоиомость заказа
                var orderPrice = 0;
                $(this).parents("tbody").find("td.total-price").each(function() {
                    orderPrice += parseInt($(this).text(),10);
                });
                $(this).parents(".create-order-form").find(".order-cost span").text(orderPrice);
                // Обновляем количество товаров в корзине (надпись в хедере)
                var totalAmount = 0;
                $(this).parents("tbody").find(".amount").each(function() {
                    if($(this).val().length >= 2) {
                        amount = $(this).val().substr(0, 2);
                        totalAmount += parseInt(amount);
                    }
                });
                $(this).parents("body").find(".products span").text(totalAmount);
            });
        }
    }

    if ($(".order-created").length) {
        $("body").find(".products span").text(0);
    }

    if ($(".increment").length && $(".decrement").length) {
        $(".increment").each(function () {
            var maxAmount = 99;
            var amount = parseInt($(this).siblings(".amount").val(),10);
            if (isNaN(amount)) {
                amount = 0;
            }
            $(this).on("click",function() {
                amount = parseInt($(this).siblings(".amount").val(),10);
                if (isNaN(amount)) {
                    amount = 0;
                }
                if ((amount >= 0)&&(amount < maxAmount)) {
                    amount += 1;
                    $(this).siblings(".amount").val(amount);
                    var price = $(this).parents("tr").find("td.single-price").text();
                    var totalPrice = price*amount;
                    $(this).parents("tr").find("td.total-price").text(totalPrice);
                    // Обновляем общую стоиомость заказа
                    var orderPrice = 0;
                    $(this).parents("tbody").find("td.total-price").each(function() {
                        orderPrice += parseInt($(this).text(),10);
                    });
                    $(this).parents(".create-order-form").find(".order-cost span").text(orderPrice);
                    // Обновляем количество товаров в корзине (надпись в хедере)
                    if ($(this).siblings(".amount.cart").length) {
                        var totalAmount = 0;
                        $(this).parents("tbody").find(".amount").each(function () {
                            totalAmount += parseInt($(this).val());
                        });
                        $(this).parents("body").find(".products span").text(totalAmount);
                    }
                }
            });
        });
        $(".decrement").each(function () {
            var maxAmount = 99;
            var amount = parseInt($(this).siblings(".amount").val(),10);
            if (isNaN(amount)) {
                amount = 0;
            }
            $(this).on("click",function() {
                amount = parseInt($(this).siblings(".amount").val(),10);
                if (isNaN(amount)) {
                    amount = 0;
                }
                if ((amount > 1)&&(amount <= maxAmount)) {
                    amount -= 1;
                    $(this).siblings(".amount").val(amount);
                    var price = $(this).parents("tr").find("td.single-price").text();
                    var totalPrice = price*amount;
                    $(this).parents("tr").find("td.total-price").text(totalPrice);
                    // Обновляем общую стоиомость заказа
                    var orderPrice = 0;
                    $(this).parents("tbody").find("td.total-price").each(function() {
                        orderPrice += parseInt($(this).text(),10);
                    });
                    $(this).parents(".create-order-form").find(".order-cost span").text(orderPrice);
                    // Обновляем количество товаров в корзине (надпись в хедере)
                    if ($(this).siblings(".amount.cart").length) {
                        var totalAmount = 0;
                        $(this).parents("tbody").find(".amount").each(function () {
                            totalAmount += parseInt($(this).val());
                        });
                        $(this).parents("body").find(".products span").text(totalAmount);
                    }
                }
            });
        });

    }