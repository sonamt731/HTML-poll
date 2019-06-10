console.log("Connected!");
var emails = new Array();

function validateForm(e){
    var x = document.forms["myForm"]["youremail"].value;
    var d = document.querySelector("#msg");
    var p = x.split("@");
    var dot = x.split(".");
    var start = x.indexOf("@");
    console.log("start, !" + start);
    var end = x.indexOf(".");

        if(x==""){
           d.innerHTML = "Please Enter an Email"; 
           e.preventDefault();
        }
        else if((x.indexOf(",")!=-1) || (x.indexOf(";")!=-1) || (x.indexOf(":")!=-1) || (x.indexOf("(")!=-1) || (x.indexOf(")")!=-1) || (x.indexOf(">")!=-1) || (x.indexOf("<")!=-1)){//special characters not allowed
            d.innerHTML = "Not a Valid Email"; 
            e.preventDefault();
        }
        else if (x.indexOf("@")==-1){
            d.innerHTML = "Not a Valid Email"; 
            e.preventDefault();
        }
        else if (x.indexOf(".")==-1){
           d.innerHTML = "Not a Valid Email"; 
           e.preventDefault();    
        }      
        else if(p[0]==""){ //before the @
            d.innerHTML = "Not a Valid Email";
            e.preventDefault();

        }
        else if(p[1]==""){ //after the @
            d.innerHTML = "Not a Valid Email";
            e.preventDefault();
        }
        else if(dot[0]==""){ //before the .
            d.innerHTML = "Not a Valid Email";
            e.preventDefault();
        }
        else if(dot[1]==""){ //after the .
            d.innerHTML = "Not a Valid Email";
            e.preventDefault();
        }
        else if((end-start)==1){ //@ and . should not be next to each other 
            d.innerHTML = "Not a Valid Email";
            e.preventDefault();
        }
        else{
            emails.push(x);           
        }
    
    
}
