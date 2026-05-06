window.onload = function(){
	initRoulette();
}

	function initRoulette(){
		setRoulettePanel();
		initAddPop();
		
			document.getElementById("roullete").addEventListener("animationstart", function(e) {
					console.log("시작");
			}, false);

			document.getElementById("roullete").addEventListener("animationend", function(e) {
					console.log("종료");
			}, false);
	}

	function triggerAddPop(){
		document.querySelector(".popup").classList.toggle("show-popup");
	}
	function openAddPop(){
		document.getElementById("btnArea").innerHTML = '<input type="button" id="cancelBtn" value="CANCEL" onclick="triggerAddPop();"><input type="button" id="addBtn" value="ADD" onclick="clickAddBtn();">';
		
		 document.getElementById("addText").value = "";
		 document.getElementById("fontColor").value = "";
		 document.getElementById("color").value = "";
		 document.getElementById("colorTypeBg").checked = "checked"
		
		document.querySelector(".popup").classList.toggle("show-popup"); 
	}
	
	function openUpdatePop(index){
		document.getElementById("btnArea").innerHTML = '<input type="button" id="cancelBtn" value="CANCEL" onclick="triggerAddPop();"><input type="button" id="saveBtn" value="SAVE" onclick="clickUpdateBtn('+index+');">';
		
	var target = document.getElementById("panelInfo"+index);
	document.getElementById("addText").value = target.innerHTML;
	document.getElementById("fontColor").value = target.style.color;
	document.getElementById("color").value = target.style.background;;
	document.getElementById("colorTypeBg").checked = "checked"	
		document.querySelector(".popup").classList.toggle("show-popup"); 
	}
	
	function initAddPop(){
	//2차원 배열 파레트 데이터
	var pallet = [["#FF0000", "#FF5E00", "#FFBB00", "#FFE400", "#ABF200", "#1DDB16", "#00D8FF", "#0054FF", "#0100FF", "#5F00FF", "#FF00DD", "#FF007F", "#000000", "#FFFFFF"],
								["#FFD8D8", "#FAE0D4", "#FAECC5", "#FAF4C0", "#E4F7BA", "#CEFBC9", "#D4F4FA", "#D9E5FF", "#DAD9FF", "#E8D9FF", "#FFD9FA", "#FFD9EC", "#F6F6F6", "#EAEAEA"],
								["#FFA7A7", "#FFC19E", "#FFE08C", "#FAED7D", "#CEF279", "#B7F0B1", "#B2EBF4", "#B2CCFF", "#B5B2FF", "#D1B2FF", "#FFB2F5", "#FFB2D9", "#D5D5D5", "#BDBDBD"],
								["#F15F5F", "#F29661", "#F2CB61", "#E5D85C", "#BCE55C", "#86E57F", "#5CD1E5", "#6799FF", "#6B66FF", "#A566FF", "#F361DC", "#F361A6", "#A6A6A6", "#8C8C8C"],
								["#CC3D3D", "#CC723D", "#CCA63D", "#C4B73B", "#9FC93C", "#47C83E", "#3DB7CC", "#4374D9", "#4641D9", "#8041D9", "#D941C5", "#D9418C", "#747474", "#5D5D5D"],
								["#980000", "#993800", "#997000", "#998A00", "#6B9900", "#2F9D27", "#008299", "#003399", "#050099", "#3F0099", "#990085", "#99004C", "#4C4C4C", "#353535"],
								["#670000", "#662500", "#664B00", "#665C00", "#476600", "#22741C", "#005766", "#002266", "#030066", "#2A0066", "#660058", "#660033", "#212121", "#191919"]];
	var tag = "";
	for(i=0; i<pallet.length; i++){
		for(j=0; j<pallet[i].length; j++){
			tag += "<div id="+pallet[i][j]+" class='colorBox' onclick='colorSet(this)'></div>";
		}
	}
	//파레트 파싱
	document.getElementById("palletBox").innerHTML = tag;

	//색상 입히기
	var colorBox = document.getElementsByClassName("colorBox");
	for(i=0; i<colorBox.length; i++){
		colorBox[i].style.background = colorBox[i].id;
	}
}
	
	function setRoulettePanel(){
		var panelArr =  document.querySelectorAll(".panel")
		let panelArrSize = panelArr.length;
		let rotate = 360 / panelArrSize;
		
		var i = 0
		var panelRotate = 0;
		var panelInfoTbody = [];
		while ( i < panelArrSize){
			panelRotate = panelRotate + rotate; 
			panelArr[i].style.transform = "rotate("+panelRotate+"deg)";
			i = i + 1;
			panelInfoTbody.push("<tr><td id=\"panelInfo"+i+"\" style=\"background:"+panelArr[i-1].style.background+"; color:"+panelArr[i-1].style.color+"\">"+panelArr[i-1].innerText+"</td>");
			panelInfoTbody.push("<td><button onclick=\"openUpdatePop('"+i+"');\">수정</button></td></tr>");
			
		}
		panelInfoTbody.push("<tr><td colspan=\"2\"><button class=\"addBtn\" onclick=\"openAddPop('add');\">ADD</button></td></tr>");
		document.getElementById("panelInfoTbody").innerHTML = panelInfoTbody.join('');
	}
	
	function clickAddBtn(){
		var roullete = document.getElementById("roullete");
		let size = document.querySelectorAll(".panel").length+1;
		let addPanel = document.createElement("div");
		var panelText = document.getElementById("addText").value;
		
		addPanel.setAttribute("class", "panel panel_" + size);
		addPanel.innerHTML = "<strong class=\"txt\">"+panelText+"</strong>";

		addPanel.style.background = document.getElementById("color").value;
		addPanel.style.color = document.getElementById("fontColor").value;
		
		roullete.appendChild(addPanel);
		roullete.setAttribute("class", "eq" + size);
		setRoulettePanel();
		document.querySelector(".popup").classList.toggle("show-popup"); 
	}
	
	function clickUpdateBtn(index){
		let targetPanel = document.querySelector(".panel_" + index);
		var panelText = document.getElementById("addText").value;
		
		targetPanel.innerHTML = "<strong class=\"txt\">"+panelText+"</strong>";

		targetPanel.style.background = document.getElementById("color").value;
		targetPanel.style.color = document.getElementById("fontColor").value;
		
		setRoulettePanel();
		document.querySelector(".popup").classList.toggle("show-popup"); 
	}
	
	function clickStartBtn() {
		
		document.getElementById("roullete").style.animation = "";
		var randomRotate = (Math.random() * 3000) + 1000;
		var randomAnimation = (Math.random() * 7000) + 2000;
		
		//document.getElementById("roullete").style.animation = "rotation 7s forwards ease-in-out";
		document.getElementById("roullete").animate([
				{ transform: "rotate(0deg)" },{ transform: "rotate("+randomRotate + "deg)" }
				], 
				{
			fill: 'forwards',
				duration: randomAnimation,
				easing: 'ease-in-out'
			 }
		);         
		
}

	function colorSet(target){
		var colorType = document.querySelector('input[name="colorType"]:checked').value;
		if(colorType == "font"){
			document.getElementById("fontColor").value=target.id;
				document.getElementById("showColorBox").style.color = target.id;
		} else {
			document.getElementById("color").value=target.id;
				document.getElementById("showColorBox").style.background = target.id;
		}
}