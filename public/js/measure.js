function makeMeasure(){
    const value = parseFloat(Math.floor((Math.random()*1000) + 1));
    const button = document.getElementsByClassName("make-test");
    document.getElementById("results-value").value = value;
    document.getElementById("results-value").innerHTML = value; 
    return value;
}

