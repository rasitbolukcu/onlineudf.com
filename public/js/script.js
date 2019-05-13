$(document).ready(function(e){

    if($("#udf").length > 0){
        $("#editor").append('<div class="a4"></div>');
        var a4 = $('.a4').last();
        a4.append('<div class="wrapper"></div>');
        var wrapper = $('.wrapper').last();

        var udf = $("#udf");
        udf.children().each(function(index, item){
            $(this).appendTo(wrapper);
            if((wrapper.height() > a4.height()) || $(this).hasClass("pb")){
                $("#editor").append('<div class="a4"></div>');
                a4 = $('.a4').last();
                a4.append('<div class="wrapper"></div>');
                wrapper = $('.wrapper').last();
                $(this).appendTo(wrapper);
            }
        });

        udf.remove();

        $('span[size]').each(function(index, item){
            $(this).css('font-size', $(this).attr('size') + "pt");
        });

        $('span[foreground]').each(function(index, item){
            var decimal = 16777216 + parseInt($(this).attr('foreground'));
            var r = Math.floor(decimal / (256*256));
            var g = Math.floor(decimal / 256) % 256;
            var b = decimal % 256;
            $(this).css('color', 'rgb(' + r + ',' + g + ',' + b + ')');
        });

        $('span[background]').each(function(index, item){
            var decimal = 16777216 + parseInt($(this).attr('background'));
            var r = Math.floor(decimal / (256*256));
            var g = Math.floor(decimal / 256) % 256;
            var b = decimal % 256;
            $(this).css('background-color', 'rgb(' + r + ',' + g + ',' + b + ')');
        });
    }
});
