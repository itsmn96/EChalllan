// console.log("logged")

function checkLicense(value){
    if (value.length != 15){
        document.getElementById("licenseError").innerHTML = "<p>License should be 15 characters long.</p>"
        document.getElementById("licenseError").style.color = "red";
    }
    else{
        
        document.getElementById("licenseError").innerHTML = "<p></p>"
    }
    
}