function showCategory(str, column, table) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","../resources/imports/list.php?q="+str+"&column="+column+"&t="+table,true);
        xmlhttp.send();
    }
}

// function showClothing(table, id) {
//     console.log("appy to get each item");
//     if (id == "") {
//         document.getElementById("txtHint").innerHTML = "";
//         return;
//     } else { 
//         if (window.XMLHttpRequest) {
//             // code for IE7+, Firefox, Chrome, Opera, Safari
//             xmlhttp = new XMLHttpRequest();
//         } else {
//             // code for IE6, IE5
//             xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
//         }
//         xmlhttp.onreadystatechange = function() {
//             if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//                 document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
//             }
//         };
//         xmlhttp.open("GET","../resources/imports/view.php?id="+id+"&t="+table,true);
//         xmlhttp.send();
//     }
// }