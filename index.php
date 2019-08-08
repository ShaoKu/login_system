<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>選址達人</title>
	<meta name="viewport" content="initial-scale=1.0, width=device-width" />
	<style type="text/css">
		html ,body{
		    font-family: Microsoft JhengHei;
		}
		.btn{
			padding:5px;
			background-color: #43ACA5;
			border-width: 0;
			border-bottom: solid 1px rgba(255,255,255,0);
			font-family: Microsoft JhengHei;
			color: white;
		}
		.btn:hover{
			cursor:pointer;
			border-bottom: solid 1px #EF4E3C;
		}
		#question{
			position: fixed;
			top:0;
			left:0;
			width:100%;
			opacity : 0;
			z-index : -9;
			margin-top:15px;
		}
		#questionBack{
			position: fixed;
			top:0;
			left:0;
			width: 100%;
			height:100%;
			opacity : 0;
			z-index : -9;
			background-color: #262a33;	
		}
		#questionForm{
			padding:10px;
			margin : 0 auto;
			max-width:400px;
			background-color: white;
			border-radius: 5px;
		}
		.iframeDiv {
		    position: relative;
		    height: 0;
		    padding-bottom: 56.25%;
		}
		.video {
		    position: absolute;
		    top: 0;
		    left: 0;
		    width: 100%;
		    height: 100%;
		}
		.row{
			width:100%;
			height:100%;
			display:-webkit-flex;
			display:flex;
			flex-wrap:wrap;
		}
		.col-6:{
			-webkit-flex:1;
			-ms-flex:1;
			flex:1;
		}

		@media (max-width: 575.98px) { 
			.col-6 {
		    	width: 100%;
			}
		}

		@media (min-width: 576px) {
			.col-6 {
		    	width: 50%;
			}
		}

	</style>

</head>

<body>

<div class="row">
	<div class="col-6">
		<div class="iframeDiv">
			<iframe src="https://www.youtube.com/embed/rYMpOrXQnac" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen class="video"></iframe>
		</div>
	</div>
	<div class="col-6">
		<h1> 選址達人 </h1>
		<button class="btn" onclick="showQuestion()"> 感興趣嗎? </button>
	</div>
</div>

<div id="question" >
	<div id="questionForm">
		<form name="form1" action="questionaire.php" method="POST" onsubmit="return continueOrNot()" >
			<p> 你感興趣的資料 </p>
			<input type="checkBox" name="answers[]" value="人口數"/> 人口數 <br>
			<input type="checkBox" name="answer[]s" value="登記商家數"/> 登記商家數 <br>
			
			<p> 你感興趣的功能 </p>
			<input type="checkBox" name="answers[]" value="歷年產業變化"/> 歷年產業變化 <br>
			<input type="checkBox" name="answers[]" value="小區域資料"/> 小區域資料 <br>
			<input type="checkBox" name="answers[]" value="大區域資料"/> 大區域資料 <br>

			<p> 其他建議 : <input type="text" name="opinion" /></p>
			<p> 若平台上線請通知這個email : <input type="text" id="emailInput" name="email" /></p>
			<p style="opacity:0;" id="emailNotValidWarning">email格式有誤唷，再確認一下</p>

			<span>
				<input class="btn" type="submit" value="提交" />
				<input class="btn" type="button" value="取消" onclick="closeQuestion()"/>
			</span>
		</form>
	</div>
</div>

<input class="btn" type="button" value="f1" onclick="calculateFunctionTimes(this.value)"/>
<input class="btn" type="button" value="f2" onclick="calculateFunctionTimes(this.value)"/>
<input class="btn" type="button" value="f3" onclick="calculateFunctionTimes(this.value)"/>
<input class="btn" type="button" value="f4" onclick="calculateFunctionTimes(this.value)"/>
<input class="btn" type="button" value="f5" onclick="calculateFunctionTimes(this.value)"/>

<div id="questionBack">	
</div>

<script type="text/javascript">
	function showQuestion(){
		document.getElementById("questionBack").style.opacity = 0.8;
		document.getElementById("questionBack").style.zIndex = "8" ;
		document.getElementById("question").style.opacity = 1;
		document.getElementById("question").style.zIndex = "9" ;
	}

	function closeQuestion(){
		document.getElementById("questionBack").style.opacity = 0;
		document.getElementById("questionBack").style.zIndex = "-9" ;
		document.getElementById("question").style.opacity = 0;
		document.getElementById("question").style.zIndex = "-9" ;
	}


	function validateEmail(email) { 
		var re = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
		return email.search(re);
	} 

	function continueOrNot() {
		var email = document.getElementById('emailInput').value;
		if ( email != "" ){
			if(validateEmail( email ) != -1 ){
				//alert('valid');
				document.getElementById("emailNotValidWarning").style.opacity = 0;
				return true;
			}else{ 
				//alert("email not valid");
				document.getElementById("emailNotValidWarning").style.opacity = 1;
				return false;
			}
		}
		else{
			return true;
		}
	}

	function calculateFunctionTimes( functionID ){
			//console.log("functionID : " , functionID);
			//var SID = document.getElementById( 'searchIDinput' ).value;
			var postParam = 'q=' + functionID;
			if ( window.XMLHttpRequest ) {
				// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp = new XMLHttpRequest();
				
				xmlhttp.onreadystatechange = function(){
					if(this.readyState == 4 && this.status == 200){
					  console.log("response r: " , this.responseText);
					  alert("response r: " , this.responseText);
					}
				};
				
				//xmlhttp.open('GET','getuser.php?q=' + SID , true);
				xmlhttp.open('POST','functionRec.php' , true);
				xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded;'); 
				xmlhttp.send( postParam );
			}
			//var r = xmlhttp.responseText;
			//console.log("xmlhttp.responseText: " , xmlhttp.responseText);
	    }
</script>

</body>
</html>
