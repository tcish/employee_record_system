"use strict"

const form = document.getElementById("form")

let message1 = document.getElementById("message1")
let message2 = document.getElementById("message2")
let message3 = document.getElementById("message3")
let message4 = document.getElementById("message4")
let message5 = document.getElementById("message5")
let message6 = document.getElementById("message6")
let message7 = document.getElementById("message7")

//       CHECKING IS IT ON UPDATE OR INSERT
const url = new URLSearchParams(window.location.search);
const urlId = url.get('id');

form.addEventListener("submit", function(e) {
   const empID = document.getElementById("empID")
   const username = document.getElementById(`name`)
   const email = document.getElementById(`email`)
   const designation = document.getElementById(`designation`)
   const phoneNum = document.getElementById(`phoneNum`)
   const bloodGrp = document.getElementById(`bloodGrp`)
   const picture  = document.getElementById(`picture`)

   let error = false

   //       EMPLOYEE ID
   if (empID.value.trim() === "") {
      message1.innerHTML = "Enter employee ID!"
      empID.style.borderBottom = "2px solid #FF0000"
      error = true
   } else {
      const numberFormate = /^\d*$/
      if (!numberFormate.test(empID.value.trim())) {
         message1.innerHTML = "ID must be in number!"
         empID.style.borderBottom = "2px solid #FF0000"
         error = true
      } else {
         message1.innerHTML = ""
         empID.style.borderBottom = ""
      }
   }

   //       NAME
   if (username.value.trim() === "") {
      message2.innerHTML = "Enter name!"
      username.style.borderBottom = "2px solid #FF0000"
      error = true
   } else {
      message2.innerHTML = ""
      username.style.borderBottom = ""
   }

   //       EMAIL
   if (email.value.trim() === "") {
      message3.innerHTML = "Enter email!"
      email.style.borderBottom = "2px solid #FF0000"
      error = true
   } else {
      const mailFormat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
      const x = mailFormat.test(email.value.trim())
      if(!x){
         message3.innerHTML = "Email is not valid!"
         email.style.borderBottom = "2px solid #FF0000"
         error = true
      } else {
         message3.innerHTML = ""
         email.style.borderBottom = ""
      }
   }

   //       DESIGNATION
   if (designation.value.trim() === "") {
      message4.innerHTML = "Enter designation!"
      designation.style.borderBottom = "2px solid #FF0000"
      error = true
   } else {
      message4.innerHTML = ""
      designation.style.borderBottom = ""
   }

   //       CONTACT
   if (phoneNum.value === "") {
      message5.innerHTML = "Enter contact number!"
      phoneNum.style.borderBottom = "2px solid #FF0000"
      error = true
   } else {
      const phRegex = /^(?:\+?88)?01[13-9]\d{8}$/;
      if(!phRegex.test(phoneNum.value)) {
         message5.innerHTML = "Contact number not valid!"
         phoneNum.style.borderBottom = "2px solid #FF0000"
         error = true;
      } else {
         message5.innerHTML = ""
         phoneNum.style.borderBottom = ""
      }
   }

   //       BLOOD GROUP
   if (bloodGrp.value.trim() === "") {
      message6.innerHTML = "Enter blood group!"
      bloodGrp.style.borderBottom = "2px solid #FF0000"
      error = true
   } else {
      message6.innerHTML = ""
      bloodGrp.style.borderBottom = ""
   }

   //       PICTURE
   if (!urlId) {
      if (picture.value === "") {
         message7.innerHTML = "Select picture!"
         error = true
      }
   }
   if (picture.value !== "") {
      //      PICTURE EXTENSION CHECK
      let fileName = picture.value
      let fileNameLowerCase = fileName.toLowerCase()
      if (!fileNameLowerCase.match(/(\.jpg|\.png|\.JPG|\.jpeg|\.JPEG|\.PNG|\.GIF|\.gif)$/)) {
         message7.innerHTML = "only JPG, JPEG, PNG, GIF files are allowed!"
         error = true
      } else {
         //      PICTURE SIZE CHECK
         if (fileNameLowerCase.match(/(\.jpg|\.png|\.JPG|\.jpeg|\.JPEG|\.PNG|\.GIF|\.gif)$/)) {
            let maxSize = parseFloat(picture.files[0].size / (1024 * 1024)).toFixed(2)
            if (maxSize > 1) {
               message7.innerHTML = "Image should less than 1MB!"
               error = true
            }else {
               message7.innerHTML = ""
            }
         }
      }
   }

   if (error === true) {
      e.preventDefault()
   }
})


//                PREVIEW IMAGE
const picture  = document.getElementById(`picture`)
const prevPicture = document.getElementById("img_prev")
picture.addEventListener("change", () => {
   const img = picture.files[0]
   
   if (img) {
      const readPath = new FileReader()
      readPath.addEventListener("load", () => {
         prevPicture.setAttribute("src", readPath.result)
      })
      readPath.readAsDataURL(img)
   }
})

//       CHECK FOR DUPLICATE EMAIL
const email = $("#email")
const subBtn = $(".submit__btn")

email.on("keyup mouseup", () => {
   if (email.val() !== "") {
      $.ajax({
         url: "emailChk.php",
         type: "post",
         data: {email: email.val(), urlId: urlId},
         success: function(res) {
            if (res === "Email already exist!") {
               console.log(res)
               $(message3).html(res)
               $(email).css("border-bottom", "2px solid #ff0000")
               subBtn.attr("disabled", true)
               subBtn.css("cursor", "not-allowed")
            } else {
               $(message3).html("")
               $(email).css("border-bottom", "")
               subBtn.css("cursor", "pointer")
               subBtn.attr("disabled", false)
            }
         }
      })
   }
})

//       CHECK FOR DUPLICATE EMPLOYEE ID
const empID = $("#empID")

empID.on("keyup mouseup", () => {
   if (empID.val() !== "") {
      $.ajax({
         url: "employeeChk.php",
         type: "post",
         data: {empID: empID.val(), urlId: urlId},
         success: function(res) {
            if (res === "Employee ID already exist!") {
               console.log(res)
               $(message1).html(res)
               $(empID).css("border-bottom", "2px solid #ff0000")
               subBtn.attr("disabled", true)
               subBtn.css("cursor", "not-allowed")
            } else {
               $(message1).html("")
               $(empID).css("border-bottom", "")
               subBtn.css("cursor", "pointer")
               subBtn.attr("disabled", false)
            }
         }
      })
   }
})