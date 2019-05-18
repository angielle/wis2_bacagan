function init() {
   $('.box').each(function(el){
        $(this).click(function() {        
            var btnText = $(this).text();
            var btnBg = $(this).prop('classList');;

            if ($(this).hasClass('1c')) {
                var rightText = $(this).next().text();
                var rightBg = $(this).next().prop('classList');

                $(this).text(rightText);
                $(this).toggleClass(rightBg);

                $(this).next().text(btnText);
                $(this).next().toggleClass(btnBg);

            } else if ($(this).hasClass('2c')) {
                var leftText = $(this).prev().text();
                var leftBg = $(this).prev().prop('classList');

                var rightText = $(this).next().text();
                var rightBg = $(this).next().prop('classList');

                $(this).prev().text(rightText);   
                $(this).prev().toggleClass(leftBg);

                $(this).next().text(leftText);   
                $(this).prev().toggleClass(rightBg);

            } else if ($(this).hasClass('3c')) {
                var leftText = $(this).prev().text();
                var leftBg = $(this).prev().prop('classList');

                $(this).text(leftText);   
                $(this).toggleClass(leftBg);

                $(this).prev().text(btnText);   
                $(this).prev().toggleClass(btnBg);
            }
        })
    })
}

init();
