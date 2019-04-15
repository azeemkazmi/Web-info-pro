	$(function () {

		    $('img.imgChange').hover(sourceSwap, sourceSwap);
});
		var sourceSwap = function () {
    var $this = $(this);
    var newSource = $this.data('alt-src');
    $this.data('alt-src', $this.attr('src'));
    $this.attr('src', newSource);
}

    $(document).ready( function() {
		var usernameSession = "";
		var userIdSession = "";
		var counterAns = 0;
     	$('label[for="user"]').hide();
		$('label[for="userId"]').hide();
    	$("[id*=btnSignup]").bind("click",function(){
    		debugger;
    		submitSignupForm();
    	});
    	
    	$("[id*=btnLogin]").bind("click",function(){
    		debugger;
	    	var username = $("[id*=txtName]").val();
	        var password = $("[id*=txtPassword]").val();

	        if( username != "" && password != "" ){
	            $.ajax({
	                url:'./webServices/login.php',
	                type:'post',
	                data:{username:username,password:password},
	                success:function(data){
	                    var msg = "";
	                    console.log("data ==> " + JSON.stringify(data));
	                    if(data == 1){
	                    	$('label[for="user"]').show();
	                    	$('label[for="userId"]').show();
	                        usernameSession = $("[id*=lblUser]").text();
							userIdSession = $("[id*=lblUserId]").text();
							
	                    }
	                    else{
				        	alert("Invalid username and password!");
				        }
	                }
	            });
	        }
	        else if( username == "" && password == "" ){
	        	alert("Please Fill all the fields!");
	        }
	        else{
	        	alert("Invalid username and password!");
	        }
	        return false;
    	});
		function submitSignupForm() {
			$("#signupForm").submit(function (event) {
	                event.preventDefault();
	                //validation for login form
	            var formData = new FormData($(this)[0]);
	            $.ajax({
	                url: './webServices/signup.php',
	                type: 'POST',
	                data: formData,
	                async: true,
	                cache: false,
	                contentType: false,
	                processData: false,
	                success: function (returndata) 
	                {
	                    //show return answer
	                    alert(returndata);
	                },
	                error: function(){
	                alert("error in ajax form submission");
	                                    }
	        });
	        return false;
	    });
		}
		function submitResult() {
	            var userIdSession = $('label[for="userId"]').text();
	            $.ajax({
	                url: './webServices/result.php',
	                type: 'POST',
	                dataType:'json',
	                data:{userIdSession:userIdSession,counterAns:counterAns},
	                success: function (returndata) 
	                {
	                	debugger;
	                	alert("Save Successfully");
	                },
	                error: function(){
	                	debugger;
	                alert("error in ajax form submission");
	                                    }
	        });
	        return false;
		}
		$("td").click(function(){
    	console.log($(this).text().toString().substring(1));
       	var src = $(this).text().toString().substring(1);
        var x = document.createElement('audio');
    	x.setAttribute('src', 'Sound/basic_sounds/'+src+'.mp3');
    	x.play();

		});
    	var abcd, aaaa;
        $("tbody th").click( function(e) {
            if($(this).siblings('td').css("background-color")=="rgba(0, 0, 0, 0)")
            {
	            $(this).siblings('td').addClass('highlight');
	            $(this).siblings('td').attr('type', 'selected');  
	        }
	        else{
	        	$(this).siblings('td').removeClass('highlight');
	        	$(this).siblings('td').attr('type', 'unselected');
	        }
        });
			//select columns
	$("thead th:nth-child(n+2)").click(function(){
		var th_index = $(this).prevUntil("tbody").length+1;
		if($("tbody tr > td:nth-child("+th_index+")").css("background-color")=="rgba(0, 0, 0, 0)"){
			$("tbody tr > td:nth-child("+th_index+")").addClass('highlight');
			$("tbody tr > td:nth-child("+th_index+")").attr('type', 'selected');
		}else{
			$("tbody tr > td:nth-child("+th_index+")").removeClass('highlight');
			$("tbody tr > td:nth-child("+th_index+")").attr('type', 'unselected');
		}
		valueSelected = $("td[type=selected] div");
	});
	    $("thead th:first-child").click( function() {
            if($("td").css("background-color")=="rgba(0, 0, 0, 0)")
            {
            	$("td").addClass('highlight');
            	$("td").attr('type', 'selected'); 
            }	        
	        else{
	        	$("td").removeClass('highlight');
	        	$("td").attr('type', 'unselected');
	        }
        });
      var questionCount = 0;
        $("[id*=btnStartQuiz]").bind("click",function(){
 			var selectedItems = $("td[type=selected] div");

 				if(selectedItems.length<10){
					alert("Please select more characters");
					return;
				}
				else
				{
					$("#MainSection").hide();//https://www.w3schools.com/jquery/jquery_hide_show.asp
					$("#formSection").hide();
					$("#QuizSection").show();

					//https://www.w3schools.com/jquery/jquery_dom_add.asp
					var count = '<div class="count" id="countDiv"></div><br>';
					var question='<div class="question" id="questionDiv"></div><br>';
					var options='<div class="options" id="optionsDiv"></div><br>';
					var button='<button class="btnNext" id="nextDiv">Next</button>';
					$("#QuizSection").append(count,question,options,button);
					$(".btnNext").bind("click",function(){
						debugger;
						var radioValue = $("input[type='radio']:checked").val();
						if(typeof radioValue === "undefined"){
							alert("Please Select any Option!");
							return false;
						}
						else{
	        				$("input[type='radio']:checked").each(function() {
						        var idVal = $(this).attr("id");
						        var resultedAnsText = $(this).val();//$("label[for='"+idVal+"']").text();
								//alert(abcd.innerHTML+" == "+resultedAnsText);
						        if(abcd.innerHTML == resultedAnsText){
						        	counterAns++;
						        }

						        //var resultedAnsImage = $("name").text();
						    });
	        				// var radioValue = $("input[name='rbtnCount']:checked").text();
	        				// var radioValue = $("input[name='rbtnCount']:checked").parent('label').text();
							selectedItems = $("td[type=selected] div");
							showQuestion(selectedItems);
						}
        			});
					showQuestion(selectedItems);


				}
        });
		
        function showQuestion(selectedItems){
        	var QuesNo = Math.floor(Math.random() * (selectedItems.length - 1) + 1); //https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Math/random
			
        	var a = Math.floor(Math.random() * 2);
        	$(".count").html('<br><p>Question No. "'+(++questionCount)+'": </p>');
        	if(questionCount > 10){
					$("#QuizSection").hide();
					$("#End").show();
        			var totalDiv = '<div class="count" id="totalDiv" style="text-align:center"><h1>'+counterAns*10+'%</h1></div><br>';
					var finishDiv='<button class="quiz" onclick="finishQuiz();" style="text-align:center">Finish</button>';
					var buttonSave ='<form id="saveForm"><button type="submit" class="btnSave" id="saveDiv" onclick="result();" style="text-align:center">Save</button></form>';
					$("#End").append(totalDiv,finishDiv,buttonSave);
					var element = document.getElementById('saveDiv');
					element.onclick = function() {
					  debugger;
						if(usernameSession ==""){
							alert('Please Login First');
							return false;
						}
						else{
							submitResult();
							return false;
			    		}
					}
				$("[id*=formSection]").show();
	        	}
        	else{


        	abcd = selectedItems[QuesNo];
			 console.log("======="+QuesNo);
				 for(var i = 0; i <selectedItems.length; i++){
					 console.log(selectedItems[i]);
				 }
        	var randomArray = shuffle(selectedItems);
        	var randomArrayShort;
        	var correct_answer;
        	var emptyArr = [];
        	for (var i = 0; i < selectedItems.length; i++) {
        		if(randomArray[i] == selectedItems[QuesNo]){
        			correct_answer = randomArray[i];
					abcd = correct_answer;
        			randomArray[i] = "";
        		}else{
					emptyArr.push(randomArray[i]);
				}
        	}
        	// if(randomArray == abcd || randomArray[0] == abcd || randomArray[1] == abcd || randomArray[2] == abcd)
        	// {
        	// 	randomArrayShort = randomArray.slice(0, 4);
        	// 	aaaa  = shuffle(randomArrayShort);
        	// }
        	// else{
        		var kk = 0
        		// for(var k = 0; k< selectedItems.length-1; k++){
        		// for(var k = 0; k< emptyArr.length-1; k++){
					// console.log("==="+emptyArr[k].innerHTML);
        			// if(randomArray[k] != ""){
        				// emptyArr[kk] = randomArray[k];
        				// kk++;
        			// }
        		// }
		                randomArrayShort = emptyArr.slice(0, 3);
						console.log(QuesNo);
				        randomArrayShort.push(correct_answer);
		        		aaaa  = shuffle(randomArrayShort);
        	// }
			
        	if(a==1)
        	{
        		$('div[id*="removeDiv"]').remove();
        		$(".question").html('<div class="qs"><h1>Can you pick the correct rōmaji for the hiragana characters?<br>'
				+correct_answer.innerHTML+'</h1></div>');
					for (i = 0; i < 4; i++) //https://stackoverflow.com/questions/5550785/how-to-create-a-radio-button-dynamically-with-jquery
					{
					    var radioBtn = $('<div id = "removeDiv"><input type="radio" name="rbtnCount" value="' + aaaa[i].innerHTML + '" id="' + i + '" class="a"/><label for="' + i + '" id="lblRadio"><img src="Static/'
						+aaaa[i].innerHTML+'.png" name="'+aaaa[i].innerHTML+'"></label></div>');//http://jsfiddle.net/RichieHindle/vQwCF/
					    radioBtn.appendTo('.options');
				}
        	}
        	else
        	{
        		$('div[id*="removeDiv"]').remove();
        		$(".question").html('<div class="qs"><h1>Can you pick the correct hiragana characters for the rōmaji?</h1><br><img src="Static/'
				+correct_answer.innerHTML+'.png"></div>');
				for (i = 0; i < 4; i++) {
					    var radioBtn = $('<div id = "removeDiv"><input type="radio" name="rbtnCount" value="' + aaaa[i].innerHTML + '" id="' + i + '" class="a"/><label for="' + i + '" id="lblRadio">'
						+aaaa[i].innerHTML+'</label></div>');
				    radioBtn.appendTo('.options');
				}
        	}
			}
        }
        function shuffle(arra1) {//https://www.w3resource.com/javascript-exercises/javascript-array-exercise-17.php
			var arra2= arra1;
		    var ctr = arra2.length, temp, index;

			/*// While there are elements in the array
			    while (ctr >= 0) {
			// Pick a random index
			        index = Math.floor(Math.random() * ctr);
			// Decrease ctr by 1
			        ctr--;
			// And swap the last element with it
			        temp = arra2[ctr];
			        arra2[ctr] = arra2[index];
			        arra2[index] = temp;
			    }*/
				arra2.sort(() => Math.random() - 0.5);
				
			    return arra2;
			}
    });
	function finishQuiz(){
			location.href = "";
		}
		
		function saveMethod(){
			
			
		}
