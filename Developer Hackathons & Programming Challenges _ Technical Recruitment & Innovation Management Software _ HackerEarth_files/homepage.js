function resizeFunction(){var a=$(window).width();a>=1024?($(".left-info-container").css("width",(a-1100)/2+770),$(".right-info").css("width",(a-1100)/2+330)):$(".left-info-container").css("width","100%")}function scrollText(){$(".dynamic-content").text(errorContent).animate({scrollTop:170},4e3,"linear",function(){$(".dynamic-content").text("")})}function addText(){$(".dynamic-content").text($(".dynamic-content").text()+tempContent.shift()+"\n"),$(".dynamic-content").scrollTop($(".dynamic-content").height())}var randomContent=["public void DoFizzBuzz() {","	var combinations = new List<Tuple<int, string>>"," {","		new Tuple<int, string> (3, 'Fizz'),","		new Tuple<int, string> (5, 'Buzz'),"," };","	Func<int, int, bool> isMatch = (i, comb) => i % comb == 0;","	for (int i = 1; i <= 100; i++)","	{","		var matchingCombs = combinations.Where(c => isMatch(i, c.Item1)).ToList();","		if (matchingCombs.Any())","		{","			Console.Write(string.Join('', matchingCombs.Select(c => c.Item2)));","		}","		else","		{","			Console.Write(i);","		}","	}","}"],errorContent="[:log] add_to_notification_queue\n[:log] /AJAX/live_events_widget_count/: 16 queries run\n[:log] total 0.0 seconds, AJAX: True\n[:log] add_to_notification_queue\n[:log] /AJAX/live_feed/: 5 queries run\n[:log] total 0.0 seconds, AJAX: True\n[:log] add_to_notification_queue\n[:log] monitor (pid=11111): Starting monitor.\n[:log] add_to_notification_queue\n[:log] Raven is not configured\n[:log] add_to_notification_queue\n[:log] No handlers could be found for logger\n[:log] add_to_notification_queue\n[:log] /ghost/ping/: 10 queries run\n[:log] total 0.0 seconds, AJAX: True\n[:log] add_to_notification_queue\n[:log] /beta/: 14 queries run\n[:log] total 0.0 seconds, AJAX: True\n[:log] add_to_notification_queue\n[:log] add_to_notification_queue\n[:log] /AJAX/live_feed_count/: 16 queries run\n[:log] total 0.0 seconds, AJAX: True\n[:log] add_to_notification_queue\n[:log] /AJAX/live_feed/: 5 queries run\n[:log] total 0.0 seconds, AJAX: True\n[:log] add_to_notification_queue\n[:log] monitor (pid=11111): Starting monitor.\n[:log] add_to_notification_queue\n[:log] Raven is not configured\n[:log] add_to_notification_queue\n[:log] No handlers could be found for logger\n[:log] add_to_notification_queue\n[:log] /ghost/ping/: 10 queries run\n[:log] total 0.0 seconds, AJAX: True\n[:log] add_to_notification_queue\n[:log] /beta/: 14 queries run\n[:log] total 0.0 seconds, AJAX: True\n[:log] add_to_notification_queue\n[:log] add_to_notification_queue\n[:log] /AJAX/live_feed_count/: 16 queries run",tempContent=randomContent.slice(),startButton=$(".left-info .button");$(window).on("scroll",function(){$(this).scrollTop()<30?$(".navbar-header").addClass("header-top"):$(".navbar-header").removeClass("header-top");if(startButton.length>0)for(var a=0;a<startButton.length;a++)$(window).scrollTop()+$(window).height()>$(startButton[a]).offset().top&&($(startButton[a]).parents(".information-container").find(".articles-container").css({left:0,opacity:1}),startButton.splice(a,1))}),$(document).ready(function(){$(this).scrollTop()===0?$(".navbar-header").addClass("header-top"):$(".navbar-header").removeClass("header-top"),$(".email-toggle").on("click",function(){$(".term-conditions, .email-signup, .social-login-button").toggle()});var a;setInterval(function(){$(".companies-slider").animate({marginLeft:"-=170px"},2e3,"linear",function(){a=$(".companies-slider .companies-img:first-child").clone(),$(".companies-slider").append(a),$(".companies-slider .companies-img:first-child").remove(),$(".companies-slider").css("margin-left","0")})},2e3),$(".toggle-video").on("click",function(){if($(this).hasClass("video-close")){var a=document.getElementById("youtube-hackerearth");a.src=a.src,$(document).off("keyup")}else $(document).on("keyup",function(a){a.keyCode==27&&($(".youtube-video").toggle(),$(document).off("keyup"))});$(".youtube-video").toggle()}),$(window).resize(resizeFunction)}),resizeFunction(),$(window).load(function(){var a=!1;if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0,4)))a=!0;if(!a){var b=0;setInterval(function(){b===80&&(b=0);if(b===20||b==60)$(".dynamic-content").html(""),scrollText(),tempContent=randomContent.slice();$(".left-image-0, .left-image-1, .left-image-2").hide(),b<20?(addText(),$(".content-container .left-image-"+b%2*2).show()):b<40?$(".content-container .left-image-"+b%2).show():b<60?(addText(),$(".content-container .left-image-"+(b%2+1)).show()):$(".content-container .left-image-"+b%2).show(),b++},200)}});