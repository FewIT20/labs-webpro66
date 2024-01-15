
const seq = [1, 2, 3, 4]

function rotation() {
    const pic1 = document.getElementById("picture-1");
    const pic2 = document.getElementById("picture-2");
    const pic3 = document.getElementById("picture-3");
    const pic4 = document.getElementById("picture-4");

    const order = seq.pop();
    seq.unshift(order);

    console.log(seq)

    pic1.src = "http://10.0.15.21/lab/lab3/images/" + seq[0] + ".png" 
    pic2.src = "http://10.0.15.21/lab/lab3/images/" + seq[1] + ".png" 
    pic4.src = "http://10.0.15.21/lab/lab3/images/" + seq[2] + ".png" 
    pic3.src = "http://10.0.15.21/lab/lab3/images/" + seq[3] + ".png" 
}