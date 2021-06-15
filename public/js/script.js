$(document).ready(function(e){

    if($("#udf").length > 0){
        var pp = $('#pageProp');
        hOffset = pp.attr('headerFOffset') - pp.attr('topMargin');
        fOffset = pp.attr('footerFOffset') - pp.attr('bottomMargin');


        $('header').each(function(index,item) {
            $(this).css('top', hOffset + 'pt');
        });

        $('footer').each(function(index,item) {
            $(this).css('bottom', fOffset + 'pt');
        });
        $("#editor").append('<div class="a4"></div>');
        var a4 = $('.a4').last();
        a4.css('padding-left', pp.attr('leftMargin')+'pt');
        a4.css('padding-right', pp.attr('rightMargin')+'pt');
        a4.css('padding-top', pp.attr('topMargin')+'pt');
        a4.css('padding-bottom', pp.attr('bottomMargin')+'pt');

        a4.append('<div class="wrapper"></div>');
        var wrapper = $('.wrapper').last();
        var udf = $("#udf");
        var header = null;
        var footer = null;
        var headerH = 0;
        var footerH = 0;

        if($('header').length){
            header = $('header').clone();
            $('header').remove();

            wrapper.append(header.clone()[0]);
            hTop = $('header').position()['top'];
            headerH = $('header').outerHeight() + hTop * 2;
            wrapper.css('padding-top',headerH + 'px');
        }
        if($('footer').length){
            footer = $('footer').clone();
            $('footer').remove();

            wrapper.append(footer.clone()[0]);
            footerH = $('footer').outerHeight();
            wrapper.css('padding-bottom',footerH + 'px');
        }
		
		
		
		$('p[listid]').each(function(index, item){
			if($("#listid"+$(this).attr('listid')).length){
				$("#listid"+$(this).attr('listid')).append($(this));
			}else{
				$(this).wrap('<ul id=listid'+$(this).attr('listid')+'></ul>');
			}
			
			
			$(this).replaceWith(function(){
				return this.outerHTML.replace("<p", "<li").replace("</p", "</li");
			});
			
        });
		

        udf.children().each(function(index, item){
            $(this).appendTo(wrapper);
            if((wrapper.outerHeight() > a4.height()) || $(this).hasClass("pb")){
                wr = $('.a4>.wrapper').last();
                wr.append($('.a4>.wrapper>footer').last());
                $("#editor").append('<div class="a4"></div>');
                a4 = $('.a4').last();
                a4.css('padding-left', pp.attr('leftMargin')+'pt');
                a4.css('padding-right', pp.attr('rightMargin')+'pt');
                a4.css('padding-top', pp.attr('topMargin')+'pt');
                a4.css('padding-bottom', pp.attr('bottomMargin')+'pt');
                a4.append('<div class="wrapper"></div>');
                wrapper = $('.wrapper').last();
                if($('header').length) {
                    wrapper.append(header.clone()[0]);
                    hTop = $('header').position()['top'];
                    headerH = $('header').outerHeight() + hTop * 2;
                    wrapper.css('padding-top', headerH + 'px');
                }
                if($('footer').length) {
                    wrapper.append(footer.clone()[0]);
                    wrapper.css('padding-bottom', footerH + 'px');
                }
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
		
		
		
		$('table[columnSpans]').each(function(index, item){
			var sutunlar= $(this).attr('columnSpans').split(",");
			var toplam=0;
			var tdler=$(this).children("tbody").children("tr").children("td");
			//tdler fazla ise de sutun sayisi kadar tdye boyut verildiğinden ilk satırın tdleri boyut almış oluyor
			
			for(i=0;i<sutunlar.length;i++){
				toplam+=parseInt(sutunlar[i]);
			}
			for(i=0;i<sutunlar.length;i++){
				$(tdler[i]).css('width',(parseInt(sutunlar[i])/toplam)*100+"%");
			}
        });

        $('tr[columnSpans]').each(function(index, item){
			var sutunlar= $(this).attr('columnSpans').split(",");
			var toplam=0;
			var tdler=$(this).children("td");
			//tdler fazla ise de sutun sayisi kadar tdye boyut verildiğinden ilk satırın tdleri boyut almış oluyor
			
			for(i=0;i<sutunlar.length;i++){
				toplam+=parseInt(sutunlar[i]);
			}
			for(i=0;i<sutunlar.length;i++){
				$(tdler[i]).css('width',(parseInt(sutunlar[i])/toplam)*100+"%");
			}
        });

		$('.wrapper').each(function(index, item){
		    var p = $(this).parent();
		    $(this).outerHeight(p.height());
        });
    }

    $("#goPdf").on('click', function(){
        var element = document.createElement('div');
        var opt = {
            margin:       0,
            filename:     'dosya.pdf',
            image:        { type: 'jpeg', quality: 0.98 },
            jsPDF:        { unit: 'in', format: 'a4', orientation: 'portrait' }
          };
        $('.a4').each(function(index,item) {
            $('.a4').eq(index).clone().appendTo(element);
        });
        html2pdf().set(opt).from(element).save();
    });

    $("#goDocx").on('click', function(){
        var element = document.createElement('div');
        $('.a4').each(function(index,item) {
            $('.a4').eq(index).clone().appendTo(element);
        });
        var docx = htmlDocx.asBlob(element.outerHTML);
        saveAs(docx, 'file.docx');
    });

});
