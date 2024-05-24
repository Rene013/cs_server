// scripts for bt object search (in navbar.cfm)

		$(document).ready(function() {
	
			// for typeahead
		    var objObjects = new Bloodhound({
		        datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
		        queryTokenizer: Bloodhound.tokenizers.whitespace,
		        limit: 10,
		        prefetch: {
		            url: '/json/objectsInSearchOnlyNoIds.json',
		            filter: function (list) {
		                return $.map(list, function (objObjects) { return { name: objObjects }; });
		            }
		        }
		    });
		
		    objObjects.initialize();
		
		    $('#osPrefetch .typeahead').typeahead({
		        hint: true,
		        highlight: true,
		        minLength: 1
		    },
		{
		        name: 'objObjects',
		        displayKey: 'name',
		        source: objObjects.ttAdapter()
		    });
		    
			$('#navKeywords').bind('typeahead:selected', function(obj, datum, name) {      
			        // JSON selection code from https://github.com/twitter/typeahead.js/issues/300	        
			        // NB: JSON.stringify(datum) returns value like {"name":"Jodrell Bank Observatory (69)"}
					
//					// get the selected data
					//var selectedItem = JSON.stringify(datum);
					//selectedItem = selectedItem.replace('{"name":"', '').replace('"}','');	
					document.getElementById("searchForm").submit();
           
		            
			});
			// end for typeahead           
		
		});  
		
	    function clearObjSearchInput() {
             // clear all inputs
	    	var inpBox = document.getElementById("navKeywords");
	    	inpBox.value = " ";
	    	inpBox.innerHTML = " ";	
	    }	

	    function setFormAction(actionFieldIn, actionIn) {
	        // set the form action value for postback
	        var actionBoxValue = actionIn;
	        var actionBox = document.getElementById(actionFieldIn);
	        actionBox.value = actionBoxValue;
	    }
	        
        function clearStatus() {
        	// hide any messages from previous selection 
        	if (document.getElementById('divMessages'))  {
        		document.getElementById('divMessages').className = 'hBlock';
        	}  
            // clear status
            document.getElementById('txtFormStatus').value = '';  
        }

