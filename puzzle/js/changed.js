function init() {
   $('.box').each(function(el){
        $(this).click(function() {
            var id = parseInt(this.id);          
            var btnText = $('#' + id).text();
            var btnBg = $('#' + id).css('backgroundColor');
            var btnColor = $('#' + id).css('color');

            
            if (id == 1 || id == 4 || id == 7) {
                var rightText = $('#' + id).next().text();
                var rightBg = $('#' + id).next().css('backgroundColor');
                var rightColor = $('#' + id).next().css('color');

                // Change text
                $('#' + id).text(rightText);
                $('#' + id).css('backgroundColor', rightBg);
                $('#' + id).css('color', rightColor);

                $('#' + id).next().text(btnText);
                $('#' + id).next().css('backgroundColor', btnBg);
                $('#' + id).next().css('color', btnColor);


            } else if (id == 2 || id == 5 || id == 8) {
                var leftText = $('#' + id).prev().text();
                var leftBg = $('#' + id).prev().css('backgroundColor');
                var leftColor = $('#' + id).prev().css('color');

                var rightText = $('#' + id).next().text();
                var rightBg = $('#' + id).next().css('backgroundColor');
                var rightColor = $('#' + id).next().css('color');

                $('#' + id).prev().text(rightText);   
                $('#' + id).prev().css('backgroundColor', rightBg);
                $('#' + id).prev().css('color', rightColor);

                $('#' + id).next().text(leftText);   
                $('#' + id).next().css('backgroundColor', leftBg);
                $('#' + id).next().css('color', leftColor);

            } else if (id == 3 || id == 6 || id == 9 ) {
                var leftText = $('#' + id).prev().text();
                var leftBg = $('#' + id).prev().css('backgroundColor');
                var leftColor = $('#' + id).prev().css('color');

                $('#' + id).text(leftText);   
                $('#' + id).css('backgroundColor', leftBg);
                $('#' + id).css('color', leftColor);

                $('#' + id).prev().text(btnText);   
                $('#' + id).prev().css('backgroundColor', btnBg);
                $('#' + id).prev().css('color', btnColor);

            }

        })
    })
}
    


init();
