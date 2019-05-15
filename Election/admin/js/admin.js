//function to handle login-form validation
function loginValidate(loginForm){

var validationVerified=true;
var errorMessage="";

if (loginForm.myusername.value=="")
{
errorMessage+="Email not filled!\n";
validationVerified=false;
}
if(loginForm.mypassword.value=="")
{
errorMessage+="Password not filled!\n";
validationVerified=false;
}
if (!isValidEmail(loginForm.myusername.value)) {
errorMessage+="Invalid email address provided!\n";
validationVerified=false;
}
if(!validationVerified)
{
alert(errorMessage);
}
if(validationVerified)
{
validationVerified=true;
}
return validationVerified;
}

//validate view result form
function stateValidate(stateForm){

	var validationVerified=true;
	var errorMessage="";
	var okayMessage="click OK to see the poll results under the chosen position.";

	if (stateForm.state_name.selectedIndex == 0){
		errorMessage+="Select state for results.\n";
		validationVerified=false;
	}
	if(!validationVerified){
		alert(errorMessage);
	}
	if(validationVerified){
		validationVerified=true;
	}
return validationVerified;
}

//validate add state form
function positionValidated(positionForm){

var validationVerified=true;
var errorMessage="";
var okayMessage="Click OK to add new state";

if (positionForm.statename.value == "")
{
errorMessage+="Please enter the name of State.\n";
validationVerified=false;
}
if(!validationVerified)
{
alert(errorMessage);
}
if(validationVerified)
{
validationVerified=true;
}
return validationVerified;
}

//validate candidate form
function candidateValidate(candidateForm){

var validationVerified=true;
var errorMessage="";

if (candidateForm.name.value == "")
{
errorMessage+="Please enter the candidate name!\n";
validationVerified=false;
}
if (candidateForm.state.selectedIndex == 0)
{
errorMessage+="Please select state of the candidate!\n";
validationVerified=false;
}
if(!validationVerified)
{
alert(errorMessage);
}
if(validationVerified)
{
validationVerified=true;
}
return validationVerified;
}

//function to handle register-form validation
function registerValidate(registerForm){

var validationVerified=true;
var errorMessage="";
var okayMessage="click OK to process registration";

if (registerForm.firstname.value=="")
{
errorMessage+="Firstname not filled!\n";
validationVerified=false;
}
if(registerForm.lastname.value=="")
{
errorMessage+="Lastname not filled!\n";
validationVerified=false;
}
if (registerForm.email.value=="")
{
errorMessage+="Email not filled!\n";
validationVerified=false;
}
if(registerForm.password.value=="")
{
errorMessage+="Password not provided!\n";
validationVerified=false;
}
if(registerForm.ConfirmPassword.value=="")
{
errorMessage+="Confirm password not filled!\n";
validationVerified=false;
}
if(registerForm.ConfirmPassword.value!=registerForm.password.value)
{
errorMessage+="Confirm password and password do not match!\n";
validationVerified=false;
}
if (!isValidEmail(registerForm.email.value)) {
errorMessage+="Invalid email address provided!\n";
validationVerified=false;
}
if(!validationVerified)
{
alert(errorMessage);
}
if(validationVerified)
{
alert(okayMessage);
}
return validationVerified;
}

//function to handle update-form validation
function updateProfile(registerForm){

var validationVerified=true;
var errorMessage="";
var okayMessage="click OK to update your account";

if (registerForm.firstname.value=="")
{
errorMessage+="Firstname not filled!\n";
validationVerified=false;
}
if(registerForm.lastname.value=="")
{
errorMessage+="Lastname not filled!\n";
validationVerified=false;
}
if (registerForm.email.value=="")
{
errorMessage+="Email not filled!\n";
validationVerified=false;
}
if(registerForm.password.value=="")
{
errorMessage+="New password not provided!\n";
validationVerified=false;
}
if(registerForm.ConfirmPassword.value=="")
{
errorMessage+="Confirm password not filled!\n";
validationVerified=false;
}
if(registerForm.ConfirmPassword.value!=registerForm.password.value)
{
errorMessage+="Confirm password and new password do not match!\n";
validationVerified=false;
}
if (!isValidEmail(registerForm.email.value)) {
errorMessage+="Invalid email address provided!\n";
validationVerified=false;
}
if(!validationVerified)
{
alert(errorMessage);
}
if(validationVerified)
{
validationVerified=true;
}
return validationVerified;
}

//validate email function
function isValidEmail(val) {
	var re = /^[\w\+\'\.-]+@[\w\'\.-]+\.[a-zA-Z]{2,}$/;
	if (!re.test(val)) {
		return false;
	}
    return true;
}


//validate special PIN length
function isValidLength(val){
	var length = 12;
	if (!re.test(val)) {
		return false;
	}
	return true;
}

//validate state function
function isValidPosition(val) {
    var re = /[-]/;
    if (!re.test(val)) {
        return false;
    }
    return true;
}

//validate updateForm
function updateValidate(updateForm) {
    var validationVerified=true;
var errorMessage="";
var okayMessage="click OK to change your password";

if (updateForm.opassword.value=="")
{
errorMessage+="Please provide your old password.\n";
validationVerified=false;
}
if (updateForm.npassword.value=="")
{
errorMessage+="Please provide a new password.\n";
validationVerified=false;
}
if(updateForm.cpassword.value=="")
{
errorMessage+="Please confirm your new password.\n";
validationVerified=false;
}
if(updateForm.cpassword.value!=updateForm.npassword.value)
{
errorMessage+="Confirm password and new password do not match!\n";
validationVerified=false;
}
if(!validationVerified)
{
alert(errorMessage);
}
if(validationVerified)
{
var validationVerified=true;
}
return validationVerified;
}

//validate candidate form
function candidateValidate(candidateForm){

var validationVerified=true;
var errorMessage="";

if (candidateForm.name.value == "")
{
errorMessage+="Please enter the candidate name!\n";
validationVerified=false;
}
if (candidateForm.state.selectedIndex == 0)
{
errorMessage+="Candidate position not set!\n";
validationVerified=false;
}
if(!validationVerified)
{
alert(errorMessage);
}
if(validationVerified)
{
validationVerified=true;
}
return validationVerified;
}

