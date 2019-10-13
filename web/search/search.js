$(function(){
	var s=location.search.replace(/^\?.*s=([^&]+)/,'$1')
	    ,t=location.search.replace(/^\?.*t=([^&]+)/,'$1')
		,form=$('#search-form')
		,input=$('input[type=text]',form)
		,results=$('#search-results').height(0)
		,src='search/results.php'
		,ifr=$('<iframe width="100%" height="100%" frameborder="0" marginheight="0" marginwidth="0" allowTransparency="true"></iframe>')
		window.alert(t);
	if(results.length)		
		ifr		
			.attr({
				src:src+'?t='+t
			})
			.appendTo(results)
		,input
			.val(decodeURI(s))
	
	window._resize=function(h){		
		results
			.height(h)
	}
})