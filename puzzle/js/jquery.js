function init() {
   $('.box').each(function(el){
        $(this).click(function() {        
            var btnText = $(this).text();
            var btnBg = $(this).css('backgroundColor');
            var btnColor = $(this).css('color');

            if ($(this).hasClass('1c')) {
                var rightText = $(this).next().text();
                var rightBg = $(this).next().css('backgroundColor');
                var rightColor = $(this).next().css('color');

                $(this).text(rightText);
                $(this).css({'backgroundColor': rightBg, 'color': rightColor});

                $(this).next().text(btnText);
                $(this).next().css({'backgroundColor': btnBg, 'color': btnColor});

            } else if ($(this).hasClass('2c')) {

                var leftText = $(this).prev().text();
                var leftBg = $(this).prev().css('backgroundColor');
                var leftColor = $(this).prev().css('color');

                var rightText = $(this).next().text();
                var rightBg = $(this).next().css('backgroundColor');
                var rightColor = $(this).next().css('color');

                $(this).prev().text(rightText)
                $(this).prev().css({'backgroundColor': rightBg, 'color': rightColor});   

                $(this).next().text(leftText)
                $(this).next().css({'backgroundColor': leftBg, 'color': leftColor});   

            } else if ($(this).hasClass('3c')) {
                var leftText = $(this).prev().text();
                var leftBg = $(this).prev().css('backgroundColor');
                var leftColor = $(this).prev().css('color');

                $(this).text(leftText);   
                $(this).css({'backgroundColor': leftBg, 'color': leftColor});

                $(this).prev().text(btnText);   
                $(this).prev().css({'backgroundColor': btnBg, 'color': btnColor});
            }
        })
    })
}

init();
2