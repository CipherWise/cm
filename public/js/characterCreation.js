
    
$(function () {
  $('[data-toggle="popover"]').popover()
});




    
function chooseClass(name){
    var classDescription = name;
    document.getElementById("classDescription").innerHTML = classDescription;
    document.getElementById("classDescription").style.display = "block";
        };


function chooseType(type){
    var str = type;
    var element =(str.toLowerCase() + "Classes");
    document.getElementById("coreClasses").style.display = "none";
    document.getElementById("baseClasses").style.display = "none";
    document.getElementById("hybridClasses").style.display = "none";
    document.getElementById("alternateClasses").style.display = "none";
    document.getElementById("prestigeClasses").style.display = "none";
    document.getElementById("npcClasses").style.display = "none";
    document.getElementById("classDescription").style.display = "none";
    document.getElementById(element).style.display = "block";
    console.log(element);
};




function classicDice(){
    var str1 = Math.floor((Math.random() * 6) +1 );
    var str2 = Math.floor((Math.random() * 6) +1 );
    var str3 = Math.floor((Math.random() * 6) +1 );
    var str = (str1 + str2 +str3);
    document.getElementById("strength").innerHTML = (str1 + " + " + str2 + " + " + str3 + " = " + str);
    var dex1 = Math.floor((Math.random() * 6) +1 );
    var dex2 = Math.floor((Math.random() * 6) +1 );
    var dex3 = Math.floor((Math.random() * 6) +1 );
    var dex = (dex1 + dex2 +dex3);
    document.getElementById("dexterity").innerHTML = (dex1 + " + " + dex2 + " + " + dex3 + " = " + dex);
    var con1 = Math.floor((Math.random() * 6) +1 );
    var con2 = Math.floor((Math.random() * 6) +1 );
    var con3 = Math.floor((Math.random() * 6) +1 );
    var con = (con1 + con2 +con3);
    document.getElementById("constitution").innerHTML = (con1 + " + " + con2 + " + " + con3 + " = " + con);
    var int1 = Math.floor((Math.random() * 6) +1 );
    var int2 = Math.floor((Math.random() * 6) +1 );
    var int3 = Math.floor((Math.random() * 6) +1 );
    var int = (int1 + int2 +int3);
    document.getElementById("intelligence").innerHTML = (int1 + " + " + int2 + " + " + int3 + " = " + int);
    var wis1 = Math.floor((Math.random() * 6) +1 );
    var wis2 = Math.floor((Math.random() * 6) +1 );
    var wis3 = Math.floor((Math.random() * 6) +1 );
    var wis = (wis1 + wis2 +wis3);
    document.getElementById("wisdom").innerHTML = (wis1 + " + " + wis2 + " + " + wis3 + " = " + wis);
    var cha1 = Math.floor((Math.random() * 6) +1 );
    var cha2 = Math.floor((Math.random() * 6) +1 );
    var cha3 = Math.floor((Math.random() * 6) +1 );
    var cha = (cha1 + cha2 +cha3);
    document.getElementById("charisma").innerHTML = (cha1 + " + " + cha2 + " + " + cha3 + " = " + cha);
    };
    
function removeLowest(){
    var str = [];
    for (i=1; i<=4; i++){
    str.push(Math.floor((Math.random() * 6) +1 ));
    };
    str.sort(function(a, b){return a-b});
    strTotal = (str[1] + str[2] + str[3]);
    document.getElementById("strength").innerHTML = ("(" + str[0] + ")" + " - " + str[1] + " + " + str[2] + " + " + str[3] + " = " + strTotal);
    var dex = [];
    for (i=1; i<=4; i++){
    dex.push(Math.floor((Math.random() * 6) +1 ));
    };
    dex.sort(function(a, b){return a-b});
    dexTotal = (dex[1] + dex[2] + dex[3]);
    document.getElementById("dexterity").innerHTML = ("(" + dex[0] + ")" + " - " + dex[1] + " + " + dex[2] + " + " + dex[3] + " = " + dexTotal);
    var con = [];
    for (i=1; i<=4; i++){
    con.push(Math.floor((Math.random() * 6) +1 ));
    };
    con.sort(function(a, b){return a-b});
    conTotal = (con[1] + con[2] + con[3]);
    document.getElementById("constitution").innerHTML = ("(" + con[0] + ")" + " - " + con[1] + " + " + con[2] + " + " + con[3] + " = " + conTotal);
    var int = [];
    for (i=1; i<=4; i++){
    int.push(Math.floor((Math.random() * 6) +1 ));
    };
    int.sort(function(a, b){return a-b});
    intTotal = (int[1] + int[2] + int[3]);
    document.getElementById("intelligence").innerHTML = ("(" + int[0] + ")" + " - " + int[1] + " + " + int[2] + " + " + int[3] + " = " + intTotal);
    var wis = [];
    for (i=1; i<=4; i++){
    wis.push(Math.floor((Math.random() * 6) +1 ));
    };
    wis.sort(function(a, b){return a-b});
    wisTotal = (wis[1] + wis[2] + wis[3]);
    document.getElementById("wisdom").innerHTML = ("(" + wis[0] + ")" + " - " + wis[1] + " + " + wis[2] + " + " + wis[3] + " = " + wisTotal);
    var cha = [];
    for (i=1; i<=4; i++){
    cha.push(Math.floor((Math.random() * 6) +1 ));
    };
    cha.sort(function(a, b){return a-b});
    chaTotal = (cha[1] + cha[2] + cha[3]);
    document.getElementById("charisma").innerHTML = ("(" + cha[0] + ")" + " - " + cha[1] + " + " + cha[2] + " + " + cha[3] + " = " + chaTotal);
    modifiers();
 };
    
 
    function modifiers(){
        str = document.getElementById('strength');
        if (str >=12){
            strMod = Math.floor(str/2 - 5);
            console.log(strMod);        
    };
    elseif (str<)
};