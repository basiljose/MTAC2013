function badBrowser(){
    if($.browser.msie && parseInt($.browser.version) < 9){
        return 'Internet Explorer ' + $.browser.version;
    }
    if($.browser.mozilla && parseFloat($.browser.version) < 1.9){ // See http://en.wikipedia.org/wiki/Gecko_%28layout_engine%29#Usage for firefox version 
mapping
        return 'Mozilla Gecko ' + $.browser.version;
    }
    if($.browser.opera && parseInt($.browser.version) < 10){
        return 'Opera ' + $.browser.version;
    }
    if($.browser.webkit && parseInt($.browser.version) < 531){
        return 'WebKit ' + $.browser.version;
    }
	
    return false;
}

function getBadBrowser(c_name)
{
    if (document.cookie.length>0)
    {
        c_start=document.cookie.indexOf(c_name + "=");
        if (c_start!=-1)
        { 
            c_start=c_start + c_name.length+1; 
            c_end=document.cookie.indexOf(";",c_start);
            if (c_end==-1) c_end=document.cookie.length;
            return unescape(document.cookie.substring(c_start,c_end));
        } 
    }
    return "";
}	

function setBadBrowser(c_name,value,expiredays)
{
    var exdate=new Date();
    exdate.setDate(exdate.getDate()+expiredays);
    document.cookie=c_name+ "=" +escape(value) + ((expiredays==null) ? "" : ";expires="+exdate.toGMTString());
}

if(badBrowser() && getBadBrowser('browserWarning') != 'seen' ){
    $(function(){
        $("<div id='browserWarning'><a href='#' id='warningClose' style='float:right; margin-right:1em'>[x]<br/>Dismiss</a>"
            + "You are using an unsupported or older browser. (" + badBrowser() + " detected)<br/> "
            + "This website works best with latet versions of "
            + "<a href='http://www.mozilla.org/firefox/'>FireFox</a>, "
            + "<a href='http://www.google.com/chrome/'>Chrome</a>, "
            + "<a href='http://www.opera.com'>Opera</a>, "
            + "<a href='http://www.apple.com/safari/'>Safari</a> or "
            + "<a href='http://www.microsoft.com/ie/'>Internet Explorer</a>. "
            + "Thanks! </div> ")
        .css({
            'background-color':'#fcfdde',
            'width':'100%',
            'border-bottom':'solid 1px #dcddbe',
            'text-align':'center',
            'font-size':'smaller',
            'display':'block',
            'position':'fixed',
            'top':'0',
            'z-index':'9999'
        })
        .prependTo("body");
		
        $('#warningClose').click(function(event){
            setBadBrowser('browserWarning','seen');
            event.preventDefault();
            //$('#browserWarning').slideDown('slow');
            $('#browserWarning').animate({
                top: ('-=' + $('#browserWarning').height()),
                opacity: 0
            }, 'slow');
            return false;
        });
    });	
}
