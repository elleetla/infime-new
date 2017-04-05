(function ($) {

	"use strict";

	function loadProjet(proj){
		var tabproject = $('.realisations-structure:not(.isotope-hidden)');
		var pos_projet = tabproject.index(proj);
		if(pos_projet == 0) $("#DisplayProjet .modal-prev").hide(); else $("#DisplayProjet .modal-prev").show();
		if(pos_projet == (tabproject.length - 1) ) $("#DisplayProjet .modal-next").hide(); else $("#DisplayProjet .modal-next").show();
		$("#DisplayProjet .modal-prev").on("click",function(){
			$("#DisplayProjet .modal-media").stop().fadeOut("slow",function(){
				loadProjet(tabproject.eq([pos_projet - 1]));
				$("#DisplayProjet .modal-media").stop().fadeIn("slow");
			});
		});
		$("#DisplayProjet .modal-next").on("click",function(){
			$("#DisplayProjet .modal-media").stop().fadeOut("slow",function(){
				loadProjet(tabproject.eq([pos_projet + 1]));
				$("#DisplayProjet .modal-media").stop().fadeIn("slow");
			});
		});

		$('#DisplayProjetLabel').html(proj.find('H1').html());
		$('#DisplayTypeProjetLabel').html(proj.find('.type-projet').html());

		if(proj.find('.mask img').attr('data') == "video"){
			var adminvideourl = proj.find('.link-value').val();
			var idvideo = adminvideourl.split('=');
			if(idvideo.length != 2)	idvideo[1] = "BDWM2VNv9OY";//Fall Back if we got a wrong video url
			$("#DisplayProjet .modal-dialog").css({"max-width":"95%"});
			$("#DisplayProjet .modal-media").html('<iframe width="100%" height="85%" style="margin: 85px 0;" src="http://www.youtube.com/embed/'+idvideo[1]+'?autoplay=1" frameborder="0" allowfullscreen></iframe>	');
		}else if(proj.find('.mask img').attr('data') == "image"){
			$("#DisplayProjet .modal-dialog").css({"max-width":"95%"});
			$("#DisplayProjet .modal-media").html('<img class="img-responsive" src="'+proj.find('.link-value').val()+'" style="text-align:center!important;"  width="100%" />');
		}else if(proj.find('.mask img').attr('data') == "interactive"){
			$("#DisplayProjet .modal-dialog").css({"max-width":"95%"});
				$("#DisplayProjet .modal-media").html('<iframe width="100%" height="85%" src="'+proj.find('.link-value').val()+'" frameborder="0" ></iframe>	');
		}

	}
        /** Projet 2 **/
	function loadProjet2(proj){

	
		var tabproject = $('#Offres.notreagence-structure:not(.isotope-hidden)');
		var pos_projet = tabproject.index(proj);
		if(pos_projet == 0) $("#DisplayProjet .modal-prev").hide(); else $("#DisplayProjet .modal-prev").show();
		if(pos_projet == (tabproject.length - 1) ) $("#DisplayProjet .modal-next").hide(); else $("#DisplayProjet .modal-next").show();
		$("#DisplayProjet .modal-prev").on("click",function(){
			$("#DisplayProjet .modal-media").stop().fadeOut("slow",function(){
				loadProjet(tabproject.eq([pos_projet - 1]));
				$("#DisplayProjet .modal-media").stop().fadeIn("slow");
			});
		});
		$("#DisplayProjet .modal-next").on("click",function(){
			$("#DisplayProjet .modal-media").stop().fadeOut("slow",function(){
				loadProjet(tabproject.eq([pos_projet + 1]));
				$("#DisplayProjet .modal-media").stop().fadeIn("slow");
			});
		});

		$('#DisplayProjetLabel').html(proj.find('H1').html());
		$('#DisplayTypeProjetLabel').html(proj.find('.type-projet').html());
	
		if(proj.find('.mask2').attr('data') == "video"){
			var adminvideourl = proj.find('.link-value').val();
			var idvideo = adminvideourl.split('=');
			if(idvideo.length != 2)	idvideo[1] = "BDWM2VNv9OY";//Fall Back if we got a wrong video url
			$("#DisplayProjet .modal-dialog").css({"max-width":"95%"});
					$("#DisplayProjet .modal-media").html('<iframe width="100%" height="75%" style="margin: 85px 0;" src="http://www.youtube.com/embed/'+idvideo[1]+'?autoplay=1" frameborder="0" allowfullscreen></iframe>	');
		}else if(proj.find('.mask2').attr('data') == "image"){
			$("#DisplayProjet .modal-dialog").css({"max-width":"95%"});
				$("#DisplayProjet .modal-media").html('<img class="img-responsive" src="'+proj.find('.link-value').val()+'" />');
		}else if(proj.find('.mask2').attr('data') == "interactive"){
			$("#DisplayProjet .modal-dialog").css({"max-width":"95%"});
			$("#DisplayProjet .modal-media").html('<iframe width="100%" height="75%" src="'+proj.find('.link-value').val()+'" frameborder="0" ></iframe>	');
		}

	}


	

	$(document).ready(function() {

		// Comments
		$(".commentlist li").addClass("panel panel-default");
		$(".comment-reply-link").addClass("btn btn-default");
		// end comments

		// Forms
		$('select, input[type=text], input[type=email], input[type=password], textarea').addClass('form-control');
		$('input[type=submit]').addClass('btn btn-primary');
		// end forms
		$('.realisations-structure').on("click",function(){
			loadProjet($(this));
			$('#DisplayProjet').modal('show');
			$('#DisplayProjet').on('hidden.bs.modal', function () {
				$("#DisplayProjet .modal-media").html('');//We delete the media part on close
			})
		});
		$('#Offres.notreagence-structure .view').on("click",function(){
		
			loadProjet2($(this));
			$('#DisplayProjet').modal('show');
			$('#DisplayProjet').on('hidden.bs.modal', function () {
				$("#DisplayProjet .modal-media").html('');//We delete the media part on close
			})
		});
		$('.primary li ul').slideUp(1);
		$('.primary li a.level1').on("click",function(){
                 	$('.modal').fadeOut(1);
			$('.modal-backdrop').fadeOut(1);
			$("#DisplayProjet .modal-media").html('');
			$('#menu-isotope ul li').removeClass("active2");
			$($(this).attr('rel')).addClass("active2");
			$('.primary li ul').slideUp(250).fadeOut(100);
			if($('.primary li'+$(this).attr('rel')+' ul').attr('class')!='open'){
			$('.primary li'+$(this).attr('rel')+' ul').slideDown(500).fadeIn(100).addClass('open');
			}else{
			$('.primary li ul').slideUp(250).removeClass('open');
			}
			return false;
		});
		$('#notreAgence').on("hover",function(){
                 
			$('.primary li ul').slideUp(250).fadeOut(100);
			return false;
		});
		$('.notreagence-structure').on("click",function(){
			$('.notreagence-structure .mask').fadeOut(1);
			$('.notreagence-structure .mask img.equipe-enfant').css('opacity','1');
			$($(this).attr('rel')).fadeIn();
			$($(this).attr('rel')+'  img.equipe-enfant').css('opacity','0');
			return false;
		});
		$('.notreagence-structure').on("hover",function(){
			$('.notreagence-structure .mask').fadeOut(1);
			$('.notreagence-structure .mask img.equipe-enfant').css('opacity','1');
			$($(this).attr('rel')).fadeIn();
			$($(this).attr('rel')+'  img.equipe-enfant').css('opacity','0');
			return false;
		});
		
		$('.notreagence-structure a.lienNormal').on("click",function(){
			window.open($(this).attr('href'));
			return true;
		});
	

		
		//filtre isotope
		var $container = $('#PostProjet'),

      	// create a clone that will be used for measuring container width
      	$containerProxy = $container.clone().empty().css({ visibility: 'visible' });

  		$container.after( $containerProxy );

    	// get the first item to use for measuring columnWidth
  		var $item = $container.find('.realisations-structure').eq(0);
  		$container.imagesLoaded(function(){
  		$(window).smartresize( function() {

    	// calculate columnWidth
    	var colWidth = Math.floor( $containerProxy.width() / 4 ); // Change this number to your desired amount of columns

    	// set width of container based on columnWidth
    	$container.css({
        	width: colWidth * 4// Change this number to your desired amount of columns
    	})
    	.isotope({

      	// disable automatic resizing when window is resized
      	resizable: true,

      	// set columnWidth option for masonry
      	masonry: {
        	columnWidth: colWidth
      	}
    	});

    	// trigger smartresize for first time
  		}).smartresize();
   		});

		// filter items when filter link is clicked
		$('.primary ul li a').click(function(){
		$('.primary ul li a.active').removeClass('active');
		var selector = $(this).attr('data-filter');
		$container.isotope({ filter: selector, animationEngine : "css" });
		$(this).addClass('active');
		return false;

		});

		//owl carousel
		$("#owl-demo").owlCarousel({

		  navigation : true,
		  slideSpeed : 800,
		  paginationSpeed : 400,
		  singleItem : true,
		  autoPlay: 6000, //Set AutoPlay to 3 seconds
		  lazyLoad : true,
		  navigationText : false,
		  transitionStyle : "fade"

		  });


	});

}(jQuery));
