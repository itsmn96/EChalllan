console.log("helo")
fineAmt = {
    "speeding" : 1000,
    "default" : 0,
    "Driving_Without_Helmet" : 200,
    "General" : 100,
    "Disobedience_of_orders_of_authorities" : 500,
    "Unauthorized_use_of_vehicles" : 1000,
    "Driving_without_license" : 500,
    "Driving_at_Overspeed" : 400,
    "Dangerous_driving_penalty" : 1000,
    "Druken_Driving" : 2000,
    "Vehicle_without_permit" : 2500,
    "Overloading" : 2000,
    "Overloading_of_passengers" : 1000,
    "Driving_without_wearing_seatbelt" : 100,
    "Overloading_of_two_wheelers" : 100,
    "Driving_without_Insurance" : 1000,
}

findAmt = (finaeName) =>{

document.getElementById("fine").value=fineAmt[finaeName]
}
var vno = false;
var lno = false;


// program to generate random strings
const characters ='0123456789';

function generateString(length) {
    let result = ' ';
    document.getElementById("challanValue").style.color = "black";
    const charactersLength = characters.length;
    for ( let i = 0; i < length; i++ ) {
        result += characters.charAt(Math.floor(Math.random() * charactersLength));
    }
    result = "CHLN" + result
    result =result.replace(/\s+/g, '')
    return (result);
}

document.getElementById("challanValue").value= generateString(10)

var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
var today  = new Date();

document.getElementById("todayDate").value= today.toLocaleDateString("en-US", options)    
document.getElementById("todayDate").style.color = "black";


//var lId = "TN66 2018 0000056"

function checkLicense (LicenseNumber){
    var pattern = new RegExp ('[A-Z]{2}[0-9]{2}[A-Z]{1}[0-9]{10}')
    // var LicenseNumber = "TN44T2018201820"
    var res = pattern.test(LicenseNumber)
    console.log("LicenseNumber")
    console.log(res)
    if (!res){
        document.getElementById("licError").innerHTML = "<p>invalid License Number</p>"
        document.getElementById("licError").style.color = "red";
		lno = false;
    }
    else{
        document.getElementById("licError").innerHTML = "<p></p>"
		lno = true;
        
}
}
function checkVNum (vehicleNumber){
    var pattern = new RegExp ('[A-Z]{2} [0-9]{2} [A-Z]{1,2} [0-9]{1,4}$')
    var res = pattern.test(vehicleNumber)

    if (!res){
        document.getElementById("vError").innerHTML = "<p>invalid vehicle Number</p>"
        document.getElementById("vError").style.color = "red";
		vno = false;
    }
    else{
        document.getElementById("vError").innerHTML = "<p></p>"
		vno = true;
        
}
}


var challanForm = document.getElementById("challanForm");
challanForm.addEventListener('submit', checkForm);


function checkForm(e){
	e.preventDefault();
	if (lno && vno){
		challanForm.submit();
	}
	else{
		console.log(lno);
		console.log(vno);
		alert("Please check for error");
	}
}