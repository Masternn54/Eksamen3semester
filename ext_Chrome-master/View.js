var obj, dbParam, xmlhttp, myObj, x, txt = "";
obj = { "table":"tourName",  "limit":20 };
dbParam = JSON.stringify(obj);
xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        myObj = JSON.parse(this.responseText);
        txt += "<table border='1'>"
        for (x in myObj) {
            txt += "<tr><td>" + myObj[x].tourName + "</td>";
            txt += "<td>" + myObj[x].description + "</td>";
            txt += "<td>" + myObj[x].price + "</td>";
            txt += "<td>" + myObj[x].keywords + "</td>";
            txt += "<td>" + myObj[x].packedId + "</td></tr>";

        }
        txt += "</table>"
        document.getElementById("demo").innerHTML = txt;
    }
};
xmlhttp.open("POST", "http://localhost/Eksamen/explore_california_api.php", true);
xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xmlhttp.send("x=" + dbParam);