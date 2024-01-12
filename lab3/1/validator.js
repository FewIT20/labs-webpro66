function validateForm() {    
    let personal_id = document.getElementById("personal-id").value;
    if (personal_id.length != 13) {
        alert("รหัสหมายเลขบัตรประชาชนไม่ถูกต้อง (13 หลัก)")
        return false;
    }
    let sex = document.forms["form"]["sex"].value;
    if (sex == "") {
        alert("โปรดเลือกเพศของคุณ");
        return false;
    }
    let firstname = document.getElementById("firstname").value;
    if (firstname.length < 2 || firstname.length > 20) {
        alert("ชื่อไม่ถูกต้อง (ความยาว 2-20 เท่านั้น)")
        return false;
    }
    let lastname = document.getElementById("lastname").value;
    if (lastname.length < 2 || lastname.length > 30) {
        alert("ชื่อไม่ถูกต้อง (ความยาว 2-20 เท่านั้น)")
        return false;
    }
    let address = document.getElementById("address").value;
    if (address.length < 15) {
        alert("ที่อยู่จะต้องความยาวไม่ต่ำกว่า 15 ตัวอักษร")
        return false;
    }
    let address_x1 = document.getElementById("address-x1").value;
    let address_x2 = document.getElementById("address-x2").value;
    if (address_x1.length < 2 || address_x2.length < 2) {
        alert("ต้องความยาวไม่ต่ำกว่า 2 ตัวอักษร")
        return false;
    }
    let province = document.forms["form"]["province"].value;
    if (province == "") {
        alert("โปรดเลือกจังหวัดของคุณ");
        return false;
    }
    let postal_id = document.getElementById("postal-id").value;
    if (postal_id.length != 5) {
        alert("กรอกรหัสไปรษณีย์ (ความยาว 5 หลักเท่านั้นและตัวเลข)");
        return false;
    }
}