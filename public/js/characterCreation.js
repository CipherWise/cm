
    
$(function () {
  $('[data-toggle="popover"]').popover()
});




    
function chooseClass(name){
    var classDescription = name;
    document.getElementById("classDescription").innerHTML = classDescription;
        };




        
function chooseType(){
    
        document.getElementById("classType").innerHTML = $.get("html/CharClassSelector.html", function(data){$( ".result" ).html( data );console.log(data)});
        
 
        };

function classicDice(){
    var str = Math.floor((Math.random() * 6) +1 );
    str = str + Math.floor((Math.random() * 6) +1 );
    str = str + Math.floor((Math.random() * 6) +1 );
    document.getElementById("strength").innerHTML = "hello";
    var dex = Math.floor((Math.random() * 6) +1 );
    dex = dex + Math.floor((Math.random() * 6) +1 );
    dex = dex + Math.floor((Math.random() * 6) +1 );
    document.getElementById("dexterity").innerHTML = dex;
    var con = Math.floor((Math.random() * 6) +1 );
    con = con + Math.floor((Math.random() * 6) +1 );
    con = con + Math.floor((Math.random() * 6) +1 );
    document.getElementById("constitution").innerHTML = con;
    var int = Math.floor((Math.random() * 6) +1 );
    int = int + Math.floor((Math.random() * 6) +1 );
    int = int + Math.floor((Math.random() * 6) +1 );
    document.getElementById("intelligence").innerHTML = int;
    var wis = Math.floor((Math.random() * 6) +1 );
    wis = wis + Math.floor((Math.random() * 6) +1 );
    wis = wis + Math.floor((Math.random() * 6) +1 );
    document.getElementById("wisdom").innerHTML = wis;
    var chr = Math.floor((Math.random() * 6) +1 );
    chr = chr + Math.floor((Math.random() * 6) +1 );
    chr = chr + Math.floor((Math.random() * 6) +1 );
    document.getElementById("charisma").innerHTML = chr;
    var i = 1;
    i++;
    console.log = i;
};