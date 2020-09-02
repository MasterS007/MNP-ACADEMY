"use strict"

var classes = document.getElementById("classes");
var classList=[];
classList=["Class:Physics","Class:C/C++","Class:Algorithm" ];

function createClassList()
{
    var listLength= classList.length;

    if(listLength>0)
    {
        var myClass= document.createElement("ul");
        myClass.className="myClass";

        for(var i=0; i<listLength; i++)
        {
            var listItem = document.createElement("li");
            var linkItem = document.createElement("a");
            var classItem = document.createTextNode(classList[i]);
            linkItem.appendChild(classItem);
            listItem.appendChild(linkItem);
            myClass.appendChild(listItem);

        }
        classes.appendChild(myClass);
        //document.getElementById("classes")="hi";
    }
    else
    {
        var message = document.createTextNode("No class is added");
        // classes.appendChild(message);
        document.getElementById("classes").innerHTML="hi";
    }
    //window.onload = createClassList;
}