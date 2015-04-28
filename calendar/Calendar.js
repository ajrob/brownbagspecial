//////////////////////////////////////////////////////////////////////////////////
//www.fortochka.com
//Alexander Babichev 2006 Coopyright
//This script is free for private use. Otherwise a $10 fee per a site is required.
//the script can be modified but the copyright notice should be left unchanged.
//////////////////////////////////////////////////////////////////////////////////

function maxDays(mm, yyyy){
var mDay;
	if((mm == 3) || (mm == 5) || (mm == 8) || (mm == 10)){ 
		mDay = 30;
  	}
  	else{
  		mDay = 31
  		if(mm == 1){
   			if (yyyy/4 - parseInt(yyyy/4) != 0){
   				mDay = 28
   			}
		   	else{
   				mDay = 29
  			}
		}
  }
return mDay; 
}

function writeCalendar(){
var now = new Date
var dd = now.getDate()
var mm = now.getMonth()
var dow = now.getDay()
var yyyy = now.getFullYear()


var arrM = new Array("January","February","March","April","May","June","July","August","September","October","November","December")
var arrY = new Array()
	for (ii=0;ii<=4;ii++){
		arrY[ii] = yyyy + ii -2
	}
var arrD = new Array("Sun","Mon","Tue","Wed","Thu","Fri","Sat")

var text = ""
text = "<form name=calForm> "
text += "<table border=1>"
text += "<tr><td>"
text += "<table width=100%><tr>"
text += "<td align=left><a href=Month- onClick='monthMove(-1);this.blur();return false;'><img src=blue_arrow_left.gif border=0></a>&nbsp;"
text += "<select name=selMonth onChange='changeCal()'>"
	for (ii=0;ii<=11;ii++){
		if (ii==mm){
			text += "<option value= " + ii + " Selected>" + arrM[ii] + "</option>"
		}
		else{
			text += "<option value= " + ii + ">" + arrM[ii] + "</option>"
		}
	}
text += "</select>&nbsp;<a href=Month+ onClick='monthMove(1);this.blur();return false;'><img src=blue_arrow_right.gif border=0></a>"
text += "</td>"

text += "<td align=right>"
text += "<select name=selYear onChange='changeCal()'>"
	for (ii=0;ii<=4;ii++){
		if (arrY[ii]==yyyy){
			text += "<option value= " + arrY[ii] + " Selected>" + arrY[ii] + "</option>"
		}
		else{		
			text += "<option value= " + arrY[ii] + ">" + arrY[ii] + "</option>"
		}
	}
text += "</select>"
text += "</td>"
text += "</tr></table>"

text += "</td></tr>"

text += "<tr><td>"
text += "<table border=1>"
text += "<tr>"
	for (ii=0;ii<=6;ii++){
		text += "<td align=center width=35 Valign=middle class=label>" + arrD[ii] + "</td>"
	}
text += "</tr>"
aa = 0

	for (kk=0;kk<=5;kk++){
		text += "<tr>"
		for (ii=0;ii<=6;ii++){
			text += "<td align=center id=td" + aa + "><a href=" + aa + " ID=" + aa + " class=cal onClick='changeBg(this.id);this.blur();return false'>1</a></td>"
			aa += 1
		}
		text += "</tr>"
	}
text += "</table>"
text += "</td></tr>"
text += "</table>"
text += "</form>"
document.write(text)
changeCal()
}


function changeCal(){
var now = new Date
var dd = now.getDate()
var mm = now.getMonth()
var dow = now.getDay()
var yyyy = now.getFullYear()

var currM = parseInt(document.calForm.selMonth.value)
var prevM
	if (currM!=0){
		prevM = currM - 1
	}
	else{
		prevM = 11
	}
	
var currY = parseInt(document.calForm.selYear.value)

var mmyyyy = new Date()
mmyyyy.setFullYear(currY,currM,1)

var day1 = mmyyyy.getDay()
	if (day1 == 0){
		day1 = 7
	}

var arrN = new Array(41)
var aa

	for (ii=0;ii<day1;ii++){
		arrN[ii] = maxDays((prevM),currY) - day1 + ii + 1
	}

	aa = 1
	for (ii=day1;ii<=day1+maxDays(currM,currY)-1;ii++){	
		arrN[ii] = aa
		aa += 1
	}
	
	aa = 1
	for (ii=day1+maxDays(currM,currY);ii<=41;ii++){
		arrN[ii] = aa
		aa += 1
	}
	
	for (ii=0;ii<=41;ii++){		
		eval("document.getElementById('td"+ii+"')").style.backgroundColor = "#ffffff"
	}	
	

var dCount = 0
	for (ii=0;ii<=41;ii++){		
		if (((ii<7)&&(arrN[ii]>20))||((ii>27)&&(arrN[ii]<20))){
			eval("document.getElementById('"+ii+"')").innerHTML = arrN[ii]
			eval("document.getElementById('"+ii+"')").style.color = "#000000"
			eval("document.getElementById('"+ii+"')").style.fontWeight = "normal"	
		}
		else{
			eval("document.getElementById('"+ii+"')").innerHTML = arrN[ii]
			if ((dCount==0)||(dCount==6)){
				eval("document.getElementById('"+ii+"')").style.color = "#FF0000"				
				eval("document.getElementById('"+ii+"')").style.fontWeight = "bold"				
			}
			else{
				eval("document.getElementById('"+ii+"')").style.color = "#000000"
				eval("document.getElementById('"+ii+"')").style.fontWeight = "bold"
			}
			if ((arrN[ii]==dd)&&(mm==currM)&&(yyyy==currY)){
				eval("document.getElementById('td"+ii+"')").style.backgroundColor = "#90ee90"				
			}
		}
		
	dCount += 1
		if (dCount>6){
			dCount=0
		}						
	}		
}

function changeBg(id){
	if (eval("document.getElementById('td"+id+"')").style.backgroundColor != "yellow"){
		eval("document.getElementById('td"+id+"')").style.backgroundColor = "yellow"
	}
	else{
		eval("document.getElementById('td"+id+"')").style.backgroundColor = "#ffffff"
	}
//Repetition for stupid Netscape6	
	if (eval("document.getElementById('td"+id+"')").style.backgroundColor != "yellow"){
		eval("document.getElementById('td"+id+"')").style.backgroundColor = "yellow"
	}
	else{
		eval("document.getElementById('td"+id+"')").style.backgroundColor = "#ffffff"
	}
	if (eval("document.getElementById('td"+id+"')").style.backgroundColor != "yellow"){
		eval("document.getElementById('td"+id+"')").style.backgroundColor = "yellow"
	}
	else{
		eval("document.getElementById('td"+id+"')").style.backgroundColor = "#ffffff"
	}	
}

function monthMove(dir){
var now = new Date
var minY = now.getFullYear() - 2
var maxY = now.getFullYear() + 2
var mm = parseInt(document.calForm.selMonth.value)
var yyyy = parseInt(document.calForm.selYear.value)

	if (yyyy==minY && mm==0 && parseInt(dir)==-1){
	}
	else{
		if (yyyy==maxY && mm==11 && parseInt(dir)==1){
		}
		else{

			mm = mm + parseInt(dir)
			if (mm==-1){
				mm=11
				yyyy = yyyy - 1
				document.calForm.selYear.value = yyyy		
			}
			if (mm==12){
				mm=0
				yyyy = yyyy + 1
				document.calForm.selYear.value = yyyy		
			}
			document.calForm.selMonth.value = mm
			changeCal()		
		}
	}
}
