window.onload = function()
{
    var lookup_btn = document.getElementById("lookup");
    var city_lookup_btn = document.getElementById("CitiesLookUp");

    lookup_btn.addEventListener("click",search);
    city_lookup_btn.addEventListener("click",searchCity);
}

function search()
{
    var url = "http://localhost/info2180-lab5/world.php";
    //Get value entered
    searchVal = document.getElementById("country").value 
    searchVal +="&context=blank"
    AjaxRequest(url,displayResponse,searchVal)
}

function searchCity()
{
    var url = "http://localhost/info2180-lab5/world.php";
    //Get value entered
    searchVal = document.getElementById("country").value 
    searchVal +="&context=cities"
    AjaxRequest(url,displayResponse,searchVal)
}

function AjaxRequest(url,func,search)
{
    var httpRequest = new XMLHttpRequest();

    httpRequest.onreadystatechange = function(Event){
        if (httpRequest.readyState === XMLHttpRequest.DONE)
    {
        if (httpRequest.status === 200)
        {
            func(httpRequest.responseText)
        }
        else 
        {
            alert("There was a problem with the request")
        }
    }
    };
    mess = url+"?country=" + search
    httpRequest.requestType = "json"
    httpRequest.open("GET", mess);
    httpRequest.send();
}

function displayResponse(message)
{
    var resText = document.getElementById("result");
    resText.innerHTML = message
    //alert(message);
}