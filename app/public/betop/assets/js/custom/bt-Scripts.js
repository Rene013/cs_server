$(document).ready(function(){

	// Publications order form
	
			// process any link click
            $("[id^=lk]").click(function () {
				
							
				// get the display state of the image
                var imgState = $(this).next().css("display");

                // this section will reset all displays on click
                // hide all text
                $("[id^=pubText]").css("display", "none");
                // show all images
                $("[id^=pubImg]").css("display", "block");
				// reset button
				$("[id^=lk]").html('<button title="Show publication info"><i class="fa fa-info"></i></button>');
				
                // now set display for this link/div
                if (imgState == "block") {
                    // hide the image and show the text
					$(this).next().css("display", "none");
                    $(this).next().next().css("display", "block");
					$(this).html('<button title="Hide publication info"><i class="fa fa-times"></i></button>');
					
                }
                else {
                    // show the image and hide the text
                    $(this).next().css("display", "block");
                    $(this).next().next().css("display", "none");
					
                }

            });


	
});
$(document).ready(function(){
	
	 $('.slider1').bxSlider({
    slideWidth: 220,
    minSlides: 1,
    maxSlides: 4,
    slideMargin: 15
	
  });
  
  $('.slider2').bxSlider({
    slideWidth: 220,
    minSlides: 1,
    maxSlides: 3,
    slideMargin: 10
	
  });

  $('.bxslider').bxSlider();
});	

	
	


$(document).ready(function () {
    $("img.deExpCol").click(function () {
        $(this).next().next().toggleClass("hBlock");
    });
    
    $("i.lstExp").click(function () {
        $(this).next().next().toggleClass("hBlock");
        $(this).toggleClass("fa-plus-square fa-minus-square");
        if ($(this).hasClass('lstExp fa fa-plus-square')) {
            nodeTitle = 'Show more';
        }
        else {
            nodeTitle = 'Show less';
        }
        $(this).attr('title', nodeTitle);
    });
    
});
// Section Headers begin
$(document).ready(function () {

            var url = document.URL;
			var urlReplace = url.replace('//','/');
			var urlSplit = urlReplace.split('/');
            var thisSection = urlSplit[2];

            // read the json file - the type is set to text as it fails otherwise, 
            // even though the JSON is valid...
            $.ajax({
                url: '/json/sectionHeaders.json',
                type: 'get',
                dataType: 'text',
                // NB: this doesn't mean it's actually found the file!
                success: function (thisJSON) {
                    // if the file isn't there a 404 page will be returned
                    // so check that we haven't opened an HTML page
                    if (thisJSON != null && thisJSON.indexOf('html') < 0) {
                        // parse the JSON
                        var obj = $.parseJSON(thisJSON);
                        // retrieve the appropriate item and split it
                        if (obj[thisSection]) {
                            var arrItemIn = obj[thisSection].split("|");
                            // stick the values where they need to go
                            aImg.src = arrItemIn[0];
                            aCaption.innerHTML = arrItemIn[1];
                            aCredit.innerHTML = arrItemIn[2];
							missionTitle.innerHTML = arrItemIn[3];
							missionStatement.innerHTML = arrItemIn[4];
                        }
                        else {
                            // no item in JSON so do default stuff
                            doDefault();
                        }
                    } else {
                        // file read error
                        doDefault();
                    }
                },
                error: function (thisJSON) {
                    // this doesn't seem to fire, probably because of the 404 error
                    doDefault();
                }
            });

            function doDefault() {
                // no item so do default stuff
                // alert('oh crikey!');
                aImg.src = "images/betop.jpg";
                aCaption.innerHTML = "";
                aCredit.innerHTML = "&#169; ";
            }

});

// Section headers end

// RH Panel Menu
// Hides Sub Nav heading if no links are present
$(document).ready(function () {
	$(".subNavMenu").parent().hide();
	$(".subNavMenu:not(:empty)").parent().show();
});



 


	
