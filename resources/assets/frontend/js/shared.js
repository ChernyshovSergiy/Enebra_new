$(document).ready(function(){

			var title = $('title').text();

			var link = window.location.href;

			//email

			$('.email').attr('href', 'mailto:?subject=' + title + '&body=' + link );

			//fb 

			$('.fac').attr('href', 'http://www.facebook.com/sharer.php?s=100&p[title]=' + title + '&p[url]=' + link ) ;
			
			//tw 

			$('.tw').attr('href', 'http://twitter.com/share?text=' + title + '&url=' + link ) ;

			//pinter

			$('.pinter').attr('href', 'https://pinterest.com/pin/create/button/?url=' + link + '&description=' + title ) ;

			//linkedin

			$('.link').attr('href', 'https://www.linkedin.com/shareArticle?mini=true&url=' + link + '&title=' + title ) ;

			//google plus 

			$('.gpl').attr('href', 'https://plus.google.com/share?url=' + link ) ;

			// tumblr

			$('.tumblr').attr('href', 'http://www.tumblr.com/share/link?url=' + link + '&name=' + title ) ;

			//reddit
 
			$('.reddit').attr('href', 'http://reddit.com/submit?url=' + link + '&title=' + title ) ;

			//vk  

			$('.vkon').attr('href', 'https://vk.com/share.php?url='+ link + '&title='+ title ) ;

			// permalink

			$('.permalink').val( link )






})