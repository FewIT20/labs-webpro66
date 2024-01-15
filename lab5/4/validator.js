function validateForm() {    
    const personal_id = document.getElementById("personal-id").value;
    if (personal_id.length != 13) {
        alert("รหัสหมายเลขบัตรประชาชนไม่ถูกต้อง (13 หลัก)")
        return false;
    }
    const sex = document.forms["form"]["sex"].value;
    if (sex == "") {
        alert("โปรดเลือกเพศของคุณ");
        return false;
    }
    const firstname = document.getElementById("firstname").value;
    if (firstname.length < 2 || firstname.length > 20) {
        alert("ชื่อไม่ถูกต้อง (ความยาว 2-20 เท่านั้น)")
        return false;
    }
    const lastname = document.getElementById("lastname").value;
    if (lastname.length < 2 || lastname.length > 30) {
        alert("ชื่อไม่ถูกต้อง (ความยาว 2-20 เท่านั้น)")
        return false;
    }
    const address = document.getElementById("address").value;
    if (address.length < 15) {
        alert("ที่อยู่จะต้องความยาวไม่ต่ำกว่า 15 ตัวอักษร")
        return false;
    }
    const address_x1 = document.getElementById("address-x1").value;
    const address_x2 = document.getElementById("address-x2").value;
    if (address_x1.length < 2 || address_x2.length < 2) {
        alert("ต้องความยาวไม่ต่ำกว่า 2 ตัวอักษร")
        return false;
    }
    const province = document.forms["form"]["province"].value;
    if (province == "") {
        alert("โปรดเลือกจังหวัดของคุณ");
        return false;
    }
    
}