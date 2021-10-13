/***************************************************
  this function will run at the loading time of the 
  page. it find all the feilds with name of the error 
  and hide them
****************************************************/
window.onload = function () {
  /* get radio buttons*/
  var rad = document.StudentRegistration.sex;
  for (var i = 0; i < rad.length; i++) {
    /// assign event listner to the radion buttons
    rad[i].addEventListener("change", feildChange);
  }
  // get text feilds
  var textFeilds = document.getElementsByClassName("textFeild");
  for (var i = 0; i < textFeilds.length; i += 1) {
    console.log(textFeilds[i]);
    if (textFeilds[i] != null) {
      // add event listner to all the textfeilds
      textFeilds[i].addEventListener("keypress", feildChange);
    }
  }
  // get the options feilds of city
  var city = document.StudentRegistration.City;
  for (var i = 0; i < city.length; i++) {
    console.log(city[i]);
    city[i].addEventListener("change", feildChange);
  }
  // get the option feilds of the statess
  var state = document.StudentRegistration.State;
  for (var i = 0; i < state.length; i++) {
    console.log(state[i]);
    state[i].addEventListener("change", feildChange);
  }
};
/********************************************
 * function to validate select option feilds
 *********************************************/
function validateCity(name) {
  console.log(name);
  var e = document.getElementsByClassName(name + "Error");
  e[0].parentElement.style.display = "none";
}
/********************************************
 * function to detect change in text feilds
 *********************************************/
function feildChange() {
  console.log(this.name + "Error");
  var e = document.getElementsByClassName(this.name + "Error");
  e[0].parentElement.style.display = "none";
}
/********************************************
 * function to detect change in image feilds
 *********************************************/
function imageFeildChange() {
  console.log(this.name + "Error");
  var e = document.getElementsByClassName(this.name + "Error");
  e[0].parentElement.style.display = "none";
  var image = document.getElementById("profileid");
  console.log(image);
}
/**************************************************
 * function to validate the whole form and all its
 * feilds
 *************************************************/
function validate() {
  console.log("checking");
  // check if name is not empty
  if (document.StudentRegistration.name.value == "") {
    // if empty find name error and highlight it
    var e = document.getElementsByClassName("nameError");
    e[0].parentElement.style.display = "block";
    document.StudentRegistration.name.focus();
    return false;
  }
  // check if father name is empty
  if (document.StudentRegistration.fname.value == "") {
    // if empty find name error and highlight it
    var e = document.getElementsByClassName("fnameError");
    e[0].parentElement.style.display = "block";
    document.StudentRegistration.fname.focus();
    return false;
  }
  // check if postal address is empty
  if (document.StudentRegistration.paddress.value == "") {
    var e = document.getElementsByClassName("paddressError");
    console.log(e[0]);
    e[0].parentElement.style.display = "block";
    document.StudentRegistration.paddress.focus();
    return false;
  }
  // check if either male or female is selected if non is selected highlight error
  if (
    StudentRegistration.sex[0].checked == false &&
    StudentRegistration.sex[1].checked == false
  ) {
    var e = document.getElementsByClassName("sexError");
    e[0].parentElement.style.display = "block";
    return false;
  }
  // check if a city is selected
  if (document.StudentRegistration.City.value == "-1") {
    var e = document.getElementsByClassName("cityError");
    e[0].parentElement.style.display = "block";
    document.StudentRegistration.City.focus();
    return false;
  }
  // check if state is selected
  if (document.StudentRegistration.State.value == "-1") {
    var e = document.getElementsByClassName("stateError");
    e[0].parentElement.style.display = "block";
    document.StudentRegistration.State.focus();
    return false;
  }
  // get the email refrence
  var email = document.StudentRegistration.emailid.value;
  // find postoin of @ symbil
  atpos = email.indexOf("@");
  // find postion of .
  dotpos = email.lastIndexOf(".");
  // if either email is empty or @ is not found or domain is invald
  if (email == "" || atpos < 1 || dotpos - atpos < 2) {
    var e = document.getElementsByClassName("emailError");
    e[0].parentElement.style.display = "block";
    document.StudentRegistration.emailid.focus();
    return false;
  }
  // check if mobile number is correct
  if (
    document.StudentRegistration.mobile.value == "" ||
    isNaN(document.StudentRegistration.mobileno.value) ||
    document.StudentRegistration.mobileno.value.length != 10
  ) {
    var e = document.getElementsByClassName("mobileError");
    e[0].parentElement.style.display = "block";
    document.StudentRegistration.mobileno.focus();
    return false;
  }
  return true;
}
