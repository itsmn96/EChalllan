var complaintForm = document.getElementById("cform");
complaintForm.addEventListener('submit',checkValidation)

function checkValidation (e) {
    e.preventDefault()
    var dno  = document.getElementById("dlno").value;
    var vno  = document.getElementById("vn").value;

    if (dno === "" && vno === ""){
        document.getElementById("showError").innerHTML = "Please Enter Values!";
        document.getElementById("showError").style.color = "red";
        document.getElementById("showError").style.textAlign = "center"
    }
    else if (dno !== "" && vno !==""){
        document.getElementById("showError").innerHTML = "Please Enter 1 Value only!";
        document.getElementById("showError").style.color = "red";
        document.getElementById("showError").style.textAlign = "center"
    }

    else {
        complaintForm.submit();
    }
}