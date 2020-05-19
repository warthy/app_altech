function makeMeasure(testType){
    const value = parseFloat(Math.floor((Math.random()*1000) + 1));
    const button = document.getElementsByClassName("make-test");
    document.getElementById(`${testType}-results-value`).value = value;
    document.getElementById(`${testType}-results-value`).innerHTML = value; 
    return value;
}

