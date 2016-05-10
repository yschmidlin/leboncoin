<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
	</head>
	<body>
		<button id="monBtn1">A</button>
		<button id="monBtn2">B</button>
		<button id="monBtn3">C</button>

		<div id="monDiv">monDiv</div>
		
		<script>		
		monBtn1.addEventListener('click', callback1);
		monBtn2.addEventListener('click', callback2);	
		monBtn3.addEventListener('click', callback3);	
		
		function callback1() {
			alert('ok');
			xhr = new XMLHttpRequest();
			xhr.onreadystatechange = function (){
				
				if(xhr.readyState === 4) {
					if(xhr.status !== 200){
					//une erreur est survenue
					alert('ko');
					}else{
						alert('ok');
					}
					
					//ok
					elt_monDiv = document.querySelector('#monDiv');
					elt_monDiv.innerHTML = xhr.responseText;
				}
			}
			
			xhr.open("GET", 'ajax.php?action=A');
			xhr.send();
		}
		
		function callback2() {
			alert('ok');
			$.ajax ({
				async: true,
				type: "GET",
				url:"ajax.php?action=B",
				data: null,
				
				error:function(errorData){},
				success:function(data) {
					elt_monDiv = document.querySelector('#monDiv');
					elt_monDiv.innerHTML = data;
				}
			});
		}
		
		function callback3() {
			alert('ok');
			$.ajax ({
				async: true,
				type: "POST",
				url:"ajax.php",
				data: "action=C",
				
				error:function(errorData){
					
				},
				success:function(data) {
					//elt_monDiv = document.querySelector('#monDiv');
					//elt_monDiv.innerHTML = data;
					
					$('#monDiv').html(data);
				}
			});
		}
		
		</script>
	</body>
</html>